@extends('front/layout/front')
@section('content')
<div class="page-wrap login-page login" xmlns="http://www.w3.org/1999/html">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav')

    <!-- products -->
    <div id="dataurl" action="{{ url('/add_to_cart') }}" token="{{ csrf_token() }}"></div>
    <div class="content login-content">
        <div class="container">
            <div class="row">
                <div class="col-12  ">
                    <div class="title">
                        <h1>Поиск по магазину</h1>
                    </div>
                    <div class="title">
                        <h2 style="margin-bottom: 0px; margin: 0;"><span class="blue-text">{{ $search_param }}</span></h2>
                    </div>
                    <div class="title-last">
                        <h2 style="margin-bottom: 0px; margin: 0;">Результат поиска</h2>
                    </div>
                        @if ($items->count() == 0)
                         <h2><span class="red-text">результатов не найдено</span></div></h2>
                        @else
                         <div class="product-block custom-scroll">
                            @foreach ($items as $item)
                            <div class="product-item" style="    margin-bottom: 30px;">
                                <a class="product-image" href="/products/{{ $item->locales[0]->slug }}" style="background-image: url({{ url($item->preview->path) }})"></a>
                                <div class="product-info text-block-wrap">
                                    <div class="text-block">
                                        <a class="product-title" href="/products/{{ $item->locales[0]->slug }}">
                                            {{ $item->locales[0]->name }}
                                        </a>
                                        <div class="product-code">Код товара: {{ $item->code }}</div>
                                        <div class="product-more">
                                            <div class="product-price">{{ $item->price }} грн</div>
                                            <button class="btn blue" data-content-id="{{ $item->id }}">в корзину</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="row">
                                <div class="col-12">
                                    <div class="pagination">
                                        <a href="#" class="page">1</a>
                                        <a href="#" class="page active">2</a>
                                        <a href="#" class="page">3</a>
                                        <a href="#" class="page">4</a>
                                        <a href="#" class="page">5</a>
                                    </div>
                                </div>
                            </div> -->
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
            $('button').on('click',function(){
                var itemId = $(this).data('content-id');
                var dataurl = $('#dataurl');
                console.log("item id: " + itemId + " dataurl:" + dataurl.attr('action'));

                $.ajax({
                    type: 'POST',
                    url: dataurl.attr('action'),
                    data: {
                        item_id: itemId,
                        _token:  dataurl.attr('token'),
                        qty: 1,
                        size: 0
                    }
                }).always(function(data, textStatus, jqXHR) {
                    if (data.response == 'success') {
                        console.log("resp data: " + data.data);
                        $('#cartqty').html(data.data);
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
