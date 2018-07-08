<!--  ******  HEADER(FRONT-PAGE: POSITION - FIXED)  ******  -->
<header class="{{ Route::is('index') || Route::is('index_ru') || Route::is('index_en') ? 'header' : 'header-pages' }}">
    <!--  |||||||||||||||||  MAIN NAV PANEL  |||||||||||||||||  -->
    <nav class="navbar navbar-expand-lg navbar-dark @if(Route::is('index') || Route::is('index_ru') || Route::is('index_en')) bg-transparent @endif">
        <!--  ******  LOGO LINK IMG  ******  -->
        <a class="navbar-brand" @if(App::getLocale() == 'ru') href="{{ route('index_ru') }}" @endif  @if(App::getLocale() == 'ua') href="{{ route('index') }}" @endif  @if(App::getLocale() == 'en') href="{{ route('index_en') }}" @endif>
            <svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1061.12 334.3"><defs><style>/*.cls-1{fill:#fff;} */.cls-2{isolation:isolate;}</style></defs><title>logo camo-tec</title><path class="cls-1" d="M463.6,111.89v14.72c0,17.72-8.86,27.85-26,27.85s-26-10.13-26-27.85V69c0-17.73,8.86-27.85,26-27.85s26,10.13,26,27.85V79.77H447.14V67.9c0-7.91-3.48-10.92-9-10.92s-9,3-9,10.92v59.82c0,7.91,3.48,10.76,9,10.76s9-2.85,9-10.76V111.89H463.6Z" transform="translate(0)"/><path class="cls-1" d="M544.47,153.2H526.9l-3-20.1H502.53l-3,20.1h-16L501.26,42.42h25.48Zm-39.72-35.13h16.78l-8.39-56Z" transform="translate(0)"/><path class="cls-1" d="M603.34,121.07l11.87-78.66h24.21V153.2H623V73.75l-12,79.45H594.48l-13-78.34V153.2H566.3V42.42h24.21Z" transform="translate(0)"/><path class="cls-1" d="M664.58,69c0-17.73,9.34-27.85,26.43-27.85S717.44,51.28,717.44,69v57.61c0,17.72-9.34,27.85-26.43,27.85s-26.43-10.13-26.43-27.85V69ZM682,127.72c0,7.91,3.48,10.92,9,10.92s9-3,9-10.92V67.9C700,60,696.55,57,691,57s-9,3-9,10.92v59.82Z" transform="translate(0)"/><g class="cls-2"><path class="cls-1" d="M743.08,89.89h31.65v15.83H743.08V89.89Z" transform="translate(0)"/></g><path class="cls-1" d="M790.72,42.42h53.81V58.24h-18.2v95H808.92v-95h-18.2V42.42Z" transform="translate(0)"/><path class="cls-1" d="M883.46,89.1h23.9v15.83h-23.9v32.44h30.07V153.2H866V42.42h47.48V58.24H883.46V89.1Z" transform="translate(0)"/><path class="cls-1" d="M988.7,111.89v14.72c0,17.72-8.86,27.85-26,27.85s-26-10.13-26-27.85V69c0-17.73,8.86-27.85,26-27.85s26,10.13,26,27.85V79.77H972.24V67.9c0-7.91-3.48-10.92-9-10.92s-9,3-9,10.92v59.82c0,7.91,3.48,10.76,9,10.76s9-2.85,9-10.76V111.89H988.7Z" transform="translate(0)"/><path class="cls-1" d="M1014,41.09h18.49v5.48h-6.25v25h-6v-25H1014V41.09Zm34.83,21.4,4-21.4h8.3V71.56h-5.65V49.91l-4,21.65h-5.65l-4.54-21.48V71.56H1036V41.09h8.3Z" transform="translate(0)"/><path class="cls-1" d="M411.73,206.17c0-7.06,3.5-11.61,10.55-11.61s10.62,4.55,10.62,11.61V230c0,7-3.5,11.61-10.62,11.61S411.73,237,411.73,230V206.17Zm5.08,24.14c0,4.22,1.78,6.66,5.47,6.66s5.47-2.44,5.47-6.66v-24.4c0-4.16-1.71-6.66-5.47-6.66s-5.47,2.51-5.47,6.66v24.4Z" transform="translate(0)"/><path class="cls-1" d="M454.6,230.31c0,4.16,1.65,6.66,5.41,6.66s5.34-2.51,5.34-6.66V195h4.81v35c0,7-3.23,11.67-10.35,11.67S449.52,237,449.52,230V195h5.08v35.28Z" transform="translate(0)"/><path class="cls-1" d="M493.84,241.19V199.71h-8.51V195h22.09v4.68h-8.51v41.48h-5.08Z" transform="translate(0)"/><path class="cls-1" d="M533.67,195c7.19,0,10.49,4.35,10.49,11.48v23.28c0,7.06-3.3,11.41-10.49,11.41H522.86V195h10.82Zm-0.07,41.48c3.69,0,5.47-2.31,5.47-6.53V206.24c0-4.22-1.78-6.53-5.54-6.53H528v36.8h5.61Z" transform="translate(0)"/><path class="cls-1" d="M560.51,206.17c0-7.06,3.5-11.61,10.55-11.61s10.62,4.55,10.62,11.61V230c0,7-3.5,11.61-10.62,11.61S560.51,237,560.51,230V206.17Zm5.08,24.14c0,4.22,1.78,6.66,5.47,6.66s5.47-2.44,5.47-6.66v-24.4c0-4.16-1.71-6.66-5.47-6.66s-5.47,2.51-5.47,6.66v24.4Z" transform="translate(0)"/><path class="cls-1" d="M598.1,206.17c0-7.06,3.5-11.61,10.55-11.61s10.62,4.55,10.62,11.61V230c0,7-3.5,11.61-10.62,11.61S598.1,237,598.1,230V206.17Zm5.08,24.14c0,4.22,1.78,6.66,5.47,6.66s5.47-2.44,5.47-6.66v-24.4c0-4.16-1.71-6.66-5.47-6.66s-5.47,2.51-5.47,6.66v24.4Z" transform="translate(0)"/><path class="cls-1" d="M646.38,195c7.25,0,10.29,3.69,10.29,10.55v3.76c0,5.08-1.78,8.24-5.74,9.5,4.22,1.25,5.8,4.68,5.8,9.63v7.19a11.56,11.56,0,0,0,.92,5.54h-5.21c-0.59-1.32-.86-2.51-0.86-5.61v-7.25c0-5.21-2.44-6.86-6.73-6.86h-3.63v19.72h-5.14V195h10.29Zm-1.32,21.76c4.09,0,6.53-1.32,6.53-6.33V206c0-4.16-1.52-6.33-5.34-6.33h-5v17.08h3.83Z" transform="translate(0)"/><path class="cls-1" d="M706.26,195c7.25,0,10.35,4.29,10.35,11.28v5.54c0,7.32-3.43,11.14-10.75,11.14h-4.55v18.2h-5.14V195h10.09Zm-0.4,23.35c3.83,0,5.67-1.78,5.67-6.2V206c0-4.22-1.52-6.33-5.28-6.33h-4.95v18.66h4.55Z" transform="translate(0)"/><path class="cls-1" d="M742.86,195c7.25,0,10.29,3.69,10.29,10.55v3.76c0,5.08-1.78,8.24-5.74,9.5,4.22,1.25,5.8,4.68,5.8,9.63v7.19a11.56,11.56,0,0,0,.92,5.54h-5.21c-0.59-1.32-.86-2.51-0.86-5.61v-7.25c0-5.21-2.44-6.86-6.73-6.86h-3.63v19.72h-5.14V195h10.29Zm-1.32,21.76c4.09,0,6.53-1.32,6.53-6.33V206c0-4.16-1.52-6.33-5.34-6.33h-5v17.08h3.82Z" transform="translate(0)"/><path class="cls-1" d="M770.1,206.17c0-7.06,3.5-11.61,10.55-11.61s10.62,4.55,10.62,11.61V230c0,7-3.5,11.61-10.62,11.61S770.1,237,770.1,230V206.17Zm5.08,24.14c0,4.22,1.78,6.66,5.47,6.66s5.47-2.44,5.47-6.66v-24.4c0-4.16-1.71-6.66-5.47-6.66s-5.47,2.51-5.47,6.66v24.4Z" transform="translate(0)"/><path class="cls-1" d="M818.9,195c7.19,0,10.49,4.35,10.49,11.48v23.28c0,7.06-3.3,11.41-10.49,11.41H808.09V195H818.9Zm-0.07,41.48c3.69,0,5.47-2.31,5.47-6.53V206.24c0-4.22-1.78-6.53-5.54-6.53h-5.54v36.8h5.61Z" transform="translate(0)"/><path class="cls-1" d="M851,230.31c0,4.16,1.65,6.66,5.41,6.66s5.34-2.51,5.34-6.66V195h4.81v35c0,7-3.23,11.67-10.35,11.67S845.94,237,845.94,230V195H851v35.28Z" transform="translate(0)"/><path class="cls-1" d="M904,206.17v4.15H899.1v-4.42c0-4.16-1.65-6.66-5.41-6.66s-5.41,2.51-5.41,6.66v24.4c0,4.16,1.71,6.66,5.41,6.66s5.41-2.51,5.41-6.66v-6H904V230c0,7-3.3,11.61-10.42,11.61S883.2,237,883.2,230V206.17c0-7,3.3-11.61,10.35-11.61S904,199.18,904,206.17Z" transform="translate(0)"/><path class="cls-1" d="M927.26,241.19V199.71h-8.51V195h22.09v4.68h-8.51v41.48h-5.08Z" transform="translate(0)"/><path class="cls-1" d="M976.26,206.11v1.25h-4.88v-1.52c0-4.15-1.58-6.59-5.28-6.59s-5.28,2.44-5.28,6.53c0,10.35,15.5,11.34,15.5,24.33,0,7-3.36,11.54-10.42,11.54s-10.35-4.55-10.35-11.54v-2.64h4.81v2.9c0,4.15,1.71,6.59,5.41,6.59s5.41-2.44,5.41-6.59c0-10.29-15.43-11.28-15.43-24.27,0-7.12,3.3-11.54,10.22-11.54S976.26,199.12,976.26,206.11Z" transform="translate(0)"/><path class="cls-1" d="M411.73,268.91c0-7.06,3.5-11.61,10.55-11.61s10.62,4.55,10.62,11.61v23.87c0,7-3.5,11.61-10.62,11.61s-10.55-4.62-10.55-11.61V268.91ZM416.81,293c0,4.22,1.78,6.66,5.47,6.66s5.47-2.44,5.47-6.66v-24.4c0-4.16-1.71-6.66-5.47-6.66s-5.47,2.51-5.47,6.66V293Z" transform="translate(0)"/><path class="cls-1" d="M460,257.77c7.25,0,10.29,3.69,10.29,10.55v3.76c0,5.08-1.78,8.24-5.74,9.5,4.22,1.25,5.8,4.68,5.8,9.63v7.19a11.56,11.56,0,0,0,.92,5.54h-5.21c-0.59-1.32-.86-2.51-0.86-5.61v-7.25c0-5.21-2.44-6.86-6.73-6.86h-3.63v19.72h-5.14V257.77H460Zm-1.32,21.76c4.09,0,6.53-1.32,6.53-6.33v-4.42c0-4.16-1.52-6.33-5.34-6.33h-5v17.08h3.83Z" transform="translate(0)"/><path class="cls-1" d="M492.78,257.77v46.16h-5.14V257.77h5.14Z" transform="translate(0)"/><path class="cls-1" d="M530.37,268.91v4h-4.88v-4.22c0-4.16-1.65-6.66-5.41-6.66s-5.41,2.51-5.41,6.66V293c0,4.16,1.71,6.66,5.41,6.66s5.41-2.51,5.41-6.66v-9.23h-4.75V279.2h9.63v13.58c0,7-3.3,11.61-10.42,11.61s-10.35-4.62-10.35-11.61V268.91c0-7,3.3-11.61,10.35-11.61S530.37,261.92,530.37,268.91Z" transform="translate(0)"/><path class="cls-1" d="M552.34,257.77v46.16h-5.14V257.77h5.14Z" transform="translate(0)"/><path class="cls-1" d="M574.1,303.93h-4.62V257.77H576l10.68,33.37V257.77h4.55v46.16H585.9L574.1,266.6v37.33Z" transform="translate(0)"/><path class="cls-1" d="M613.67,294.63l-1.78,9.3h-4.75L616,257.77h7.45l8.84,46.16h-5.14l-1.78-9.3H613.67Zm0.66-4.42h10.29l-5.21-26.64Z" transform="translate(0)"/><path class="cls-1" d="M648.23,303.93V257.77h5.14v41.48h13.19v4.68H648.23Z" transform="translate(0)"/><path class="cls-1" d="M725.32,268.91v23.87a13.35,13.35,0,0,1-1.78,7.19c0.53,1.12,1.38,1.45,2.84,1.45H727V306h-0.86c-2.9,0-4.81-1.05-5.87-3a11,11,0,0,1-5.61,1.38c-7.06,0-10.55-4.62-10.55-11.61V268.91c0-7.06,3.5-11.61,10.55-11.61S725.32,261.85,725.32,268.91Zm-16.09-.26V293c0,4.22,1.78,6.66,5.47,6.66s5.47-2.44,5.47-6.66v-24.4c0-4.16-1.71-6.66-5.47-6.66S709.23,264.49,709.23,268.65Z" transform="translate(0)"/><path class="cls-1" d="M747.22,293c0,4.16,1.65,6.66,5.41,6.66S758,297.2,758,293V257.77h4.81v35c0,7-3.23,11.67-10.35,11.67s-10.29-4.68-10.29-11.67v-35h5.08V293Z" transform="translate(0)"/><path class="cls-1" d="M785,294.63l-1.78,9.3h-4.75l8.84-46.16h7.45l8.84,46.16h-5.14l-1.78-9.3H785Zm0.66-4.42H796l-5.21-26.64Z" transform="translate(0)"/><path class="cls-1" d="M819.56,303.93V257.77h5.14v41.48H837.9v4.68H819.56Z" transform="translate(0)"/><path class="cls-1" d="M858.87,257.77v46.16h-5.14V257.77h5.14Z" transform="translate(0)"/><path class="cls-1" d="M882.74,303.93V262.45h-8.51v-4.68h22.09v4.68h-8.51v41.48h-5.08Z" transform="translate(0)"/><path class="cls-1" d="M919.94,287.38l-9.76-29.61h5.34l7.19,22.69L930,257.77h4.88L925,287.38v16.55h-5.08V287.38Z" transform="translate(0)"/><path class="cls-1" d="M0,3.39S15,135.15,143.1,154.52,334.3,60.27,360.1,0c0,29-5.6,125.62-105.44,181.6-10.15,63.14-22.39,98.42-73.94,152.7,0,0,62.1-84,62-160.25,30.38-19.66,79.38-44.9,107.72-137.73C337.42,60.15,286.91,183.15,154,173c0,0-43.09,56.5,15.88,161.16,0,0-53.37-26.17-82.14-155C52.33,155.15-.13,125.75,0,3.39Z" transform="translate(0)"/></svg>
        </a>

<div class="collapse navbar-collapse" id="main-nav">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">@if(App::getLocale() == 'ru')<a class="nav-link active-item" href="{{ route('new_ru') }}">{{ trans('base.new') }}</a>@endif
        @if(App::getLocale() == 'ua')<a class="nav-link active-item" href="{{ route('new') }}">{{ trans('base.new') }}</a>@endif
            @if(App::getLocale() == 'en')<a class="nav-link active-item" href="{{ route('new_en') }}">{{ trans('base.new') }}</a>@endif</li>
        @if(isset($parent_categories) && $parent_categories->count() > 0)
            @foreach($parent_categories as $parent_category)
                @if($parent_category->is_inc_menu)
                    <li class="nav-item">
                    @if(App::getLocale() == 'ru' && $parent_category->locales[0])<a class="nav-link @if(isset($category) && $category->id == $parent_category->id) active-item @endif" href="{{ route('items_category_ru', $parent_category->locales[0]->slug) }}">{{ $parent_category->locales[0]->name }}</a>@endif
                    @if(App::getLocale() == 'ua' && $parent_category->locales[1])<a class="nav-link @if(isset($category) && $category->id == $parent_category->id) active-item @endif" href="{{ route('items_category', $parent_category->locales[1]->slug) }}">{{ $parent_category->locales[1]->name }}</a>@endif
                    @if(App::getLocale() == 'en' && $parent_category->locales[2])<a class="nav-link @if(isset($category) && $category->id == $parent_category->id) active-item @endif" href="{{ route('items_category_en', $parent_category->locales[2]->slug) }}">{{ $parent_category->locales[2]->name }}</a>@endif
                </li>
                @endif
            @endforeach
        @endif
        @if(isset($static_pages) && count($static_pages) > 0)
            @foreach($static_pages as $static_page)
                @if($static_page->page->is_menu && $static_page->page->is_active)
                    <li class="nav-item">
                        @if(App::getLocale() == 'ru')<a class="nav-link" href="{{ route('front_static_pages_ru', $static_page->slug) }}">{{ $static_page->name }}</a>@endif
                        @if(App::getLocale() == 'ua')<a class="nav-link" href="{{ route('front_static_pages', $static_page->slug) }}">{{ $static_page->name }}</a>@endif
                        @if(App::getLocale() == 'en')<a class="nav-link" href="{{ route('front_static_pages_en', $static_page->slug) }}">{{ $static_page->name }}</a>@endif
                    </li>
                @endif
                @endforeach
            @endif
    {{--<li class="nav-item dropdown">--}}
        {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--Dropdown--}}
        {{--</a>--}}
        {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
            {{--<a class="dropdown-item" href="#">Action</a>--}}
            {{--<a class="dropdown-item" href="#">Another action</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">Something else here</a>--}}
        {{--</div>--}}
    {{--</li>--}}
        <li class="nav-item">
            @if(App::getLocale() == 'ru')<a class="nav-link @if(Route::is('technologies_ru')) active-item @endif" href="{{ route('technologies_ru') }}">{{ trans('base.technologies') }}</a>@endif
            @if(App::getLocale() == 'ua')<a class="nav-link @if(Route::is('technologies')) active-item @endif" href="{{ route('technologies') }}">{{ trans('base.technologies') }}</a>@endif
            @if(App::getLocale() == 'en')<a class="nav-link @if(Route::is('technologies_en')) active-item @endif" href="{{ route('technologies_en') }}">{{ trans('base.technologies') }}</a>@endif
        </li>
    </ul>
</div>
<!--  ******  CART LANGUAGE SECOND-NAV  ******  -->
<div class="additional-content">
    @if(App::getLocale() == 'ru')<a class=" @if(Route::is('shop_ru')) active-item @endif" href="{{ route('shop_ru') }}">{{ trans('base.shop') }}</a>@endif
    @if(App::getLocale() == 'ua')<a class=" @if(Route::is('shop')) active-item @endif" href="{{ route('shop') }}">{{ trans('base.shop') }}</a>@endif
    @if(App::getLocale() == 'en')<a class=" @if(Route::is('shop_en')) active-item @endif" href="{{ route('shop_en') }}">{{ trans('base.shop') }}</a>@endif
    <a class="cart-link" style="margin-left: 25px;" href="@if(App::getLocale() == 'ru'){{ route('cart_ru') }}@endif @if(App::getLocale() == 'ua'){{ route('cart') }}@endif @if(App::getLocale() == 'en'){{ route('cart_en') }}@endif">
        @if(\Auth::check())
            @if(isset(\Auth::user()->cart) && \Auth::user()->cart != null && count(\Auth::user()->cart) > 0)
                <img style="width: 18px;" src="{{ asset('images/design/icons/cart.svg') }}">
            @else
                <img style="width: 18px;" src="{{ asset('images/design/icons/cart_empty.svg') }}">
            @endif
        @elseif(!\Auth::check())
            @if(Session::has('cart'))
                <img style="width: 18px;" src="{{ asset('images/design/icons/cart.svg') }}">
            @else
                <img style="width: 18px;" src="{{ asset('images/design/icons/cart_empty.svg') }}">
            @endif
        @endif
            @if(Route::is('cart') || Route::is('cart_ru') || Route::is('cart_en')){{ trans('base.cart') }}@endif
    </a>
    <form id="locale-switch" action="{{ route('locale') }}" method="get" class="language-select">
        <label for="language" @if(App::getLocale() == 'ru') class="language-ru" @endif @if(App::getLocale() == 'ua') class="language-ua" @endif @if(App::getLocale() == 'en') class="language-en" @endif></label>

        <select name="language" id="language" class="language custom-style">

            @if(Route::is('index_ru') || Route::is('index') || Route::is('index_en'))
                <option value="{{ route('index_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                <option value="{{ route('index') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                <option value="{{ route('index_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
            @endif

                @if(Route::is('shop_ru') || Route::is('shop') || Route::is('shop_en'))
                    <option value="{{ route('shop_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('shop') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('shop_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('items_category_ru') || Route::is('items_category') || Route::is('items_category_en'))
                    <option value="{{ route('items_category_ru', $category->locales[0]->slug) }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('items_category', $category->locales[1]->slug) }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('items_category_en', $category->locales[2]->slug) }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('item_ru') || Route::is('item') || Route::is('item_en'))
                    <option value="{{ route('item_ru', $item->slug) }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('item', $item->slug) }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('item_en', $item->slug) }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('new_ru') || Route::is('new') || Route::is('new_en'))
                    <option value="{{ route('new_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('new') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('new_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('sale_ru') || Route::is('sale') || Route::is('sale_en'))
                    <option value="{{ route('sale_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('sale') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('sale_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('front_static_pages_ru') || Route::is('front_static_pages') || Route::is('front_static_pages_en'))
                    <option value="{{ route('front_static_pages_ru', $static_page_locales[0]->slug) }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('front_static_pages', $static_page_locales[1]->slug) }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('front_static_pages_en', $static_page_locales[2]->slug) }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('contacts_ru') || Route::is('contacts') || Route::is('contacts_en'))
                    <option value="{{ route('contacts_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('contacts') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('contacts_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('technologies_ru') || Route::is('technologies') || Route::is('technologies_en'))
                    <option value="{{ route('technologies_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('technologies') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('technologies_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('technology_ru') || Route::is('technology') || Route::is('technology_en'))
                    <option value="{{ route('technology_ru', $post->slug) }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('technology', $post->slug) }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('technology_en', $post->slug) }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('technology_category_ru') || Route::is('technology_category') || Route::is('technology_category_en'))
                    <option value="{{ route('technology_category_ru', $category->locales[0]->slug) }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('technology_category', $category->locales[1]->slug) }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('technology_category_en', $category->locales[2]->slug) }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('cart_ru') || Route::is('cart') || Route::is('cart_en'))
                    <option value="{{ route('cart_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('cart') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('cart_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('checkout_ru') || Route::is('checkout') || Route::is('checkout_en'))
                    <option value="{{ route('checkout_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('checkout') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('checkout_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('profile_ru') || Route::is('profile') || Route::is('profile_en'))
                    <option value="{{ route('profile_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('profile') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('profile_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif
                @if(Route::is('addresses_ru') || Route::is('addresses') || Route::is('addresses_en'))
                    <option value="{{ route('addresses_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('addresses') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('addresses_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif
                @if(Route::is('my_favorites_ru') || Route::is('my_favorites') || Route::is('my_favorites_en'))
                    <option value="{{ route('my_favorites_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('my_favorites') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('my_favorites_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif
                @if(Route::is('my_orders_ru') || Route::is('my_orders') || Route::is('my_orders_en'))
                    <option value="{{ route('my_orders_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('my_orders') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('my_orders_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif
                @if(Route::is('my_subscribe_ru') || Route::is('my_subscribe') || Route::is('my_subscribe_en'))
                    <option value="{{ route('my_subscribe_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('my_subscribe') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('my_subscribe_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif
                @if(Route::is('blog_ru') || Route::is('blog') || Route::is('blog_en'))
                    <option value="{{ route('blog_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('blog') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('blog_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif
                @if(Route::is('post_ru') || Route::is('post') || Route::is('post_en'))
                    <option value="{{ route('post_ru', $post->slug) }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('post', $post->slug) }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('post_en', $post->slug) }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif
                @if(Route::is('blog_category_ru') || Route::is('blog_category') || Route::is('blog_category_en'))
                    <option value="{{ route('blog_category_ru', $category->slug) }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('blog_category', $category->slug) }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('blog_category_en', $category->slug) }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('filter_ru') || Route::is('filter') || Route::is('filter_en') || Route::is('cat_filter_ru') || Route::is('cat_filter') || Route::is('cat_filter_en'))
                    <option value="{{ route('shop_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('shop') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('shop_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('login_ru') || Route::is('login') || Route::is('login_en'))
                    <option value="{{ route('login_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('login') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('login_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('register_ru') || Route::is('register') || Route::is('register_en'))
                    <option value="{{ route('register_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('register') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('register_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('banned_ru') || Route::is('banned') || Route::is('banned_en'))
                    <option value="{{ route('banned_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('banned') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('banned_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('order_success_ru') || Route::is('order_success') || Route::is('order_success_en'))
                    <option value="{{ route('order_success_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('order_success') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('order_success_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif

                @if(Route::is('get_order_success_ru') || Route::is('get_order_success') || Route::is('get_order_success_en'))
                    <option value="{{ route('get_order_success_ru') }}" @if(App::getLocale() == 'ru') selected @endif>RU</option>
                    <option value="{{ route('get_order_success') }}" @if(App::getLocale() == 'ua') selected @endif>UA</option>
                    <option value="{{ route('get_order_success_en') }}" @if(App::getLocale() == 'en') selected @endif>EN</option>
                @endif
</select>

</form>
<!--  ******  SECOND-NAV COLLAPSE BUTTON  ******  -->
<button class="burger-custom right-nav-btn icon-menu"></button>
<!--  ******  MAIN-NAV COLLAPSE BUTTON  ******  -->
<button class="burger-custom d-none" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
<!-- <span class="navbar-toggler-icon"></span> -->
<span></span>
</button>
</div>
</nav>
<!--  |||||||||||||||||  _/ MAIN NAV PANEL  |||||||||||||||||  -->
<!--  ******  SECOND-NAV CONTENT  ******  -->

@if(Route::is('items_category_ru') || Route::is('items_category') || Route::is('items_category_en') || Route::is('cat_filter_ru') || Route::is('cat_filter') || Route::is('cat_filter_en'))




        <div class="container-fluid">
            <div class="content-wrapper">
                <nav id="category-nav" class="navbar navbar-expand-lg navbar-dark bg-transparent">
                    <ul class="navbar-nav">

                        @foreach($category->subcategories as $a_menu)
                            @if(!$a_menu->parent_id)
                                @if(!count($a_menu->subcategories))
                                    <li class="nav-item dropdown">
                                        @if(App::getLocale() == 'ru')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category_ru', $a_menu->locales[0]->slug) }}">{{ $a_menu->locales[0]->name }}</a>@endif
                                        @if(App::getLocale() == 'ua')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category', $a_menu->locales[1]->slug) }}">{{ $a_menu->locales[1]->name }}</a>@endif
                                        @if(App::getLocale() == 'en')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category_en', $a_menu->locales[2]->slug) }}">{{ $a_menu->locales[2]->name }}</a>@endif
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        @if(App::getLocale() == 'ru')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category_ru', $a_menu->locales[0]->slug) }}">{{ $a_menu->locales[0]->name }}</a>@endif
                                        @if(App::getLocale() == 'ua')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category', $a_menu->locales[1]->slug) }}">{{ $a_menu->locales[1]->name }}</a>@endif
                                        @if(App::getLocale() == 'en')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category_en', $a_menu->locales[2]->slug) }}">{{ $a_menu->locales[2]->name }}</a>@endif
                                        <div class="dropdown-menu">
                                            <div class="container-fluid">
                                                <div class="content-wrapper">
                                                    <div class="card-columns">
                                                        @foreach($a_menu->subcategories as $sub_cat)
                                                            @if($sub_cat->is_additional_menu)
                                                                <div class="card">
                                                                    <ul>
                                                                        <li>
                                                                            @if(App::getLocale() == 'ru') <a href="{{ route('items_category_ru', $sub_cat->locales[0]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[0]->name }} </a> @endif
                                                                            @if(App::getLocale() == 'ua') <a href="{{ route('items_category', $sub_cat->locales[1]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[1]->name }} </a> @endif
                                                                            @if(App::getLocale() == 'en') <a href="{{ route('items_category_en', $sub_cat->locales[2]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[2]->name }} </a> @endif
                                                                            @if(isset($sub_cat->subcategories) && count($sub_cat->subcategories))
                                                                                <ul class="sub-menu-category">
                                                                                    @foreach($sub_cat->subcategories as $s_cat)
                                                                                        @if(App::getLocale() == 'ru')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category_ru', $s_cat->locales[0]->slug) }}">{{ $s_cat->locales[0]->name }}</a>@endif
                                                                                        @if(App::getLocale() == 'ua')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category', $s_cat->locales[1]->slug) }}">{{ $s_cat->locales[1]->name }}</a>@endif
                                                                                        @if(App::getLocale() == 'en')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category_en', $s_cat->locales[2]->slug) }}">{{ $s_cat->locales[2]->name }}</a>@endif
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
@else
                                @if(!count($a_menu->subcategories))
                                    <li class="nav-item dropdown">
                                        @if(App::getLocale() == 'ru')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category_ru', $a_menu->locales[0]->slug) }}">{{ $a_menu->locales[0]->name }}</a>@endif
                                        @if(App::getLocale() == 'ua')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category', $a_menu->locales[1]->slug) }}">{{ $a_menu->locales[1]->name }}</a>@endif
                                        @if(App::getLocale() == 'en')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category_en', $a_menu->locales[2]->slug) }}">{{ $a_menu->locales[2]->name }}</a>@endif
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        @if(App::getLocale() == 'ru')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category_ru', $a_menu->locales[0]->slug) }}">{{ $a_menu->locales[0]->name }}</a>@endif
                                        @if(App::getLocale() == 'ua')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category', $a_menu->locales[1]->slug) }}">{{ $a_menu->locales[1]->name }}</a>@endif
                                        @if(App::getLocale() == 'en')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category_en', $a_menu->locales[2]->slug) }}">{{ $a_menu->locales[2]->name }}</a>@endif
                                        <div class="dropdown-menu">
                                            <div class="container-fluid">
                                                <div class="content-wrapper">
                                                    <div class="card-columns">
                                                        @foreach($a_menu->subcategories as $sub_cat)
                                                            @if($sub_cat->is_additional_menu)
                                                                <div class="card">
                                                                    <ul>
                                                                        <li>
                                                                            @if(App::getLocale() == 'ru') <a href="{{ route('items_category_ru', $sub_cat->locales[0]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[0]->name }} </a> @endif
                                                                            @if(App::getLocale() == 'ua') <a href="{{ route('items_category', $sub_cat->locales[1]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[1]->name }} </a> @endif
                                                                            @if(App::getLocale() == 'en') <a href="{{ route('items_category_en', $sub_cat->locales[2]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[2]->name }} </a> @endif
                                                                            @if(isset($sub_cat->subcategories) && count($sub_cat->subcategories))
                                                                                <ul class="sub-menu-category">
                                                                                    @foreach($sub_cat->subcategories as $s_cat)
                                                                                        @if(App::getLocale() == 'ru')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category_ru', $s_cat->locales[0]->slug) }}">{{ $s_cat->locales[0]->name }}</a>@endif
                                                                                        @if(App::getLocale() == 'ua')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category', $s_cat->locales[1]->slug) }}">{{ $s_cat->locales[1]->name }}</a>@endif
                                                                                        @if(App::getLocale() == 'en')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category_en', $s_cat->locales[2]->slug) }}">{{ $s_cat->locales[2]->name }}</a>@endif
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                    <form action="
@if(App::getLocale() == 'ru'){{ route('search_ru') }}@endif
                    @if(App::getLocale() == 'ua'){{ route('search') }}@endif
                    @if(App::getLocale() == 'en'){{ route('search_en') }}@endif
                            ">
                        <input type="text" name="search" placeholder="ПОИСК...">
                        <button class="nav-search icon-loupe" type="submit"></button>
                    </form>
                </nav>
            </div>
        </div>










        {{--@if(isset($additional_menu) && count($additional_menu))--}}

            {{--<div class="container-fluid">--}}
                {{--<div class="content-wrapper">--}}
                    {{--<nav id="category-nav" class="navbar navbar-expand-lg navbar-dark bg-transparent">--}}
                        {{--<ul class="navbar-nav">--}}

                            {{--@foreach($additional_menu as $a_menu)--}}
                                {{--@if(!$a_menu->parent_id)--}}
                                    {{--@if(!count($a_menu->subcategories))--}}
                                        {{--<li class="nav-item dropdown">--}}
                                            {{--@if(App::getLocale() == 'ru')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category_ru', $a_menu->locales[0]->slug) }}">{{ $a_menu->locales[0]->name }}</a>@endif--}}
                                            {{--@if(App::getLocale() == 'ua')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category', $a_menu->locales[1]->slug) }}">{{ $a_menu->locales[1]->name }}</a>@endif--}}
                                            {{--@if(App::getLocale() == 'en')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category_en', $a_menu->locales[2]->slug) }}">{{ $a_menu->locales[2]->name }}</a>@endif--}}
                                        {{--</li>--}}
                                    {{--@else--}}
                                        {{--<li class="nav-item dropdown">--}}
                                            {{--@if(App::getLocale() == 'ru')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category_ru', $a_menu->locales[0]->slug) }}">{{ $a_menu->locales[0]->name }}</a>@endif--}}
                                            {{--@if(App::getLocale() == 'ua')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category', $a_menu->locales[1]->slug) }}">{{ $a_menu->locales[1]->name }}</a>@endif--}}
                                            {{--@if(App::getLocale() == 'en')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category_en', $a_menu->locales[2]->slug) }}">{{ $a_menu->locales[2]->name }}</a>@endif--}}
                                            {{--<div class="dropdown-menu">--}}
                                                {{--<div class="container-fluid">--}}
                                                    {{--<div class="content-wrapper">--}}
                                                        {{--<div class="card-columns">--}}
                                                            {{--@foreach($a_menu->subcategories as $sub_cat)--}}
                                                                {{--@if($sub_cat->is_additional_menu)--}}
                                                                    {{--<div class="card">--}}
                                                                        {{--<ul>--}}
                                                                            {{--<li>--}}
                                                                                {{--@if(App::getLocale() == 'ru') <a href="{{ route('items_category_ru', $sub_cat->locales[0]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[0]->name }} </a> @endif--}}
                                                                                {{--@if(App::getLocale() == 'ua') <a href="{{ route('items_category', $sub_cat->locales[1]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[1]->name }} </a> @endif--}}
                                                                                {{--@if(App::getLocale() == 'en') <a href="{{ route('items_category_en', $sub_cat->locales[2]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[2]->name }} </a> @endif--}}
                                                                                {{--@if(isset($sub_cat->subcategories) && count($sub_cat->subcategories))--}}
                                                                                    {{--<ul class="sub-menu-category">--}}
                                                                                        {{--@foreach($sub_cat->subcategories as $s_cat)--}}
                                                                                            {{--@if(App::getLocale() == 'ru')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category_ru', $s_cat->locales[0]->slug) }}">{{ $s_cat->locales[0]->name }}</a>@endif--}}
                                                                                            {{--@if(App::getLocale() == 'ua')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category', $s_cat->locales[1]->slug) }}">{{ $s_cat->locales[1]->name }}</a>@endif--}}
                                                                                            {{--@if(App::getLocale() == 'en')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category_en', $s_cat->locales[2]->slug) }}">{{ $s_cat->locales[2]->name }}</a>@endif--}}
                                                                                        {{--@endforeach--}}
                                                                                    {{--</ul>--}}
                                                                                {{--@endif--}}
                                                                            {{--</li>--}}
                                                                        {{--</ul>--}}
                                                                    {{--</div>--}}
                                                                {{--@endif--}}
                                                            {{--@endforeach--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--@endif--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                        {{--<form action="--}}
{{--@if(App::getLocale() == 'ru'){{ route('search_ru') }}@endif--}}
                        {{--@if(App::getLocale() == 'ua'){{ route('search') }}@endif--}}
                        {{--@if(App::getLocale() == 'en'){{ route('search_en') }}@endif--}}
                                {{--">--}}
                            {{--<input type="text" name="search" placeholder="ПОИСК...">--}}
                            {{--<button class="nav-search icon-loupe" type="submit"></button>--}}
                        {{--</form>--}}
                    {{--</nav>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--@endif--}}



@else

        @if(isset($additional_menu) && count($additional_menu))

            <div class="container-fluid">
                <div class="content-wrapper">
                    <nav id="category-nav" class="navbar navbar-expand-lg navbar-dark bg-transparent">
                        <ul class="navbar-nav">

                            @foreach($additional_menu as $a_menu)
                                @if(!$a_menu->parent_id)
                                    @if(!count($a_menu->subcategories))
                                        <li class="nav-item dropdown">
                                            @if(App::getLocale() == 'ru')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category_ru', $a_menu->locales[0]->slug) }}">{{ $a_menu->locales[0]->name }}</a>@endif
                                            @if(App::getLocale() == 'ua')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category', $a_menu->locales[1]->slug) }}">{{ $a_menu->locales[1]->name }}</a>@endif
                                            @if(App::getLocale() == 'en')<a class="nav-link @if(isset($category) && $category->id == $a_menu->id) active-item @endif" href="{{ route('items_category_en', $a_menu->locales[2]->slug) }}">{{ $a_menu->locales[2]->name }}</a>@endif
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            @if(App::getLocale() == 'ru')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category_ru', $a_menu->locales[0]->slug) }}">{{ $a_menu->locales[0]->name }}</a>@endif
                                            @if(App::getLocale() == 'ua')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category', $a_menu->locales[1]->slug) }}">{{ $a_menu->locales[1]->name }}</a>@endif
                                            @if(App::getLocale() == 'en')<a class="nav-link dropdown-toggle @if(isset($category) && $category->id == $a_menu->id) active-item @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('items_category_en', $a_menu->locales[2]->slug) }}">{{ $a_menu->locales[2]->name }}</a>@endif
                                            <div class="dropdown-menu">
                                                <div class="container-fluid">
                                                    <div class="content-wrapper">
                                                        <div class="card-columns">
                                                            @foreach($a_menu->subcategories as $sub_cat)
                                                                @if($sub_cat->is_additional_menu)
                                                                    <div class="card">
                                                                        <ul>
                                                                            <li>
                                                                                @if(App::getLocale() == 'ru') <a href="{{ route('items_category_ru', $sub_cat->locales[0]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[0]->name }} </a> @endif
                                                                                @if(App::getLocale() == 'ua') <a href="{{ route('items_category', $sub_cat->locales[1]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[1]->name }} </a> @endif
                                                                                @if(App::getLocale() == 'en') <a href="{{ route('items_category_en', $sub_cat->locales[2]->slug) }}" class="dropdown-item @if(isset($category) && $category->id == $sub_cat->id) active-item @endif">@if(isset($sub_cat->preview))<img style="max-width: 20px;" src="{{ asset($sub_cat->preview->path) }}">@endif{{ $sub_cat->locales[2]->name }} </a> @endif
                                                                                @if(isset($sub_cat->subcategories) && count($sub_cat->subcategories))
                                                                                    <ul class="sub-menu-category">
                                                                                        @foreach($sub_cat->subcategories as $s_cat)
                                                                                            @if(App::getLocale() == 'ru')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category_ru', $s_cat->locales[0]->slug) }}">{{ $s_cat->locales[0]->name }}</a>@endif
                                                                                            @if(App::getLocale() == 'ua')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category', $s_cat->locales[1]->slug) }}">{{ $s_cat->locales[1]->name }}</a>@endif
                                                                                            @if(App::getLocale() == 'en')<a class="nav-link @if(isset($category) && $category->id == $s_cat->id) active-item @endif" href="{{ route('items_category_en', $s_cat->locales[2]->slug) }}">{{ $s_cat->locales[2]->name }}</a>@endif
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                        <form action="
@if(App::getLocale() == 'ru'){{ route('search_ru') }}@endif
                        @if(App::getLocale() == 'ua'){{ route('search') }}@endif
                        @if(App::getLocale() == 'en'){{ route('search_en') }}@endif
                                ">
                            <input type="text" name="search" placeholder="ПОИСК...">
                            <button class="nav-search icon-loupe" type="submit"></button>
                        </form>
                    </nav>
                </div>
            </div>

        @endif

@endif

</header>


<!--  ******  side-NAV CONTENT  ******  -->
<div class="modal-content right-nav">
<div class="right-nav-wrap">
<div class="modal-header">
<button type="button" class="search icon-loupe" data-toggle="modal" data-target="#SearchModalCenter"></button><button class="close-right-nav icon-right-arrow"><span aria-hidden="true"></span></button>
</div>
<div class="modal-body">
<ul class="right-nav-list">

    @if(Auth::check())
        <li>
            @if(App::getLocale() == 'ru')<a href="{{ route('profile_ru') }}">{{ trans('base.profile') }}</a>@endif
            @if(App::getLocale() == 'ua')<a href="{{ route('profile') }}">{{ trans('base.profile') }}</a>@endif
            @if(App::getLocale() == 'en')<a href="{{ route('profile_en') }}">{{ trans('base.profile') }}</a>@endif
        </li>
    @else

        <li>

            @if(App::getLocale() == 'ru')<a href="{{ route('login_ru') }}">{{ trans('base.login') }}</a>@endif
            @if(App::getLocale() == 'ua')<a href="{{ route('login') }}">{{ trans('base.login') }}</a>@endif
            @if(App::getLocale() == 'en')<a href="{{ route('login_en') }}">{{ trans('base.login') }}</a>@endif

        </li>

        <li>

            @if(App::getLocale() == 'ru')<a href="{{ route('register_ru') }}">{{ trans('base.register') }}</a>@endif
            @if(App::getLocale() == 'ua')<a href="{{ route('register') }}">{{ trans('base.register') }}</a>@endif
            @if(App::getLocale() == 'en')<a href="{{ route('register_en') }}">{{ trans('base.register') }}</a>@endif

        </li>
    @endif

    <li @if(Route::is('index_ru') || Route::is('index') || Route::is('index_en'))class="active" @endif>
        @if(App::getLocale() == 'ru')<a href="{{ route('index_ru') }}">{{ trans('base.home') }}</a>@endif
        @if(App::getLocale() == 'ua')<a href="{{ route('index') }}">{{ trans('base.home') }}</a>@endif
        @if(App::getLocale() == 'en')<a href="{{ route('index_en') }}">{{ trans('base.home') }}</a>@endif
    </li>
    @unless(Route::is('index') || Route::is('index_ua') || Route::is('index_en'))

        <li>
            @if(App::getLocale() == 'ru')<a href="{{ route('shop_ru') }}">{{ trans('base.shop') }}</a>@endif
            @if(App::getLocale() == 'ua')<a href="{{ route('shop') }}">{{ trans('base.shop') }}</a>@endif
            @if(App::getLocale() == 'en')<a href="{{ route('shop_en') }}">{{ trans('base.shop') }}</a>@endif
        </li>

    @else
        <li>
            @if(App::getLocale() == 'ru')<a href="{{ route('shop_ru') }}">{{ trans('base.shop') }}</a>@endif
            @if(App::getLocale() == 'ua')<a href="{{ route('shop') }}">{{ trans('base.shop') }}</a>@endif
            @if(App::getLocale() == 'en')<a href="{{ route('shop_en') }}">{{ trans('base.shop') }}</a>@endif
        </li>
        {{--<li><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ trans('base.shop') }}</a>--}}
            {{--<ul class="navbar-nav-sub dropdown-menu">--}}

                {{--@if(isset($parent_categories) && $parent_categories->count() > 0)--}}
                    {{--@foreach($parent_categories as $parent_category)--}}
                        {{--@if($parent_category->is_second_menu)--}}
                            {{--<li class="dropdown-item">--}}
                                {{--@if(App::getLocale() == 'ru' && $parent_category->locales[0])<a class="nav-link" href="{{ route('items_category_ru', $parent_category->locales[0]->slug) }}">{{ $parent_category->locales[0]->name }}</a>@endif--}}
                                {{--@if(App::getLocale() == 'ua' && $parent_category->locales[1])<a class="nav-link" href="{{ route('items_category', $parent_category->locales[1]->slug) }}">{{ $parent_category->locales[1]->name }}</a>@endif--}}
                                {{--@if(App::getLocale() == 'en' && $parent_category->locales[2])<a class="nav-link" href="{{ route('items_category_en', $parent_category->locales[2]->slug) }}">{{ $parent_category->locales[2]->name }}</a>@endif--}}
                            {{--</li>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--@endif--}}

            {{--<!--  ******  SECOND-NAV LINKS  ******  -->--}}
            {{--</ul>--}}
        {{--</li>--}}
    @endunless
    <li>
        @if(App::getLocale() == 'ru')<a href="{{ route('technologies_ru') }}">{{ trans('base.technologies') }}</a>@endif
        @if(App::getLocale() == 'ua')<a href="{{ route('technologies') }}">{{ trans('base.technologies') }}</a>@endif
        @if(App::getLocale() == 'en')<a href="{{ route('technologies_en') }}">{{ trans('base.technologies') }}</a>@endif
    </li>

    @if(isset($static_pages) && count($static_pages) > 0)
        @foreach($static_pages as $static_page)
            @if($static_page->page->is_second_menu)
                <li>
                    @if(App::getLocale() == 'ru')<a href="{{ route('front_static_pages_ru', $static_page->slug) }}">{{ $static_page->name }}</a>@endif
                    @if(App::getLocale() == 'ua')<a href="{{ route('front_static_pages', $static_page->slug) }}">{{ $static_page->name }}</a>@endif
                    @if(App::getLocale() == 'en')<a href="{{ route('front_static_pages_en', $static_page->slug) }}">{{ $static_page->name }}</a>@endif
                </li>
            @endif
        @endforeach
    @endif

        <li>
            @if(App::getLocale() == 'ru')<a href="{{ route('blog_ru') }}">{{ trans('base.blog') }}</a>@endif
            @if(App::getLocale() == 'ua')<a href="{{ route('blog') }}">{{ trans('base.blog') }}</a>@endif
            @if(App::getLocale() == 'en')<a href="{{ route('blog_en') }}">{{ trans('base.blog') }}</a>@endif
        </li>

    <li>
        @if(App::getLocale() == 'ru')<a href="{{ route('contacts_ru') }}">{{ trans('base.contacts') }}</a>@endif
        @if(App::getLocale() == 'ua')<a href="{{ route('contacts') }}">{{ trans('base.contacts') }}</a>@endif
        @if(App::getLocale() == 'en')<a href="{{ route('contacts_en') }}">{{ trans('base.contacts') }}</a>@endif
    </li>

</ul>
</div>
</div>
</div>
<!-- modal-content -->
<div class="right-nav-modal-screen"></div>
<!-- ||||||||||||||||||||||||||||||   _/Модальное окно правого меню   закончилось    ||||||||||||||||||||||||||||||||||||  -->
<!--  /////////////////////////////////////////////  Модальное окно поиска  ||||||||||||||||||||||||||||||||||   -->
<div class="modal fade search-modal" id="SearchModalCenter" tabindex="-1" role="dialog" aria-labelledby="SearchModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="
    @if(App::getLocale() == 'ru'){{ route('search_ru') }}@endif
    @if(App::getLocale() == 'ua'){{ route('search') }}@endif
    @if(App::getLocale() == 'en'){{ route('search_en') }}@endif
" method="get">
        <label><input type="text" name="search" placeholder="ПОИСК..."></label>
        <button type="submit" class="search search-modal  icon-loupe"></button>
    </form>

</div>
</div>
</div>
</div>
<!--  /////////////////////////////////////////////  Модальное окно поиска  ||||||||||||||||||||||||||||||||||   -->



<div class="modal fade modal-text-white" id="second-nav-panel" tabindex="-1" role="dialog" aria-labelledby="second-nav-panelTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="second-nav-panelTitle">{{ trans('base.navigation') }}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<!-- <div class="collapse second-nav-panel lg-down-hidden" id="second-nav"> -->
<ul class="navbar-nav mr-auto lg-down-hidden">

@if(App::getLocale() == 'ru')<a href="{{ route('index_ru') }}">{{ trans('base.home') }}</a>@endif
@if(App::getLocale() == 'ua')<a href="{{ route('index') }}">{{ trans('base.home') }}</a>@endif
@if(App::getLocale() == 'en')<a href="{{ route('index_en') }}">{{ trans('base.home') }}</a>@endif


    @if(isset($parent_categories) && $parent_categories->count() > 0)
        @foreach($parent_categories as $parent_category)
            @if($parent_category->is_second_menu)
                    @if(App::getLocale() == 'ru' && $parent_category->locales[0])<a href="{{ route('items_category_ru', $parent_category->locales[0]->slug) }}">{{ $parent_category->locales[0]->name }}</a>@endif
                    @if(App::getLocale() == 'ua' && $parent_category->locales[1])<a href="{{ route('items_category', $parent_category->locales[1]->slug) }}">{{ $parent_category->locales[1]->name }}</a>@endif
                    @if(App::getLocale() == 'en' && $parent_category->locales[2])<a href="{{ route('items_category_en', $parent_category->locales[2]->slug) }}">{{ $parent_category->locales[2]->name }}</a>@endif
            @endif
        @endforeach
    @endif

    @if(App::getLocale() == 'ru')<a href="{{ route('shop_ru') }}">{{ trans('base.shop') }}</a>@endif
    @if(App::getLocale() == 'ua')<a href="{{ route('shop') }}">{{ trans('base.shop') }}</a>@endif
    @if(App::getLocale() == 'en')<a href="{{ route('shop_en') }}">{{ trans('base.shop') }}</a>@endif

    @if(App::getLocale() == 'ru')<a href="{{ route('sale_ru') }}">{{ trans('base.sale') }}</a>@endif
    @if(App::getLocale() == 'ua')<a href="{{ route('sale') }}">{{ trans('base.sale') }}</a>@endif
    @if(App::getLocale() == 'en')<a href="{{ route('sale_en') }}">{{ trans('base.sale') }}</a>@endif

    @if(App::getLocale() == 'ru')<a href="{{ route('new_ru') }}">{{ trans('base.new') }}</a>@endif
    @if(App::getLocale() == 'ua')<a href="{{ route('new') }}">{{ trans('base.new') }}</a>@endif
    @if(App::getLocale() == 'en')<a href="{{ route('new_en') }}">{{ trans('base.new') }}</a>@endif

    @if(App::getLocale() == 'ru')<a href="{{ route('technologies_ru') }}">{{ trans('base.technologies') }}</a>@endif
    @if(App::getLocale() == 'ua')<a href="{{ route('technologies') }}">{{ trans('base.technologies') }}</a>@endif
    @if(App::getLocale() == 'en')<a href="{{ route('technologies_en') }}">{{ trans('base.technologies') }}</a>@endif

    @if(App::getLocale() == 'ru')<a href="{{ route('blog_ru') }}">{{ trans('base.blog') }}</a>@endif
    @if(App::getLocale() == 'ua')<a href="{{ route('blog') }}">{{ trans('base.blog') }}</a>@endif
    @if(App::getLocale() == 'en')<a href="{{ route('blog_en') }}">{{ trans('base.blog') }}</a>@endif

    @if(isset($static_pages) && count($static_pages) > 0)
        @foreach($static_pages as $static_page)
            @if($static_page->page->is_second_menu)

                    @if(App::getLocale() == 'ru')<a href="{{ route('front_static_pages_ru', $static_page->slug) }}">{{ $static_page->name }}</a>@endif
                    @if(App::getLocale() == 'ua')<a href="{{ route('front_static_pages', $static_page->slug) }}">{{ $static_page->name }}</a>@endif
                    @if(App::getLocale() == 'en')<a href="{{ route('front_static_pages_en', $static_page->slug) }}">{{ $static_page->name }}</a>@endif

            @endif
        @endforeach
    @endif

    @if(App::getLocale() == 'ru')<a href="{{ route('contacts_ru') }}">{{ trans('base.contacts') }}</a>@endif
    @if(App::getLocale() == 'ua')<a href="{{ route('contacts') }}">{{ trans('base.contacts') }}</a>@endif
    @if(App::getLocale() == 'en')<a href="{{ route('contacts_en') }}">{{ trans('base.contacts') }}</a>@endif

@if(Auth::check())
    <li>
        @if(App::getLocale() == 'ru')<a href="{{ route('profile_ru') }}">{{ trans('base.profile') }}</a>@endif
        @if(App::getLocale() == 'ua')<a href="{{ route('profile') }}">{{ trans('base.profile') }}</a>@endif
        @if(App::getLocale() == 'en')<a href="{{ route('profile_en') }}">{{ trans('base.profile') }}</a>@endif
    </li>
@else

    <li>

        @if(App::getLocale() == 'ru')<a href="{{ route('login_ru') }}">{{ trans('base.login') }}</a>@endif
        @if(App::getLocale() == 'ua')<a href="{{ route('login') }}">{{ trans('base.login') }}</a>@endif
        @if(App::getLocale() == 'en')<a href="{{ route('login_en') }}">{{ trans('base.login') }}</a>@endif

    </li>

    <li>

        @if(App::getLocale() == 'ru')<a href="{{ route('register_ru') }}">{{ trans('base.register') }}</a>@endif
        @if(App::getLocale() == 'ua')<a href="{{ route('register') }}">{{ trans('base.register') }}</a>@endif
        @if(App::getLocale() == 'en')<a href="{{ route('register_en') }}">{{ trans('base.register') }}</a>@endif

    </li>
@endif
</ul>
</div>
</div>
</div>
</div>