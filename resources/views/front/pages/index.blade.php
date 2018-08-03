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
									 {{--<h1><span class="blue z-index-up">{{ $slide->locales[0]->name }}</span> <span class="z-index-up">{{ $slide->locales[0]->short_name }} </span></h1><small class="z-index-up">{{ $slide->locales[0]->short_name}}</small> -->--}}
										@if(isset($slide->locales[0]->short_name))
											<h1><span class="z-index-up blue">{{ $slide->locales[0]->name}}</span></h1><small class="z-index-up">{{ $slide->locales[0]->short_name }}</small>
										@else
											<h1><span class="z-index-up">{{ $slide->locales[0]->name}}</span></h1><small class="z-index-up">-</small>
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
@section('page-js-script')
<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
@endsection
