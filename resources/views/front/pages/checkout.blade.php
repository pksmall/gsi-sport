@extends('front/layout/front')
@section('content')

    <div class="page-wrap login-page sign">
        <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
        @include('front/parts/rightnav')

        <div class="content login-content">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <h1>Оформление заявки</h1><a href="/login">Войти с помощью</a>
                    </div>
                    <!-- autoregister -->
                    <div class="left col-6"  id="autoregister">
                        <h2 class="blue-text">Контактные данные.</h2>
                        <form method="POST" action="{{ route('register')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name" required>ФИО:</label>
                                <input id="name" name="name" type="text" autofocus  placeholder="Ваше Имя и Фамилия">
                                @if ($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="telephone" required>Телефон:</label>
                                <input id="telephone" name="telephone" type="text"  placeholder="Телефон">
                                @if ($errors->has('telephone'))
                                    <span class="error">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" required>e-mail:</label>
                                <input id="email" name="email" type="email"  placeholder="Е-Майл">
                                @if ($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
{{--
                            <div class="form-group">
                                <label for="city" required>Город:</label>
                                <input name="city" type="text" list="cityname" placeholder="Город">
                                <datalist id="cityname">
                                    <option value="Одесса">
                                    <option value="Киев">
                                    <option value="Днепр">
                                    <option value="Львов">
                                    <option value="Винница">
                                    <option value="Херсон">
                                    <option value="Николаев">
                                </datalist>
                                @if ($errors->has('address_city'))
                                    <span  class="error">{{ $errors->first('address_city') }}</span>
                                @endif
                            </div>
--}}
                            <h2 class="blue-text">Способ оплаты</h2>
                            <div class="radio-wrap">
                                <input id="cash-out" name="paytype" type="radio" checked>
                                <label for="cash-out"><span>Наличными</span></label>

                                <input id="card-out" name="paytype" type="radio">
                                <label for="card-out"><span>Visa/Mastercard</span></label>

                            </div>
                        </form>
                    </div>

                    <!-- delivery -->
                    <div class="right col-6"  id="statusdelivery">
                        <form id="deliverytype" action="{{ url('/contactformsend') }}" method="post">
                            <h2 class="blue-text">Способ доставки.</h2>
                            @csrf
                            <div class="radio-wrap-horizontal">
                                <input id="myself" name="deliverychoose" type="radio" checked>
                                <label for="meself"><span>Самовывоз</span></label>

                                <input id="fedex" name="deliverychoose" type="radio">
                                <label for="fedex"><span>Курьер</span></label>

                                <input id="novapochta" name="deliverychoose" type="radio">
                                <label for="novapochta"><span>Новая Почта</span></label>
                            </div>
                            <div class="form-group">
                                <label for="city">Город:</label>
                                <input name="city" type="text" list="cityname" placeholder="Город">
                                <datalist id="cityname">
                                    <option value="Киев">
                                    <option value="Днепр">
                                    <option value="Львов">
                                    <option value="Винница">
                                    <option value="Херсон">
                                    <option value="Николаев">
                                </datalist>
                            </div>
                            <h2 class="blue-text">Не зарегистрированы?</h2>
                            <div class="checkbox-wrap">
                                <input id="weareregister" type="checkbox">
                                <label for="weareregister"><span>зарегистрируйте меня</span></label>
                            </div>
                    </div>
                </div>
                <hr style="opacity: .15"/>
                <div class="row">
                    <div class="col-12">
                        <div class="text-block">>
                            <div class="text-block">
                                <p>0 товаров на сумму 0 грн</p>
                                <p>стоимость доставки: 0 грн</p>
                                <h1>Итого: 0 грн</h1>
                            </div>
                        </div>
                        <button class="btn blue" type="submit">Продолжить</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
