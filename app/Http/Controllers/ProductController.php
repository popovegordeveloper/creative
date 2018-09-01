<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteRequest;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\TermDispatch;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Страница создания продукта
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.product.create', [
            'categories' => Category::all(),
            'term_dispatches' => TermDispatch::all(),
            'deliveries' => Delivery::all(),
            'colors' => Color::all(),
        ]);
    }

    /**
     * Сохранение товара
     * @param SaveProductRequest $request
     * @param ProductService $productService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(SaveProductRequest $request, ProductService $productService)
    {
        $user = User::with(['shop', 'shop.products'])->find(auth()->id());
        $product = $productService->saveProduct($request, $user);
        return redirect()->route('product.show', $product->id);
    }

    /**
     * Страница товара
     * @param Product $product
     * @param ProductService $productService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product, ProductService $productService)
    {
        $product->update(['viewed' => $product->viewed + 1]);

        return view('pages.product.show', [
            'product' => $product,
            'shop' => $product->shop,
            'term_dispatch' => $product->termDispatch,
            'similar_products' => $productService->getSimilarProducts($product),
            'colors' => $product->colors,
            'favorites' => auth()->user()->favorite->pluck('id')->toArray()
        ]);
    }

    /**
     * Редактирование товара
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        return view('pages.product.create', [
            'product' => $product,
            'product_category' => $product->category,
            'product_term_dispatch' => $product->termDispatch,
            'product_deliveries' => $product->deliveries,
            'categories' => Category::all(),
            'term_dispatches' => TermDispatch::all(),
            'deliveries' => Delivery::all(),
            'colors' => Color::all(),
            'product_colors' => $product->colors->pluck('id')->toArray(),
        ]);
    }

    /**
     * Обновление товара
     * @param UpdateProductRequest $request
     * @param ProductService $productService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, ProductService $productService)
    {
        $productService->updateProduct($request);
        return redirect()->route('product.show', $request->product_id);
    }

    /**
     * Добавить в избранное
     * @param FavoriteRequest $request
     * @return string
     */
    public function addFavorite(FavoriteRequest $request)
    {
        $user = User::find($request->user_id);
        $user->favorite()->attach($request->product_id);
        return json_encode(['status' => true]);
    }

    /**
     * Удаление из избранного
     * @param FavoriteRequest $request
     * @return string
     */
    public function deleteFavorite(FavoriteRequest $request)
    {
        $user = User::find($request->user_id);
        $user->favorite()->detach($request->product_id);
        return json_encode(['status' => true]);
    }

    /**
     * Удаление товара
     * @param \Request $request
     * @return string
     */
    public function delete(Request $request)
    {
        $product = auth()->user()->shop->products->find($request->product_id);
        if ($product) $product->delete();
        return json_encode(['status' => true]);
    }

}
