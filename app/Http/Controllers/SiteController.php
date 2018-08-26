<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Главная страница
     * @param null $category
     * @param CategoryService $categoryService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($category = null, CategoryService $categoryService)
    {
        $categoryService->getSubCategories($category);
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

}
