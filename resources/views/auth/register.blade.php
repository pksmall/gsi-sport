@extends('front/layout/front')

@section('content')

    <div class="page-wrapper page-login">
        <div class="page-login-inn">
            <div class="login-block-center reg-block-center">
                <div class=".login-title">
                    <span class="login-title-text"><img src="img/user-login.svg" alt="user">РЕГИСТРАЦИЯ</span>
                </div>
                <div class="login-form-block">
                    <form method="POST" action="{{ route('register') }}" class="login-form reg-form">
                        @csrf
                        <input type="hidden" name="locale_redirect" value="{{ App::getLocale() }}"/>
                        <label>ФИО<input required type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" autofocus></label>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <div class="reg-form-left">
                            <label>Телефон<input required type="tel" name="telephone" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" value="{{ old('telephone') }}"></label>
                            @if ($errors->has('telephone'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('telephone') }}</strong>
                                </span>
                            @endif
                            
                            <label>E-MAIL<input required type="email" name="email" class="email-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"></label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="reg-form-rigth">
                            <label>ПАРОЛЬ<input required type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}"></label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            <label>ПОВТОРИТЕ ПАРОЛЬ<input type="password" name="password_confirmation"></label>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button class="login-form-btn" type="submit sent">РЕГИСТРАЦИЯ<img src="img/right-arrow-login.svg" alt="arrow"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
