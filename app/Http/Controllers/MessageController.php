<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Создание сообщения
     * @param Request $request
     * @return string
     */
    public function create(Request $request)
    {
        $conversation = Conversation::where('user1_id', auth()->id())->where('user2_id', $request->user_id)->first();
        if (!$conversation) $conversation = Conversation::where('user2_id', auth()->id())->where('user1_id', $request->user_id)->first();
        if (!$conversation) $conversation = Conversation::create(['user1_id' => auth()->id(), 'user2_id' => $request->user_id]);
        $date = Carbon::now();
        $date = $date->day . " " . $date->month . " " . $date->year;
        $conversation->messages()->create(['text' => $request->text, 'user_id' => auth()->id(), 'date' => $date]);

        return redirect()->back();
    }

}
