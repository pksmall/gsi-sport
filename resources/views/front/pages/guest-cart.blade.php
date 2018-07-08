@extends('front/layout/front')
@section('content')


    <div class="cart-content">
        <div class="cart-header">
            <h2>{{ $title }}</h2>
        </div>
        <div class="cart-body">

            @if(isset($cart['cart']->items) && count($cart['cart']->items) > 0)
                <?php $total = 0; ?>

                    @if (Session::has('cart-update'))
                        <div class="cart-content">
                            <div class="cart-body">
                                <p class="msg-empty-cart">{{ trans('item.cart_update') }}</p>
                            </div>
                        </div>
                    @endif

                    <form action="@if(App::getLocale() == 'ru'){{ route('update_cart_ru') }}@elseif(App::getLocale() == 'ua'){{ route('update_cart') }}@elseif(App::getLocale() == 'en'){{ route('update_cart_en') }}@endif" method="post">
                        @csrf

                @foreach($cart['cart']->items as $cart_item)
                            <div class="cart-product-line">
                                <img src="{{ asset( isset($cart_item['item']->preview) ? $cart_item['item']->preview->path : 'images/no-image.svg') }}" alt="{{ $cart_item['item']->locales[0]->name }}" style="width: 50px;">
                                <p>{{ $cart_item['item']->locales[0]->name }}</p>
                                <p>@if(isset($cart_item['size'])) {{ trans('item.size_cart') }}: {{ $cart_item['size'] }} @endif</p>
                                <label>{{ trans('item.qty') }} : </label>
                                <input type="hidden" name="items[{{$cart_item['item']->id}}][size]" value="{{ $cart_item['size'] }}">
                                <input type="number" min="1" class="form-qty-input" name="items[{{$cart_item['item']->id}}][qty]" value="{{ $cart_item['qty'] }}">
                                <span class="price-smol" data-all-price="@if(isset($config->exchange_rate)){{ intval(($cart_item['item']->price * $cart_item['qty']) * $config->exchange_rate) }}@else{{ $cart_item['item']->price * $cart_item['qty'] }}@endif" data-price="@if(isset($config->exchange_rate)){{ intval(($cart_item['item']->price) * $config->exchange_rate) }}@else{{ $cart_item['item']->price }}@endif">@if(isset($config->exchange_rate)){{ intval(($cart_item['item']->price * $cart_item['qty']) * $config->exchange_rate) }}@else{{ $cart_item['item']->price * $cart_item['qty'] }}@endif грн.</span>
                                <a href="{{ route('delete_cart_item', $cart_item['item']->id) }}" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <?php

                            if (isset($config->exchange_rate)) {
                                $total += intval(($cart_item['item']->price * $cart_item['qty']) * $config->exchange_rate);
                            } else {
                                $total += $cart_item['item']->price * $cart_item['qty'];
                            }

                            ?>
                    @endforeach

                    <div class="all-price-line">
                        <span class="price-big">{{ $total }} грн.</span>
                    </div>

                    <div class="order-line">
                        @if(App::getLocale() == 'ru')<a href="{{ route('shop_ru') }}">{{ trans('item.go_shop') }}</a>@endif
                        @if(App::getLocale() == 'ua')<a href="{{ route('shop') }}">{{ trans('item.go_shop') }}</a>@endif
                        @if(App::getLocale() == 'en')<a href="{{ route('shop_en') }}">{{ trans('item.go_shop') }}</a>@endif

                        <button class="dashed-orange-btn">{{ trans('item.go_order') }}</button>
                    </div>
                </form>
            @else
                <p class="msg-empty-cart" role="alert">
                    {{ trans('item.cart_empty') }}
                </p>
                <div class="order-line">
                    @if(App::getLocale() == 'ru')<a href="{{ route('shop_ru') }}">{{ trans('base.shop_back') }}</a>@endif
                    @if(App::getLocale() == 'ua')<a href="{{ route('shop') }}">{{ trans('base.shop_back') }}</a>@endif
                    @if(App::getLocale() == 'en')<a href="{{ route('shop_en') }}">{{ trans('base.shop_back') }}</a>@endif
                </div>
            @endif

        </div>
    </div>

@endsection

@section('after-script')
    <script>
      $(document).ready(function () {
        $('.form-qty-input').bind('keyup mouseup', function () {
          $(this).parent().find('.price-smol').text($(this).parent().find('.price-smol').attr('data-price') * $(this).val() + ' грн.');
          $(this).parent().find('.price-smol').attr('data-all-price', $(this).parent().find('.price-smol').attr('data-price') * $(this).val());

          var all_price = 0;
          $('.cart-body .cart-product-line').each(function (index, element) {
            all_price += parseInt($('.cart-body .cart-product-line').eq(index).find('.price-smol').attr('data-all-price'));
          });

          $('.price-big').text(all_price + ' грн.');
          
        });
      });
    </script>
@endsection