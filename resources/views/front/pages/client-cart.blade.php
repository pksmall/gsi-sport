@extends('front/layout/front')
@section('content')
<div class="page-wrap history-page cart">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav')

    <!-- cart -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        @if (empty($cart['cart']))
                            <h2>корзина пустая</h2>
                    </div>
                        @else
                            <h2>корзина</h2><a href="{{ url('/empty_cart') }}">очистить корзину</a>
                    </div>
                    <div class="product-block custom-scroll">
                    <?php $total_price = 0; ?>
                    @foreach($cart['cart']->items as $item)
                        <div class="product-item"><a class="product-image" href="/products/1" style="background-image: url({{ $item['item']->preview->path }})"></a>
                            <div class="text-block-wrap">
                                <div class="text-block">
                                    <div class="product-title">{{ $item['item']->locales[0]->name }}</div>
                                    <div class="product-info">
                                        <!-- <div class="label">количество:</div>
                                        <input type="text" value="{{ $item['qty'] }}"> -->
                                        <div class="price">{{ $item['price'] }} грн</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $total_price = $item['price'] + $total_price; ?>
                    @endforeach
                    </div>
                    <div class="cart-actions">
                        <a class="btn blue opacity" href="/products">Назад</a>
                        <h3>ВСЕГО: {{ $total_price }} грн</h3>
                        <a class="btn tblue blue continue" href="/products">Продолжить</a>
                        <a class="btn red clear" href="{{ url('/empty_cart') }}">Очистить корзину</a>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection