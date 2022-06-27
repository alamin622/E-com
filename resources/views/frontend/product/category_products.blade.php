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

            <h2 class="home_title">{{$category->category_name}}</h2>
        </div>
    </div>
    <!-- Shop -->
    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title"></div>
                            <ul class="sidebar_categories">
                                <h4><a href="{{url('/')}}">< &nbsp;All categories  </a></h4>
                                <h5 class="home_title"> < &nbsp; {{$category->category_name}}</h5>
                                <h5>Sub Categories</h5>
                                @foreach($subcategory as $row)
                                <li><a href="{{route('subcategorywise.product',$row->id)}}">{{$row->subcategory_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filter By</div>
                            <div class="sidebar_subtitle">Price</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Range: </p>
                                <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_subtitle color_subtitle">Color</div>
                            <ul class="colors_list">
                                <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                                <li class="color"><a href="#" style="background: #000000;"></a></li>
                                <li class="color"><a href="#" style="background: #999999;"></a></li>
                                <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                                <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                                <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                            </ul>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">Brands</div>
                            <ul class="brands_list">
                                @foreach($brand as $row)
                                <li class="brand"><a href="{{route('brandwise.product',$row->id)}}">{{$row->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{{count($products)}}</span> products found</div>
                            <div class="shop_sorting">
                                <span>Sort by:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid row">
                            <div class="product_grid_border"></div>
                            @foreach($products as $row)
                                    <!-- Product Item -->
                                    <div class="product_item is_new">
                                        <div class="product_border"></div>
                                        <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('public/files/product') }}/{{$row->thumbnail}}" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_price">
                                                @if($row->discount_price==NULL)
                                                    {{$setting->currency}}{{$row->selling_price}}/ <small >{{$row->unit}}</small>
                                                @else
                                                    <span>{{$setting->currency}}{{$row->selling_price}}</span>
                                                    {{$setting->currency}}{{$row->discount_price}} / <small>{{$row->unit}}</small>
                                                @endif
                                            </div>
                                            <div class="product_name"><div> <a href="{{route('product.details' ,$row->slug)}}">{{substr($row->name ,0, 20)}}..</a></div></div>
                                        </div>

                                        <a href="{{route('add.wishlist',$row->id)}}">
                                            <div class="product_fav"><i class="fas fa-heart"></i></div></a>
                                        <ul class="product_marks">
                                            <li class="product_mark product_discount">-25%</li>

                                        </ul>
                                    </div>
                            @endforeach

                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">

                                {{$products->links()}}

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
                        <h3 class="viewed_title"> Products for You</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">

                        @foreach($random_product as $row)
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
                                            <li class="product_mark product_discount quick_view" id="{{$row->id}}" data-toggle="modal" data-target="#quick-view">
                                                <i class="fas fa-eye" ></i></li>

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



    <div class="modal fade " id="quick-view1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content abc p-2">
                <div class="modal-body " id="quick_view_body">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/frontend') }}/js/shop_custom.js"></script>



@endsection
