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
                        <div class=" col-12">
                            <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                Dashboard
                            </h2>
                            <div class="col-md-12">
                                <div class=" mt-4 ml-0" style="background: #eee">
                                    <div class="form-box-title bg-red px-3 py-2" style="background: #2ba6cb">
                                        Basic info
                                    </div>
                                    <form action="{{'profile.setting.update'}}" method="post">
                                        @csrf

                                    <div class="form-box-content p-3" >
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Your Name</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control mb-3" placeholder="Your Name" name="name" value="abeer">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-10 ">
                                                <input id="email" type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label> Password</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input id="password" type="password" placeholder="password" class="form-control mb-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Confirm Password</label>
                                            </div>
                                            <div class="col-md-10">
                                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control mb-3" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                        <button type="Submit" class="btn btn-success">Update Profile</button>
                                    </form>
                                </div>



                                <br>
                                <br>
                                <div class="row" >
                                    <div class="col-md-6 p-4" style="background-color: #eee">
                                        <div class="form-box-title bg-red px-3 py-2" >
                                           Your Shipping Address
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="category_name"> Name</label>
                                            <input type="text" class="form-control" name="shipping_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name"> Address</label>
                                            <input type="text" class="form-control" name="shipping_address">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name"> Phone</label>
                                            <input type="text" class="form-control" name="shipping_phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name"> Email</label>
                                            <input type="text" class="form-control" name="shipping_email">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label for="category_name"> Country</label>
                                                <input type="text" class="form-control" name="shipping_country">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="category_name"> City</label>
                                                <input type="text" class="form-control" name="shipping_city">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="category_name"> Zipcode</label>
                                                <input type="text" class="form-control" name="shipping_zipcode">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        rtgrt
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
