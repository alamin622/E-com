<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use DB;
use App\Models\Product;
class CartController extends Controller
{
    public  function AddToCart( Request $request){
        $product = Product::find($request->id);
        Cart::add([

            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'weight' => '1',
            'options' => ['size' => $request->size, 'color' => $request->color, 'thumbnail' => $product->thumbnail]
        ]);
        $notification=array('messege' => 'Cart Added!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function AllCart(){
        $data = array();
        $data['cart_qty'] = Cart::count();
        $data['cart_total'] = Cart::total();
        return response()->json($data);
    }
    public function MyCart(){
        $content = Cart::content();
        return view('frontend.cart.cart', compact('content'));
    }
    public function RemoveProduct($rowId){
        Cart::remove($rowId);
        $notification=array('messege' => 'Cart delete!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function UpdateQty($rowId,$qty){
        Cart::update($rowId, ['qty' =>$qty]); // Will update the quantity
        $notification=array('messege' => 'Cart Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
    public function EmptyCart(){
        Cart::destroy();
        $notification=array('messege' => 'All cart Clear!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
