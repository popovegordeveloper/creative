<?php

namespace App\Http\Controllers;

use App\Services\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @param $provider
     * @return mixed
     */
    public function login($provider)
    {
        return Socialite::with($provider)->redirect('/');
    }

    /**
     * @param SocialAccountService $service
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(SocialAccountService $service, $provider)
    {
        auth()->logout();
        $driver   = Socialite::driver($provider);
        $user = $service->createOrGetUser($driver, $provider);
        auth()->login($user, true);
        return redirect('/');
    }

}
