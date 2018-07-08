@extends('front/layout/front')

@section('content')

    <div class="cart-content cart-page static-new-page" style="padding-top: 0 !important;">
        @if($static_page->page->active_title)<div class="cart-header">
            <h2>{{ $static_page->name }}</h2>
        </div>@endif
        <div class="cart-body">

            @if($static_page->page->active_breadcrumbs)
                <nav aria-label="breadcrumb" class="breadcrumb-nav" style="padding-left: 0 !important;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            @if(App::getLocale() == 'ru')<a href="{{ route('index_ru') }}">{{ trans('base.home') }}</a>@endif
                            @if(App::getLocale() == 'ua')<a href="{{ route('index') }}">{{ trans('base.home') }}</a>@endif
                            @if(App::getLocale() == 'en')<a href="{{ route('index_en') }}">{{ trans('base.home') }}</a>@endif
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $static_page->name }}</li>
                    </ol>
                </nav>
            @endif


                {!! $static_page->description !!}


        </div>
    </div>

@endsection