@extends('front/layout/front')

@section('content')

    <section class="technologies-top-content container-pages">
        <article class="technologies-article content-wrapper">
            <div class="technologies-article-video-content">
                <a href="#" alt="play-video"></a>
                <img src="{{ asset('images/content/tehnologies/video_img_755_425.jpg') }}">
            </div>
            <div class="technologies-article-info-content">
                <h2>{!! trans('base.blog_title')  !!}</h2>
                <p>Lorem ipsum dolor sit amet, vel errem semper ocurreret ut. Veniam eripuit ex per, eum wisi oratio consequuntur ad. Sit eu mundi facilisis, at falli invidunt praesent has. Usu et viris civibus luptatum, ut mea esse aliquam, qui errem placerat gloriatur ei. Ex iuvaret discere dissentias mei</p>
            </div>
        </article>
    </section>

    <section class="technologies-accardeon">
        <div class="container-pages">
            <div class="content-wrapper">
                <aside class="aside aside-technologies aside-fixed">
                    <div id="accordion">


                        @if(isset($posts_categories))
                            <div class="card">
                                @foreach($posts_categories as $category)
                                    @if(!isset($category->category->parent_id))
                                        @if($category->category->is_active)

                                            @if(isset($category->category->subcategories) && count($category->category->subcategories))
                                                <div class="card-header" id="headingOne">
                                                    <a href="{{ route('blog_category', $category->slug) }}" class="icomoon-to-top accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        {{ $category->name }}
                                                    </a>
                                                </div>
                                                @foreach($category->category->subcategories as $subcategory)

                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <ul class="nav">
                                                                <li class="nav-item">
                                                                    @if(App::getLocale() == 'ru')<a class="nav-link" href="{{ route('blog_category_ru', $subcategory->locales[0]->slug) }}">{{ $subcategory->locales[0]->name }}</a>@endif
                                                                    @if(App::getLocale() == 'ua')<a class="nav-link" href="{{ route('blog_category', $subcategory->locales[1]->slug) }}">{{ $subcategory->locales[1]->name }}</a>@endif
                                                                    @if(App::getLocale() == 'en')<a class="nav-link" href="{{ route('blog_category_en', $subcategory->locales[2]->slug) }}">{{ $subcategory->locales[2]->name }}</a>@endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @else
                                                <div class="card-header" id="headingOne">
                                                    <a href="{{ route('blog_category', $category->slug) }}" class="accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        {{ $category->name }}
                                                    </a>
                                                </div>
                                            @endif

                                            {{--@if(App::getLocale() == 'ru')<li><a href="{{ route('blog_category', $category->slug) }}">{{ $category->name }}</a></li>@endif--}}
                                            {{--@if(App::getLocale() == 'ua')<li><a href="{{ route('blog_category_ua', $category->slug) }}">{{ $category->name }}</a></li>@endif--}}
                                            {{--@if(App::getLocale() == 'en')<li><a href="{{ route('blog_category_en', $category->slug) }}">{{ $category->name }}</a></li>@endif--}}
                                            {{----}}
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        @endif

                    </div>
                </aside>
                <div class="accardeon-content">
                    @if(isset($posts) && count($posts))
                    <div class="articles-block-content">
                            @foreach($posts as $post)
                                @if(App::getLocale() == 'ru')<a href="{{ route('post_ru', $post->slug) }}">@endif
                                    @if(App::getLocale() == 'ua')<a href="{{ route('post', $post->slug) }}">@endif
                                        @if(App::getLocale() == 'en')<a href="{{ route('post_en', $post->slug) }}">@endif
                                            <article>
                                                <img src="{{ asset( isset($post->post->preview) ? $post->post->preview->path : 'images/no-image.svg' ) }}" alt="">
                                                <div class="short-content">
                                                    <h3>{{ $post->name }}</h3>
                                                    <p>{!! $post->short_description !!}</p>
                                                </div>
                                            </article>
                                            @if(App::getLocale() == 'ru')</a>@endif
                                        @if(App::getLocale() == 'ua')</a>@endif
                                    @if(App::getLocale() == 'en')</a>@endif
                            @endforeach



                    </div>
                    {{ $posts->links() }}
                        @else
                        Нет записей в блоге!
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection