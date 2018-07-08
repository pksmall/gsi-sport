@extends('front/layout/front')

@if(isset($category->poster->path))
    @section('catalog-banner')
        <section class="catalog-baner" style="background: url({{ asset($category->poster->path) }}); background-repeat: no-repeat;">
            <div class="container-pages">
                <div class="content-wrapper">
                    <div class="baner-military-content">

                        @if(App::getLocale() == 'ru') <h2 class="orange-headline-2" style="margin-left: 0 !important;">{!! $category->locales[0]->name !!}</h2> @endif
                        @if(App::getLocale() == 'ua') <h2 class="orange-headline-2" style="margin-left: 0 !important;">{!! $category->locales[1]->name !!}</h2> @endif
                        @if(App::getLocale() == 'en') <h2 class="orange-headline-2" style="margin-left: 0 !important;">{!! $category->locales[2]->name !!}</h2> @endif
                        <h3>{{ trans('base.subtitle_clothes') }}</h3>

                        @if(Route::is('items_category_ru') || Route::is('items_category_en') || Route::is('items_category'))

                            <p>@if(App::getLocale() == 'ru') {!! $category->locales[0]->description !!} @endif
                            @if(App::getLocale() == 'ua') {!! $category->locales[1]->description !!} @endif
                            @if(App::getLocale() == 'en') {!! $category->locales[2]->description !!} @endif</p>

                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endsection
@endif

@section('content')

    @if(!isset($category->poster->path))
        @if(isset($title) && $title != null)
            <h2 class="orange-headline-2" style="margin-top: 20px;">{{ $title }}</h2>
        @elseif(isset($title) && $title == null)

            @if(App::getLocale() == 'ua')
                <h2 class="orange-headline-2" style="margin-top: 20px;">{{ $category->locales[0]->name }}</h2>
            @endif

            @if(App::getLocale() == 'ru')
                <h2 class="orange-headline-2" style="margin-top: 20px;">{{ $category->locales[1]->name }}</h2>
            @endif

            @if(App::getLocale() == 'en')
                <h2 class="orange-headline-2" style="margin-top: 20px;">{{ $category->locales[2]->name }}</h2>
            @endif

        @elseif(
    Route::is('shop_ru') || Route::is('shop') || Route::is('shop_en')
     || Route::is('filter_ru') || Route::is('filter') || Route::is('filter_en')
     )
            <h2 class="orange-headline-2" style="margin-top: 20px;">{{ trans('base.shop') }}</h2>
        @endif

    @endif
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">{{ trans('base.home') }}</a></li>
            @if(isset($title) && $title != null)<li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>@elseif(
    Route::is('shop_ru') || Route::is('shop') || Route::is('shop_en')
     || Route::is('filter_ru') || Route::is('filter') || Route::is('filter_en')
     )
                <li class="breadcrumb-item active" aria-current="page">{{ trans('base.shop') }}</li>
            @endif


            @if(isset($title) && $title == null)

                @if(App::getLocale() == 'ua')
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->locales[0]->name }}</li>
                @endif

                @if(App::getLocale() == 'ru')
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->locales[1]->name }}</li>
                @endif

                @if(App::getLocale() == 'en')
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->locales[2]->name }}</li>
                @endif

            @endif

        </ol>
    </nav>

    @if(
    Route::is('shop_ru') || Route::is('shop') || Route::is('shop_en'))


        <aside class="aside aside-catalog aside-fixed">
            <form id="filters" action="@if(App::getLocale() == 'ru'){{ route('filter_ru') }}@endif @if(App::getLocale() == 'ua'){{ route('filter') }}@endif @if(App::getLocale() == 'en'){{ route('filter_en') }}@endif" method="get">
                @if(isset($filters) && count($filters) > 0)
                    <?php $index = 1; ?>
                    @foreach($filters as $filter)
                        @if($filter->is_filter)
                            <select name="f[{{ $index++ }}]" id="{{ $filter->locales[0]->slug }}" class="filter custom-style">
                                                @if(App::getLocale() == 'ru')<option selected disabled>{{ $filter->locales[0]->name }}</option>@endif
                                                @if(App::getLocale() == 'ua')<option selected disabled>{{ $filter->locales[1]->name }}</option>@endif
                                                @if(App::getLocale() == 'en')<option selected disabled>{{ $filter->locales[2]->name }}</option>@endif
                                                @if($filter->terms_list->count() > 0)
                                                    @foreach($filter->terms_list as $term)
                                                        @if($term->is_active)
                                                            @if(App::getLocale() == 'ru')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[0]->name }}</option>@endif
                                                            @if(App::getLocale() == 'ua')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[1]->name }}</option>@endif
                                                            @if(App::getLocale() == 'en')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[2]->name }}</option>@endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                        @endif
                    @endforeach
                @endif
                <select name="sort" id="sort" class="filter custom-style">
                    <option selected disabled>{{ trans('item.sort_title') }}</option>
                    <option value="asc">{{ trans('item.sort_desc') }}</option>
                    <option value="price_asc">{{ trans('item.sort_price_asc') }}</option>
                    <option value="price_desc">{{ trans('item.sort_price_desc') }}</option>
                    <option value="">{{ trans('item.sort_popular') }}</option>
                    <option value="rating_asc">{{ trans('item.sort_rating_asc') }}</option>
                    <option value="rating_desc">{{ trans('item.sort_rating_desc') }}</option>
                </select>
                {{--<select name="qty" id="qty" class="filter custom-style">--}}
                {{--<option selected disabled>{{ trans('item.sort_qty') }}</option>--}}
                {{--<option value="20">20</option>--}}
                {{--<option value="50">50</option>--}}
                {{--<option value="80">80</option>--}}
                {{--<option value="100">100</option>--}}
                {{--</select>--}}
                <div class="filters-button-block" style="padding-left: 0 !important;">
                    <button class="send">{{ trans('item.sort_go') }}</button>
                    @if(App::getLocale() == 'ru')<a class="send" href="{{ route('shop_ru') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                    @if(App::getLocale() == 'ua')<a class="send" href="{{ route('shop') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                    @if(App::getLocale() == 'en')<a class="send" href="{{ route('shop_en') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                </div>
            </form>
        </aside>


        @endif
     @if(Route::is('filter_ru') || Route::is('filter') || Route::is('filter_en'))
    <aside class="aside aside-catalog aside-fixed">
        <form id="filters" action="@if(App::getLocale() == 'ru'){{ route('filter_ru') }}@endif @if(App::getLocale() == 'ua'){{ route('filter') }}@endif @if(App::getLocale() == 'en'){{ route('filter_en') }}@endif" method="get">
            @if(Route::is('filter_ru') || Route::is('filter') || Route::is('filter_en'))<input type="hidden" name="category_id" value="{{ $cat }}"/>@endif
            @if(isset($filters) && count($filters) > 0)
                <?php $index = 1; ?>
                @foreach($filters as $filter)
                    @if($filter->is_filter && $filter->only_categories)
                        @if(Route::is('filter_ru') || Route::is('filter') || Route::is('filter_en'))
                            @if(isset($attributes) && $attributes != null)
                                @foreach($attributes as $attr)
                                        @if(in_array($filter->id, $attr['only_categories']))
                                        <select name="f[{{ $index++ }}]" id="{{ $filter->locales[0]->slug }}" class="filter custom-style">
                                            @if(App::getLocale() == 'ru')<option selected disabled>{{ $filter->locales[0]->name }}</option>@endif
                                            @if(App::getLocale() == 'ua')<option selected disabled>{{ $filter->locales[1]->name }}</option>@endif
                                            @if(App::getLocale() == 'en')<option selected disabled>{{ $filter->locales[2]->name }}</option>@endif
                                            @if($filter->terms_list->count() > 0)
                                                @foreach($filter->terms_list as $term)
                                                    @if($term->is_active)
                                                        @if(App::getLocale() == 'ru')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[0]->name }}</option>@endif
                                                        @if(App::getLocale() == 'ua')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[1]->name }}</option>@endif
                                                        @if(App::getLocale() == 'en')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[2]->name }}</option>@endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @endif
                                @endforeach
                            @endif
                        @else
                                <select name="f[{{ $index++ }}]" id="{{ $filter->locales[0]->slug }}" class="filter custom-style">
                                    @if(App::getLocale() == 'ru')<option selected disabled>{{ $filter->locales[0]->name }}</option>@endif
                                    @if(App::getLocale() == 'ua')<option selected disabled>{{ $filter->locales[1]->name }}</option>@endif
                                    @if(App::getLocale() == 'en')<option selected disabled>{{ $filter->locales[2]->name }}</option>@endif
                                    @if($filter->terms_list->count() > 0)
                                        @foreach($filter->terms_list as $term)
                                            @if($term->is_active)
                                                @if(App::getLocale() == 'ru')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[0]->name }}</option>@endif
                                                @if(App::getLocale() == 'ua')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[1]->name }}</option>@endif
                                                @if(App::getLocale() == 'en')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[2]->name }}</option>@endif
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                        @endif
                    @endif
                @endforeach
            @endif
            <select name="sort" id="sort" class="filter custom-style">
                <option selected disabled>{{ trans('item.sort_title') }}</option>
                <option value="asc">{{ trans('item.sort_desc') }}</option>
                <option value="price_asc">{{ trans('item.sort_price_asc') }}</option>
                <option value="price_desc">{{ trans('item.sort_price_desc') }}</option>
                <option value="">{{ trans('item.sort_popular') }}</option>
                <option value="rating_asc">{{ trans('item.sort_rating_asc') }}</option>
                <option value="rating_desc">{{ trans('item.sort_rating_desc') }}</option>
            </select>
                {{--<select name="qty" id="qty" class="filter custom-style">--}}
                    {{--<option selected disabled>{{ trans('item.sort_qty') }}</option>--}}
                    {{--<option value="20">20</option>--}}
                    {{--<option value="50">50</option>--}}
                    {{--<option value="80">80</option>--}}
                    {{--<option value="100">100</option>--}}
                {{--</select>--}}
                <div class="filters-button-block" style="padding-left: 0 !important;">
                <button class="send">{{ trans('item.sort_go') }}</button>
                    @if(App::getLocale() == 'ru')<a class="send" href="{{ route('shop_ru') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                    @if(App::getLocale() == 'ua')<a class="send" href="{{ route('shop') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                    @if(App::getLocale() == 'en')<a class="send" href="{{ route('shop_en') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                </div>
        </form>
    </aside>
    @endif

    @if(Route::is('items_category_ru') || Route::is('items_category') || Route::is('items_category_en'))
        <aside class="aside aside-catalog aside-fixed">
            <form id="filters" action="@if(App::getLocale() == 'ru'){{ route('filter_ru') }}@endif @if(App::getLocale() == 'ua'){{ route('filter') }}@endif @if(App::getLocale() == 'en'){{ route('filter_en') }}@endif" method="get">
                <input type="hidden" name="category_id" value="{{ $category->id }}"/>
                @if(isset($filters) && count($filters) > 0)
                    <?php $index = 1; ?>
                    @foreach($filters as $filter)
                        @if($filter->is_filter)
                            @if(in_array($filter->id, $attributes))
                            <select name="f[{{ $index++ }}]" id="{{ $filter->locales[0]->slug }}" class="filter custom-style">
                                @if(App::getLocale() == 'ru')<option selected disabled>{{ $filter->locales[0]->name }}</option>@endif
                                @if(App::getLocale() == 'ua')<option selected disabled>{{ $filter->locales[1]->name }}</option>@endif
                                @if(App::getLocale() == 'en')<option selected disabled>{{ $filter->locales[2]->name }}</option>@endif
                                @if($filter->terms_list->count() > 0)
                                    @foreach($filter->terms_list as $term)
                                        @if($term->is_active)
                                            @if(App::getLocale() == 'ru')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[0]->name }}</option>@endif
                                            @if(App::getLocale() == 'ua')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[1]->name }}</option>@endif
                                            @if(App::getLocale() == 'en')<option value="{{ $term->id }}" @if(isset($active_filters) && in_array($term->id, $active_filters)) selected @endif>{{ $term->locales[2]->name }}</option>@endif
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @endif
                        @endif
                    @endforeach
                @endif
                <select name="sort" id="sort" class="filter custom-style">
                    <option selected disabled>{{ trans('item.sort_title') }}</option>
                    <option value="asc">{{ trans('item.sort_desc') }}</option>
                    <option value="price_asc">{{ trans('item.sort_price_asc') }}</option>
                    <option value="price_desc">{{ trans('item.sort_price_desc') }}</option>
                    <option value="">{{ trans('item.sort_popular') }}</option>
                    <option value="rating_asc">{{ trans('item.sort_rating_asc') }}</option>
                    <option value="rating_desc">{{ trans('item.sort_rating_desc') }}</option>
                </select>
                {{--<select name="qty" id="qty" class="filter custom-style">--}}
                    {{--<option selected disabled>{{ trans('item.sort_qty') }}</option>--}}
                    {{--<option value="20">20</option>--}}
                    {{--<option value="50">50</option>--}}
                    {{--<option value="80">80</option>--}}
                    {{--<option value="100">100</option>--}}
                {{--</select>--}}
                <br/>
                    <div class="filters-button-block" style="padding-left: 0 !important;">
                <button class="send">{{ trans('item.sort_go') }}</button>
                @if(App::getLocale() == 'ru')<a class="send" href="{{ route('shop_ru') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                @if(App::getLocale() == 'ua')<a class="send" href="{{ route('shop') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                @if(App::getLocale() == 'en')<a class="send" href="{{ route('shop_en') }}" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important;">{{ trans('item.sort_cancel') }}</a>@endif
                    </div>
            </form>
        </aside>
    @endif

        <div class="catalog">
            <div class="content-wrapper">
                @if(isset($items) && $items->count() > 0)
                    @foreach($items as $item)
                        <div class="card card-camotek">
                            @if(isset($item->is_sale) && $item->is_sale != null && \Carbon\Carbon::now() < $item->duration_sale)
                                @if(App::getLocale() == 'ru')<a href="{{ route('sale_ru') }}"><span class="action sale"></span></a>@endif
                                @if(App::getLocale() == 'ua')<a href="{{ route('sale') }}"><span class="action sale"></span></a>@endif
                                @if(App::getLocale() == 'en')<a href="{{ route('sale_en') }}"><span class="action sale"></span></a>@endif
                            @endif

                                @if(isset($item->duration_new) && $item->duration_new != null && \Carbon\Carbon::now() < $item->duration_new)
                                    @if(isset($item->is_sale) && $item->is_sale && \Carbon\Carbon::now() < $item->duration_sale)<div class="fix_noob_logic">@endif
                                    @if(App::getLocale() == 'ru')<a href="{{ route('new_ru') }}"><span class="action new"></span></a>@endif
                                    @if(App::getLocale() == 'ua')<a href="{{ route('new') }}"><span class="action new"></span></a>@endif
                                    @if(App::getLocale() == 'en')<a href="{{ route('new_en') }}"><span class="action new"></span></a>@endif
                                        @if(isset($item->is_sale) && $item->is_sale)</div>@endif
                                @endif

                            @if(App::getLocale() == 'ru' && isset($item->locales))<a href="{{ route('item_ru', $item->locales[0]->slug) }}"><img class="card-img-top" src="{{ asset( isset($item->preview) ? $item->preview->path : 'images/no-image.svg') }}" alt="{{ $item->locales[0]->name }}"></a>@endif
                            @if(App::getLocale() == 'ua' && isset($item->locales))<a href="{{ route('item', $item->locales[1]->slug) }}"><img class="card-img-top" src="{{ asset( isset($item->preview) ? $item->preview->path : 'images/no-image.svg') }}" alt="{{ $item->locales[1]->name }}"></a>@endif
                            @if(App::getLocale() == 'en' && isset($item->locales))<a href="{{ route('item_en', $item->locales[2]->slug) }}"><img class="card-img-top" src="{{ asset( isset($item->preview) ? $item->preview->path : 'images/no-image.svg') }}" alt="{{ $item->locales[2]->name }}"></a>@endif
                            <div class="card-body">
                                <p class="card-text">
                                    @if(App::getLocale() == 'ru' && isset($item->locales))<a href="{{ route('item_ru', $item->locales[0]->slug) }}">{{ $item->locales[0]->name }}</a>@endif
                                    @if(App::getLocale() == 'ua' && isset($item->locales))<a href="{{ route('item', $item->locales[1]->slug) }}">{{ $item->locales[1]->name }}</a>@endif
                                    @if(App::getLocale() == 'en' && isset($item->locales))<a href="{{ route('item_en', $item->locales[2]->slug) }}">{{ $item->locales[2]->name }}</a>@endif
                                </p>
                                <span class="price-smol">
                                    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->hasRole('3'))
                                        @if(isset($config->exchange_rate)){{ intval($item->whs_price * $config->exchange_rate) }}@else{{ $item->whs_price }}@endif грн @if(isset($item->old_price))<sup><s> {{ intval($item->old_price * $config->exchange_rate) }} грн</s></sup>@endif
                                    @else
                                        @if(isset($config->exchange_rate)){{ intval($item->price * $config->exchange_rate) }}@else{{ $item->price }}@endif грн @if(isset($item->old_price))<sup><s> {{ intval($item->old_price * $config->exchange_rate) }} грн</s></sup>@endif
                                    @endif
                                </span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="msg-empty-cart" role="alert">
                        {{ trans('item.not_exist') }}
                    </p>
                @endif

            </div>
            {{ $items->links() }}
        </div>

@endsection
