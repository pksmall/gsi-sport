@extends('front/layout/front')

@section('content')
    <div class="page-wrap about-page">
        <!-- header -->
        @include('front/parts/header')
        <!-- sidebar -->
        @include('front/parts/sidebar')

        <!-- right-nav & footer -->
        @include('front/parts/rightnav-about')

        <div class="carousel">
            <div class="container about">
                @foreach($static_page as $one_page)
                <div class="row item-wrap tab-content">
                    <div class="col-7">
                        <h1> <span>{{ $one_page->name }}</span></h1>
                        <div class="text-block-wrap">
                            <div class="text-block custom-scroll">
                                {!! $one_page->description !!}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection