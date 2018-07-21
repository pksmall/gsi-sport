@extends('front/layout/front')
@section('content')
<div class="page-wrap login-page login">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav')

    <!-- profile history -->
    <div class="content login-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h1>История  заказов</h1><a class="blue-a" href="/profile">Личный кабинет</a>
                    </div>
                    <div class="title">
                    @if (empty($cart['cart']))
                        <h2>история пустая</h2>
                    @else
                            <div class="product-block custom-scroll">
                                <div class="product-item">
                                    <a class="product-image" href="product-card.html" style="background-image: url(assets/img/product-img@2x.png)"></a>
                                    <div class="text-block-wrap">
                                        <div class="text-block">
                                            <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic
                                                    Alltec</strong></div>
                                            <div class="product-info">
                                                <div class="label">количество:</div>
                                                <input type="text" value="1">
                                                <div class="date">16.02.16</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item"><a class="product-image" href="product-card.html"
                                                             style="background-image: url(assets/img/product-img@2x.png)"></a>
                                    <div class="text-block-wrap">
                                        <div class="text-block">
                                            <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic
                                                    Alltec</strong></div>
                                            <div class="product-info">
                                                <div class="label">количество:</div>
                                                <input type="text" value="1">
                                                <div class="date">16.02.16</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item"><a class="product-image" href="product-card.html"
                                                             style="background-image: url(assets/img/product-img@2x.png)"></a>
                                    <div class="text-block-wrap">
                                        <div class="text-block">
                                            <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic
                                                    Alltec</strong></div>
                                            <div class="product-info">
                                                <div class="label">количество:</div>
                                                <input type="text" value="1">
                                                <div class="date">16.02.16</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item"><a class="product-image" href="product-card.html"
                                                             style="background-image: url(assets/img/product-img@2x.png)"></a>
                                    <div class="text-block-wrap">
                                        <div class="text-block">
                                            <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic
                                                    Alltec</strong></div>
                                            <div class="product-info">
                                                <div class="label">количество:</div>
                                                <input type="text" value="1">
                                                <div class="date">16.02.16</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item"><a class="product-image" href="product-card.html"
                                                             style="background-image: url(assets/img/product-img@2x.png)"></a>
                                    <div class="text-block-wrap">
                                        <div class="text-block">
                                            <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic
                                                    Alltec</strong></div>
                                            <div class="product-info">
                                                <div class="label">количество:</div>
                                                <input type="text" value="1">
                                                <div class="date">16.02.16</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn blue tblue opacity" href="cart.html">Назад</a></div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection