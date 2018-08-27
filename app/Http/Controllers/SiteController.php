<?php

namespace App\Http\Controllers;

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
        return view('pages.index');
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
        return view('pages.catalog', compact('products'));
    }

}
