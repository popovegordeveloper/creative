<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    /**
     * Кабинет
     * @param null $section
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($section = null)
    {
        return view('pages.cabinet', ['section' => $section, 'user' => User::with(['shop', 'shop.products', 'favorite'])->find(auth()->id())]);
    }
}
