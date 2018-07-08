@extends('front/layout/front')

@section('content')

    <div class="cart-content cart-page static-new-page" style="padding-top: 0 !important;">
        <div class="cart-header">
            <h2>{{ trans('item.ban_title') }}</h2>
        </div>
        <div class="cart-body">

            <nav aria-label="breadcrumb" class="breadcrumb-nav" style="padding-left: 0 !important;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        @if(App::getLocale() == 'ru')<a href="{{ route('index_ru') }}">{{ trans('base.home') }}</a>@endif
                        @if(App::getLocale() == 'ua')<a href="{{ route('index') }}">{{ trans('base.home') }}</a>@endif
                        @if(App::getLocale() == 'en')<a href="{{ route('index_en') }}">{{ trans('base.home') }}</a>@endif
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('item.ban_title') }}</li>
                </ol>
            </nav>

            <p>{{ trans('item.ban_desc') }}</p>

        </div>
    </div>

@endsection