@extends('front/layout/front')
@section('content')
<div class="page-wrap products-page">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav-products')

    <!-- products -->
    <div id="dataurl" action="{{ url('/add_to_cart') }}" token="{{ csrf_token() }}"></div>
    <div class="carousel">
        <div class="container">
            <?php $submenuflag = false; ?>
            <?php $index = 0; ?>
            <?php $subindex = 0; ?>
            @foreach ($parent_categories as $p_category)
                <div class="row item-wrap tab-content">
                    <div class="col-8 {{ $index == 0 ? '' : 'custom-scroll' }}">
                        <?php $index++; ?>
                        <div class="row">

                        @foreach ($items as $item)
                            @if($item->categories[0]->parent_id == $p_category->id)
                            <div class="product-item col-12">
                                <a class="product-image" href="/products/{{ $item->locales[0]->slug }}" style="background-image: url({{ url($item->preview->path) }})"></a>
                                <div class="product-info text-block-wrap">
                                    <div class="text-block"><a class="product-title" href="/products/1">
                                            {{ $item->locales[0]->name }}
                                        </a>
                                        <div class="product-code">Код товара: {{ $item->code }}</div>
                                        <div class="product-more">
                                            <div class="product-price">{{ $item->price }} грн</div>
                                            <button class="btn blue" data-content-id="{{ $item->id }}">в корзину</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                            <!-- <div class="row">
                                <div class="col-12">
                                    <div class="pagination">
                                        <a href="#" class="page">1</a>
                                        <a href="#" class="page active">2</a>
                                        <a href="#" class="page">3</a>
                                        <a href="#" class="page">4</a>
                                        <a href="#" class="page">5</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                @foreach($additional_menu as $a_menu)
                    @if($a_menu->parent_id == $p_category->id && isset($sumitems[$a_menu->id]))
                        <?php $submenuflag = true; ?>
                    <div class="row item-wrap sub-tab-content" id="dataset{{$subindex++}}">
                        <div class="col-8 custom-scroll">
                            <div class="row">
                                @foreach ($items as $item)
                                    @if($item->categories[0]->id == $a_menu->id)
                                    <div class="product-item col-12"><a class="product-image" href="/products/1" style="background-image: url({{ url($item->preview->path) }})"></a>
                                        <div class="product-info text-block-wrap">
                                            <div class="text-block"><a class="product-title" href="/products/1">
                                                    {{ $item->locales[0]->name }}</a>
                                                <div class="product-code">Код товара: {{ $item->code }}</div>
                                                <div class="product-more">
                                                    <div class="product-price">{{ $item->price }} грн</div>
                                                    <button class="btn blue"  data-content-id="{{ $item->id }}">в корзину</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach

                @if ($submenuflag)
                    {{-- div false to true slick ittertor---}}
                    <div class="row item-wrap tab-content">
                        <div class="col-8">
                            <div class="row">
                                <div class="product-item col-12">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
        </div>
    </div>
@endsection
@section('page-js-script')
    <script type="text/javascript">
        $(function() {
            $('button').on('click',function(){
                var itemId = $(this).data('content-id');
                var dataurl = $('#dataurl');
                console.log("item id: " + itemId + " dataurl:" + dataurl.attr('action'));

                $.ajax({
                    type: 'POST',
                    url: dataurl.attr('action'),
                    data: {
                        item_id: itemId,
                        _token:  dataurl.attr('token'),
                        qty: 1,
                        size: 0
                    }
                }).always(function(data, textStatus, jqXHR) {
                    if (data.response == 'success') {
                        console.log("resp data: " + data.data);
                        $('#cartqty').html(data.data);
                        $('.icon-cart').toggleClass('expand');
                        setTimeout(function(){
                            $('.icon-cart').toggleClass('expand');
                        },2000);
                        return;
                    } else {
                        console.log("resp error");
                        return;
                    }
                });

            });
        });
    </script>
@endsection
