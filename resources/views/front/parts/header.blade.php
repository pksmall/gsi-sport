<header>
    <div class="container">
        <div class="row">
            <div class="left"><i class="icon-close"></i>
                <div class="logo"><a href="/">Gsi sport</a></div>
                @if (!Route::is('index'))
                    <ul class="breadcrumbs">
                        @switch(Route::getCurrentRoute()->uri)
                            @case('cart')
                                <li> <a href="/products">товары</a></li>
                                <li> <a href="/cart">корзина</a></li>
                                @break
                            @case('checkout')
                                <li> <a href="/products">товары</a></li>
                                <li> <a href="/cart">корзина</a></li>
                                <li> <a href="#">оформление покупки</a></li
                                @break
                            @default
                                <li><a href="#">
                                    {{  Route::is('news') ? 'новости' : '' }}
                                    {{  Route::is('products') ? 'товары' : '' }}
                                    {{  Route::is('item') ? 'товары' : '' }}
                                    {{  Route::is('about') ? 'о нас' : '' }}
                                    {{  Route::is('contacts') ? 'контакты' : '' }}
                                    {{  Route::is('login') ? 'вход' : '' }}
                                    {{  Route::is('register') ? 'регистрация' : '' }}
                                    {{  Route::is('profile') ? 'личный кабинет' : '' }}
                                    {{  Route::is('forgot') ? 'забыли пароль?' : '' }}
                                    {{  Route::is('search') ? 'поиск' : '' }}

                                </a></li>
                                @break
                        @endswitch
                    </ul>
                @endif
            @if (Route::is('products'))
            <div class="center">
                <div class="page-info"><span class="sort"><span>Сортировать по: </span>
                  <select class="js-select" data-content-url="{{ url('/change_filter') }}" data-content-token="{{ csrf_token() }}">
                    <option data-content="price-desc" {{ $filter == 'price-desc' ? 'selected' : ''}}>по цене от большего к меньшему</option>
                    <option data-content="price-asc"  {{ $filter == 'price-asc' ? 'selected' : ''}}>по цене от меньшего к большему</option>
                    <option data-content="abc-asc"  {{ $filter == 'abc-asc' ? 'selected' : ''}}>по алфавиту от а до я</option>
                    <option data-content="abc-desc" {{ $filter == 'abc-desc' ? 'selected' : ''}}>по алфавиту от я до а</option>
                  </select></span></div>
            </div>
            @endif
            @if (Route::is('item'))
            <div class="center">
                <ul class="breadcrumbs secondary">
                    <li> <a href="#">Аксессуары</a></li>
                    <li> <a href="#">Ракетка всепогодная Donic Alltec    </a></li>
                </ul>
            </div>
            @endif
            @if (Route::is('news'))
            <div class="center">
                <div class="page-info"></div>
            </div>
            @endif
        </div>
    </div>
</header>
<div class="search-popup-wrap">
    <div class="search-popup">
        <button type="submit" form="search-form" class="search-popup-button">
          <span class="search-popup-icon">
            <img src="/img/magnifying-glass.svg" alt="">
          </span>
        </button>
        <form class="search-form" action="/products/search" method="POST" name="search-form" id="search-form">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            <input type="text" minlength="3" maxlength="80" placeholder="Введите название товара" id="search" name="search" class="search-popup-input" data-msg-minlength="Вводите 3 или более символов" data-msg-required="Введите что-нибудь, но не короче 3 символов." required>
            <label id="search-error" class="search-error" for="search"></label>
        </form>
        <span class="search-popup-close"><img src="/img/cancel.svg" alt="close"></span>
    </div>
</div>
<!--Creates the popup body-->
<div class="popup-overlay">
    <!--Creates the popup content-->
    <div class="popup-content">
        <h2 style="color: black;">Ваша корзина пуста.</h2>
        <p style="color: black;">Чтобы увидеть корзину добавьте товар пожалуйста. Спасибо.</p>
        <!--popup's close button-->
        <span class="cart-popup-close"><img src="/img/cancel.svg" alt="close"></span>
        <!-- <button class="close btn blue">К товарам</button> -->
    </div>
</div>

@section('header-js-script')
    <script type="text/javascript">
        $(function() {
            'use strict';

            $(".search-popup-close").on("click", function(){
                $(".search-popup-wrap").removeClass("active");
            });
            $('.search-popup-icon').on('click', function() {
                var action = $('.search-form').attr('action')
                $( "#search-form" ).validate();
                $.post(action, $("#search-form").serialize());

            });
            $('.icon-search').on('click', function() {
                $(".search-popup-wrap").addClass("active");
                $(".search-popup-input").focus();
            });

            $(".cart-popup-close").on("click", function(){
                $(".popup-overlay, .popup-content").removeClass("active");
                document.location.href = "/products";
            });

            $('.icon-cart').on('click', function() {
                var qty = $('#cartqty').text();
                console.log("qty: " + qty);
                if (qty > 0) {
                    document.location.href = "/cart";
                } else {
                    $(".popup-overlay, .popup-content").addClass("active");
                }
            });

            $('.js-select').on('change',function(){
                var filter = $(this).find(':selected').data('content');
                var dataurl = $(this).data('content-url');
                var token = $(this).data('content-token');
                console.log("filter: " + filter + " dataurl:" + dataurl + " token:" + token);

                $.ajax({
                    type: 'POST',
                    url: dataurl,
                    data: {
                        filter: filter,
                        _token:  token,
                    }
                }).always(function(data, textStatus, jqXHR) {
                    if (data.response == 'success') {
                        console.log("success");
                        document.location.href = "/products";
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
