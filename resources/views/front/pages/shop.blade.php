@extends('front/layout/front')
@section('content')
<div class="page-wrap products-page">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav-products')

    <!-- products -->
    <div class="carousel">
        <div class="container">
            <?php $index = 0; ?>
            @foreach ($parent_categories as $p_category)
                <div class="row item-wrap tab-content">
                    <div class="col-8 {{ $index == 0 ? '' : 'custom-scroll' }}">
                        <?php $index++; ?>
                        <div class="row">
                        @foreach ($items as $item)
                            <div class="product-item col-12">
                                <a class="product-image" href="/products/1" style="background-image: url({{ url($item->preview->path) }})"></a>
                                <div class="product-info text-block-wrap">
                                    <div class="text-block"><a class="product-title" href="/products/1">
                                            {{ $item->locales[0]->name }}
                                        </a>
                                        <div class="product-code">Код товара: {{ $item->locales[0]->code }}</div>
                                        <div class="product-more">
                                            <div class="product-price">{{ $item->locales[0]->price }} грн</div>
                                            <button class="btn blue">в корзину</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn blue mobile-button">в корзину</button>
                        @endforeach
                            <div class="row">
                                <div class="col-12">
                                    <div class="pagination">
                                        <a href="#" class="page">1</a>
                                        <a href="#" class="page active">2</a>
                                        <a href="#" class="page">3</a>
                                        <a href="#" class="page">4</a>
                                        <a href="#" class="page">5</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($additional_menu as $a_menu)
                    @if($a_menu->parent_id == $p_category->id && isset($sumitems[$a_menu->id]))
                    <div class="row item-wrap sub-tab-content">
                        <div class="col-8 custom-scroll">
                            <div class="row">
                                @foreach ($items as $item)
                                    <div class="product-item col-12"><a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                                        <div class="product-info text-block-wrap">
                                            <div class="text-block"><a class="product-title" href="/products/1">
                                                    Ракетка всепогодная Ракетка всепогодная
                                                    <br>
                                                    <span class="blue-text">Donic Alltec Donic Alltec</span></a>
                                                <div class="product-code">Код товара: МТ-733012</div>
                                                <div class="product-more">
                                                    <div class="product-price">11665 грн</div>
                                                    <button class="btn blue">в корзину</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endforeach
            </div>
        </div>
    </div>
@endsection
