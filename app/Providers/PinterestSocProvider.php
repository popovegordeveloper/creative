<?php

namespace App\Providers;


use SocialiteProviders\Manager\SocialiteWasCalled;

class PinterestSocProvider
{
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite(
            'pinterest', 'App\Providers\Pinterest'
        );
    }
}