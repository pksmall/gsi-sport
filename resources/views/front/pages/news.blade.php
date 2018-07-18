@extends('front/layout/front')

@section('content')
<div class="page-wrap news-page">
	<!-- header -->
	@include('front/parts/header')
	<!-- sidebar -->
	@include('front/parts/sidebar')

	<!-- right-nav & footer -->
	@include('front/parts/rightnav-news')

	<!-- news -->
	<div class="carousel">
		<div class="container news-content">
            <?php $index = 1; ?>
			@foreach($posts as $one_post)
			<div class="row item-wrap tab-content">
				<div class="col-7 news">
					<h1> <span>{{ $one_post->name }}</span></h1>
					<div class="text-block-wrap">
						<div class="text-block custom-scroll">
							{!! $one_post->description !!}
						</div>
					</div>
					<div class="page-info-mob" id="dateset{{$index++}}"><span style="float:left;">{{ $mcreated[$one_post->article_id]->format("d-m-Y h:i:s") }}</span><span style="float:right;">Просмотров: {{ $one_post->count_views }}</span></div>
					<div class="center">
						<button class="btn transparent">Поделиться</button>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

@section('page-js-script')
    <script type="text/javascript">
        $(function() {
            var newhtml = $('#dateset'+$('.tab .active').data('content-id')).html();
            $('.page-info').html(newhtml);
            $('.tab li').on('click',function(){
                //alert($(this).data('content-id'));
                newhtml = $('#dateset'+$(this).data('content-id')).html();
                $('.page-info').html(newhtml);
            });
        });
    </script>
@endsection
