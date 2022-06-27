<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Product;


class CategoryproductsController extends Controller
{
    public function CategoryWiseProduct($id){
        $category = DB::table('categories')->where('id', $id)->first();
        $products = DB::table('products')->where('category_id', $id)->paginate(60);
        $subcategory = DB::table('subcategories')->where('category_id',$id)->get();
        $brand = DB::table('brands')->get();
        $random_product = Product::where('status',1)->inRandomOrder()->limit(16)->get();
        return view('frontend.product.category_products',compact('products','subcategory','brand','random_product','category'));
    }

    public function SubcategoryWiseProduct($id){
        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        $products = DB::table('products')->where('subcategory_id', $id)->paginate(60);
        $childcategory = DB::table('childcategories')->where('subcategory_id',$id)->get();
        $brand = DB::table('brands')->get();
        $random_product = Product::where('status',1)->inRandomOrder()->limit(16)->get();
        return view('frontend.product.subcategory_products',compact('products','childcategory','brand','random_product','subcategory'));
    }

    public function ChildcategoryWiseProduct($id){
        $category = DB::table('categories')->get();
        $products = DB::table('products')->where('childcategory_id', $id)->paginate(60);
        $childcategory = DB::table('childcategories')->where('id',$id)->first();
        $brand = DB::table('brands')->get();
        $random_product = Product::where('status',1)->inRandomOrder()->limit(16)->get();
        return view('frontend.product.childcategory_products',compact('products','childcategory','brand','random_product','category'));
    }

    public function BrandWiseProduct($id){
        $category = DB::table('categories')->get();
        $products = DB::table('products')->where('brand_id', $id)->paginate(60);
        $brand = DB::table('brands')->where('id',$id)->first();
        $brands = DB::table('brands')->get();
        $random_product = Product::where('status',1)->inRandomOrder()->limit(16)->get();
        return view('frontend.product.brand_products',compact('products','brands','brand','random_product','category'));
    }
}
