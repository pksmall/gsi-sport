@extends('front/layout/front')

@section('content')
    <section class="order order-accept">
        <div class="container-pages">
            <div class="content-wrapper">
                <div class="order-header">
                    <h2>{{ $title }}</h2>
                </div>
            </div>
        </div>
        <div class="container-pages">
            <div class="content-wrapper">
                <div class="order-info">
                    <p>{{ trans('item.order_success_info') }}</p>
                    <p>{{ trans('item.order_success_thx') }}</p>

                    @if(App::getLocale() == 'ru')<a href="{{ route('shop_ru') }}" class="send">{{ trans('item.go_shop') }}</a>@endif
                    @if(App::getLocale() == 'ua')<a href="{{ route('shop') }}" class="send">{{ trans('item.go_shop') }}</a>@endif
                    @if(App::getLocale() == 'en')<a href="{{ route('shop_en') }}" class="send">{{ trans('item.go_shop') }}</a>@endif

                </div>
            </div>
        </div>
    </section>
@endsection