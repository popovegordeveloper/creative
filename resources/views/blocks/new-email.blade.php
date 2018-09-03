<div id="popup-js" class="container" style="display: none;">
    <form action="{{ isset($product_id) ? route('mail.product') : route('mail.shop') }}" method="post">
        @csrf
        <h3 class="settings-shop__title">Сообщение</h3>
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        @if(isset($product_id))
            <input type="hidden" name="product_id" value="{{ $product_id }}">
        @elseif(isset($shop_id))
            <input type="hidden" name="shop_id" value="{{ $shop_id }}">
        @endif
        <input type="email" class="text-form" style="margin-bottom: 15px;" name="email" placeholder="Email...">
        <textarea class="settings-shop__textarea big" name="text" id="" cols="30" rows="10"></textarea>
        <div class="center">
            <button id="new-message-btn" class="info-i__button-q">Отправить</button>
        </div>
    </form>
</div>