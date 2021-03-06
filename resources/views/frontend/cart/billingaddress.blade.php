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
                        <div class="cart_title">Billing Address</div>
                        <div class="cart_items">

                        </div>
                        <form class="form-default" data-toggle="validator" action="https://www.momkidsbd.com/checkout/delivery_info" role="form" method="POST">
                            <input type="hidden" name="_token" value="x0rYv9GPtMyqvO7gksU7Xj3DRGkUB45kuLfQ6knc">                                                                    <div class="row gutters-5">
                                <div class="col-md-6">
                                    <label class="aiz-megabox d-block bg-white">
                                        <input type="radio" name="address_id" value="1157" required="">
                                        <span class="d-flex p-3 aiz-megabox-elem">
                                                        <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                        <span class="flex-grow-1 pl-3">
                                                            <div>
                                                                <span class="alpha-6">Name:</span>
                                                                <span class="strong-600 ml-2">{{Auth::user()->name}}</span>
                                                            </div>
                                                             <div>
                                                                <span class="alpha-6">Address:</span>
                                                                <span class="strong-600 ml-2">{{Auth::user()->name}}</span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6">Postal Code:</span>
                                                                <span class="strong-600 ml-2">1215</span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6">City:</span>
                                                                <span class="strong-600 ml-2">Dhaka</span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6">Country:</span>
                                                                <span class="strong-600 ml-2">Bangladesh</span>
                                                            </div>
                                                            <div>
                                                                <span class="alpha-6">Phone:</span>
                                                                <span class="strong-600 ml-2">8801717852644</span>
                                                            </div>
                                                        </span>
                                                    </span>
                                    </label>
                                </div>
                                <input type="hidden" name="checkout_type" value="logged">
                                <div class="col-md-6 mx-auto" onclick="add_new_address()">
                                    <div class="border p-3 rounded mb-3 c-pointer text-center bg-white">
                                        <i class="la la-plus la-2x"></i>
                                        <div class="alpha-7">Add New Address</div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="cart_buttons">
                            <a href="{{route('cart.empty')}}" type="button" class="btn btn-danger ">All Cart Clear</a>
                            <a href="{{route('billingaddress')}}" type="button" class="btn btn-success">Continue to Payment</a>

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
                                            <strong class="product-quantity">?? {{$row->qty}}</strong>
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
                                        <span class="text-italic">???0.00</span>
                                    </td>
                                </tr>

                                <tr class="cart-shipping">
                                    <th>Total Shipping</th>
                                    <td class="text-right">
                                        <span class="text-italic">???0.00</span>
                                    </td>
                                </tr>



                                <tr class="cart-total">
                                    <th><span class="strong-600">Total</span></th>
                                    <td class="text-right">
                                        <strong><span>???1,190.00</span></strong>
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
