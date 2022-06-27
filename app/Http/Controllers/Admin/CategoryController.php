<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //all category showing method
    public function index()
    {
        // $data=DB::table('categories')->get();  //query builder
        $data=Category::orderBy('created_at', 'ASC')->paginate();  //eloquent ORM
        return view('admin.category.category.index',compact('data'));
    }
    //store method
    public function store(Request $request)
    {
        $validated = $request->validate([
           'category_name' => 'required|unique:categories|max:55',
       ]);

         $data=array();
         $data['category_name']=$request->category_name;
         $data['category_slug']=Str::slug($request->category_name, '-');
        $data['home_page']=$request->home_page;
        $photo=$request->image;
        $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
        $photo->move('public/files/category/',$photoname);  //without image intervention
        //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention
        $data['image']='public/files/category/'.$photoname;   // public/files/brand/plus-point.jpg
        //working on icon
        $photo=$request->icon;
        $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
        $photo->move('public/files/category/',$photoname);  //without image intervention
        //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention
        $data['icon']='public/files/category/'.$photoname;   // public/files/brand/plus-point.jpg
        DB::table('categories')->insert($data);

       /* $category = Category::create([
            'category_name'=> $request->category_name,
            'category_slug'=> Str::slug($request->category_name, '-'),
            'home_page'=> $request->home_page,
        ]);*/
        $notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.category.edit',compact('data'));
    }
    //update method
    public function update(Request $request)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_slug']=Str::slug($request->category_name, '-');
        $data['home_page']=$request->home_page;

        if ($request->icon) {
            if (File::exists($request->old_icon)) {
                unlink($request->old_icon);
            }
            $photo=$request->icon;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);
            $photo->move('public/files/category/',$photoname);
            $data['icon']='public/files/category/'.$photoname;
            DB::table('categories')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'category Updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }

        elseif ($request->image) {
            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }
            $photo=$request->image;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);
            $photo->move('public/files/category/',$photoname);
            $data['image']='public/files/category/'.$photoname;
            DB::table('categories')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'category Updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $data['image']=$request->old_logo;

            DB::table('categories')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'Category Updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }



    }

    //delete category method
    public function destroy($id)
    {
        $data=DB::table('categories')->where('id',$id)->first();
        $image=$data->image;

        if (File::exists($image)) {
            unlink($image);
        }
        DB::table('categories')->where('id',$id)->delete();
        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function GetChildcategory($id)
    {
        $data = DB::table('childcategories')->where('subcategory_id', $id)->get();
        return response()->json($data);

    }


}
