<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Page;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slide;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Главная страница
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $product = Product::find(Setting::where('key', 'product_day')->first()->value);
        return view('pages.index', [
            'products' => Product::latest()->paginate(18),
            'product_day' => $product ?? Product::inRandomOrder()->first(),
            'slides' => Slide::all(),
            'collection' => Article::find(Setting::where('key', 'collection')->first()->value)
        ]);
    }

    /**
     * Выход
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }

    /**
     * Страница Что такое Creative Expo?
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Каталог
     * @param $slug_category
     * @param CategoryService $categoryService
     * @param ProductService $productService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catalog($slug_category = null, CategoryService $categoryService, ProductService $productService)
    {
        $categoryService->getSubCategories($slug_category);
        $products = $productService->getProducts($slug_category);
        $favorites = $productService->getFavoriteProducts();
        return view('pages.catalog', compact('products', 'favorites'));
    }

    /**
     * Страница "Политика конфидециальности"
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function privacyPolicy()
    {
        $page = Page::whereSlug('privacy-policy')->first();
        return view('pages.privacy-policy', ['page' => $page]);
    }

    /**
     * Страница "Условия испльзования"
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rulesUsing()
    {
        $page = Page::whereSlug('using')->first();
        return view('pages.privacy-policy', ['page' => $page]);
    }

    /**
     * Страница "Техническая поддержка"
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function technicalSupport()
    {
        $page = Page::whereSlug('technical-support')->first();
        return view('pages.privacy-policy', ['page' => $page]);
    }

    /**
     * Распродажа
     * @param ProductService $productService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sale(ProductService $productService)
    {
        return view('pages.sale', [
            'products' => Product::where('sale_price', '>', 0)->with('shop')->paginate(18),
            'favorites' => $productService->getFavoriteProducts()
        ]);
    }

    /**
     * Поиск
     * @param Request $request
     * @param ProductService $productService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, ProductService $productService)
    {
        $favorites = $productService->getFavoriteProducts();
        $products = Product::search($request->name)->paginate(18);
        return view('pages.catalog', compact('products', 'favorites'));
    }

}
