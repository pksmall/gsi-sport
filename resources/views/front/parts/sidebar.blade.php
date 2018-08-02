<div class="sidebar">
    <div class="trigger"></div>
    <ul>
        <div class="logo-mob"><a href="/">Gsi sport</a></div>
        <div class="trigger-top"></div>
        <li><a class="{{ Route::is('index') ? 'active' : '' }}" href="/">главная</a>
            <span class="text-bg">{{ Route::is('index') ? 'главная' : '' }}</span></li>
        <li><a class="{{ Route::is('products') ? 'active' : '' }}" href="/products">товары</a>
            <span class="text-bg text-bg-prod">{{ Route::is('products') ? 'товары' : '' }}</span></li>
        <li><a class="{{ Route::is('news') ? 'active' : '' }}" href="/news">новости</a>
            <span class="text-bg text-bg-news">{{ Route::is('news') ? 'новости' : '' }}</span></li>
        <li><a class="{{ Route::is('about') ? 'active' : '' }}" href="/about">о нас</a>
            <span class="text-bg text-bg-about">{{ Route::is('about') ? 'о нас' : '' }}</span></li>
        <li><a class="{{ Route::is('contacts') ? 'active' : '' }}" href="/contacts">контакты</a>
            <span class="text-bg text-bg-cont">{{ Route::is('contacts') ? 'контакты' : '' }}</span></li>
        <li><a class="disabled" href="/"><i class="icon-close"> </i></a></li>
    </ul>
    <div class="sidebar-bottom">
        <ul>
            <li><a href="https://facebook.com">Fb</a></li>
            <li><a href="https://indesign.com">In</a></li>
            <li><a href="https://vk.com">Vk</a></li>
            <div class="cart-mob"><a class="cart" href="/cart">
                    <div class="product-num blue1-text" id="cartqty-mob">{{ $cartTotal }}</div>
                    <i class="icon-cart-mob"></i></a>
                    <a class="login" href="/login">
                    <i class="icon-login-mob"></i></a>
            </div>
        </ul>

    </div>
</div>
