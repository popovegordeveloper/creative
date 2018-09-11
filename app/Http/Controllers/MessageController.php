<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Mail\NewMessage;
use App\Models\Conversation;
use App\Models\User;
use Carbon\Carbon;

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
        $date = Carbon::now();
        $date = $date->day . " " . $date->month . " " . $date->year;
        $message_data = ['text' => $request->text, 'user_id' => auth()->id(), 'date' => $date];
        $json = ['status' => 'ok'];
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

}
