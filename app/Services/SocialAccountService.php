<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserSocialAccount;

class SocialAccountService
{
    public function createOrGetUser($providerObj, $providerName)
    {
        $providerUser = $providerObj->user();
//        dd($providerUser);
        $account = UserSocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new UserSocialAccount([
                    'provider_user_id' => $providerUser->getId(),
                    'provider' => $providerName,]
            );

            $user = null;
            if ($providerName != 'pinterest') $user = User::whereEmail($providerUser->getEmail())->first();
            else {
                $user = User::whereUsername($providerUser->nickname)->first();
                if ($user){
                    if ($user->account->provider != $providerName) $user = null;
                }
            }


            if (!$user) {
                $user = User::createBySocialProvider($providerUser);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }

}