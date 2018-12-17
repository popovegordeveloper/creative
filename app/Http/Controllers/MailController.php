<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutMailRequest;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\SendMailRequest;
use App\Mail\AboutMail;
use App\Mail\ProductMail;
use App\Mail\ShopMail;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;

class MailController extends Controller
{
    public function sendProduct(SendMailRequest $request)
    {
        $user = User::find($request->user_id);
        $product = Product::find($request->product_id);
        try {
            \Mail::to($user->email)->send(new ProductMail($user, $product, $request->email, $request->text));
        } catch (\Exception $exception){
            \Log::error($exception->getMessage());
        }

        return redirect()->back();
    }

    public function sendShop(SendMailRequest $request)
    {
        $user = User::find($request->user_id);
        try {
            \Mail::to($user->email)->send(new ShopMail($request->email, $request->text));
        } catch (\Exception $exception){
            \Log::error($exception->getMessage());
        }

        return redirect()->back();
    }

    public function sendAbout(AboutMailRequest $request)
    {
        $email = Setting::where('key','email')->first();
        try {
            \Mail::to($email->value)->send(new AboutMail($request->email, $request->text));
        } catch (\Exception $exception){
            \Log::error($exception->getMessage());
        }

        return redirect()->back();
    }

    public function sendAnswer(AnswerRequest $request)
    {
        $email = Setting::where('key','email')->first();
        try {
            \Mail::to($email->value)->send(new AboutMail($request->email, $request->message, $request->name));
            return response()->json([
                'error' => false,
                'message' => "Ok"
            ]);
        } catch (\Exception $exception){
            \Log::error($exception->getMessage());
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
