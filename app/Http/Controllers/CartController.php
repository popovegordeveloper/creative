<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Delivery;
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
        $cost_delivery = 0;
        foreach (Cart::content() as $product) $cost_delivery += $product->options['delivery'] ? $product->options['delivery']->pivot->price : 0;
        return view('pages.cart.index', ['cost_delivery' => $cost_delivery]);
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
        $delivery = $product->shop->deliveries->first();
        $payment = $product->shop->payments->first();

        if ($request->has('color_id')) $row = Cart::add($product, $request->get('qty', 1), [
            'color' => Color::find($request->color_id),
            'delivery' => $delivery,
            'payment' => $payment,
        ]);
        else $row = Cart::add($product, $request->get('qty', 1), [
            'delivery' => $delivery,
            'payment' => $payment,
        ]);

        return response()->json([
            'html' => view('blocks.cart-small')->render(),
            'qty' => Cart::count(),
            'price' => $row->price * $row->qty,
            'total' => Cart::subtotal()
        ]);
    }

    /**
     * plus item from cart
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function plus(Request $request)
    {
        $row = Cart::get($request->get('cart_row_id'));
        $row = Cart::update($request->get('cart_row_id'), $row->qty + 1);
        return response()->json([
            'html' => view('blocks.cart-small')->render(),
            'qty' => Cart::count(),
            'price' => $row->price * $row->qty,
            'total' => Cart::subtotal()
        ]);
    }

    /**
     * minus item from cart
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function minus(Request $request)
    {
        try {
            $row = Cart::get($request->get('cart_row_id'));
            $row = Cart::update($request->get('cart_row_id'), $row->qty - 1);
            return response()->json([
                'html' => view('blocks.cart-small')->render(),
                'qty' => Cart::count(),
                'price' => $row->price * $row->qty,
                'total' => Cart::subtotal()
            ]);
        } catch (\Exception $exception){
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }
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
        $total = Cart::subtotal();
        foreach (Cart::content() as $product)
            $total += $product->options->has('delivery') ? $product->options['delivery']->pivot->price : 0;
        return response()->json([
            'html' => view('blocks.cart-small')->render(),
            'qty' => Cart::count(),
            'total' => $total,
            'products_cost' => Cart::subtotal(),
            'delivery_cost' => $total - Cart::subtotal()
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

    /**
     * Изменение метода доставки
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeDelivery(Request $request)
    {
        try {
            $row = Cart::get($request->get('cart_row_id'));
            $delivery = $row->model->shop->deliveries()->find($request->delivery_id);
            $row->options['delivery'] = $delivery;
            Cart::update($request->get('cart_row_id'), $row->qty);
            $total = Cart::subtotal();
            foreach (Cart::content() as $product)
                $total += $product->options->has('delivery') ? $product->options['delivery']->pivot->price : 0;
            return response()->json([
                'total' => $total,
                'delivery_cost' => $total - Cart::subtotal()
            ]);
        } catch (\Exception $exception){
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    /**
     * Изменение метода оплаты
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePayment(Request $request)
    {
        try {
            $row = Cart::get($request->get('cart_row_id'));
            $payment = $row->model->shop->payments()->find($request->payment_id);
            $row->options['payment'] = $payment;
            Cart::update($request->get('cart_row_id'), $row->qty);
            return response()->json(['status' => true]);
        } catch (\Exception $exception){
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

}
