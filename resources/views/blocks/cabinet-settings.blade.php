<div class="lk__content @if($section == 'settings') lk__content_active @endif">
    <div class="settings">
        <div class="settings__top">
            <h3 class="settings__title">Настройки</h3>
        </div>
        <form action="{{ route('user.update') }}" class="settings__form" method="post">
            @csrf
            <div class="settings__left">
                <label  class="settings__label"><span>Имя</span>
                    <input type="text" class="settings__input" name="name" value="{{ $user->name }}">
                </label>
                <label  class="settings__label"><span>Отчество</span>
                    <input type="text" class="settings__input" name="patronymic" value="{{ $user->patronymic }}">
                </label>
                <label  class="settings__label"><span>Фамилия</span>
                    <input type="text" class="settings__input" name="surname" value="{{ $user->surname }}">
                </label>
                <label  class="settings__label"><span>Эл. почта</span>
                    <input type="email" class="settings__input" name="email" value="{{ $user->email }}">
                </label>
                <label  class="settings__label"><span>Телефон</span>
                    <input type="text" class="settings__input" name="phone" value="{{ $user->phone }}">
                </label>
                <label  class="settings__label"><span>Адрес</span>
                    <input type="text" class="settings__input" name="address" value="{{ $user->address }}">
                </label>
                <label  class="settings__label"><span>Почтовый индекс</span>
                    <input type="text" class="settings__input" name="index" value="{{ $user->index }}">
                </label>
            </div>
            <div class="settings__right">
                <span class="settings__pass">Изменить пароль</span>
                <label  class="settings__label"><span>Старый пароль</span>
                    <input type="text" class="settings__input" name="old_password">
                </label>
                <label  class="settings__label"><span>Новый пароль</span>
                    <input type="text" class="settings__input" name="password">
                </label>
            </div>
            <div class="settings__bt-wr">
                <button class="settings__button">Сохранить</button>
            </div>
        </form>
    </div>
</div>
