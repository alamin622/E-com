@extends('layouts.app')
@section('content')
    @include('layouts.front_partial.collapse_nav')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_responsive.css">

    <!-- Wishlist -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Your Wishlist Item</div>

                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($wishlist as $row)

                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{ asset('public/files/product') }}/{{$row->thumbnail}}" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_text">{{$row->name}}</div>
                                            </div>

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_text">
                                                    {{$row->date}}
                                                </div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">

                                                <div class="cart_item_text">
                                                    <a class="mr-3" href="{{route('wishlist.product.delete' ,$row->id)}}"  ><i  class="fa fa-trash"></i></a>
                                                    <a href="{{route('product.details' ,$row->slug)}}" type="button" class="btn btn-danger ">Add Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="cart_buttons">
                            <a href="{{route('wishlist.clear')}}" type="button" class="btn btn-danger ">All Wishlist Clear</a>
                            <a href="{{url('/')}}" type="button" class="btn btn-success">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
