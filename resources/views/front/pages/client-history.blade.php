@extends('front/layout/front')
@section('content')
<div class="page-wrap login-page login">
    <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav')

    <!-- profile history -->
    <div class="content login-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h1>История</h1><a class="blue-a" href="/profile">Личный кабинет</a>
                    </div>
                    <div class="title">
                    @if (empty($cart['cart']))
                        <h2>история пустая</h2>
                    @else
                        <h2>История</h2>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection