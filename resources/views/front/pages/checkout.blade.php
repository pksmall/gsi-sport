@extends('front/layout/front')
@section('content')

    <section class="order">
        <div class="container-pages">
            <div class="content-wrapper">
                <div class="order-header">
                    <h2>{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('cart') }}">Корзина</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-pages">
            <div class="content-wrapper">
                <div class="order-info">

                    @if ($errors->any())

                        <div class="cart-content">
                            <div class="cart-body">
                                <p class="msg-empty-cart">{!! implode('', $errors->all(':message<br/>'))  !!}</p>
                            </div>
                        </div>

                    @endif

                    <ul class="nav nav-tabs" id="сustomer" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="new-customer" data-toggle="tab" href="#new-customer-order" role="tab" aria-controls="new-customer-order" aria-selected="true">@if(Auth::check()) {{ trans('item.order_info') }} @else {{ trans('item.new_customer') }} @endif</a>
                        </li>
                        @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" id="old-customer2" data-toggle="tab" href="#old-customer-enter" role="tab" aria-controls="old-customer-enter" aria-selected="false">{{ trans('item.i_client') }}</a>
                        </li>
                        @endif
                    </ul>
                    <div class="tab-content" id="сustomerContent">
                        <div class="tab-pane fade show active" id="new-customer-order" role="tabpanel" aria-labelledby="new-customer-order-tab">

                            <form class="start-field-style" action="@if(App::getLocale() == 'ru'){{ route('order_success_ru') }}@endif @if(App::getLocale() == 'ua'){{ route('order_success') }}@endif @if(App::getLocale() == 'en'){{ route('order_success_en') }}@endif" method="post">
                                @csrf
                                @if(!Auth::check())
                                <label class="line short-start-field" for="">
                                    <span class="start-field">{{ trans('item.profile_name') }}*</span>
                                    <input type="text" name="guest_name">
                                </label>
                                <label class="line short-start-field" for="">
                                    <span class="start-field">{{ trans('item.address_city') }}*</span>
                                    <input type="text" name="guest_city">
                                </label>
                                <label class="line short-start-field" for="">
                                    <span class="start-field">{{ trans('item.profile_email') }}*</span>
                                    <input type="text" name="guest_email">
                                </label>
                                <label class="line short-start-field" for="">
                                    <span class="start-field">{{ trans('item.profile_telephone') }}*</span>
                                    <input type="text" name="guest_telephone">
                                </label>
                                @endif
                                <label class="line long-start-field" for="">
                                    <span class="start-field">{{ trans('item.type_pay') }}</span>
                                    <select class="custom-style" name="pay_id">
                                        @if(isset($type_pay) && count($type_pay))
                                            @foreach($type_pay as $p)
                                                @if(App::getLocale() == $p->locale)
                                                    @if($p->pay[0]->is_active == 1)
                                                        <option value="{{ $p->pay[0]->id }}">{{ $p->name }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </label>
                                <label class="line long-start-field" for="">
                                    <span class="start-field">{{ trans('item.type_deli') }}</span>
                                    <select class="custom-style" name="delivery_id">
                                            @if(isset($type_delivery) && count($type_delivery))
                                                @foreach($type_delivery as $i)
                                                    @if(App::getLocale() == $i->locale)<option value="{{ $i->delivery[0]->id }}">{{ $i->name }}</option>@endif
                                                @endforeach
                                            @endif
                                    </select>
                                </label>

                                <label class="line long-start-field address_number_hidden" for="" style="display: none;">
                                    <span class="start-field">{{ trans('item.address_number') }}*</span>
                                    <input type="text" name="mail_number">
                                </label>

                                {{--@if(!Auth::check())--}}
                                {{--<label class="line long-start-field" for="">--}}
                                    {{--<span class="start-field">{{ trans('item.address_number') }}*</span>--}}
                                    {{--<input type="text" name="mail_number">--}}
                                {{--</label>--}}
                                {{--@endif--}}
                                <label class="line long-start-field" for="">
                                    <span class="start-field">{{ trans('item.other_checkout') }}</span>
                                    <textarea name="more"></textarea>
                                </label>
                                @if(!Auth::check())
                                <p>
                                    {!! trans('item.reg_info') !!}
                                </p>
                                <label class="line short-start-field" for="">
                                    <div style="width: 300px;">
                                        <input type="checkbox" name="is_register" value="1"> {{ trans('item.is_register_success') }}
                                    </div>
                                </label>
                                @endif
                                <button class="send">{{ trans('item.go_order') }}</button>
                            </form>
                        </div>
                        @if(!Auth::check())
                        <div class="tab-pane fade" id="old-customer-enter" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="start-field-style" action="{{ route('login', 'redirect=cart') }}" method="post">
                                @csrf
                                <label class="line short-start-field" for="">
                                    <span class="start-field">{{ trans('item.profile_email') }}</span>
                                    <input type="text" name="email">
                                </label>
                                <label class="line short-start-field" for="">
                                    <span class="start-field">{{ trans('item.profile_password') }}</span>
                                    <input type="password" name="password">
                                </label>
                                <p>
                                    <a href="#">{{ trans('item.remember_password') }}</a>?
                                </p>
                                <br/>
                                <button type="submit" class="send">{{ trans('base.login') }}</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="selected-goods">
                    <div class="selected-goods-content">
                        <?php $total = 0; ?>
                        @if(isset($cart->items))
                            @foreach($cart->items as $z)
                                    <div class="order-product-line">

                                        <img src="{{ asset( isset($z['item']->preview) ? $z['item']->preview->path : 'images/no-image.svg') }}" alt="{{ $z['item']->locales[0]->name }}" style="width: 150px;">

                                        <div class="info-block">
                                            <p>{{ $z['item']->locales[0]->name }}</p>
                                            <form action="">
                                                <label>Количество : </label>
                                                <input type="number" name="order-product-ammount" value="{{ $z['qty'] }}" readonly disabled>
                                            </form>
                                        </div>
                                        <span class="price-smol">
                                            @if(isset($config->exchange_rate)){{ intval(($z['item']->price * $z['qty']) * $config->exchange_rate) }}@else{{ $z['item']->price * $z['qty'] }}@endif
                                        </span>
                                        <?php

                                        if (isset($config->exchange_rate)) {
                                            $total += intval(($z['item']->price * $z['qty']) * $config->exchange_rate);
                                        } else {
                                            $total += $z['item']->price * $z['qty'];
                                        }

                                        ?>
                                    </div>
                            @endforeach
                        @else
                            @foreach($cart as $key => $c)
                                        <div class="order-product-line">
                                            <img src="{{ asset( isset($c->item->preview) ? $c->item->preview->path : 'images/no-image.svg') }}" alt="{{ $c->item->locales[0]->name }}" style="width: 150px;">
                                            <div class="info-block">
                                                <p>{{ $c->item->locales[0]->name }}</p>
                                                <form action="">
                                                    <label>Количество : </label>
                                                    <input type="number" name="order-product-ammount" value="{{ $c->qty }}" readonly disabled>
                                                </form>
                                            </div>
                                            <span class="price-smol">
                                                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->hasRole('3'))
                                                    @if(isset($config->exchange_rate)) {{ intval(($c->item->whs_price * $c->qty) * $config->exchange_rate) }} @else{{ $c->item->whs_price * $c->qty }}@endif
                                                @else
                                                    @if(isset($config->exchange_rate)) {{ intval(($c->item->price * $c->qty) * $config->exchange_rate) }} @else{{ $c->item->price * $c->qty }}@endif
                                                @endif
                                            </span>
                                            <?php

                                                if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->hasRole('3')) {
                                                    if (isset($config->exchange_rate)) {
                                                        $total += intval(($c->item->whs_price * $c->qty) * $config->exchange_rate);
                                                    } else {
                                                        $total += $c->item->whs_price * $c->qty;
                                                    }
                                                } else {
                                                    if (isset($config->exchange_rate)) {
                                                        $total += intval(($c->item->price * $c->qty) * $config->exchange_rate);
                                                    } else {
                                                        $total += $c->item->price * $c->qty;
                                                    }
                                                }



                                            ?>
                                        </div>
                            @endforeach
                        @endif
                        <div class="all-price-line">
                            <span class="price-big">{{ $total }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('after-script')

    <script>

        @if(isset($type_delivery) && count($type_delivery))

        $('select[name="delivery_id"]').change(function () {
          var selected_var = $(this).val();
            if (selected_var == 1) {
              $('.address_number_hidden').fadeOut(300);
              $('.address_number_hidden input').val(null);
            } else {
              $('.address_number_hidden span').text($('select[name="delivery_id"] option:selected').text() + ' №');
              $('.address_number_hidden').fadeIn(300);
            }
        });

        @endif

      // !isset(Auth::user()->address_delivery->delivery_id)

    </script>

@endsection