<aside class="aside aside-account aside-fixed">
    <nav class="nav flex-column">
        @if(App::getLocale() == 'ru')<a class="nav-link @if(Route::is('profile') || Route::is('profile_ru') || Route::is('profile_en')) active @endif" href="{{ route('profile_ru') }}">{{ trans('item.profile_aside_info') }}</a>@endif
        @if(App::getLocale() == 'ua')<a class="nav-link @if(Route::is('profile') || Route::is('profile_ru') || Route::is('profile_en')) active @endif" href="{{ route('profile') }}">{{ trans('item.profile_aside_info') }}</a>@endif
        @if(App::getLocale() == 'en')<a class="nav-link @if(Route::is('profile') || Route::is('profile_ru') || Route::is('profile_en')) active @endif" href="{{ route('profile_en') }}">{{ trans('item.profile_aside_info') }}</a>@endif

            @if(App::getLocale() == 'ru')<a class="nav-link @if(Route::is('addresses') || Route::is('addresses_ru') || Route::is('addresses_en')) active @endif" href="{{ route('addresses_ru') }}">{{ trans('item.profile_aside_address') }}</a>@endif
            @if(App::getLocale() == 'ua')<a class="nav-link @if(Route::is('addresses') || Route::is('addresses_ru') || Route::is('addresses_en')) active @endif" href="{{ route('addresses') }}">{{ trans('item.profile_aside_address') }}</a>@endif
            @if(App::getLocale() == 'en')<a class="nav-link @if(Route::is('addresses') || Route::is('addresses_ru') || Route::is('addresses_en')) active @endif" href="{{ route('addresses_en') }}">{{ trans('item.profile_aside_address') }}</a>@endif

            @if(App::getLocale() == 'ru')<a class="nav-link @if(Route::is('my_orders') || Route::is('my_orders_ru') || Route::is('my_orders_en')) active @endif" href="{{ route('my_orders_ru') }}">{{ trans('item.profile_aside_orders') }}</a>@endif
            @if(App::getLocale() == 'ua')<a class="nav-link @if(Route::is('my_orders') || Route::is('my_orders_ru') || Route::is('my_orders_en')) active @endif" href="{{ route('my_orders') }}">{{ trans('item.profile_aside_orders') }}</a>@endif
            @if(App::getLocale() == 'en')<a class="nav-link @if(Route::is('my_orders') || Route::is('my_orders_ru') || Route::is('my_orders_en')) active @endif" href="{{ route('my_orders_en') }}">{{ trans('item.profile_aside_orders') }}</a>@endif

            @if(App::getLocale() == 'ru')<a class="nav-link @if(Route::is('my_favorites') || Route::is('my_favorites_ru') || Route::is('my_favorites_en')) active @endif" href="{{ route('my_favorites_ru') }}">{{ trans('item.profile_aside_fav') }}</a>@endif
            @if(App::getLocale() == 'ua')<a class="nav-link @if(Route::is('my_favorites') || Route::is('my_favorites_ru') || Route::is('my_favorites_en')) active @endif" href="{{ route('my_favorites') }}">{{ trans('item.profile_aside_fav') }}</a>@endif
            @if(App::getLocale() == 'en')<a class="nav-link @if(Route::is('my_favorites') || Route::is('my_favorites_ru') || Route::is('my_favorites_en')) active @endif" href="{{ route('my_favorites_en') }}">{{ trans('item.profile_aside_fav') }}</a>@endif

            @if(App::getLocale() == 'ru')<a class="nav-link @if(Route::is('my_subscribe') || Route::is('my_subscribe_ru') || Route::is('my_subscribe_en')) active @endif" href="{{ route('my_subscribe_ru') }}">{{ trans('item.profile_aside_subs') }}</a>@endif
            @if(App::getLocale() == 'ua')<a class="nav-link @if(Route::is('my_subscribe') || Route::is('my_subscribe_ru') || Route::is('my_subscribe_en')) active @endif" href="{{ route('my_subscribe') }}">{{ trans('item.profile_aside_subs') }}</a>@endif
            @if(App::getLocale() == 'en')<a class="nav-link @if(Route::is('my_subscribe') || Route::is('my_subscribe_ru') || Route::is('my_subscribe_en')) active @endif" href="{{ route('my_subscribe_en') }}">{{ trans('item.profile_aside_subs') }}</a>@endif
    </nav>
</aside>