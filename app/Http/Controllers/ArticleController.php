<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Страница всех статей
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.article.index', [
            'articles' => Article::paginate(8)
        ]);
    }

    /**
     * Вакансия
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('pages.article.show', [
            'article' => $article
        ]);
    }
}
