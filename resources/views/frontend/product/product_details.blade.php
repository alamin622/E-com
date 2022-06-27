@extends('layouts.app')
@section('content')
@include('layouts.front_partial.collapse_nav')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_responsive.css">

@php
    $product_rating5 =  App\Models\Review::where('product_id', $product->id)->where('rating', 5)->count();
    $product_rating4 =  App\Models\Review::where('product_id', $product->id)->where('rating', 4)->count();
    $product_rating3 =  App\Models\Review::where('product_id', $product->id)->where('rating', 3)->count();
    $product_rating2 =  App\Models\Review::where('product_id', $product->id)->where('rating', 2)->count();
    $product_rating1 =  App\Models\Review::where('product_id', $product->id)->where('rating', 1)->count();
      $count_review =  App\Models\Review::where('product_id', $product->id)->count('review');
    $sum_rating =  App\Models\Review::where('product_id', $product->id)->sum('rating');
    $count_rating =  App\Models\Review::where('product_id', $product->id)->count('rating');

@endphp
<div class="single_product">
    <div class="container new-edit single-p-customize">
        <div class="row">
            @php

            @endphp
            <!-- Images -->

            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="{{ asset('public/files/product') }}/{{$product->thumbnail}}">
                        <img src="{{ asset('public/files/product') }}/{{$product->thumbnail}}" alt=""></li>
                    @isset($image)
                    @foreach (json_decode($product->images) as $key => $image)
                    <li data-image="{{ asset('public/files/product/'.$image) }}">
                        <img src="{{ asset('public/files/product/'.$image) }}" alt=""></li>
                        @endforeach
                        @endisset
               </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{ asset('public/files/product') }}/{{$product->thumbnail}}" alt=""></div>
            </div>

            <!-- Description -->

            <div class="col-lg-5 order-3">
                <div class="text-left">

                    <h3 class="mb-2 fs-20 fw-600">
                        {{$product->name}}
                    </h3>
                    <div class="row align-items-center">
                        <div class="col-12 ">
                            <div class="row align-items-center my-1">
                                <div class="col-6">
                                    <!-- Rating stars -->
                                    <div class="rating">
                                        @if($sum_rating==NULL)
                                        @elseif(intval($sum_rating/5) == 5)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                        @elseif(intval($sum_rating/$count_rating) >= 4 && intval($sum_rating/$count_rating) <5)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @elseif(intval($sum_rating/$count_rating) >= 3 && intval($sum_rating/$count_rating) <4)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @elseif(intval($sum_rating/$count_rating) >= 2 && intval($sum_rating/$count_rating) <3)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @elseif(intval($sum_rating/$count_rating) >= 1 && intval($sum_rating/$count_rating) <2)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @else
                                            <div>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @endif

                                        <span class="rating-count ml-1">({{$count_review}} Reviews)</span>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <ul class="inline-links inline-links--style-1">

                                        @if ($product->stock_quantity > 0)
                                            <li>
                                                <span class="badge btn-success badge-md badge-pill bg-green">{{ ('In stock')}}</span>
                                            </li>
                                        @else
                                            <li>
                                                <span class="badge btn-danger badge-md badge-pill bg-red">{{ ('Out of stock')}}</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row no-gutters mt-3">
                        <div class="col-sm-3">
                            <div class="opacity-50 my-2">Price:</div>
                        </div>

                        <div class="col-sm-9">
                            <div class="">



                                    <strong class="h4 ">
                                        @if($product->discount_price==NULL)
                                            {{$setting->currency}}{{$product->selling_price}}
                                    @else
                                            <del>
                                            {{$setting->currency}}{{$product->selling_price}}
                                            </del>
                                    </strong>
                                <del>
                                        <span class="opacity-70">/{{$product->unit}}</span>
                                </del>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters my-2">
                        <div class="col-sm-3">
                            <div class="text-left">Discount Price:</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="">
                                <strong class="h4 text-danger">
                                {{$setting->currency}}{{$product->discount_price}}
                            @endif
                                </strong>
                                <span class="opacity-70">/{{$product->unit}}</span>
                            </div>
                        </div>
                    </div>


                    <hr>

                    <form action="{{ route('add.to.cart') }}" method="Post" id="add_to_cart">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        @if($product->discount_price==NULL)
                            <input type="hidden" name="price" value="{{$product->selling_price}}">
                        @else
                            <input type="hidden" name="price" value="{{$product->discount_price}}">
                        @endif


                        @isset($product->size)
                        <div class="row no-gutters">
                            <div class="col-sm-3">
                                <div class="opacity-50 my-2">Size:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="aiz-radio-inline">
                                    @php

                                    @endphp
                                    <select class="custom-select form-control-sm" style="min-width: 100px" name="size" id="">
                                        @foreach ((explode(',',$product->size)) as $key => $row)
                                            <option  value="{{$row}}" >{{$row}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endisset
                        @isset($product->color)
                        <div class="row no-gutters">
                            <div class="col-sm-3">
                                <div class="opacity-50 my-2">Color:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="aiz-radio-inline">
                                    <select class="custom-select form-control-sm" style="min-width: 100px" name="size" id="">
                                        @foreach ((explode(',',$product->color)) as $key => $row)
                                            <option  value="{{$row}}" >{{$row}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endisset
                        <hr>

                        <!-- Quantity + Add to cart -->
                        <div class="row no-gutters">
                            <div class="col-sm-3">
                                <div class="opacity-50 my-2">Quantity:</div>
                            </div>
                            <div class="col-sm-9 d-flex">
                                <div class="product-quantity d-flex align-items-center">
                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix">
                                        <span>Quantity: </span>
                                        <input id="quantity_input" name="qty" type="text" pattern="[1-9]*" value="1">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-3"> ({{$product->stock_quantity}} available)</span>
                            </div>
                        </div>

                        <hr>

                        <div class="row no-gutters pb-3" id="chosen_price_div">
                            <div class="col-sm-3">
                                <div class="opacity-50 my-2">Total Price:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="product-price">
                                    <strong id="chosen_price" class="h4 fw-600 text-danger">$650.000</strong>
                                </div>
                            </div>
                        </div>


                    <div class="mt-6">
                        @if($product->stock_quantity<1)
                            <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled="">
                                <i class="la la-cart-arrow-down"></i> Out of Stock
                            </button>
                            @else
                            <button type="submit" class="btn mr-4 btn-success"> <span class="loading d-none">...</span> Add to Cart</button>
                            <!-- Add to wishlist button -->
                            <button type="button" class="btn btn-danger  fw-600">
                                <a href="{{route('add.wishlist',$product->id)}}">    Add to wishlist</a>
                            </button>
                        @endif

                    </div>

                    </form>
                    <div class="row no-gutters mt-4">
                        <div class="col-sm-2">
                            <div class="opacity-50 my-2">Share:</div>
                        </div>
                        <div class="col-sm-10">
                            <div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}"></div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <!--Featured-->
    <div class="col-lg-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-v">
                        <div class="card card-danger">
                            <div class="card-header" style="padding: .40rem  1rem 0; margin-top: .4rem!important;">
                                <h5 class="card-title" > Rating and Reviews {{$product->name}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-6 ">
                                        <label for="">Average Review</label>
                                        <hr>
                                        @if($sum_rating==NULL)
                                        @elseif(intval($sum_rating/5) == 5)
                                        <div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                        @elseif(intval($sum_rating/$count_rating) >= 4 && intval($sum_rating/$count_rating) <5)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @elseif(intval($sum_rating/$count_rating) >= 3 && intval($sum_rating/$count_rating) <4)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @elseif(intval($sum_rating/$count_rating) >= 2 && intval($sum_rating/$count_rating) <3)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @elseif(intval($sum_rating/$count_rating) >= 1 && intval($sum_rating/$count_rating) <2)
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                        @else
                                            <div>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                            </div>
                                            @endif

                                    </div>

                                    <div class="col-sm-6 ">

                                        <label for="">Total Review</label>
                                        <hr>
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <small > T- {{$product_rating5}}</small>
                                            </div>
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <small > T- {{$product_rating4}}</small>
                                            </div>
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <small > T- {{$product_rating3}}</small>
                                            </div>
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <small > T- {{$product_rating2}}</small>
                                            </div>
                                            <div>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <span class="fa fa-star "></span>
                                                <small > T- {{$product_rating1}}</small>
                                            </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <br>
                    <label class="form-control" for="">All review And rating {{$product->name}}</label>
                    @foreach($review as $row)
                        <div class="card card-danger">
                            <div class="card-header" style="padding: .40rem 1rem;!important;">
                                <h5 class="card-title" >{{$row->user->name}} &nbsp;( {{date('d F, Y'), strtotime($row->date)}})</h5>
                            </div>
                            <div class="card-body">
                              {{$row->review}}
                                @if($row->rating==5)
                                <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                    @elseif($row->rating==4)
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                @elseif($row->rating==3)
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>

                                @elseif($row->rating==2)
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                @elseif($row->rating==1)
                                    <div>
                                    <span class="fa fa-star checked"></span>
                                    </div>
                                    @endif
                            </div>

                        </div>
                            <br>
                        @endforeach

                </div>
                <div class="col-lg-7 product-drv">
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Video</a>
                                <a class="nav-item nav-link active" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="true">Rating And Review</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                {{$product->description}}
                                 </div>
                            @isset($product->video)
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                <iframe width="340" height="205" src="https://www.youtube.com/embed/{{$product->video}}" title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                            </div>
                            @endisset
                            <div class="tab-pane fade active show ml-4" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                                    <form action="{{route('product.review')}}" method="post">
                                        @csrf

                                        <div class="form-control">
                                            <label for=""> Write your Review </label>
                                            <br>
                                            <textarea name="review" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-control">
                                            <label for=""> Write your Review </label>
                                            <select name="rating" class="custom-select form-control-sm" id="" style="min-width: 120px;">
                                                <option value="1">1 star</option>
                                                <option value="2">2 star</option>
                                                <option value="3">3 star</option>
                                                <option value="4">4 star</option>
                                                <option value="5">5 star</option>
                                            </select>
                                            @if(Auth::check())
                                                <button type="submit" class="btn btn-info btn-sm"><span class="fa fa-star"></span> Submit review</button>
                                            @else
                                                <p>Please first login to your account for submit a review</p>
                                            @endif
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Recently Viewed -->
<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Related product</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        @foreach($relatedproduct as $row)
                        <!-- Recently Viewed Item -->
                        <div class="owl-item">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img src="{{ asset('public/files/product') }}/{{$row->thumbnail}}" alt=""></div>
                                <div class="viewed_content text-center">


                                    <div class="viewed_price">
                                        @if($row->discount_price==NULL)
                                            {{$setting->currency}}{{$row->selling_price}}
                                        @else
                                        <span>{{$setting->currency}}{{$row->selling_price}} </span>
                                            {{$setting->currency}}{{$row->discount_price}}
                                        @endif
                                    </div>
                                    <div class="viewed_name"><a href="{{route('product.details' ,$row->slug)}}">{{substr($row->name,0,25)}}..</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">new</li>

                                </ul>
                            </div>
                        </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->

<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">

                    <!-- Brands Slider -->

                    <div class="owl-carousel owl-theme brands_slider">

                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_1.jpg" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_2.jpg" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_3.jpg" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_4.jpg" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_5.jpg" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_6.jpg" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_7.jpg" alt=""></div></div>
                        <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/frontend') }}/images/brands_8.jpg" alt=""></div></div>

                    </div>

                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img src="{{ asset('public/frontend') }}/images/send.png" alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="#" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                            <button class="newsletter_button">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/frontend') }}/js/product_custom.js"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5bf015c8b4a6560011bd9a88&product=inline-share-buttons' data-href="{{ Request::url() }}" async='async'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
    $('#add_to_cart').submit(function (e) {
        e.preventDefault();
        $('.loading').removeClass('.d-none');
        var url = $(this).attr('action');
        var request  = $(this).serialize();
        $.ajax({
            url:url,
            type:'post',
            async:false,
            data:request,
            success:function (data) {
                //toaster.success(data);
                $('#add_to_cart')[0].reset();
                cart();

            }
        });
    });

</script>
@endsection
