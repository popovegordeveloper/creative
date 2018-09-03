<?php

namespace App\Observers;

use App\Models\Conversation;
use App\Models\User;

class UserObserver
{
    /**
     * Хук на создание пользователя
     * @param User $user
     */
    public function created(User $user)
    {
        if ($user->id != 1) Conversation::create(['user1_id' => $user->id, 'user2_id' => 1]);
    }
}
