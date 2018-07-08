@extends('front/layout/front')

@section('content')
    <section class="technologies-top-content container-pages">
        <article class="technologies-article content-wrapper">
            <div class="technologies-article-video-content">
                <a href="#" alt="play-video"></a>
                <img src="{{ asset('images/content/tehnologies/video_img_755_425.jpg') }}">
            </div>
            <div class="technologies-article-info-content">
                <h2>{!! trans('base.technologies_title')  !!}</h2>
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
                                    @if(!isset($category->parent_id))
                                        @if($category->is_active)

                                            @if(isset($category->subcategory))
                                                <div class="card-header" id="headingOne">
                                                    @if(App::getLocale() == 'ru')
                                                    <a href="#" data-href="{{ route('technology_category_ru', $category->locales[0]->slug) }}" class="icomoon-to-top accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        {{ $category->locales[0]->name }}
                                                    </a>
                                                    @endif
                                                        @if(App::getLocale() == 'ua')
                                                            <a href="#" data-href="{{ route('technology_category', $category->locales[1]->slug) }}" class="icomoon-to-top accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                {{ $category->locales[1]->name }}
                                                            </a>
                                                        @endif
                                                        @if(App::getLocale() == 'en')
                                                            <a href="#" data-href="{{ route('technology_category_en', $category->locales[2]->slug) }}" class="icomoon-to-top accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                {{ $category->locales[2]->name }}
                                                            </a>
                                                        @endif
                                                </div>
                                                @foreach($category->subcategory as $subcategory)

                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <ul class="nav">
                                                                <li class="nav-item">
                                                                    @if(App::getLocale() == 'ru')<a class="nav-link" href="#" data-href="{{ route('technology_category_ru', $subcategory->locales[0]->slug) }}">{{ $subcategory->locales[0]->name }}</a>@endif
                                                                    @if(App::getLocale() == 'ua')<a class="nav-link" href="#" data-href="{{ route('technology_category', $subcategory->locales[1]->slug) }}">{{ $subcategory->locales[1]->name }}</a>@endif
                                                                    @if(App::getLocale() == 'en')<a class="nav-link" href="#" data-href="{{ route('technology_category_en', $subcategory->locales[2]->slug) }}">{{ $subcategory->locales[2]->name }}</a>@endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @else
                                                <div class="card-header" id="headingOne">
                                                    @if(App::getLocale() == 'ru')
                                                    <a href="#" data-href="{{ route('technology_category_ru', $category->locales[0]->slug) }}" class="accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        {{ $category->locales[0]->name }}
                                                    </a>
                                                    @endif
                                                        @if(App::getLocale() == 'ua')
                                                            <a href="#" data-href="{{ route('technology_category', $category->locales[1]->slug) }}" class="accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                {{ $category->locales[1]->name }}
                                                            </a>
                                                        @endif
                                                        @if(App::getLocale() == 'en')
                                                            <a href="#" data-href="{{ route('technology_category_en', $category->locales[2]->slug) }}" class="accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                {{ $category->locales[2]->name }}
                                                            </a>
                                                        @endif
                                                </div>
                                            @endif

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
                                @if(App::getLocale() == 'ru')<a href="{{ route('technology_ru', $post->locales[0]->slug) }}">@endif
                                    @if(App::getLocale() == 'ua')<a href="{{ route('technology', $post->locales[1]->slug) }}">@endif
                                        @if(App::getLocale() == 'en')<a href="{{ route('technology_en', $post->locales[2]->slug) }}">@endif
                                            <article>
                                                <img src="{{ asset( isset($post->preview) ? $post->preview->path : 'images/no-image.svg' ) }}" alt="">
                                                <div class="short-content">
                                                    @if(App::getLocale() == 'ru')<h3>{{ $post->locales[0]->name }}</h3>@endif
                                                    @if(App::getLocale() == 'ua')<h3>{{ $post->locales[1]->name }}</h3>@endif
                                                    @if(App::getLocale() == 'en')<h3>{{ $post->locales[2]->name }}</h3>@endif
                                                    @if(App::getLocale() == 'ru')<p>{!! $post->locales[0]->short_description  !!}</p>@endif
                                                    @if(App::getLocale() == 'ua')<p>{!!  $post->locales[1]->short_description  !!}</p>@endif
                                                    @if(App::getLocale() == 'en')<p>{!!  $post->locales[2]->short_description  !!}</p>@endif
                                                </div>
                                            </article>
                                            @if(App::getLocale() == 'ru')</a>@endif
                                        @if(App::getLocale() == 'ua')</a>@endif
                                    @if(App::getLocale() == 'en')</a>@endif
                            @endforeach



                        </div>
                        {{ $posts->links() }}
                    @else
                        Нет технологий!
                    @endif
                </div>
            </div>
        </div>
    </section>


@endsection

@section('after-script')
    <script>

        $(document).ready(function () {
          $('#accordion a').click(function (e) {
            e.preventDefault();
            $('.articles-block-content').text('');
            $.get($(this).attr('data-href'), function(data, status){
              data.posts_category.forEach(function (item) {
                $('.articles-block-content').append('<a href="' + item.link + '"><article><img src="' + item.poster + '" alt=""><div class="short-content"><h3>' + item.title + '</h3><p>' + item.short_description + '</p></div></article></a>');
              });
            });
          });
        });

    </script>
@endsection