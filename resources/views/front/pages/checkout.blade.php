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

                    <!-- autoregister -->
                    <div class="col-12"  id="autoregister">
                        <div class="title">
                            <h1>Оформление заявки</h1><a href="/login">Войти с помощью</a>
                        </div>
                        <h2 class="blue-text">Заполните все поля или войдите под своим аккаунтом.</h2>
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
                            <div class="checkbox-wrap">
                                <input id="save-password" type="checkbox">
                                <label for="save-password" required><p>принять&nbsp;<a class="blue-a" href="/static-page/termofservice">пользовательское&nbsp;соглашение</a>&nbsp;и&nbsp;зарегистироваться</p></label>
                            </div>
                            <button class="btn blue" type="submit">Продолжить</button>
                        </form>
                    </div>

                    <!-- delivery -->
                    <div class="col-12 delivery"  id="statusdelivery">
                        <div class="title">
                            <h1>Выбор способа доставки и оплаты</h1>
                        </div>
                        <h2 class="blue-text">Заполните все поля или войдите под своим аккаунтом.</h2>
                        <form id="registerForm" action="{{ url('/contactformsend') }}" method="post">
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
                                @if ($errors->has('city'))
                                    <span  class="error">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                            <div class="checkbox-wrap">
                                <input id="save-password" type="checkbox" required>
                                <label for="save-password" class="white-text"><span>принять пользовательское соглашение и зарегистироваться</span></label>
                            </div>
                            <button class="btn blue" type="submit">Продолжить</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
