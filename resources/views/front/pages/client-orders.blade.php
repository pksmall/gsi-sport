@extends('front/layout/front')

@section('content')

    <section class="account">
        <div class="container-pages">
            <div class="content-wrapper">
                <div class="accoutn-header">
                    <h2>{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Профиль</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Мои заказы</li>
                        </ol>
                    </nav>
                </div>

                @include('front/partials/profile-aside')

                <div class="account-body account-user-orders flex-column">
                @if(isset($orders) && $orders->count() > 0)
                        @foreach($orders as $order)
                            <div class="account-product-line">
                                <p>{{ trans('item.history_id') }}: {{ $order->id }}</p>
                                <p class="account-product-line-description">Дата: {{ $order->created_at->format('d-m-Y') }}</p>
                                <p class="account-product-line-ammount"><span class="ammount-value">{{ $order->getOrderStatus($order->status_id) }}</span></p>
                                <span class="price-smol">{{ $order->total }} грн.</span>
                                @if(isset($order->order_items) && $order->order_items->count() > 0)
                                @foreach($order->order_items as $o_item)
                                    <div class="account-product-line" style="margin-bottom: 0;">
                                        <img src="{{ asset( isset($o_item->item->preview) ? $o_item->item->preview->path : 'images/no-image.svg') }}" alt="{{ $o_item->item->locales[0]->name }}">
                                        <p class="account-product-line-description">{{ $o_item->item->locales[0]->name }}</p>
                                        <span class="price-smol">
                                    @if(isset($config->exchange_rate)) {{ intval($o_item->item->price * $config->exchange_rate) }} @else {{ $o_item->item->price }} @endif
                                            грн.</span>

                                        @if(App::getLocale() == 'ru')<a href="{{ route('item_ru', $o_item->item->locales[0]->slug) }}" class="send-white">{{ trans('item.view') }}</a>@endif
                                        @if(App::getLocale() == 'ua')<a href="{{ route('item', $o_item->item->locales[0]->slug) }}" class="send-white">{{ trans('item.view') }}</a>@endif
                                        @if(App::getLocale() == 'en')<a href="{{ route('item_en', $o_item->item->locales[0]->slug) }}" class="send-white">{{ trans('item.view') }}</a>@endif
                                    </div>
                                @endforeach
                                    @endif
                            </div>
                        @endforeach
                    {{ $orders->links() }}
                @else
                    <h3 class="hello-user">{{ trans('item.history_orders_empty') }}</h3>
                @endif
                </div>

            </div>
            </div>
    </section>

@endsection
