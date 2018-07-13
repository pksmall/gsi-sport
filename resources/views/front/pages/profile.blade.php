@extends('front/layout/front')

@section('content')
<div class="page-wrap login-page profile">
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
                        <h1>личный кабинет</h1>
                        <a href="/profile_edit">редактировать данные / изменить пароль</a>
                        <a class="red" href="/logout">Выход</a>
                    </div>
                    <h2 class="blue-text mb-4">данные о пользователе</h2>
                    <label class="login">{{ $user->name }}</label>
                    <label class="email mb-2">{{ $user->email }}</label>
                    <label class="date">{{ $user->date }}</label>
                    <div class="profile-actions profile-info">
                        <a href="/cart" class="btn blue" type="button">корзина</a>
                        <a href="/history" class="btn blue" type="button">история</a>
                        <div class="btn-mobile">
                            <a href="/profile_edit" class="btn blue tblue" type="button">редактировать данные / изменить пароль</a>
                            <button class="btn red clear" type="button">выход </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
