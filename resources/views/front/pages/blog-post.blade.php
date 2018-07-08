@extends('front/layout/front')

@section('content')
    <section class="technology-sliders">
        <article class="technology-article container-pages">
            <div class="technology-article-body content-wrapper">
                <div class="technology-article-info-content">
                    <h2>{{ $post->name }}</h2>
                    <p>{!! $post->short_description !!}</p>
                </div>
                <div class="technology-article-slider-content">
                    <div id="technology-article-slider" class="carousel slide" data-ride="carousel">
                        @if(isset($post->post->gallery) && $post->post->gallery != null)
                            <div class="carousel-inner">
                                <?php $index = 0; ?>
                                @foreach($post->post->gallery as $gallery)
                                <div class="carousel-item @if($index == 0) active @endif">
                                    <img src="{{ asset($gallery->path) }}" alt="First slide">
                                </div>
                                <?php $index++; ?>
                                @endforeach
                            </div>
                        @endif
                        @if(isset($post->post->gallery) && count($post->post->gallery) < 1 && isset($post->post->preview) && $post->post->preview != null)
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset($post->post->preview->path) }}" alt="First slide">
                                </div>
                            </div>
                        @endif
                            @if(isset($post->post->gallery) && count($post->post->gallery) < 1 && !isset($post->post->preview) && $post->post->preview == null)
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/no-image.svg') }}" alt="First slide">
                                    </div>
                                </div>
                            @endif
                        @if(isset($post->post->gallery) && $post->post->gallery != null && $post->post->gallery->count() > 1)
                        <div class="slider-controls-holder">
                            <a class="carousel-control-prev icomoon-to-left" href="#technology-article-slider" role="button" data-slide="prev">

                            </a>
                            <ol class="carousel-indicators">

                                <?php $index = 0; ?>
                                @foreach($post->post->gallery as $gallery)
                                    <li data-target="#technology-article-slider" data-slide-to="{{ $index }}" @if($index == 0) class="active" @endif></li>
                                    <?php $index++; ?>
                                @endforeach

                            </ol>
                            <a class="carousel-control-next icomoon-to-right" href="#technology-article-slider" role="button" data-slide="next">

                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="technology-article-links">
                        <p>
                            {{ $post->post->created_at->format('m.d.Y') }}
                            <script type="text/javascript">(function() {
                                if (window.pluso)if (typeof window.pluso.start == "function") return;
                                if (window.ifpluso==undefined) { window.ifpluso = 1;
                                  var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                  s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                  s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                                  var h=d[g]('body')[0];
                                  h.appendChild(s);
                                }})();</script>
                            <style>.pluso{margin-top: -2px !important; margin-left: 5px !important;} .pluso-more{display: none !important;}</style>
                        <div class="pluso" data-background="transparent" data-options="small,round,line,horizontal,nocounter,theme=05" data-services="facebook,twitter,google,email"></div>
                        </p>
                    </div>
                </div>
            </div>
        </article>
        <div class="technology-middle-slider container-pages">
            <div id="technology-middle-slider" class="carousel slide" data-ride="carousel">
                {!! $post->description !!}
                {{--<div class="carousel-inner">--}}
                    {{--<div class="carousel-item first-item active" data-name="клей">--}}
                        {{--<h3>клей</h3>--}}
                        {{--<div class="content-wrapper">--}}
                            {{--<div class="left-column">--}}

                                {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>--}}
                            {{--</div>--}}
                            {{--<div class="right-column">--}}
                                {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="carousel-item" data-name="строчка">--}}
                        {{--<h3>строчка</h3>--}}
                        {{--<div class="content-wrapper">--}}
                            {{--<div class="left-column">--}}

                                {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>--}}
                            {{--</div>--}}
                            {{--<div class="right-column">--}}
                                {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="carousel-item" data-name="шов">--}}
                        {{--<h3>шов</h3>--}}
                        {{--<div class="content-wrapper">--}}
                            {{--<div class="left-column">--}}

                                {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>--}}
                            {{--</div>--}}
                            {{--<div class="right-column">--}}
                                {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="carousel-item last-item" data-name="вязь">--}}
                        {{--<h3>вязь</h3>--}}
                        {{--<div class="content-wrapper">--}}

                            {{--<div class="left-column">--}}

                                {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>--}}
                            {{--</div>--}}
                            {{--<div class="right-column">--}}
                                {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="slider-controls-holder">--}}
                    {{--<a class="carousel-control-prev icomoon-to-left" href="#technology-middle-slider" role="button" data-slide="prev">--}}

                    {{--</a>--}}
                    {{--<div class="control-line"></div>--}}
                    {{--<!--  <ol class="carousel-indicators">--}}
                        {{--<li data-target="#technology-middle-slider" data-slide-to="0" class="active"></li>--}}
                        {{--<li data-target="#technology-middle-slider" data-slide-to="1"></li>--}}
                        {{--<li data-target="#technology-middle-slider" data-slide-to="2"></li>--}}
                        {{--<li data-target="#technology-middle-slider" data-slide-to="3"></li>--}}
                    {{--</ol> -->--}}
                    {{--<a class="carousel-control-next icomoon-to-right" href="#technology-middle-slider" role="button" data-slide="next">--}}

                    {{--</a>--}}
                {{--</div>--}}
            </div>
            <div class="num">
            </div>
        </div>
    </section>

    @if(isset($post->post->recommended_items) && $post->post->recommended_items->count() > 0)
        <section id="product-extra" class="product-extra">

            <div class="container-pages">
                <div class="content-wrapper-non-col">
                    <h2>{{ trans('item.recommended') }}</h2>
                </div>
                <div class="content-wrapper">
                    @foreach($post->post->recommended_items as $recommended_item)
                        <div class="card card-camotek">

                            @if(App::getLocale() == 'ru' && isset($recommended_item->locales))<a href="{{ route('item_ru', $recommended_item->locales[0]->slug) }}"><img class="card-img-top" src="{{ asset('images/content/card_extra/extra11.png') }}" alt="{{ $recommended_item->locales[0]->name }}"></a>@endif
                            @if(App::getLocale() == 'ua' && isset($recommended_item->locales))<a href="{{ route('item', $recommended_item->locales[1]->slug) }}"><img class="card-img-top" src="{{ asset('images/content/card_extra/extra11.png') }}" alt="{{ $recommended_item->locales[1]->name }}"></a>@endif
                            @if(App::getLocale() == 'en' && isset($recommended_item->locales))<a href="{{ route('item_en', $recommended_item->locales[2]->slug) }}"><img class="card-img-top" src="{{ asset('images/content/card_extra/extra11.png') }}" alt="{{ $recommended_item->locales[2]->name }}"></a>@endif

                            <div class="card-body">
                                <p class="card-text">
                                    @if(App::getLocale() == 'ru' && isset($recommended_item->locales))<a href="{{ route('item_ru', $recommended_item->locales[0]->slug) }}">{{ $recommended_item->locales[0]->name }}</a>@endif
                                    @if(App::getLocale() == 'ua' && isset($recommended_item->locales))<a href="{{ route('item', $recommended_item->locales[1]->slug) }}">{{ $recommended_item->locales[1]->name }}</a>@endif
                                    @if(App::getLocale() == 'en' && isset($recommended_item->locales))<a href="{{ route('item_en', $recommended_item->locales[2]->slug) }}">{{ $recommended_item->locales[2]->name }}</a>@endif
                                </p>
                                <span class="price-smol">@if(isset($config->exchange_rate)){{ intval($recommended_item->price * $config->exchange_rate) }}@else{{ $recommended_item->price }}@endif грн</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
    @endif

    {{--<section class="technology-form container-pages form-camo-tek">--}}
        {{--<h4>Оставить свой отзыв</h4>--}}

        {{--<div class="content-wrapper">--}}
            {{--<form action="script.php" method="">--}}
                {{--<textarea name="msgs" placeholder="Коментарий"></textarea>--}}
                {{--<input type="text" name="name" placeholder="Имя">--}}
                {{--<input type="email" name="email" placeholder="e-mail">--}}
                {{--<button class="send" type="submit">Отправить</button>--}}
            {{--</form>--}}
        {{--</div>--}}

    {{--</section>--}}
    <br/>
    <br/>

    <div class="wrap-section" style="width: 100%;">
        <section class="technology-form container-pages form-camo-tek">

            <h4>{{ trans('item.tech_review_title') }}</h4>

            <div class="content-wrapper">
                <form action="#" method="post">
                    <textarea name="msgs" placeholder="Коментарий"></textarea>
                    <input type="text" name="name" placeholder="Имя">
                    <input type="email" name="email" placeholder="e-mail">
                    <button class="send" type="submit">Отправить</button>
                </form>
            </div>

        </section>
    </div>
@endsection