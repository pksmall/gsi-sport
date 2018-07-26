@extends('front/layout/front')

@section('content')
<div class="page-wrap login-page login">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')
    <!-- right-nav & footer -->
    @include('front/parts/rightnav')
    <div class="content login-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h1>вход в личный кабинет</h1><a class="blue-a" href="/register">регистрация</a><a href="/forgot">забыли пароль?</a>
                    </div>
                    <h2 class="blue-text">введите ваш логин и пароль</h2>
                    <form action="{{ route('login') }}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="login">Email:</label>
                            <input name="email" id="login" type="text" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            <input name="password" id="password" type="password" placeholder="Пароль" required>
                        </div>
                        <div class="checkbox-wrap">
                            <input id="remember" type="checkbox" name="remember" value="1">
                            <label for="remember"><span>Запомнить пароль</span></label>
                        </div>
                        <button class="btn blue" type="submit">Войти</button>
                        <div class="login-mob">
                            <div class="sign"><a href="/sign_up">регистрация</a></div>
                            <div class="forgot"><a href="/forgot">забыли пароль?</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
