<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Активация пользователя после перехода по ссылке из email
     * @param $hash
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function activate($hash)
    {
        $user = User::whereActivationHash($hash)->first();
        if ($user) $user->update(['is_activate' => true]);
        return redirect('/');
    }

    /**
     * Обновление пользователя
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user_data = $request->except(['password', 'old_password']);
        if ($request->has('password') && $request->has('old_password') &&  \Hash::check($request->old_password, auth()->user()->password)){
            $user_data['password'] = \Hash::make($request->password);
        }
        auth()->user()->update($user_data);
        return redirect()->back();
    }
}
