<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\CategoryQuestion;
use App\Models\Conversation;
use App\Models\Page;
use App\Models\Product;
use App\Models\Question;
use App\Models\Setting;
use App\Models\Slide;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Главная страница
     * @param ProductService $productService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ProductService $productService)
    {
        $product = Product::find(Setting::where('key', 'product_day')->first()->value);
        return view('pages.index', [
            'products' => Product::checked()->active()->latest()->paginate(18),
            'product_day' => $product ?? Product::checked()->inRandomOrder()->first(),
            'slides' => Slide::all(),
            'collection' => Article::find(Setting::where('key', 'collection')->first()->value),
            'favorites' => $productService->getFavoriteProducts()
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
        $conversation_with_admin = Conversation::where('user2_id', 1)->where('user1_id', auth()->id())->first();
        return view('pages.about', ['conversation_with_admin' => $conversation_with_admin]);
    }

    /**
     * Каталог
     * @param $slug_category
     * @param null $slug_subcategory
     * @param CategoryService $categoryService
     * @param ProductService $productService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catalog($slug_category = null, $slug_subcategory = null, CategoryService $categoryService, ProductService $productService)
    {
        $categoryService->getSubCategories($slug_category);
        $products = $productService->getProducts($slug_category, $slug_subcategory);
        \View::share([
            "min" => $products->min('price'),
            "max" => $products->max('price'),
        ]);
        $favorites = $productService->getFavoriteProducts();
        return view('pages.catalog', compact('products', 'favorites', 'slug_category'));
    }

    /**
     * Страница "категории"
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categories()
    {
        $categories = Category::active()->orderBy('name')->get();
        $categories = $categories->groupBy(function ($item, $key) { return mb_substr($item->name, 0, 1, "UTF-8");  });
        return view('pages.catalog-categories', ['categories' => $categories]);
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
        $email = Setting::where('key','email')->first();
        return view('pages.privacy-policy', ['email' => $email]);
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

    /**
     * Страница вопрос - ответ
     * @param null $question_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function faq($question_id = null)
    {
        if (!$question_id) return view('pages.faq', ['categories' => CategoryQuestion::with('questions')->get()]);
        return view('pages.faq', ['question' => Question::with('answer')->find($question_id)]);
    }

}
