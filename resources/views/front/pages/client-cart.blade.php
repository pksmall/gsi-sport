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
                        <div class="product-item" id="product-item-{{$item['item']->id}}">
                            <a class="product-image" href="/products/{{ $item['item']->locales[0]->slug }}" style="background-image: url({{ $item['item']->preview->path }})"></a>
                            <div class="text-block-wrap">
                                <div class="text-block">
                                    <div class="product-title" style="padding: 40px 0;">{{ $item['item']->locales[0]->name }}</div>
                                    <div class="product-info">
                                        <div class="label">количество:</div>
                                        <div class="product-qty-block">
                                            <button type="button" class="card-btn-plus" data-content-id="{{ $item['item']->id }}"
                                                    data-content-url="{{ url('/cart_qty_up') }}" data-content-token="{{ csrf_token() }}">
                                                <!-- <span>+</span> -->
                                                <i class="fa fa-angle-up" aria-hidden="true"></i>
                                            </button>

                                            <input class="card-input-quantity" id="item_qty{{$item['item']->id}}" name="item_qty" step="1", min="1"  max="99" value="{{ $item['qty'] }}">

                                            <button type="button" class="card-btn-minus" data-content-id="{{ $item['item']->id }}"
                                                    data-content-url="{{ url('/cart_qty_down') }}" data-content-token="{{ csrf_token() }}">
                                                <!-- <span>-</span> -->
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="price">{{ $item['price'] }} грн</div>
                                        <div class="product-list-remove">
                                            <span class="c-remove-item" aria-label="Remove this item" data-content-id="{{ $item['item']->id }}"
                                                  data-content-url="{{ url('/item_delete') }}" data-content-token="{{ csrf_token() }}">
                                                <img src="/images/delete-product.svg" alt="delete"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="cart-actions">
                        <a class="btn blue opacity" href="/products">Назад</a>
                        <h3>ВСЕГО: <span id="total_price">{{ $cart['cart']->total_price }}</span> грн</h3>
                        <a class="btn tblue blue continue" href="/checkout">Продолжить</a>
                        <a class="btn red clear" href="{{ url('/empty_cart') }}">Очистить корзину</a>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('page-js-script')
    <script type="text/javascript">
        $(function() {
            $('.c-remove-item').on('click',function() {
                var itemId = $(this).data('content-id');
                var dataurl = $(this).data('content-url');
                var token = $(this).data('content-token');
                console.log("item id: " + itemId + " dataurl:" + dataurl + " token:" + token);

                $.ajax({
                    type: 'POST',
                    url: dataurl,
                    data: {
                        item_id: itemId,
                        _token:  token,
                        qty: 1,
                        size: 0
                    }
                }).always(function(data, textStatus, jqXHR) {
                    if (data.response == 'success') {
                        console.log("resp data: " + data.data);
                        var retobj = jQuery.parseJSON(data.data);
                        $('#product-item-'+itemId).fadeOut(300, function(){ $(this).remove();});
                        if (retobj.total == 0) {
                            document.location.href = "/empty_cart";
                        }
                        $('#cartqty').html(retobj.itemtotal);
                        $('#total_price').html(retobj.total);
                        $('.icon-cart').toggleClass('expand');
                        setTimeout(function(){
                            $('.icon-cart').toggleClass('expand');
                        },2000);
                        return;
                    } else {
                        console.log("resp error");
                        return;
                    }
                });
            });

            $('.card-btn-plus').on('click',function(){
                var itemId = $(this).data('content-id');
                var dataurl = $(this).data('content-url');
                var token = $(this).data('content-token');
                console.log("item id: " + itemId + " dataurl:" + dataurl + " token:" + token);

                $.ajax({
                    type: 'POST',
                    url: dataurl,
                    data: {
                        item_id: itemId,
                        _token:  token,
                        qty: 1,
                        size: 0
                    }
                }).always(function(data, textStatus, jqXHR) {
                    if (data.response == 'success') {
                        console.log("resp data: " + data.data);
                        var retobj = jQuery.parseJSON(data.data);
                        $('#cartqty').html(retobj.itemtotal);
                        $('#item_qty'+itemId).attr('value', retobj.qty);
                        $('#total_price').html(retobj.total);
                        $('.icon-cart').toggleClass('expand');
                        setTimeout(function(){
                            $('.icon-cart').toggleClass('expand');
                        },2000);
                        return;
                    } else {
                        console.log("resp error");
                        return;
                    }
                });

            });

            $('.card-btn-minus').on('click',function(){
                var itemId = $(this).data('content-id');
                var dataurl = $(this).data('content-url');
                var token = $(this).data('content-token');
                console.log("item id: " + itemId + " dataurl:" + dataurl + " token:" + token);

                $.ajax({
                    type: 'POST',
                    url: dataurl,
                    data: {
                        item_id: itemId,
                        _token:  token,
                        qty: 1,
                        size: 0
                    }
                }).always(function(data, textStatus, jqXHR) {
                    if (data.response == 'success') {
                        console.log("resp data: " + data.data);
                        var retobj = jQuery.parseJSON(data.data);
                        $('#cartqty').html(retobj.itemtotal);
                        $('#item_qty'+itemId).attr('value', retobj.qty);
                        $('#total_price').html(retobj.total);
                        $('.icon-cart').toggleClass('expand');
                        setTimeout(function(){
                            $('.icon-cart').toggleClass('expand');
                        },2000);
                        return;
                    } else {
                        console.log("resp error");
                        return;
                    }
                });

            });

        });
    </script>
@endsection
