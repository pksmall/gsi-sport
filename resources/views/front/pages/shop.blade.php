@extends('front/layout/front')
@section('content')
<div class="page-wrap products-page">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav-products')

    <!-- mobile menu -->
    <div class="header-produts">
        <h1 class="products-h1">Товары</h1>
        <div class="mob-menu">
            <button class="btn tblue bmob-menu" type="button"></button>
            <ul class="tab-mob">
                <?php $index = 0; ?>
                @foreach ($parent_categories as $p_category)
                    @if (isset($sumitems[$p_category->id]))
                        <li class="tab-li-mob @if($index++ == 0) active @endif" data-content-id="{{ $p_category->id }}">
                            <a href="#" class="blue">{{ $p_category->locales[0]->name }} ({{ isset($sumitems[$p_category->id]) ? $sumitems[$p_category->id] : 0 }})</a></li>
                        <ul class="sub-tab-mob">
                            @foreach($additional_menu as $a_menu)
                                @if($a_menu->parent_id == $p_category->id)
                                    @if(isset($sumitems[$a_menu->id]))
                                        <li data-content-id="{{ $a_menu->id }}"><a href="#">{{ $a_menu->locales[0]->name }} ({{ isset($sumitems[$a_menu->id]) ? $sumitems[$a_menu->id] : 0 }})</a></li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <!-- products -->
    <div id="dataurl" action="{{ url('/add_to_cart') }}" token="{{ csrf_token() }}"></div>
    <div token="{{ csrf_token() }}"></div>
    <div class="carousel">
        <div class="container">
            <?php $submenuflag = false; ?>
            <?php $subindex = 0; ?>
            @foreach ($parent_categories as $p_category)
                @if (isset($sumitems[$p_category->id]))
                <div class="row item-wrap tab-content"  id="dataset{{$p_category->id}}">
                    <div class="col-8 custom-scroll">
                        <?php $index++; ?>
                        <!-- data-json-cid= -->
                        <div class="row" id="itemsdataset" data-json-val={{ $p_category->id  }} data-json-path="{{ url('/get_items_data') }}" data-json-page="1">

                        <?php $index = 0; ?>
                        @foreach ($items as $item)
                            @if($item->categories[0]->parent_id == $p_category->id || $item->categories[0]->id == $p_category->id)
                            @if($index++ == $items_limit) @break @endif
                            <div class="product-item col-12">
                                <a class="product-image" href="/products/{{ $item->locales[0]->slug }}" style="background-image: url({{ url($item->preview->path) }})"></a>
                                <div class="product-info text-block-wrap">
                                    <div class="text-block"><a class="product-title" href="/products/{{ $item->locales[0]->slug }}">{{ $item->locales[0]->name }}</a>
                                        <div class="product-code">Код товара: {{ $item->code }}</div>
                                        <div class="product-more">
                                            <div class="product-price">{{ $item->price }} грн</div>
                                            <button class="btn blue" data-content-id="{{ $item->id }}">в корзину</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn blue mobile-button" data-content-id="{{ $item->id }}">в корзину</button>
                            @endif
                        @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="pagination">
                                    <?php $numpages = ceil($sumitems[$p_category->id] / $items_limit); ?>
                                    @if ($numpages > 1)
                                        @for($i=1; $i <= $numpages;  $i++)
                                            <a href="#" class="page @if($i == 1) active @endif" data-json-cid={{ $p_category->id  }} data-json-page="{{ $i }}" data-json-path="{{ url('/get_items_data') }}">{{ $i }}</a>
                                        @endfor
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @break;
            @endforeach
            </div>
        </div>
    </div>
@endsection
@section('page-js-script')
    <script src="{{ asset('/assets/js/main-products.js') }}"></script>
    <script src="{{ asset('/js/jquery-json-get-items-data.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script type="text/javascript">
        $(function() {
            // current cId
            var jsonVal = $('#itemsdataset').data('json-val');
            Cookies("curCid", jsonVal);

            //console.log($.trim($('.tab-li-mob').first().text()));
            var downarrow = "<span><img src=\"assets/img/arrow-down.png\"></span>";
            $('.bmob-menu').html($.trim($('.tab-li-mob').first().text() + downarrow));

            // get page
            $('.pagination').on('click', '.page', function () {
                var page = $(this).data('json-page');
                $(this).jsonGetItemsData();
                $('.page').removeClass('active');
                $(this).addClass('active');
            });

            $('.row').on('click', 'button', function(){
                var itemId = $(this).data('content-id');
                var dataurl = $('#dataurl');
                console.log("item id: " + itemId + " dataurl:" + dataurl.attr('action'));

                $.ajax({
                    type: 'POST',
                    url: dataurl.attr('action'),
                    data: {
                        item_id: itemId,
                        qty: 1,
                        size: 0
                    }
                }).always(function(data, textStatus, jqXHR) {
                    if (data.response == 'success') {
                        //console.log("resp data: " + data.data);
                        $('#cartqty-mob').html(data.data);
                        $('#cartqty').html(data.data);
                        $('.icon-cart').addClass('expand');
                        setTimeout(function(){
                             $('.icon-cart').removeClass('expand');
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
