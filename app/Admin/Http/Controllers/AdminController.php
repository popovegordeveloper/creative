<?php

namespace App\Admin\Http\Controllers;

use AdminSection;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Страница сообщений диалога
     * @param Conversation $conversation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function messages(Conversation $conversation)
    {
        $user = User::find($conversation->user1_id);

        $content = view('admin.message.index', [
            'messages' => $conversation->messages()->latest()->get(),
            'user' => $user
        ]);

        return AdminSection::view($content, "Диалог с полльзователем $user->full_name");
    }

}
