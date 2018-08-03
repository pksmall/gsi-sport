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
			<div class="row item-wrap tab-content" id="postdata{{$index}}" data-content-id="{{ $one_post->id }}" data-content-url="{{ url('/post_update_views') }}" data-content-token="{{ csrf_token() }}" data-content-counts="{{ $one_post->count_views }}">
				<div class="col-7 news">
					<h1> <span>{{ $one_post->name }}</span></h1>
					<div class="text-block-wrap">
						<div class="text-block custom-scroll">
							{!! $one_post->description !!}
						</div>
					</div>
					<div class="page-info-mob" id="dateset{{$index}}"><span style="float:left;" id="dateTime{{$index}}">{{ $mcreated[$one_post->article_id]->format("d-m-Y h:i:s") }}</span><span style="float:right;">Просмотров: <span id="count_views{{ $index++ }}">{{ $one_post->count_views }}</span></span></div>
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
    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function() {
            var newhtml = $('#dateset'+$('.tab .active').data('content-id')).html();
            $('.page-info').html(newhtml);
            var oldidx = 1;

            $('.tab li').on('click',function(){
                var idx = $(this).data('content-id');
                if (oldidx != idx) {
                    oldidx = idx;
                    var itemId = $('#postdata'+idx).data('content-id');
                    var dataurl = $('#postdata'+idx).data('content-url');
                    var token = $('#postdata'+idx).data('content-token');
                    var counts = $('#postdata'+idx).data('content-counts');
                    console.log("item id: " + itemId + " dataurl:" + dataurl + " token:" + token + " counts:" + counts);

                    $.ajax({
                        type: 'POST',
                        url: dataurl,
                        data: {
                            post_id: itemId,
                            _token:  token,
                        }
                    }).always(function(data, textStatus, jqXHR) {
                        if (data.response == 'success') {
                            console.log("resp data: " + data.data);
                            counts = data.data;

                            var datetime  = $('#dateTime'+idx).html();
                            newhtml = '<span style="float:left;">' + datetime + '</span><span style="float:right;"> Просмотров: ' + counts +"</span>";
                            $('.page-info').html(newhtml);
                            return;
                        } else {
                            console.log("resp error");
                            counts++;

                            var datetime  = $('#dateTime'+idx).html();
                            newhtml = '<span style="float:left;">' + datetime + '</span><span style="float:right;"> Просмотров: ' + counts +"</span>";
                            $('.page-info').html(newhtml);
                            return;
                        }
                    });
                }
            });
        });
    </script>
@endsection
