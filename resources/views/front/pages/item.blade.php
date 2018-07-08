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
    <div class="content product-card-content">
        <div class="container">
            <div class="row">

                <div class="product-item col-12">

                    <div class="product-info-wrap">
                        <div class="product-title">
                            Ракетка всепогодная
                            <br>
                            <span class="blue-text">Donic Alltec</span>
                        </div>
                        <div class="product-info text-block-wrap">
                            <div class="text-block custom-scroll">
                                <p>
                                    Всепогодная ракетка для настольного тенниса
                                    <span class="blue-text">DONIC ALLTEC</span>.
                                </p>
                                <div class="product-characteristic">
                                    <div class="title mb-0">Заявленные характеристики:</div>
                                    <ul>
                                        <li>Скорость: 90
                                            <div class="bar">
                                                <div class="blue" style="width: 90%"></div>
                                                <div class="red" style="width: 10%"></div>
                                            </div>
                                        </li>
                                        <li>Вращение: 40
                                            <div class="bar">
                                                <div class="blue" style="width: 30%"></div>
                                                <div class="red" style="width: 70%">  </div>
                                            </div>
                                        </li>
                                        <li>Контроль: 70
                                            <div class="bar">
                                                <div class="blue" style="width: 70%"></div>
                                                <div class="red" style="width: 30%">     </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <p>Материалы, из которых выполнена ракетка, устойчивы к воздействию дождя и солнца, а потому данная ракетка может быть рекомендована в комплектации со всепогодными теннисными столами. </p>
                                <div class="product-code">Код товара: МТ-733012</div>
                                <div class="product-more">
                                    <div class="product-price">665 грн</div>
                                </div>
                            </div>
                        </div>
                        <button class="btn blue">в корзину</button>
                    </div>
                    <div class="product-card-carousel" id="product-card-carousel">
                        <div class="product-image">
                            <img src="/assets/img/product-img.svg">
                            <span class="option option-1">Tiam nec lacus ut velit lacinia </span>
                            <span class="option option-2"> Praesent laoreet sodales lorem</span>
                            <span class="option option-3">Suspendisse arcu arcu</span>
                        </div>
                        <div class="product-image"><img src="/assets/img/product-img.svg"></div>
                        <div class="product-image"><img src="/assets/img/product-img.svg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
