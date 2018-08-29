<div class="new-header__top">
    <div class="container">
            <div class="log-ext">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a href="" class="log-ext__link log-ext__link--in-js">Мой профиль</a>
                    <ul class="modal-header" style="display: none;">
                        <li><a href="{{ route('cabinet', 'products') }}" class="modal-header-link">Мои товары</a></li>
                        <li><a href="{{ route('cabinet', 'finance') }}" class="modal-header-link">Мои финансы</a></li>
                        <li><a href="{{ route('cabinet', 'messages') }}" class="modal-header-link">Сообщения</a></li>
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