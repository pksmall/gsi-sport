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
                    <div class="title">
                    @if (empty($orders))
                        <h2>история пустая</h2>
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
                            @foreach($orders as $order)
                               <div class="product-item">
                                    <div class="text-block-wrap">
                                        <div class="text-block">
                                            <div class="product-title">{{ $order->getOrderStatus($order->status_id) }}</div>
                                            <div class="product-info">
                                                <div class="date">{{ $order->created_at->format('d-m-Y') }}</div>
                                                <div class="price">{{ $order->total }} грн.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection