<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\TermDispatch;
use App\Models\User;
use App\Services\ProductService;

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
            'similar_products' => $productService->getSimilarProducts($product)
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
        ]);
    }

    public function update(UpdateProductRequest $request, ProductService $productService)
    {
        $productService->updateProduct($request);
        return redirect()->route('product.show', $request->product_id);
    }

}
