@extends('front/layout/front')

@section('content')

    <section class="account">

        @if (Session::has('success'))
            <div class="alert alert-success" role="alert" style="background: #1e7e34; color:#fff;">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="container-pages">
            <div class="content-wrapper">
                <div class="accoutn-header">
                    <h2>{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Профиль</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Адресная книга</li>
                        </ol>
                    </nav>
                </div>
                @include('front/partials/profile-aside')
                <div class="account-body account-user-info flex-column">

                    @if (!$errors->has('delivery_id') && $errors->any())

                        <div class="cart-content">
                            <div class="cart-body">
                                <p class="msg-empty-cart yellow-notify">{!! implode('', $errors->all(':message<br/>'))  !!}</p>
                            </div>
                        </div>

                    @endif

                        @if (Session::has('update-address'))

                            <div class="cart-content">
                                <div class="cart-body">
                                    <p class="msg-empty-cart yellow-notify">{{ trans('item.address_upd') }}<br></p>
                                </div>
                            </div>

                        @endif

                    <h3 class="hello-user">{{ trans('item.address_home') }}</h3>
                    <form action="@if(App::getLocale() == 'ru'){{ route('update_address_ru') }}@endif @if(App::getLocale() == 'ua'){{ route('update_address') }}@endif @if(App::getLocale() == 'en') {{ route('update_address_en') }} @endif" method="post">
                        @csrf
                        <label for="">
                            <span>{{ trans('item.address_country') }}</span>
                            <input type="text" name="country" class="form-control" value="@if(isset($user->address->country)){{ old('country', $user->address->country) }}@else{{ old('country') }}@endif"/>
                        </label>
                        {{--<label for="">--}}
                            {{--<span>{{ trans('item.address_region') }}</span>--}}
                            {{--<input type="text" name="region" class="form-control" value="@if(isset($user->address->region)){{ old('region', $user->address->region) }}@else{{ old('region') }}@endif">--}}
                        {{--</label>--}}
                        <label for="" style="display: none;">
                            <span>{{ trans('item.address_region') }}</span>
                            <input type="hidden" name="region" class="form-control" value="-">
                        </label>
                        <label for="">
                            <span>{{ trans('item.address_city') }}</span>
                            <input type="text" name="city" class="form-control" value="@if(isset($user->address->city)){{ old('city', $user->address->city) }}@else{{ old('city') }}@endif">
                        </label>
                        <label for="">
                            <span>{{ trans('item.address_address') }}</span>
                            <input type="text" name="address" class="form-control" value="@if(isset($user->address->address)){{ old('address', $user->address->address) }}@else{{ old('address') }}@endif">
                        </label>
                        {{--<label for="">--}}
                            {{--<span>{{ trans('item.address_zipcode') }}</span>--}}
                            {{--<input type="text" name="zipcode" class="form-control" value="@if(isset($user->address->zipcode)){{ old('zipcode', $user->address->zipcode) }}@else{{ old('zipcode') }}@endif">--}}
                        {{--</label>--}}
                        <label for="" style="display: none;">
                            <span>{{ trans('item.address_zipcode') }}</span>
                            <input type="hidden" name="zipcode" class="form-control" value="-">
                        </label>
                        <button class="send">{{ trans('item.profile_edit') }}</button>
                    </form>

                        @if ($errors->has('delivery_id') && $errors->any())

                            <div class="cart-content">
                                <div class="cart-body">
                                    <p class="msg-empty-cart yellow-notify">{!! implode('', $errors->all(':message<br/>'))  !!}</p>
                                </div>
                            </div>
                        @endif

                        @if (Session::has('update-address-delivery'))
                            
                            <div class="cart-content">
                                <div class="cart-body">
                                    <p class="msg-empty-cart yellow-notify">{{ trans('item.address_delivery_upd') }}</p>
                                </div>
                            </div>
                        @endif

                    <h3 class="hello-user">{{ trans('item.address_delivery') }}</h3>
                    <form action="@if(App::getLocale() == 'ru'){{ route('update_address_delivery_ru') }}@endif @if(App::getLocale() == 'ua'){{ route('update_address_delivery') }}@endif @if(App::getLocale() == 'en'){{ route('update_address_delivery_en') }}@endif" method="post">
                        @csrf
                        <label for="">
                            <span>{{ trans('item.address_country') }}</span>
                            <input type="text" name="delivery_country" class="form-control" value="@if(isset($user->address_delivery->country)){{ old('country', $user->address_delivery->country) }}@else{{ old('delivery_country') }}@endif"/>
                        </label>
                        {{--<label for="">--}}
                            {{--<span>{{ trans('item.address_region') }}</span>--}}
                            {{--<input type="text" name="delivery_region" class="form-control" value="@if(isset($user->address_delivery->region)){{ old('region', $user->address_delivery->region) }}@else{{ old('delivery_region') }}@endif">--}}
                        {{--</label>--}}
                        <label for="" style="display: none;">
                            <span>{{ trans('item.address_region') }}</span>
                            <input type="hidden" name="delivery_region" class="form-control" value="-">
                        </label>
                        <label for="">
                            <span>{{ trans('item.address_city') }}</span>
                            <input type="text" name="delivery_city" class="form-control" value="@if(isset($user->address_delivery->city)){{ old('city', $user->address_delivery->city) }}@else{{ old('delivery_city') }}@endif">
                        </label>
                        <label for="">
                            <span>{{ trans('item.address_address') }}</span>
                            <input type="text" name="delivery_address" class="form-control" value="@if(isset($user->address_delivery->address)){{ old('address', $user->address_delivery->address) }}@else{{ old('delivery_address') }}@endif">
                        </label>
                        {{--<label for="">--}}
                            {{--<span>{{ trans('item.address_zipcode') }}</span>--}}
                            {{--<input type="text" name="delivery_zipcode" class="form-control" value="@if(isset($user->address_delivery->zipcode)){{ old('zipcode', $user->address_delivery->zipcode) }}@else{{ old('delivery_zipcode') }}@endif">--}}
                        {{--</label>--}}
                        <label for="" style="display: none;">
                            <span>{{ trans('item.address_zipcode') }}</span>
                            <input type="hidden" name="delivery_zipcode" class="form-control" value="-">
                        </label>
                        <label for="">
                            <span>{{ trans('item.address_number') }}</span>
                            <input type="text" name="delivery_id" class="form-control" value="@if(isset($user->address_delivery->delivery_id)){{ old('delivery_id', $user->address_delivery->delivery_id) }}@else{{ old('delivery_id') }}@endif">
                        </label>
                        <button class="send">{{ trans('item.profile_edit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
