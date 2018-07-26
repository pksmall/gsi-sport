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
                            <h1>Редактирования данных</h1><a href="/profile">Личный кабинет</a>
                        </div>
                        <h2 class="blue-text">заполните все поля для регистрации</h2>
                        <form method="POST" action="{{ url('/profile_edit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" required>ФИО:</label>
                                <input id="name" name="name" type="text" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="telephone" required>Телефон:</label>
                                <input id="telephone" name="telephone" type="text" value="{{ $user->telephone }}" disabled>
                                @if ($errors->has('telephone'))
                                    <span class="error">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" required>e-mail:</label>
                                <input id="email" name="email" type="email" value="{{ $user->email }}" disabled>
                                @if ($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" required>Пароль:</label>
                                <input name="password" type="password">
                                @if ($errors->has('password'))
                                    <span  class="error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="date">ПОВТОРИТЕ ПАРОЛЬ:</label>
                                <input name="password_confirmation" type="password">
                                @if ($errors->has('password_confirmation'))
                                    <span class="error">{{ $errors->first('password_confirmation') }} </span>
                                @endif
                            </div>
                            <button class="btn blue" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>@endsection
