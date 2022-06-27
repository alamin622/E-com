<?php

namespace App\Http\Controllers\Front;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    //Root Page
    public function index( Request $request){
        $category = Category::orderby('category_name', 'ASC')->get();
        $brand = Brand::inRandomOrder()->get();
        $bannerproduct = Product::where('status',1)->where('product_slider',1)->latest()->first();
        $featured = Product::where('status',1)->where('featured',1)->orderBY('id','DESC')->limit(24)->get();
        $trendy_product = Product::where('status',1)->where('trendy_product',1)->orderBY('id','DESC')->limit(16)->get();
        $popular_product = Product::where('status',1)->orderBY('product_views','DESC')->limit(30)->get();
        $random_product = Product::where('status',1)->inRandomOrder()->limit(16)->get();
        $today_deal = Product::where('status',1)->where('today_deal',1)->orderBY('id','DESC')->limit(14)->get();
        $home_category  = DB::table('categories')->where('home_page',1)->orderBy('category_name','ASC')->get();
        $slider = DB::table('sliders')->where('status',1)->get();


        return view('frontend.index',compact('category','bannerproduct','featured','popular_product',
            'trendy_product','home_category','brand','random_product','today_deal','slider'));
    }

    //Product Details Page
    public function ProductDetails( $slug){
        $product = Product::where('slug',$slug)->first();
        $product_views = Product::where('slug',$slug)->increment('product_views');
        $relatedproduct = DB::table('products')->where('subcategory_id', $product->subcategory_id)->limit(10)->get();
        $review = Review::where('product_id', $product->id)->get();

        //dd($relatedproduct);
        return view('frontend.product.product_details',compact('product','relatedproduct','review','product_views'));
    }
    public  function ProductQuickView($id){
        $product = Product::where('id',$id)->first();
        $relatedproduct = DB::table('products')->where('subcategory_id', $product->subcategory_id)->limit(10)->get();
        $review = Review::where('product_id', $product->id)->get();
        //dd($relatedproduct);
         //return response()->json($product);

        return view('frontend.product.quick_view',compact('product','relatedproduct','review'));
    }

    public function PageManage($id){
        $pages = DB::table('pages')->where('id',$id)->first();
        return view('frontend.page.index',compact('pages'));

    }
    public function Newsletter(Request $request){
        $email  = $request->email;
        $check = DB::table('newsletters')->where('email',$email)->first();
        if($check){
            $notification=array('messege' => 'Already Email Exits!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }else{
            $data = array();
            $data['email']=$request->email;
            DB::table('newsletters')->insert($data);
            $notification=array('messege' => 'Thanks For subscribe!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
