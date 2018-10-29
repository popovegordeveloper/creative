<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Сстраница корзины
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.cart.index');
    }

    /**
     * Добавление товара в корзину
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::add($product, $request->get('qty', 1));
        return response()->json([
            'html' => view('blocks.cart-small')->render(),
            'qty' => Cart::count(),
        ]);
    }

    /**
     * Удаление товара
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function delete(Request $request)
    {
        Cart::remove($request->get('cart_row_id'));
        return response()->json([
            'html' => view('blocks.cart-small')->render(),
            'qty' => Cart::count()
        ]);
    }

    /**
     * Удаление всех товаров
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function deleteAll()
    {
        Cart::destroy();
        return response()->json([
            'html' => view('blocks.cart-small')->render(),
            'qty' => Cart::count()
        ]);
    }


}
