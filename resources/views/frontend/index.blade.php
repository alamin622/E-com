@extends('layouts.app')
    @section('navbar')
    @include('layouts.front_partial.main_nav')
    @endsection
@section('content')
    <div class="banner_2">
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">
                <!-- Banner 2 Slider Item -->
                @foreach($slider as $row)
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class=" fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-12 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="{{ asset($row->photo) }}" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


   {{-- <div class="banner">
        <div class="banner_background" style="background-image:url({{ asset('public/frontend') }}/images/banner_background.jpg)"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{ asset('public/files/product') }}/{{$bannerproduct->thumbnail}}" alt=""></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">{{$bannerproduct->name}}</h1>
                        @if($bannerproduct->discount_price==NULL)
                            <div class="banner_price">{{$setting->currency}}{{$bannerproduct->selling_price}}</div>
                            @else
                            <div class="banner_price"><span>{{$setting->currency}}{{$bannerproduct->selling_price}}</span>{{$setting->currency}}{{$bannerproduct->discount_price}}</div>
                            @endif

                        <div class="banner_product_name">{{$bannerproduct->brand->brand_name}}</div>
                        <div class="button banner_button"><a href="{{route('product.details' ,$bannerproduct->slug)}}">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <!-- Our product Section-->

    <section id="category-product" class="hcategories-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title abcd  text-center">
                        <span>OUR PRODUCTS CATEGORY</span>
                    </h2>
                </div>
            </div>
            <div class="row category-items" >
                @foreach($category as $row)
                <div class="col-6 col-sm-4 col-md-3 col-xl-1_5 category-item text-center category-div-item" id="menu">
                    <a class="card category-card" href="">
                        <div class="card-footer">
                            <img  src="{{asset($row->image)}}" class="img-fluid" alt="Mango ">
                        </div>
                        <a href="">
                        <div class="card-body cbc-name">
                            <a href="{{route('categorywise.product',$row->id)}}">
                            {{$row->category_name}}</a>
                        </div></a>
                        <div class="card-body cbc-button">
                            <i class="fa fa-eye ab"></i><span class="ab">View More</span>
                        </div>
                    </a>
                </div>
                    @endforeach
            </div>

            <hr>
        </div>
    </section>
    <br>
    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">Deals of the Week</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">

                                <!-- Deals Item -->
                                @foreach($today_deal as $row)
                                <div class="owl-item deals_item">
                                    <div class="deals_image"><img src="{{ asset('public/files/product/'.$row->thumbnail)}}" alt="{{$row->name}}"></div>
                                    <div class="deals_content">
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_category"><a href="#">{{$row->category->category_name}}</a></div>
                                            <div class="deals_item_price_a  ml-auto">
                                                @if($row->discount_price==NULL)
                                                 {{$setting->currency}}{{$row->selling_price}}/ <small >{{$row->unit}}</small>
                                                @else
                                                <del>
                                                <span>{{$setting->currency}}{{$row->selling_price}}
                                                </span></del>
                                            </div>
                                        </div>
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_name" style="font-size: 1rem">
                                             <a href="{{route('product.details' ,$row->slug)}}">{{substr($row->name ,0, 20)}}..</a>
                                            </div>
                                            <div class="deals_item_price ml-auto" style="font-size: 16px;">
                                                {{$setting->currency}}{{$row->discount_price}}
                                                <small class="opacity-70">/{{$row->unit}}</small>
                                            @endif</div>
                                        </div>
                                        <div class="available">
                                            <div class="available_line d-flex flex-row justify-content-start">
                                                <div class="available_title">Available: <span>{{$row->stock_quantity}}</span></div>
                                                <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                            </div>
                                            <div class="available_bar"><span style="width:17%"></span></div>
                                        </div>
                                        <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                            <div class="deals_timer_title_container">
                                                <div class="deals_timer_title">Hurry Up</div>
                                                <div class="deals_timer_subtitle">Offer ends in:</div>
                                            </div>
                                            <div class="deals_timer_content ml-auto">
                                                <div class="deals_timer_box clearfix" data-target-time="">
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                        <span>hours</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                        <span>mins</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                        <span>secs</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                    </div>

                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Featured</li>
                                    <li>Most Popular</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Most Polpular product Section -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                @foreach($featured as $row)
                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img style="height: 140px; width: 110px" src="{{ asset('public/files/product') }}/{{$row->thumbnail}}" alt="{{$row->name}}">
                                            </div>
                                            <div class="product_content">
                                                @if($row->discount_price==NULL)
                                                    <div class="product_price discount">{{$setting->currency}}{{$row->selling_price}}<span class="opacity-70">/{{$row->unit}}</span></div>
                                                @else
                                                    <div class="product_price discount">
                                                        <del>
                                                        <span>{{$setting->currency}}{{$row->selling_price}}
                                                        </span></del>
                                                        {{$setting->currency}}{{$row->discount_price}}
                                                        <span class="opacity-70">/{{$row->unit}}</span></div>
                                                @endif

                                                <div class="product_name"><div><a href="{{route('product.details' ,$row->slug)}}">{{substr($row->name ,0, 20)}}..</a></div></div>
                                                <div class="product_extras">
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </div>
                                            <a href="{{route('add.wishlist',$row->id)}}">
                                            <div class="product_fav"><i class="fas fa-heart"></i></div></a>

                                            <ul class="product_marks">
                                                <li class="product_mark product_discount quick_view" id="{{$row->id}}" data-toggle="modal" data-target="#quick-view">
                                                    <i class="fas fa-eye" ></i></li>
                                                <li class="product_mark product_new">new</li>

                                            </ul>
                                        </div>
                                    </div>
                                        @endforeach

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>
                            <!--quick view-->

                            <!-- Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">

                                @foreach($popular_product as $row)
                                    <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img style="height: 140px; width: 110px" src="{{ asset('public/files/product') }}/{{$row->thumbnail}}" alt="{{$row->name}}">
                                                </div>
                                                <div class="product_content">
                                                    @if($row->discount_price==NULL)
                                                        <div class="product_price discount">{{$setting->currency}}{{$row->selling_price}}<span class="opacity-70">/{{$row->unit}}</span></div>
                                                    @else
                                                        <div class="product_price discount">
                                                            <del>
                                                        <span>{{$setting->currency}}{{$row->selling_price}}
                                                        </span></del>
                                                            {{$setting->currency}}{{$row->discount_price}}
                                                            <span class="opacity-70">/{{$row->unit}}</span></div>
                                                    @endif

                                                    <div class="product_name"><div><a href="{{route('product.details' ,$row->slug)}}">{{substr($row->name ,0, 20)}}..</a></div></div>
                                                    <div class="product_extras">
                                                        <button class="product_cart_button">Add to Cart</button>
                                                    </div>
                                                </div>
                                                <a href="{{route('add.wishlist',$row->id)}}">
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div></a>

                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount quick_view" id="{{$row->id}}" data-toggle="modal" data-target="#quick-view">
                                                        <i class="fas fa-eye" ></i></li>
                                                    <li class="product_mark product_new">new</li>

                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">

                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('public/frontend') }}/images/featured_1.png" alt=""></div>
                                            <div class="product_content">
                                                <div class="product_price discount">$225<span>$300</span></div>
                                                <div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color" style="background:#b19c83">
                                                        <input type="radio" name="product_color" style="background:#000000">
                                                        <input type="radio" name="product_color" style="background:#999999">
                                                    </div>
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </div>
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount quick_view" id="{{$row->id}}" data-toggle="modal" data-target="#quick-view">
                                                    <i class="fas fa-eye" ></i></li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

  {{--  <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Categories</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="#">full catalog</a></div>
                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            <!-- Popular Categories Item -->
                            @foreach($category as $row)
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img src="{{ asset('public/files/product') }}/{{$row->image}}" alt="{{$row->category_name}}"></div>
                                    <div class="popular_category_text">{{$row->category_name}}</div>
                                </div>
                            </div>

                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

--}}

    <!--- categories by product -->
    @foreach($home_category as $row)
        @php
            $cat_product =App\Models\Product::where('status',1)->where('category_id',$row->id)->orderBY('id','DESC')->limit(30)->get();
        @endphp
    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{$row->category_name}}</div>
                            <ul class="clearfix">
                                <li class="btn btn-danger">View More</li>

                            </ul>
                            <div class="tabs_line"><span></span></div>
                            </div>
                            <div class="row">
                            <div class="col-lg-12" style="z-index:1;">
                                <div class="product_panel panel active">
                                     <div class="arrivals_slider slider">
                                     @foreach($cat_product as $row)
                                         <!-- Slider Item -->
                                             <div class="arrivals_slider_item">
                                                 <div class="border_active"></div>
                                                 <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                     <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                         <img style="height: 140px; width: 110px" src="{{ asset('public/files/product') }}/{{$row->thumbnail}}" alt="{{$row->name}}">
                                                     </div>
                                                     <div class="product_content">
                                                         @if($row->discount_price==NULL)
                                                             <div class="product_price discount">{{$setting->currency}}{{$row->selling_price}}<span class="opacity-70">/{{$row->unit}}</span></div>
                                                         @else
                                                             <div class="product_price discount">
                                                                 <del>
                                                        <span>{{$setting->currency}}{{$row->selling_price}}
                                                        </span></del>
                                                                 {{$setting->currency}}{{$row->discount_price}}
                                                                 <span class="opacity-70">/{{$row->unit}}</span></div>
                                                         @endif

                                                         <div class="product_name"><div><a href="{{route('product.details' ,$row->slug)}}">{{substr($row->name ,0, 20)}}..</a></div></div>
                                                         <div class="product_extras">
                                                             <button class="product_cart_button">Add to Cart</button>
                                                         </div>
                                                     </div>
                                                     <a href="{{route('add.wishlist',$row->id)}}">
                                                         <div class="product_fav"><i class="fas fa-heart"></i></div></a>

                                                     <ul class="product_marks">
                                                         <li class="product_mark product_discount quick_view" id="{{$row->id}}" data-toggle="modal" data-target="#quick-view">
                                                             <i class="fas fa-eye" ></i></li>
                                                         <li class="product_mark product_new">new</li>

                                                     </ul>
                                                 </div>
                                             </div>
                                     @endforeach
                                    <!-- Slider Item -->

                                     </div>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endforeach






    <!-- Adverts -->



    <div class="trends">
        <div class="trends_background" style="background-image:url({{ asset('public/frontend') }}/images/trends_background.jpg)"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">
                <!-- Trends Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Trendy product</h2>
                        <div class="trends_text"><p>This Year trendy products</p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">
                            @foreach($trendy_product as $row)
                            <!-- Trends Slider Item -->
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('public/files/product') }}/{{$row->thumbnail}}" alt=""></div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">{{$row->category->category_name}}</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{route('product.details' ,$row->slug)}}">{{substr($row->name,0,25)}}..</a></div>

                                                @if($row->discount_price==NULL)
                                                    <div class=" trends_price">{{$setting->currency}}{{$row->selling_price}}<small class="opacity-70">/{{$row->unit}}</small></div>
                                                @else
                                                    <div class="trends_price text-center text-red">
                                                        <del>
                                                        <span>{{$setting->currency}}{{$row->selling_price}}
                                                        </span></del>
                                                        {{$setting->currency}}{{$row->discount_price}}
                                                        <small class="opacity-70">/{{$row->unit}}</small></div>
                                                @endif
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_new quick_view" id="{{$row->id}}" data-toggle="modal" data-target="#quick-view">
                                            <i class="fas fa-eye" ></i></li>

                                    </ul>
                                    <a href="{{route('add.wishlist',$row->id)}}">
                                        <div class="trends_fav"><i class="fas fa-heart"></i></div></a>

                                </div>
                            </div>

                            @endforeach
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
                        <h3 class="viewed_title">Top View Product</h3>
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

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brand-title">
                        <h3>Brands</h3>
                    </div>
                    <div class="brands_slider_container">

                        <div class="owl-carousel owl-theme brands_slider">
                            @foreach($brand as $row)
                                <a href="{{route('brandwise.product',$row->id)}}">
                            <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center">
                                    <img style="height: 50px"; width="50px" src="{{ asset($row->brand_logo) }}" alt="{{$row->brand_name}}">
                                        <br>
                                        <h5 class="brand_name text-center">{{substr($row->brand_name,0,10)}}</h5>
                                </div>
                            </div></a>
                            @endforeach
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
                            <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="{{route('store.newsletter')}}" method="post" class="newsletter_form" id="newsletter_form">
                                @csrf
                                <input type="email" name="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                                <button class="newsletter_button" type="submit">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    {{-- edit modal --}}
    <!-- Extra large modal -->


   <div class="modal fade " id="quick-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content abc p-2">
                <div class="modal-body " id="quick_view_body">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script  type="text/javascript">

        $('#newsletter_form').submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var request  = $(this).serialize();
            $.ajax({
                url:url,
                type:'post',
                async:false,
                data:request,
                success:function (data) {
                    $('#newsletter_form')[0].reset();
                }
            });
        });


       $('body').on('click','.quick_view', function(){
            let id=$(this).attr("id");
            // alert(id);
            $.ajax({
                url: "{{ ("qv/product-quick-view") }}/"+id,
                type: 'get',
                success: function (data) {
                    $("#quick_view_body").html(data);
                }
            });
        });


    </script>
@endsection
