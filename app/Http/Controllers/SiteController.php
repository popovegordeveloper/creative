<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catalog($slug_category = null, CategoryService $categoryService)
    {
        if (!$slug_category) return redirect('/');
        $categoryService->getSubCategories($slug_category);
        return view('pages.catalog');
    }

}
