<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveShopRequest;
use App\Models\Delivery;
use App\Models\Payment;
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
        return view('pages.shop.create', ['deliveries' => Delivery::all(), 'payments' => Payment::all()]);
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
        return redirect()->route('shop.show', $shop->slug);
    }

    /**
     * Редактирование магазина
     * @param Shop $shop
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($slug)
    {
        $shop = Shop::with('deliveries')->whereSlug($slug)->first();
        return view('pages.shop.create', [
            'shop' => $shop,
            'shop_deliveries' => $shop->deliveries,
            'deliveries' => Delivery::all(),
            'payments' => Payment::all(),
            'shop_payments' => $shop->payments,
        ]);
    }

    /**
     * Обновление магазина
     * @param SaveShopRequest $request
     * @param ShopService $shopService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveShopRequest $request, ShopService $shopService)
    {
        $shopService->updateShop($request);
        return redirect()->route('shop.show', auth()->user()->shop->slug);
    }

}
