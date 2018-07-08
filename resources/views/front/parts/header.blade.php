<header>
    <div class="container">
        <div class="row">
            <div class="left"><i class="icon-close"></i>
                <div class="logo"><a href="/">Gsi sport</a></div>
                @if (!Route::is('index'))
                    <ul class="breadcrumbs">
                        <li><a href="#">
                                {{  Route::is('news') ? 'новости' : '' }}
                                {{  Route::is('products') ? 'товары' : '' }}
                                {{  Route::is('item') ? 'товары' : '' }}
                                {{  Route::is('about') ? 'о нас' : '' }}
                                {{  Route::is('contacts') ? 'контакты' : '' }}
                                {{  Route::is('login') ? 'вход' : '' }}
                                {{  Route::is('sign_up') ? 'регистрация' : '' }}
                                {{  Route::is('profile') ? 'личный кабинет' : '' }}
                                {{  Route::is('forgot') ? 'забыли пароль?' : '' }}
                                {{  Route::is('cart') ? 'корзина' : '' }}

                            </a></li>
                    </ul>
                @endif
            </div>
            @if (Route::is('products'))
            <div class="center">
                <div class="page-info"><span class="sort"><span>Сортировать по: </span>
                  <select class="js-select">
                    <option>Цена</option>
                    <option>Популярность</option>
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
                <div class="page-info"><span>09 марта 2018 12:26:29</span><span>Просмотров: 224</span></div>
            </div>
            @endif
        </div>
    </div>
</header>
