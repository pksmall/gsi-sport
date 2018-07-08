@if(isset($slides) && count($slides) > 0)
    <div id="carousel-front" class="carousel carousel-fade" data-ride="carousel">
        <div class="carousel-inner">

            <?php $index = 0; ?>
            @foreach($slides as $slide)

                    <div class="carousel-item @if($index == 0) active @endif">
                        <div class="carousel-video-img-bg-holder">
                <?php

                        $i_slide = substr($slide->slide_asset->path, -4);

                        if (isset($i_slide))
                        {
                            if ($i_slide == '.3gp' || $i_slide == '.mp4' || $i_slide == '.avi') { ?>

                            <video autoplay loop>
                                <source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
                                <source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4">
                            </video>

                           <?php } else { ?>
                    <img class="" src="{{ asset( $slide->slide_asset->path ) }}">
                           <?php
                            }
                        }

                    ?>

                <!--  ************  -->
                </div>
                <div class="carousel-net-bg-holder"></div>
                <div class="carousel-caption">
                @if(App::getLocale() == 'ua')<h2>{{ $slide->locales[1]->name }}</h2>@endif
                @if(App::getLocale() == 'ru')<h2>{{ $slide->locales[0]->name }}</h2>@endif
                @if(App::getLocale() == 'en')<h2>{{ $slide->locales[2]->name }}</h2>@endif



                @if(App::getLocale() == 'ua' && isset($slide->locales[1]->description)){!! $slide->locales[1]->description !!}@endif
                @if(App::getLocale() == 'ru' && isset($slide->locales[0]->description)){!! $slide->locales[0]->description !!}@endif
                @if(App::getLocale() == 'en' && isset($slide->locales[2]->description)){!! $slide->locales[2]->description !!}@endif

@if(App::getLocale() == 'ru')
                        @if(isset($slide->locales[1]->link))
                            <br/>
                            <br/>
                            <br/>
                            <a class="send" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important; z-index: 400 !important;" href="{{ $slide->locales[1]->link }}">{{ trans('base.go_link_slider') }}</a>
                        @endif
@endif

@if(App::getLocale() == 'ua')
                        @if(isset($slide->locales[0]->link))
                            <br/>
                            <br/>
                            <br/>
                            <a class="send" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important; z-index: 400 !important;" href="{{ $slide->locales[0]->link }}">{{ trans('base.go_link_slider') }}</a>
                        @endif
@endif

@if(App::getLocale() == 'en')
                        @if(isset($slide->locales[2]->link))
                            <br/>
                            <br/>
                            <br/>
                            <a class="send" style="padding: 9px 15px 9px 55px !important; color: #F2A809 !important; z-index: 400 !important;" href="{{ $slide->locales[2]->link }}">{{ trans('base.go_link_slider') }}</a>
                        @endif
@endif

</div>
</div>
<?php $index++; ?>

@endforeach

</div>

<div class="carousel-control-holder">
    @if(isset($slides) && count($slides) > 0)
<ol class="carousel-indicators">
    @for($slide_i = 0; $slide_i < count($slides); $slide_i++)
        <li data-target="#carousel-front" data-slide-to="{{ $slide_i }}" @if($slide_i == 0)class="active"@endif></li>
    @endfor
</ol>
    @endif
<div class="carousel-progress-bar">
<div class="transition-timer-carousel-progress-bar">
</div>
</div>
<a class="carousel-control carousel-control-next" href="#carousel-front" role="button" data-slide="next">
<span class="icomoon-to-top" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
<a class="carousel-control carousel-control-prev" href="#carousel-front" role="button" data-slide="prev">
<span class="icomoon-to-bottom" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
</div>

</div>

@endif