@extends('front/layout/front')
@section('content')
<div class="page-wrap history-page history">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav')

    <!-- profile history -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h1>История  заказов</h1><a class="blue-a" href="/profile">Личный кабинет</a>
                    </div>
                    @if($orders->count() == 0)
                        <h2>История пустая</h2>
                    @else
                    <div class="product-block custom-scroll">
                        <div class="product-item">
                            <div class="text-block-wrap">
                                <div class="text-block">
                                    <div class="product-title">Статус</div>
                                    <div class="product-info">
                                        <div class="date">Дата</div>
                                        <div class="price">Цена</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- orders -->
                        @foreach($orders as $order)
                        <div class="product-item prod-block">
                            <div class="text-block-wrap">
                                <div class="text-block open-block" data-id="{{ $order->id }}">
                                    <div class="product-title">{{ $arrItems[$order->id]->count() }} товара</div>
                                    <div class="product-info">
                                        <div class="status">Статус: <span>{{ $order->getOrderStatus($order->status_id) }}</span></div>
                                        <div class="date">{{ $order->created_at->format('d-m-Y') }}</div>
                                        <div class="price">{{ $order->total }} грн.</div>
                                    </div>
                                </div>
                                <!-- items -->
                                <pre>
                                <div class="product-item-wrap" id="product-item-{{ $order->id }}">
                                @foreach($arrItems[$order->id] as $item)
                                    <!-- item -->
                                    <div class="product-item prod">
                                        <a class="product-image" href="{{ route('item', $item->locales[0]->slug) }}" style="background-image: url({{ $item->preview->path }})"></a>
                                        <div class="text-block-wrap">
                                            <div class="text-block">
                                                <div class="product-title"><a style="color: #fff;" href="{{ route('item', $item->locales[0]->slug) }}">{{$item->locales[0]->name}}</a></div>
                                                <div class="product-info">
                                                    <div class="label">количество:</div>
                                                    <input type="text" value="{{ $arrQty[$order->id][$item->id] }}" disabled>
                                                    <div class="date">{{ $item->created_at->format('d-m-Y') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end item -->
                                @endforeach
                                </div>
                                <!-- end items -->
                            </div>
                        </div>
                        @endforeach
                        <!-- end orders -->
                    </div>
                    @endif
                    <a class="btn blue tblue opacity" href="cart.html">Назад</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js-script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script type="text/javascript">
    $(function() {
        $(".open-block").click(function () {
            var itemID = $(this).data('id');

            $("#product-item-"+itemID).slideToggle("slow");
            $(this).toggleClass("active");


        });
    });
</script>
@endsection
