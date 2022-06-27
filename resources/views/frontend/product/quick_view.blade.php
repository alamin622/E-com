
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_responsive.css">

<div class="modal-body">

   {{-- <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="{{ asset('public/files/product') }}/{{$product->thumbnail}}">
                            <img src="{{ asset('public/files/product') }}/{{$product->thumbnail}}" alt=""></li>
                        @foreach (json_decode($product->images) as $key => $image)
                            <li data-image="{{ asset('public/files/product/'.$image) }}">
                                <img src="{{ asset('public/files/product/'.$image) }}" alt=""></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="images/single_4.jpg" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">Laptops</div>
                        <div class="product_name">MacBook Air 13</div>
                        <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis.</p></div>
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                                <div class="clearfix" style="z-index: 1000;">

                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix">
                                        <span>Quantity: </span>
                                        <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>

                                    <!-- Product Color -->
                                    <ul class="product_color">
                                        <li>
                                            <span>Color: </span>
                                            <div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
                                            <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                                            <ul class="color_list">
                                                <li><div class="color_mark" style="background: #999999;"></div></li>
                                                <li><div class="color_mark" style="background: #b19c83;"></div></li>
                                                <li><div class="color_mark" style="background: #000000;"></div></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>

                                <div class="product_price">$2000</div>
                                <div class="button_container">
                                    <button type="button" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>--}}

     <div class="container new-edit single-p-customize">
         <div class="row">
             <div class="col-lg-2 order-lg-1 order-2">
                 <ul class="image_list">
                     <li data-image="{{ asset('public/files/product') }}/{{$product->thumbnail}}">
                         <img src="{{ asset('public/files/product') }}/{{$product->thumbnail}}" alt=""></li>
                     @foreach (json_decode($product->images) as $key => $image)
                         <li data-image="{{ asset('public/files/product/'.$image) }}">
                             <img src="{{ asset('public/files/product/'.$image) }}" alt=""></li>
                     @endforeach
                 </ul>
             </div>

             <!-- Selected Image -->
             <div class="col-lg-5 order-lg-2 order-1">
                 <div class="image_selected"><img src="{{ asset('public/files/product') }}/{{$product->thumbnail}}" alt=""></div>
             </div>

             <!-- Description -->

             <div class="col-lg-5 order-3">
                 <div class="text-left">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                     <h3 class="mb-2 fs-20 fw-600">
                         {{$product->name}}
                     </h3>

                     <div class="row align-items-center">
                         <div class="col-12 ">
                             <div class="row align-items-center my-1">

                                 <div class="col-12 text-right">
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

                     <form action="{{ route('add.to.cart') }}" method="Post" id="add_cart_form">
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
                                         @foreach ((explode(',',$product->size)) as $key => $row)
                                             <label class="aiz-megabox pl-0 mr-2">
                                                 <input type="radio" name="size" checked="">
                                                 <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-2">
                                             {{$row}}
                                         </span>
                                             </label>
                                         @endforeach
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
                                         @foreach ((explode(',',$product->color)) as $key => $row)
                                             <label class="aiz-megabox pl-0 mr-2">
                                                 <input type="radio" name="size" checked="">
                                                 <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-2">
                                         {{$row}}
                                         </span>
                                             </label>
                                         @endforeach
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
                                         <input id="quantity_input" type="number" min="1" max="100" name="qty" pattern="[1-9]*" value="1">
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

                     <div class="mt-3">
                         @if($product->stock_quantity<1)
                             <button type="button" class="button addcart cart_button badge-dark btn-primary" disabled="">
                                Out of Stock
                             </button>
                             @else
                             <button type="submit" class="button addcart cart_button badge-dark btn-danger"><span class="loading d-none">...</span> Add to Cart</button>

                         @endif

                     </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>
</div>
<script src="{{ asset('public/frontend') }}/js/product_custom.js"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5bf015c8b4a6560011bd9a88&product=inline-share-buttons' data-href="{{ Request::url() }}" async='async'></script>


            <script type='text/javascript'>
            $('#add_cart_form').submit(function (e) {
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
            $('#add_cart_form')[0].reset();
                cart();

            }
            });
            });

            </script>
