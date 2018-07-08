<head>
    <meta charset="UTF-8">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>@if(isset($meta_title)){{ $meta_title }} |@endif @if(isset($title) && !isset($meta_title)){{ $title }} |@endif{{ config('app.name', 'Laravel') }}</title>


    @if(isset($meta_description))<meta name="description" content="{{ $meta_description }}"/>@endif
    @if(isset($meta_keywords))<meta name="keywords" content="{{ $meta_keywords }}"/>@endif
    {{--@if(isset($seo->meta_canonical))<link rel="canonical" href="{{ $seo->meta_canonical }}"/>@endif--}}


    {{--@if(isset($seo->meta_robots))<meta name="robots" content="{{ $seo->meta_robots }}"/>@endif--}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>