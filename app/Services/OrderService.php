<?php

namespace App\Services;

use App\Mail\PasswordAfterOrder;
use App\Models\Order;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderService
{
    /**
     * Созание заказа
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($request)
    {
        try {
            $user = User::whereEmail($request->email)->first();
            if (!$user) {
                $request_data = $request->all();
                $password = str_random(6);
                $request_data['password'] = bcrypt($password);
                $user = User::create($request_data);
                $user->roles()->attach(3);
                try {
                    \Mail::to($user->email)->send(new PasswordAfterOrder($password));
                } catch (\Exception $exception){
                    \Log::error($exception->getMessage());
                }
            }
            else {
                $user->update($request->all());
                if (!auth()->id()) \Auth::login($user);
            }

            foreach (Cart::content() as $cart_item) {
                Order::create([
                    'user_id' => $user->id,
                    'shop_id' => $cart_item->model->shop->id,
                    'product' => serialize($cart_item),
                    'comment' => $request->comment ?? ''
                ]);
            }

            Cart::destroy();

            return redirect('/cabinet/purchases');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            return redirect()->back();
        }
    }
}