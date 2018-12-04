<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\UploadedFile;

class ProductService
{
    /**
     * Продукты по категории
     * @param $slug_category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getProducts($slug_category, $slug_subcategory)
    {

        if (!$slug_category && !request('sale')) return Product::checked()->active()->with('shop')->paginate(18); //Если нет категории и не распродажа
        if (!$slug_category && request('sale')) return Product::checked()->active()->with('shop')->where('sale_price', '>', 0)->paginate(18); //Если нет категории и распродажа

        $categories = Category::whereSlug($slug_category)->first()->getDescendantsAndSelf(); //категория со всеми дочернии категориями

        if ($slug_subcategory) { // Если подкатегория
            $sub_categories = $categories->where('slug', $slug_subcategory)->first()->getDescendantsAndSelf();
            $products = Product::checked()->active()->whereIn('category_id', $sub_categories->pluck('id')->toArray());
            if (request('sale')) $products = $products->where('sale_price', '>', '0'); //Если распродажа
            if (request('cost_from')) $products = $products->where('price', '>=', request('cost_from'));
            if (request('cost_to')) $products = $products->where('price', '<=', request('cost_to'));
            return $products->paginate(18);
        }

        $products = Product::checked()->active()->with('shop')->whereIn('category_id', $categories->pluck('id')->toArray());
        if (request('sale')) $products = $products->where('sale_price', '>', 0);
        if (request('cost_from')) $products = $products->where('price', '>=', request('cost_from'));
        if (request('cost_to')) $products = $products->where('price', '<=', request('cost_to'));
        return $products->paginate(18);
    }

    /**
     * Создание продукта
     * @param $request
     * @param $user
     * @return Product|\Illuminate\Database\Eloquent\Model
     */
    public function saveProduct($request, $user)
    {
        $dir_name = "/images/shops/" . $user->shop->slug . "/" . $user->shop->products->count();
        mkdir(public_path($dir_name));
        $product_data = $request->except(['delivery', 'delivery_price', 'color']);
        $photos = [];
        foreach ($request->photos as $photo) $photos[] = $this->saveImage($photo, $dir_name);
        $product_data['shop_id']  =  $user->shop->id;
        $product_data['sale_price']  =  0;
        $product_data['photos']  =  $photos;
        $product_data['qty']  =  $request->qty_null ? null : $request->qty;
        $product = Product::create($product_data);
        if ($request->has('delivery')){
            for ($i = 0; $i < count($request->delivery); $i++){
                $product->deliveries()->attach($request->delivery[$i], ['price' => $request->delivery_price[$i]]);
            }
        }
        if ($request->has('color')){
            $product->colors()->attach($request->color);
        }
        return $product;
    }

    /**
     * Сохранение изображений
     * @param UploadedFile $file
     * @param string $dir_name
     * @return string
     */
    private function saveImage(UploadedFile $file, string $dir_name)
    {
        $photo = $file->getClientOriginalName();
        $file->move(public_path($dir_name), $photo);
        return "$dir_name/$photo";
    }

    /**
     * Похожие товары
     * @param $product
     * @return Product
     */
    public function getSimilarProducts(Product $product)
    {
        $categories = $product->category->getAncestorsAndSelf();
        $categories = $categories->merge($product->category->getDescendants());
        return Product::whereIn('category_id', $categories->pluck('id')->toArray())->inRandomOrder()->limit(4)->get();
    }

    /**
     * Обновление товара
     * @param $request
     */
    public function updateProduct($request)
    {
        $shop = auth()->user()->shop;
        $product = Product::find($request->product_id);
        $dir = $this->getPosition($shop->products, $product->id);
        $dir_name = "/images/shops/" . $shop->slug . "/" . $dir;

        $product_data = $request->except(['delivery', 'delivery_price', 'color']);
        $request_photos = $request->photos;
        ksort($request_photos);
        if ($request->has('photos')) {
            $photos = [];
            foreach ($request_photos as $photo) $photos[] = is_string($photo) ? $photo : $this->saveImage($photo, $dir_name);
            $product_data['photos'] = $photos;
        }

        $product_data['qty']  =  $request->qty_null ? null : $request->qty;
        $product->update($product_data);
        if ($request->has('delivery')){
            $delivery_data = [];
            for ($i = 0; $i < count($request->delivery); $i++){
                $delivery_data[$request->delivery[$i]] = ['price' => $request->delivery_price[$i]];
            }
            $product->deliveries()->sync($delivery_data);
        }

        if ($request->has('color')){
            $product->colors()->detach();
            $product->colors()->attach($request->color);
        }
    }

    /**
     * Получаем номер товара в магазине для имени папки с фото
     * @param $products
     * @param $product_id
     * @return int
     */
    private function getPosition($products, $product_id)
    {
        $position = 0;
        foreach ($products as $product){
            if ($product->id == $product_id) break;
            $position++;
        }

        return $position;
    }

    /**
     * Уаление фото
     * @param array $photos
     */
    private function removePhotos(array $photos)
    {
        foreach ($photos as $photo) {
            unlink(public_path($photo));
        }
    }

    /**
     * Избранные товары
     * @return null
     */
    public function getFavoriteProducts()
    {
        if ($user = auth()->user()) return $user->favorite->pluck('id')->toArray();
        return null;
    }
}
