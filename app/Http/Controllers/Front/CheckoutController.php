<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cart;

class CheckoutController extends Controller
{
    public  function Checkout(){
        if (!Auth::check()){
            $notification=array('messege' => 'Login Your Account!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        else{
            $content = Cart::content();
            return view('frontend.cart.checkout',compact('content'));
        }
    }

    public  function BillingAddress(){
        if (!Auth::check()){
            $notification=array('messege' => 'Login Your Account!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        else{
            $content = Cart::content();
            return view('frontend.cart.billingaddress',compact('content'));
        }
    }
}
