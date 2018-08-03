@extends('front/layout/front')
@section('content')
<div class="page-wrap product-card-page">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav')

    <!-- item -->
    <div id="dataurl" action="{{ url('/add_to_cart') }}" token="{{ csrf_token() }}"></div>
    <div class="content product-card-content">
        <div class="container">
            <div class="row">
                <div class="product-item col-12">
                    <div class="product-info-wrap">
                        <div class="product-title">
                            {{ $item->name }}
                        </div>
                        <div class="product-info text-block-wrap">
                            <div class="text-block custom-scroll">
                                {!! $item->description !!}
                                <div class="product-code">Код товара: {{ $item->item->code }}</div>
                                <div class="product-more">
                                    <div class="product-price"> {{ $item->item->price }}грн</div>
                                </div>
                            </div>
                        </div>
                        <button class="btn blue" data-content-id="{{ $item->item_id }}">в корзину</button>
                    </div>
                    <div class="product-card-carousel" id="product-card-carousel">
                        <div class="product-image">
                            <img src="{{$item->item->preview->path}}" width="378" height="652">
                        </div>
                        @foreach($item->item->gallery as $img)
                            <div class="product-image"><img src="{{$img->path}}" width="378" height="652"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js-script')
    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
    
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
