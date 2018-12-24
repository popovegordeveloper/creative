@php $user->shop->orders()->update(['is_new' => false]); @endphp
<div class="lk__content @if($section == 'selling') lk__content_active @endif">
    <div class="my-items">
        @if($user->shop->orders->count())
            <div>
                <h3 class="my-items-empty__title">Мои заказы</h3>
            </div>
            <p style="text-align: center">Ваша финансовая статистика</p>
            <div style="background: #e9e9e9; padding: 20px 35px; display: flex; justify-content: center">
                <div style="margin-right: 45px;">
                    <p style="font-weight: 500;">Продано товаров на сумму:</p>
                    <h3 style="text-align: center;">{{ $user->shop->purchased_sum }} ₽</h3>
                </div>
                <div>
                    <p style="font-weight: 500;">Продано товаров:</p>
                    <h3 style="text-align: center;">{{ $user->shop->purchased_count }}</h3>
                </div>
            </div>
            <div style="display: flex; justify-content: center; margin-top: 50px; margin-bottom: 50px;">
                <a href="" class="mesenger__button order-tab-btn order-tab-btn__active js-order-tab" data-class="orders-body1">Текущие</a>
                <a href="" class="mesenger__button order-tab-btn js-order-tab" data-class="orders-body2">Отмененные</a>
                <a href="" class="mesenger__button order-tab-btn js-order-tab" data-class="orders-body3">Завершенные</a>
            </div>
            <div class="orders-body orders-body1">
                @if($user->shop->currently_orders->count())
                    @include('blocks.orders', ['orders' => $user->shop->currently_orders, 'shop' => true])
                @else
                    <p style="text-align: center;">У вас нет текущих заказов</p>
                @endif
            </div>
            <div class="orders-body orders-body2" style="display: none">
                @if($user->shop->canceled_orders->count())
                    @include('blocks.orders', ['orders' => $user->shop->canceled_orders, 'shop' => true])
                @else
                    <p style="text-align: center;">У вас нет отмененных заказов</p>
                @endif
            </div>
            <div class="orders-body orders-body3" style="display: none">
                @if($user->shop->completed_orders->count())
                    @include('blocks.orders', ['orders' => $user->shop->completed_orders, 'shop' => true])
                @else
                    <p style="text-align: center;">У вас нет завершенных заказов</p>
                @endif
            </div>
        @else
            <div class="my-items-empty">
                <img src="{{ asset('img/box.jpg') }}" alt="" class="my-items-empty__img">
                <h3 class="my-items-empty__title">Мои заказы</h3>
                <span class="my-items-empty__subtitle">Пока нет ни одного заказа</span>
            </div>
        @endif
    </div>
</div>
