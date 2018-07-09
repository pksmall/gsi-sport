@extends('front/layout/front')
@section('content')

	<div class="page-wrap main-page">
        <!-- header -->
        @include('front/parts/header')
        <!-- sidebar -->
        @include('front/parts/sidebar')

        <!-- right-nav & footer -->
        @include('front/parts/rightnav')

        <!-- sliders -->
		<div class="carousel main-carousel" id="main-carousel">
			@if(isset($slides) && count($slides) > 0)
				@foreach($slides as $slide)
					<?php $mTitle = explode("-", $slide->locales[0]->name); ?>
					<div class="carousel-item">
						<div class="container">
							<div class="row">
								<div class="item-wrap">
									<div class="title">
										<!-- <h1><span class="blue"><span>G</span><span>S</span><span>I&nbsp;</span></span><span><span class="z-index-up">S</span><span class="z-index-up">P</span><span>O</span><span class="z-index-up">R</span><span class="z-index-up">T</span></span> -->

										@if($slide->locales[0]->is_span)
											<?php $sTitle = explode(" ", $mTitle[0]); ?>
											<h1><span class="blue z-index-up">{{ $sTitle[0] }}</span> <span class="z-index-up"> {{ $sTitle[1] }} </span></h1><small class="z-index-up">{{ $mTitle[1] }}</small>
										@else
											<h1><span class="z-index-up">{{ $mTitle[0] }}</span></h1><small class="z-index-up">{{ $mTitle[1] }}</small>
										@endif
									</div>
									<!-- <img class="racquet-opacity" src="assets/img/racquet-opacity.svg"><img class="racquet" src="assets/img/racquet.svg"> -->
									<img class="racquet-opacity" src="{{ $slide->slide_asset->path }}"><img  class="racquet"  src="{{ $slide->slide_asset->path }}" >
									<div class="description z-index-up">
										<div class="description-title">{{ $slide->locales[0]->title_desc }}</div>
										<div class="description-text">{!! $slide->locales[0]->description !!}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</div>
@endsection
