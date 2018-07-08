@extends('front/layout/front')

@section('content')

    <h1>{{ $title }}</h1>

    <section class="technologies-accardeon">
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
                                                <a href="{{ route('technology_category_ru', $category->locales[0]->slug) }}" class="icomoon-to-top accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ $category->locales[0]->name }}
                                                </a>
                                            @endif
                                            @if(App::getLocale() == 'ua')
                                                <a href="{{ route('technology_category', $category->locales[1]->slug) }}" class="icomoon-to-top accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ $category->locales[1]->name }}
                                                </a>
                                            @endif
                                            @if(App::getLocale() == 'en')
                                                <a href="{{ route('technology_category_en', $category->locales[2]->slug) }}" class="icomoon-to-top accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ $category->locales[2]->name }}
                                                </a>
                                            @endif
                                        </div>
                                        @foreach($category->subcategory as $subcategory)

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <ul class="nav">
                                                        <li class="nav-item">
                                                            @if(App::getLocale() == 'ru')<a class="nav-link" href="{{ route('technology_category_ru', $subcategory->locales[0]->slug) }}">{{ $subcategory->locales[0]->name }}</a>@endif
                                                            @if(App::getLocale() == 'ua')<a class="nav-link" href="{{ route('technology_category', $subcategory->locales[1]->slug) }}">{{ $subcategory->locales[1]->name }}</a>@endif
                                                            @if(App::getLocale() == 'en')<a class="nav-link" href="{{ route('technology_category_en', $subcategory->locales[2]->slug) }}">{{ $subcategory->locales[2]->name }}</a>@endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        @endforeach
                                    @else
                                        <div class="card-header" id="headingOne">
                                            @if(App::getLocale() == 'ru')
                                                <a href="{{ route('technology_category_ru', $category->locales[0]->slug) }}" class="accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ $category->locales[0]->name }}
                                                </a>
                                            @endif
                                            @if(App::getLocale() == 'ua')
                                                <a href="{{ route('technology_category', $category->locales[1]->slug) }}" class="accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ $category->locales[1]->name }}
                                                </a>
                                            @endif
                                            @if(App::getLocale() == 'en')
                                                <a href="{{ route('technology_category_en', $category->locales[2]->slug) }}" class="accordion-parent-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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

            @if(isset($posts_category->category->technologies) && count($posts_category->category->technologies))
                <div class="articles-block-content">
                @foreach($posts_category->category->technologies as $post)
                    @if(App::getLocale() == 'ru')<a href="{{ route('technology_ru', $post->locales[0]->slug) }}">@endif
                        @if(App::getLocale() == 'ua')<a href="{{ route('technology', $post->locales[1]->slug) }}">@endif
                            @if(App::getLocale() == 'en')<a href="{{ route('technology_en', $post->locales[2]->slug) }}">@endif
                                <article>
                                    <img src="{{ asset('/images/content/technology/technology_img1_742_393.jpg') }}" alt="">
                                    <div class="short-content">
                                        <h3>{{ $post->locales[0]->name }}</h3>
                                        {!! $post->locales[0]->short_description  !!}
                                    </div>
                                </article>
                                @if(App::getLocale() == 'ru')</a>@endif
                            @if(App::getLocale() == 'ua')</a>@endif
                        @if(App::getLocale() == 'en')</a>@endif
                @endforeach
                </div>
            @else
                Нет технологий в категории!
            @endif
        </div>
    </section>
@endsection