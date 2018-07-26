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
                        <h1> <span>Оформление заказа</span></h1>
                    </div>
                    <div class="col-12">
                        <h2 class="blue-text">Вы успешно оформили заказ!</h2>
                        <p>на вашу почту отправлено письмо с подверждением вашего заказа.</p>
                    </div>
                </div>
        </div>
    </div>
@endsection