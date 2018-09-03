<div id="popup-js" class="container" style="display: none;">
    <form action="{{ route('message.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3 class="settings-shop__title">Сообщение</h3>
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <textarea class="settings-shop__textarea big" name="text" id="" cols="30" rows="10"></textarea>
        <input type="file" name="file">
        <div class="center">
            <button id="new-message-btn" class="info-i__button-q">Отправить</button>
        </div>
    </form>
</div>