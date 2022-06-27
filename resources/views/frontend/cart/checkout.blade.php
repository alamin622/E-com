@extends('layouts.app')
@section('content')
    @include('layouts.front_partial.collapse_nav')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend') }}/styles/product_responsive.css">

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart</div>

                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($content as $row)
                                    @php
                                        $product = DB::table('products')->where('id',$row->id)->first();
                                        $colors = explode(',', $product->color);
                                        $sizes = explode(',', $product->size);
                                    @endphp
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{ asset('public/files/product/'.$row->options->thumbnail)}}" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Product</div>
                                                <div class="cart_item_text">{{substr($row->name,0,15)}}..</div>
                                            </div>

                                            {{--  <div class="cart_item_color cart_info_col">
                                                  <div class="cart_item_title">Color</div>
                                                  <select class="custom-select form-control-sm mt-5" style="min-width: 100px" name="color" id="">
                                                      @foreach ($colors as $color)
                                                              <option  value="{{$color}}" @if ($color == $row->options->color) selected="" @endif >{{$color}} </option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                              @if($row->options->size==!NULL)
                                              <div class="cart_item_color cart_info_col">
                                                  <div class="cart_item_title">Size</div>
                                                  <select class="custom-select form-control-sm mt-5" style="min-width: 100px" name="size" id="">
                                                      @foreach ($sizes as $size)
                                                          <option  value="{{$size}}"  @if ($size == $row->options->size) selected=""  @endif>{{$size}} </option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              @endif--}}


                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text">

                                                    <div style="width: 120px !important;" class="product_quantity clearfix">
                                                        <input id="quantity_input" data-id="{{$row->rowId}}" class="qty" name="qty" type="number" value="{{$row->qty}}" min="1" >
                                                        {{--<div class="quantity_buttons">
                                                            <div id="quantity_inc_button" data-field="qty[0]" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                                            <div id="quantity_dec_button" data-field="qty[0]" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                                        </div>--}}
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{$setting->currency}}
                                                    {{$row->price}}*{{$row->qty}}
                                                </div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">{{$setting->currency}}
                                                    {{$row->qty*$row->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <div class="cart_item_text">
                                                    <a href="#" data-id="{{$row->rowId}}" id="removeProduct"><i  class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">{{$setting->currency}}{{Cart::total()}}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <a href="{{route('cart.empty')}}" type="button" class="btn btn-danger ">All Cart Clear</a>
                            <a href="{{route('billingaddress')}}" type="button" class="btn btn-success">Continue to Checkout</a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4  " style="margin-top: 7rem;">

                    <div class="card sticky-top">
                        <div class="card-title py-3">
                            <div class="row align-items-center px-4">
                                <div class="col-6">
                                    <h3 class="heading heading-3 strong-400 mb-0">
                                        <span>Summary</span>
                                    </h3>
                                </div>

                                <div class="col-6 text-right">
                                    <span class="badge badge-md badge-success">1 Items</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table-cart table-cart-review">
                                <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($content as $row)
                                    @php
                                        $product = DB::table('products')->where('id',$row->id)->first();
                                        $colors = explode(',', $product->color);
                                        $sizes = explode(',', $product->size);
                                    @endphp
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{substr($row->name,0,25)}}..
                                            <strong class="product-quantity">× {{$row->qty}}</strong>
                                        </td>
                                        <td class="product-total text-right">
                                        <span class="pl-4">{{$setting->currency}}
                                            {{$row->price}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <table class="table-cart table-cart-review">

                                <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td class="text-right">
                                        <span class="strong-600">{{$setting->currency}}{{Cart::total()}}</span>
                                    </td>
                                </tr>

                                <tr class="cart-shipping">
                                    <th>Tax</th>
                                    <td class="text-right">
                                        <span class="text-italic">৳0.00</span>
                                    </td>
                                </tr>

                                <tr class="cart-shipping">
                                    <th>Total Shipping</th>
                                    <td class="text-right">
                                        <span class="text-italic">৳0.00</span>
                                    </td>
                                </tr>



                                <tr class="cart-total">
                                    <th><span class="strong-600">Total</span></th>
                                    <td class="text-right">
                                        <strong><span>৳1,190.00</span></strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                            <div class="mt-3">
                                <form class="form-inline" action="https://www.momkidsbd.com/checkout/apply_coupon_code" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="IHYT2DaooYVyUyiIw8QCpGyVuy417uR9fhfz6LVY">                        <div class="form-group flex-grow-1">
                                        <input type="text" class="form-control w-100" name="code" placeholder="Have coupon code  Enter here" required="">
                                    </div>
                                    <button type="submit" class="btn btn-danger">Apply</button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $('body').on('click','#removeProduct', function(){
            let id=$(this).data('id');
            $.ajax({
                url:'{{ url('qv/cartproduct/remove/') }}/'+id,
                type:'get',
                async:false,
                success:function (data) {
                    //toaster.success(data);
                    location.reload();

                }
            });
        });

        $('body').on('blur','.qty', function(){
            let qty=$(this).val();
            let rowId=$(this).data('id');
            //alert(rowId);
            $.ajax({
                url:'{{ url('qv/cartproduct/updateqty/') }}/'+rowId+ '/'+qty,
                type:'get',
                async:false,
                success:function (data) {
                    //toaster.success(data);
                    location.reload();

                }
            });
        });
    </script>
@endsection
