<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
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
}
