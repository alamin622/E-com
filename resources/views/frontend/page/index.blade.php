@extends('layouts.app')
@section('content')
    @include('layouts.front_partial.collapse_nav')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_responsive.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/shop_responsive.css">


    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">

            <h2 class="home_title">{{$pages->page_name}}</h2>
        </div>
    </div>
    <!-- Shop -->
    <div class="shop">
        <div class="container">
            <div class="row">
    {!! $pages->page_description !!}
            </div>
        </div>
    </div>


@endsection
