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
    <div class="header-produts">
        <h1 class="products-h1">Товары</h1>
        <div class="mob-menu">
            <button class="btn tblue bmob-menu" type="button">Теннисные ракетки(12)<span><img src="assets/img/arrow-down.png"></span></button>
            <ul class="tab-mob">
                <li class="tab-li-mob active"><a href="#" class="blue">Теннисные столы (12)</a></li>
                <ul class="sub-tab-mob">
                    <li><a href="#">Профессиональные (1)</a></li>
                    <li><a href="#">Столы для помещений (7)</a></li>
                    <li><a href="#">Всепогодные столы (4)</a></li>
                </ul>
                <li class="tab-li-mob"><a href="#" class="blue ">Аксессуары (6)</a></li>
                <ul class="sub-tab-mob">
                    <li><a href="#">Профессиональные (1)</a></li>
                    <li><a href="#">Всепогодные (4) </a></li>
                </ul>
                <li class="tab-li-mob"><a href="#" class="blue">Оборудование для залов (3)</a></li>
                <ul class="sub-tab-mob">
                    <li><a href="#">Профессиональные (1)</a></li>
                    <li><a href="#">Всепогодные (4)</a></li>
                </ul>
                <li class="tab-li-mob blue "><a href="#" class="blue">Сток (2)</a></li>
                <ul class="sub-tab-mob">
                    <li><a href="#">Профессиональные (1)</a></li>
                    <li><a href="#">Всепогодные (4)</a></li>
                </ul>
            </ul>
        </div>
    </div>




    <div class="carousel">
        <div class="container">
            <div class="row item-wrap tab-content">
                <div class="col-8">
                    <div class="row">
                        <div class="product-item col-12">
                            <a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="product-info text-block-wrap">
                                <div class="text-block"><a class="product-title" href="/products/1">
                                        Ракетка всепогодная
                                        <br>
                                        <span class="blue-text">Donic Alltec</span></a>
                                    <div class="product-code">Код товара: МТ-733012</div>
                                    <div class="product-more">
                                        <div class="product-price">665 грн</div>
                                        <button class="btn blue">в корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn blue mobile-button">в корзину</button>


                        <div class="product-item col-12">
                            <a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="product-info text-block-wrap">
                                <div class="text-block"><a class="product-title" href="/products/1">
                                        Ракетка всепогодная
                                        <br>
                                        <span class="blue-text">Donic Alltec</span></a>
                                    <div class="product-code">Код товара: МТ-733012</div>
                                    <div class="product-more">
                                        <div class="product-price">665 грн</div>
                                        <button class="btn blue">в корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn blue mobile-button">в корзину</button>


                        <div class="product-item col-12">
                            <a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="product-info text-block-wrap">
                                <div class="text-block"><a class="product-title" href="/products/1">
                                        Ракетка всепогодная
                                        <br>
                                        <span class="blue-text">Donic Alltec</span></a>
                                    <div class="product-code">Код товара: МТ-733012</div>
                                    <div class="product-more">
                                        <div class="product-price">665 грн</div>
                                        <button class="btn blue">в корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn blue mobile-button">в корзину</button>


                        <div class="product-item col-12">
                            <a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="product-info text-block-wrap">
                                <div class="text-block"><a class="product-title" href="/products/1">
                                        Ракетка всепогодная
                                        <br>
                                        <span class="blue-text">Donic Alltec</span></a>
                                    <div class="product-code">Код товара: МТ-733012</div>
                                    <div class="product-more">
                                        <div class="product-price">665 грн</div>
                                        <button class="btn blue">в корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn blue mobile-button">в корзину</button>


                        <div class="product-item col-12">
                            <a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="product-info text-block-wrap">
                                <div class="text-block"><a class="product-title" href="/products/1">
                                        Ракетка всепогодная
                                        <br>
                                        <span class="blue-text">Donic Alltec</span></a>
                                    <div class="product-code">Код товара: МТ-733012</div>
                                    <div class="product-more">
                                        <div class="product-price">665 грн</div>
                                        <button class="btn blue">в корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn blue mobile-button">в корзину</button>


                        <div class="product-item col-12">
                            <a class="product-image" href="/products/1" style="background-image: url(assets/img/product-img@2x.png)"></a>
                            <div class="product-info text-block-wrap">
                                <div class="text-block"><a class="product-title" href="/products/1">
                                        Ракетка всепогодная
                                        <br>
                                        <span class="blue-text">Donic Alltec</span></a>
                                    <div class="product-code">Код товара: МТ-733012</div>
                                    <div class="product-more">
                                        <div class="product-price">665 грн</div>
                                        <button class="btn blue">в корзину</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn blue mobile-button">в корзину</button>

                    </div>
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
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
            <div class="row item-wrap sub-tab-content">
                <div class="col-8 custom-scroll">
                    <div class="row">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
