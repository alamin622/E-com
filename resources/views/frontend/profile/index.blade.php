@extends('layouts.app')
@section('content')
    @include('layouts.front_partial.collapse_nav')

    <br><br>

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.profile.profile_sidebar')
                </div>

                <div class="col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                Dashboard
                            </h2>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                <a href="javascript:;" class="d-block">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="d-block title">0 Product</span>
                                    <span class="d-block sub-title">In your cart</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                <a href="javascript:;" class="d-block">
                                    <i class="fa fa-heart"></i>
                                    <span class="d-block title">0 Product(s)</span>
                                    <span class="d-block sub-title">In your wishlist</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                <a href="javascript:;" class="d-block">
                                    <i class="fa fa-building"></i>
                                    <span class="d-block title">3 Product(s)</span>
                                    <span class="d-block sub-title">You ordered</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
