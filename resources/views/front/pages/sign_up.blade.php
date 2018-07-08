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
                <div class="col-12">
                    <div class="title">
                        <h1>регистрация</h1><a href="/login">Войти с помощью</a>
                    </div>
                    <h2 class="blue-text">заполните все поля для регистрации</h2>
                    <form>
                        <div class="form-group">
                            <label for="login" required>Логин:</label>
                            <input class="error" id="login" type="text"><span class="error">Пользователя с данным логином не существует</span>
                        </div>
                        <div class="form-group">
                            <label for="password" required>Пароль:</label>
                            <input id="password" type="password">
                        </div>
                        <div class="form-group">
                            <label for="email" required>e-mail:</label>
                            <input id="email" type="email">
                        </div>
                        <div class="form-group">
                            <label for="date">Дата:</label>
                            <input id="date" type="text">
                        </div>
                        <div class="checkbox-wrap">
                            <input id="save-password" type="checkbox">
                            <label for="save-password"><span>принять пользовательское соглашение</span></label>
                        </div>
                        <button class="btn blue" type="submit">Войти    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection