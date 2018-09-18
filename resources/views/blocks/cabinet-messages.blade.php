<div class="lk__content @if($section == 'messages') lk__content_active @endif">
    <div class="mesenger">
        <div class="mesenger__top">
            <h3 class="mesenger__title">Сообщения</h3>
            <a href="{{ route('cabinet', 'messages') }}?id={{ $conversations->where('user2_id', 1)->first()->id }}" class="mesenger__button">Написать в службу поддержки</a>
        </div>
        @if($conversations->count())
            <div class="mesenger__content" style="height: auto">
            <ul class="mesenger__list">
                @foreach($conversations as $conversation)
                    @php $companion = $conversation->getCompanion(auth()->id()); @endphp
                    <li class="mesenger__item"><input type="hidden" name="id" value="{{ $conversation->id }}"><a href="{{ route('cabinet', 'messages') }}?id={{ $conversation->id }}" class="mesenger__name-link">{{ $companion->full_name }}</a></li>
                @endforeach
                {{--<li class="mesenger__item"><a href="" class="mesenger__name-link mesenger__name-link_last">Антон Программист</a></li>--}}
            </ul>
            @if(!request('id'))
                <div class="mesenger__mesenj-win">
                    <div class="empty-m">
                        <img src="{{ asset('img/flay.jpg') }}" alt="" class="empty-m__img">
                        <h3 class="empty-m__title">Выберите собеседника</h3>
                        <span class="empty-m__subtitle">Чтобы начать переписку, выберите собеседника слева в списке.</span></div>
                </div>
            @else
                @php
                    $conversation = $conversations->find(request('id'));
                    $companion = $conversation->getCompanion(auth()->id());
                    $messages = $conversation->messages->groupBy('date');
                @endphp
                <div class="mesenger__mesenj-win">
                    <div class="messenge-win">
                        <div class="messenge-win__content">
                            <div class="messenge-win__top">
                                <h3 class="messenge-win__name">{{ $companion->full_name }}</h3>
                            </div>
                            @foreach($messages as $date => $group_messages)
                                <div class="messenge-win__date"><span class="messenge-win__date-t">{{ $group_messages->first()->created_at->format('d.m.Y') }}</span></div>
                                @foreach($group_messages as $message)
                                    <div class="messenge">
                                        <div class="messenge__top">
                                            <h3 class="messenge__name">
                                                {{ auth()->id() == $message->user_id ? 'Вы:' :  $companion->full_name }}
                                            </h3>
                                            <span class="messenge__date">{{ $message->created_at->format('H:i') }}</span></div>
                                        @if($message->text)<p class="messenge__text">{{ $message->text }}</p>@endif
                                        @if($message->file)<a style="color: #c51f5d;" download href="{{ asset($message->file) }}">{{ $message->filename }}</a>@endif
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        <form action="{{ route('message.create') }}" class="messenge-win__form" method="post" style="height: auto" enctype="multipart/form-data" id="message_form">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $companion->id }}">
                            <textarea name="text" class="messenge-win__input" placeholder="Напишите сообщение..."></textarea>
                            <input type="file" class="messenge-win__file" name="file">
                            <button style="display: inline-block; vertical-align: top;background: transparent; border: none; padding-left: 40px; color: #c36; cursor: pointer" class="mesenger__button">Отправить</button>
                            <div id="preloader" style="background-image: url(/img/preloader.gif); height: 40px; width: 50px; background-position: center; background-size: cover; display: inline-block; opacity: 0" width="30" height="30"></div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        @else
            <p style="text-align: center">На данный момент у вас нет диалогов</p>
        @endif
    </div>
</div>
