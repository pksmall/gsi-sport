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
                        <h1>забыли пароль?</h1><a class="blue-a" href="/sign_up">регистрация</a>
                    </div>
                    <h2 class="blue-text">введите ваш почтовый ящик</h2>
                    <form>
                        <div class="form-group">
                            <label for="login">Email:</label>
                            <input id="email" type="text" placeholder="Ваш почтовый ящик" required>
                        </div>

                        <button class="btn blue" type="submit">Получить    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection