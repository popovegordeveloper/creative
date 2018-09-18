<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Mail\NewMessage;
use App\Models\Conversation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Создание сообщения
     * @param CreateMessageRequest $request
     * @return string
     */
    public function create(CreateMessageRequest $request)
    {
        $conversation = Conversation::where('user1_id', auth()->id())->where('user2_id', $request->user_id)->first();
        if (!$conversation) $conversation = Conversation::where('user2_id', auth()->id())->where('user1_id', $request->user_id)->first();
        if (!$conversation) $conversation = Conversation::create(['user1_id' => auth()->id(), 'user2_id' => $request->user_id]);
        $json = ['status' => 'ok'];
        $date = Carbon::now();
        $json['time'] = $date->format('H:i');
        $date_search = $date->day . " " . $date->month . " " . $date->year;
        $date =  $date->format('d.m.Y');
        $current_day_message = $conversation->messages()->where('date', $date_search)->first();
        if (!$current_day_message) $json['date'] = $date;

        $message_data = ['text' => $request->text, 'user_id' => auth()->id(), 'date' => $date_search];

        if ($request->hasFile('file')){
            $filename = $conversation->id . Carbon::now()->timestamp . $request->file->getClientOriginalName();
            $message_data['filename'] = $request->file->getClientOriginalName();
            $json['filename'] = $request->file->getClientOriginalName();
            $request->file->move(public_path('messages'), $filename);
            $message_data['file'] = "/messages/$filename";
            $json['url'] = asset("/messages/$filename");
        }
        $conversation->messages()->create($message_data);

        $user = User::find($request->user_id);

        try {
            \Mail::to($user->email)->send(new NewMessage($user));
        } catch (\Exception $exception){
            \Log::error($exception->getMessage());
        }

        if (\Request::ajax()) return json_encode($json);
        return redirect()->back();
    }

    /**
     * Получить диалог
     * @param Request $request
     * @return string
     */
    public function conversation(Request $request)
    {
        $conversation = Conversation::with('messages')->find($request->id);
        if ($conversation->user1_id == auth()->id() or $conversation->user2_id == auth()->id()){
            return json_encode([
                'conversation' => $conversation,
                'messages' => $conversation->messages->groupBy('date'),
                'companion' => $conversation->getCompanion(auth()->id())
            ]);
        }
        return json_encode(['status' => false]);
    }

}
