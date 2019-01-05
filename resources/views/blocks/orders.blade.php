@php $seller = $shop ?? false; @endphp

@foreach($orders as $order)
    @php $product = unserialize($order->product); @endphp
    <div class="order" style="margin-bottom: 20px;padding: 25px 30px; border-radius: 5px; border: 1px solid #e9e9e9;">
        <div class="order__row" style="width: 100%; display: flex;justify-content: space-between; @if($order->status_id != 5 or ($order->status_id == 5 and ($order->comment or $order->cancel))) border-bottom: 1px solid #e9e9e9; padding-bottom: 25px; margin-bottom: 25px; @endif">
            <div>
                <p style="margin-bottom: 1px;margin-top: 0;">Номер заказа</p>
                <p style="margin-top: 0;font-weight: 500;margin-bottom: 0;">№ {{ $order->id }}</p>
                <p style="margin-top: 0; color: #9a9a9a">{{ $order->created_at->format('d.m.Y, H:i') }}</p>
                @if($seller)
                    <p style="margin-bottom: 1px;margin-top: 0;">Пользователь</p>
                    <span>{{ $order->user->full_name }}</span>
                    @if($order->user->phone)
                        <p style="margin-bottom: 1px;">Телефон</p>
                        <span>{{ $order->user->phone }}</span>
                    @endif
                    @if($order->user->email)
                        <p style="margin-bottom: 1px;">Email</p>
                        <span>{{ $order->user->email }}</span>
                    @endif
                @else
                    <p style="margin-bottom: 1px;margin-top: 0;">Магазин</p>
                    @php $shop = $product->model->shop; @endphp
                    <a style="color: #c36;" href="{{ route('shop.show', $shop->slug) }}">{{ $shop->name }}</a>
                @endif
            </div>
            <div>
                @if($product->options->has('delivery') and $product->options['delivery'])
                    <p style="margin-bottom: 0;margin-top: 0; text-align: center;">Способ доставки</p>
                    <p style="margin-top: 1px;font-weight: 500;margin-bottom: 0; text-align: center;">{{ $product->options['delivery']->name }}</p>
                    <p style="margin-bottom: 0;text-align: center;">Стоимость доставки</p>
                    <p style="margin-top: 1px;font-weight: 500;margin-bottom: 0; text-align: center;font-size: 20px;">{{ $order->delivery_price }} ₽</p>
                    @if($order->address)
                        <p style="margin-bottom: 0;text-align: center;">Адресс доставки</p>
                        <p style="margin-top: 1px;font-weight: 500;margin-bottom: 0; text-align: center;font-size: 20px;">{{ $order->address }}</p>
                    @endif
                @endif
            </div>
            <div>
                <p style="margin-top: 0;text-align: center;">Статус</p>
                <span style="font-weight: 500;margin-bottom: 0; background-color: #fced00; padding: 5px 10px">{{ $order->status->text }}</span>
                <p style="margin-bottom: 1px;text-align: center;">Кол-во</p>
                <p style="margin-top: 0;font-weight: 500;margin-bottom: 0; text-align: center; font-size: 20px;">{{ $product->qty }}</p>
            </div>
            <div>
                <p style="margin-top: 0;text-align: center;">Товар</p>
                <a href="{{ route('product.show', $product->model) }}">
                    <div style="background-image: url({{ asset($product->model->photos[0]) }}); background-size: cover; background-position: center; width: 100px; height: 100px; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;"></div>
                </a>
            </div>
            <div>
                @if($product->options->has('payment') and $product->options['payment'])
                    <p style="margin-bottom: 1px;margin-top: 0;">Метод оплаты</p>
                    <p style="margin-top: 0;font-weight: 500; text-align: center;">{{ $product->options['payment']->name }}</p>
                @endif
                <p style="margin-bottom: 1px;text-align: center;margin-top: 0;">Стоимость</p>
                <p style="margin-top: 0;text-align: center;font-weight: 500;font-size: 20px;">{{ $order->price }} ₽</p>
                @if($order->status_id != 5) <a href="" class="js-order-message" data-seller="{{ $seller ? $order->user_id : $shop->user_id }}" style="cursor: pointer; font-weight: 500; border-bottom: 1px solid #9a9a9a;">{{ $seller ? 'Написать пользователю' : 'Написать продавцу' }}</a> @endif
            </div>
        </div>
        @if($order->status_id != 5 or ($order->status_id == 5 and ($order->comment or $order->cancel)))
            <div style="display: flex; justify-content: space-between; width: 100%; align-items: center">
                <div>
                    @if($order->comment)<p><b>Комментарий:</b> {{ $order->comment }}</p>@endif
                    @if($order->cancel)<p><b>Причина отмены:</b> {{ $order->cancel }}</p>@endif
                </div>
                @if($order->status_id != 5)
                    <div style="display: flex">
                        <form action="{{ route('order.cancel') }}" method="post">
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <button class="mesenger__button order-cancel-message" style="cursor: pointer;background: #333;color: #fff; border: none">Отменить</button>
                        </form>
                        @if($seller and $order->status_id == 1)
                            <form action="{{ route('order.accept') }}" method="post" style="margin-left: 10px;">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button class="mesenger__button" style="cursor: pointer;background: #333;color: #fff; border: none">Начать обработку</button>
                            </form>
                        @endif
                        @if($seller and $order->status_id == 2)
                            @if($product->options->has('delivery') and $product->options['delivery']->id != 3)
                                <form action="{{ route('order.send') }}" method="post" style="margin-left: 10px;">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button class="mesenger__button" style="cursor: pointer;background: #333;color: #fff; border: none">Отправить</button>
                                </form>
                            @else
                                <form action="{{ route('order.completed') }}" method="post" style="margin-left: 10px;">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button class="mesenger__button" style="cursor: pointer;background: #333;color: #fff; border: none">Выполнен</button>
                                </form>
                            @endif
                        @endif
                        @if(!$seller and $order->status_id == 4)
                            <form action="{{ route('order.end') }}" method="post" style="margin-left: 10px;">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button class="mesenger__button" style="cursor: pointer;background: #333;color: #fff; border: none">Завершить</button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
        @endif
    </div>
@endforeach