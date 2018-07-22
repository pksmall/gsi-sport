@extends('front/layout/front')
@section('content')
    <div class="page-wrap login-page sign">
        <!-- header -->
    @include('front/parts/header')
    <!-- sidebar -->
    @include('front/parts/sidebar')

    <!-- right-nav & footer -->
    @include('front/parts/rightnav')

    <div class="carousel">
        <div class="container about">
                <div class="row item-wrap tab-content">
                    <div class="col-7">
                        <h1> <span>{{ $static_page->name }}</span></h1>
                        <div class="text-block-wrap">
                            <div class="text-block custom-scroll">
                                {!! $static_page->description !!}}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection