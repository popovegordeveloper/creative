<div class="new-header__top">
    <div class="container">
        <div style="display: flex; justify-content: space-between; width: 100%">
            <a class="log-ext__link" href="{{ route('categories') }}">Каталог</a>
            <div class="log-ext">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(auth()->user()->hasRole('Seller'))
                        @php $new_orders = auth()->user()->shop->orders()->where('is_new', true)->count(); @endphp
                        <a href="{{ route('cabinet', 'selling') }}" class="log-ext__link">Мои заказы @if($new_orders) <span style="color: #c36; font-weight: bold">{{ $new_orders }}</span> @endif</a>
                    @endif
                    <a href="" class="log-ext__link log-ext__link--in-js">Мой профиль</a>
                    <ul class="modal-header" style="display: none;">
                        @if(auth()->user() and auth()->user()->hasRole('Seller')) <li><a href="{{ route('cabinet', 'products') }}" class="modal-header-link">Мои товары</a></li> @endif
                        @if(auth()->user()) <li><a href="{{ route('cabinet', 'purchases') }}" class="modal-header-link">Мои покупки</a></li> @endif
                        {{--@if(auth()->user() and auth()->user()->hasRole('Seller')) <li><a href="{{ route('cabinet', 'finance') }}" class="modal-header-link">Мои финансы</a></li> @endif--}}
                        @php
                            $new_messages = auth()->user()->new_messages;
                        @endphp
                        <li><a href="{{ route('cabinet', 'messages') }}" class="modal-header-link">Сообщения @if($new_messages->count()) <span style="color: #c36; font-weight: bold">{{$new_messages->count()}}</span> @endif</a></li>
                        <li><a href="{{ route('cabinet', 'favorites') }}" class="modal-header-link">Избранное</a></li>
                        <li><a href="{{ route('cabinet', 'settings') }}" class="modal-header-link">Найстройки</a></li>
                        <li><a href="{{ route('logout') }}" class="modal-header-link">Выйти</a></li>
                    </ul>
                @else
                    <a class="log-ext__link"><a href="/login" class="log-ext__link">Войти</a>
                        <a href="/register" class="log-ext__link log-ext__link--last">Регистрация</a>
                @endif
            </div>
        </div>
    </div>
</div>