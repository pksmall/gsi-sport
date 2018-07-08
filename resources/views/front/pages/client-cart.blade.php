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
                        <h2>корзина</h2><a href="#">очистить корзину</a>
                    </div>
                    <div class="product-block custom-scroll">
                        <div class="product-item"><a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="text-block-wrap">
                                <div class="text-block">
                                    <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic Alltec</strong></div>
                                    <div class="product-info">
                                        <div class="label">количество:</div>
                                        <input type="text" value="1">
                                        <div class="price">665 грн</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item"><a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="text-block-wrap">
                                <div class="text-block">
                                    <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic Alltec</strong></div>
                                    <div class="product-info">
                                        <div class="label">количество:</div>
                                        <input type="text" value="1">
                                        <div class="price">665 грн</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item"><a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="text-block-wrap">
                                <div class="text-block">
                                    <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic Alltec</strong></div>
                                    <div class="product-info">
                                        <div class="label">количество:</div>
                                        <input type="text" value="1">
                                        <div class="price">665 грн</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item"><a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="text-block-wrap">
                                <div class="text-block">
                                    <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic Alltec</strong></div>
                                    <div class="product-info">
                                        <div class="label">количество:</div>
                                        <input type="text" value="1">
                                        <div class="price">665 грн</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item"><a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="text-block-wrap">
                                <div class="text-block">
                                    <div class="product-title">Ракетка всепогодная <strong class="blue-text">Donic Alltec</strong></div>
                                    <div class="product-info">
                                        <div class="label">количество:</div>
                                        <input type="text" value="1">
                                        <div class="price">665 грн</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-actions">           <a class="btn blue opacity" href="/products/1">Назад</a>
                        <h3>ВСЕГО: 1567 грн</h3><a class="btn tblue blue continue" href="/products/1">Продолжить</a>
                        <a class="btn red clear" href="#">Очистить корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection