<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveShopRequest;
use App\Models\Delivery;
use App\Models\Shop;
use App\Services\ShopService;

class ShopController extends Controller
{

    /**
     * Страница магазина
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        return view('pages.shop.show', ['shop' => Shop::with('products')->whereSlug($slug)->first()]);
    }

    /**
     * Страница создания магазина
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.shop.create', ['deliveries' => Delivery::all()]);
    }

    /**
     * Создание магазина
     * @param SaveShopRequest $request
     * @param ShopService $shopService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(SaveShopRequest $request, ShopService $shopService)
    {
        $shop = $shopService->saveShop($request);
        auth()->user()->roles()->attach(2);
        return redirect('/');
    }

}
