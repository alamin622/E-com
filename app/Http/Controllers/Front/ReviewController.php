<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request){
        $check = DB::table('reviews')->where('user_id', Auth::id())->where('product_id',$request->product_id)->first();
        if ($check){
            $notification=array('messege' => 'Already have a Review for this product !', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        $data = array();
        $data['user_id'] = Auth::id();
        $data['product_id'] =$request->product_id;
        $data['review'] =$request->review;
        $data['rating'] =$request->rating;
        $data['date'] =date('d-m-Y');
        $data['month'] =date('F');
        $data['year'] = date('Y');
        DB::table('reviews')->insert($data);
        //dd($data);
        $notification=array('messege' => 'Thanks for Review!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }
}
