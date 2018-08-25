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
}
