<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcceptOrderRequest;
use App\Http\Requests\CancelOrderRequest;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Services\OrderService;

class OrderController extends Controller
{
    /**
     * Создание заказа
     * @param CreateOrderRequest $request
     * @param OrderService $orderService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CreateOrderRequest $request, OrderService $orderService)
    {
       return $orderService->create($request);
    }

    /**
     * Отменить заказ
     * @param CancelOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(CancelOrderRequest $request)
    {
        Order::find($request->order_id)->update(['status_id' => 5, 'cancel' => $request->text]);
        return redirect()->back();
    }

    /**
     * Начать обработку
     * @param AcceptOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(AcceptOrderRequest $request)
    {
        Order::find($request->order_id)->update(['status_id' => 2]);
        return redirect()->back();
    }

    /**
     * Отправить заказ
     * @param AcceptOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(AcceptOrderRequest $request)
    {
        Order::find($request->order_id)->update(['status_id' => 3]);
        return redirect()->back();
    }

    /**
     * Отправить заказ
     * @param AcceptOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function completed(AcceptOrderRequest $request)
    {
        Order::find($request->order_id)->update(['status_id' => 4]);
        return redirect()->back();
    }

    /**
     * Завершить заказ
     * @param CancelOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function end(CancelOrderRequest $request)
    {
        Order::find($request->order_id)->update(['status_id' => 6]);
        return redirect()->back();
    }

}
