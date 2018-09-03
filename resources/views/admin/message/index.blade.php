<a href="{{ URL::previous()  }}" class="btn btn-warning" style="margin-bottom: 15px">Назад</a>
@if($messages->count())

    @php
        $messages = $messages->groupBy('date');
    @endphp

    <div class="container">
        <div style="display: 1 1 auto; flex-direction: column; height: 500px; overflow-y: auto; padding: 20px; background: #fff; margin-bottom: 30px">
            @foreach($messages as $k => $group_messages)
                <p style="text-align: center;font-weight: bold;margin-top: 20px;">{{ $group_messages->first()->created_at->format('d.m.Y') }}</p>
                @foreach($group_messages as $message)
                    <div style="display: flex;justify-content: space-between;padding: 15px;border-bottom: 1px solid #ececec;">
                        <p style="color: #c36; font-weight: bold">{{ $message->user_id == $user->id ? "$user->full_name: " : "Вы: " }}</p>
                        <p style="flex-grow: 3;padding-left: 10px;font-weight: bold;">
                            @if($message->text)
                                {{ $message->text }}
                                <br>
                            @endif
                            @if($message->file)
                                <a download href="{{ asset($message->file) }}">{{ $message->filename }}</a>
                            @endif
                        </p>
                        <p style="font-weight: bold; color: #ccc">{{ $message->created_at->format("H:i") }}</p>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@else
    <p class="bg-info" style="padding: 15px;font-weight: bold;">Нет сообщений</p>
@endif

<div class="container">
    <form style="background: #fff;padding: 15px;" action="{{ route('message.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <h4 style="color: #c36; font-weight: bold;">Новое сообщение</h4>
        <div class="form-group">
            <textarea style="font-weight: bold;" class="form-control" name="text" id="" cols="30" rows="10"
                      placeholder="Текст сообщения..."></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
