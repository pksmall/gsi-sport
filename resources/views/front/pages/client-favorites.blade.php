@extends('front/layout/front')

@section('content')

    <section class="account">
        <div class="container-pages">
            <div class="content-wrapper">
                <div class="accoutn-header">
                    <h2>{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Профиль</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Избранные товары</li>
                        </ol>
                    </nav>
                </div>

                @include('front/partials/profile-aside')

                <div class="account-body account-user-orders flex-column">
                    @if(isset($favorites) && $favorites->count() > 0)
                        @foreach($favorites as $favorite)
                            <div class="account-product-line">
                                <img src="{{ asset( isset($favorite->preview) ? $favorite->preview->path : 'images/no-image.svg') }}" alt="{{ $favorite->locales[0]->name }}">
                                <p class="account-product-line-description">{{ $favorite->locales[0]->name }}</p>
                                <span class="price-smol">
                                    @if(isset($config->exchange_rate)) {{ intval($favorite->price * $config->exchange_rate) }} @else {{ $favorite->price }} @endif
                                    грн.</span>

                                @if(App::getLocale() == 'ru')<a href="{{ route('item_ru', $favorite->locales[0]->slug) }}" class="send-white">{{ trans('item.view') }}</a>@endif
                                @if(App::getLocale() == 'ua')<a href="{{ route('item', $favorite->locales[0]->slug) }}" class="send-white">{{ trans('item.view') }}</a>@endif
                                @if(App::getLocale() == 'en')<a href="{{ route('item_en', $favorite->locales[0]->slug) }}" class="send-white">{{ trans('item.view') }}</a>@endif
                            </div>
                        @endforeach
                        {{ $favorites->links() }}
                    @else
                        <h3 class="hello-user">{{ trans('item.history_fav_empty')  }}</h3>
                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection