<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use DataTables;
use DB;

class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if ($request->ajax()) {

    		$data=DB::table('childcategories')->leftJoin('categories','childcategories.category_id','categories.id')->leftJoin('subcategories','childcategories.subcategory_id','subcategories.id')
    		->select('categories.category_name','subcategories.subcategory_name','childcategories.*')->get();

    		return DataTables::of($data)
    				->addIndexColumn()
    				->addColumn('action', function($row){

    					$actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="'.route('childcategory.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                      	</a>';

                       return $actionbtn;

    				})
    				->rawColumns(['action'])
    				->make(true);
    	}

        $category= Category::with(['subcategories'])->get();

    	return view('admin.category.childcategory.index',compact('category'));
    }


    public function store(Request $request)
    {
       // dd($request->category_id);
        $validated = $request->validate([
            'childcategory_name' => 'required|max:55',
        ]);
         $cat=DB::table('subcategories')->where('id',$request->subcategory_id)->first();
         Childcategory::insert([
           'category_id'=> $cat->category_id,
           'subcategory_id'=> $request->subcategory_id,
           'childcategory_name'=> $request->childcategory_name,
           'childcategory_slug'=> Str::slug($request->childcategory_name, '-')
        ]);
        $notification=array('messege' => 'child Category Inserted!', 'alert-type' => 'success');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = childcategory::find($id);
        $category=Category::all();
        return view('admin.category.childcategory.edit', compact('data','category'));

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

        $cat=DB::table('subcategories')->where('id',$request->subcategory_id)->first();

        $data=array();
        $data['category_id']=$cat->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['childcategory_slug']=Str::slug($request->childcategory_name, '-');
        $data['childcategory_name']=$request->childcategory_name;

        DB::table('childcategories')->where('id',$request->id)->update($data);
        //dd($data);

        $notification=array('messege' => 'Child-Category Updated!', 'alert-type' => 'success');
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

      //  DB::table('childcategories')->where('id',$id)->delete();
       // $childcategory=Childcategory::find($id);
      //  $childcategory->delete();

        $childcategory =Childcategory::where('id',$id)->first();
        $childcategory->delete();

        $notification=array('messege' => 'ChildCategory Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
