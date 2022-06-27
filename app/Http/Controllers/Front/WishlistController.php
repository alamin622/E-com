<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class WishlistController extends Controller
{


    public function Addwishlist($id){
        if (Auth::check()){
            $check = DB::table('wishlists')->where('product_id',$id)->where('user_id',Auth::id())->first();
            if ($check){
                $notification=array('messege' => 'Already have a Wishlist for this product !', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
            else{
                $data  = array();
                $data['product_id'] = $id;
                $data['user_id'] = Auth::id();
                $data['date'] = date('d  F Y');
                DB::table('wishlists')->insert($data);
                $notification=array('messege' => 'product Added on Wishlist!', 'alert-type' => 'success');
                return redirect()->back()->with($notification);

            }

        }

        $notification=array('messege' => 'Please login your Account!', 'alert-type' => 'error');
        return redirect()->back()->with($notification);
    }

    public function WishlistHome(){
        if (Auth::check()){
          /*  $wishlist = Wishlist::where('user_id',Auth::id())->first();*/
            $wishlist = DB::table('wishlists')->leftJoin('products','wishlists.product_id','products.id')
                ->select('products.name','products.thumbnail','products.slug','wishlists.*')
            ->where('wishlists.user_id',Auth::id())->get();

            //dd($wishlist);
            return view('frontend.wishlist.wishlist',compact('wishlist'));

        }
                $notification=array('messege' => 'At first login your account !', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
    }
    public function ClearWishlist(){
        DB::table('wishlists')->where('user_id',Auth::id())->delete();
        $notification=array('messege' => 'All Wishlist Clear !', 'alert-type' => 'Success');
        return redirect()->back()->with($notification);
    }
    public function Wishlistproductdelete($id){
        DB::table('wishlists')->where('id',$id)->delete();
        $notification=array('messege' => 'All Wishlist Clear !', 'alert-type' => 'Success');
        return redirect()->back()->with($notification);
    }
}
