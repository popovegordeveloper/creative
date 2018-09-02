<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;

class VacancyController extends Controller
{
    /**
     * Страница всех вакансий
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.vacancy.index', [
            'vacancies' => Vacancy::all()
        ]);
    }

    /**
     * Вакансия
     * @param Vacancy $vacancy
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Vacancy $vacancy)
    {
        return view('pages.vacancy.show', [
            'vacancy' => $vacancy
        ]);
    }
}
