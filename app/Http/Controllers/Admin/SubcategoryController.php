<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;
class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $data = DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')
        //->select('subcategories.*','categories.category_name')->get();
        $data =Subcategory::all();
        $category=Category::all();
        return view('admin.category.subcategory.index', compact('data','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);
      //Eloquent ORM
         Subcategory::insert([
           'category_id'=> $request->category_id,
           'subcategory_name'=> $request->subcategory_name,
           'subcat_slug'=> Str::slug($request->subcategory_name, '-')
    ]);

    $notification=array('messege' => 'Sub Category Inserted!', 'alert-type' => 'success');
    return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Subcategory::find($id);
        $category=Category::all();
        return view('admin.category.subcategory.edit', compact('data','category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Eloquent ORM
        $subcategory=Subcategory::where('id',$request->id)->first();
        $subcategory->update([
            'category_id'=> $request->category_id,
             'subcategory_name'=>$request->subcategory_name,
             'subcategory_slug'=> Str::slug($request->subcategory_name, '-'),
        ]);


         $notification=array('messege' => 'Sub Category Updated!', 'alert-type' => 'success');
         return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //query builder
           //DB::table('categories')->where('id',$id)->delete();
        //eleqoent ORM
        $subcategory=Subcategory::find($id);
        $subcategory->delete();

        $notification=array('messege' => 'SubCategory Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function Getsubcategory( $id)
    {
        $data = DB::table('subcategories')->where('category_id', $id)->get();
        return response()->json($data);


    }
}
