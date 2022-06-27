<?php

namespace App\Http\Controllers\Admin;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = DB::table('pages')->latest()->get();
        return view('admin.setting.page.index', compact('page'));
    }
    public function create()
    {
        $page=DB::table('pages')->first();
        return view('admin.setting.page.create');
    }

    public function store( Request $request)
    {
        $data = array();
        $data['page_position'] =$request->page_position;
        $data['page_name'] =$request->page_name;
        //$data['page_slug'] =Str::slug($request->page_name, '-');
        $data['page_title'] =$request->page_title;
         $data['page_description'] =$request->page_description;
        DB::table('pages')->insert($data);
        //dd($data);
        $notification=array('messege' => 'Page Inserted!', 'alert-type' => 'success');
        return redirect()->route('page.index')->with($notification);

    }
    public function edit( $id)
    {
        $page=DB::table('pages')->first();
        return view('admin.setting.page.edit',compact('page'));
    }
    public function update( Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['page_position'] =$request->page_position;
        $data['page_name'] =$request->page_name;
        //$data['page_slug'] =Str::slug($request->page_name, '-');
        $data['page_title'] =$request->page_title;
        $data['page_description'] =$request->page_description;
        DB::table('pages')->where('id',$id)->update($data);
       // dd($data);
        $notification=array('messege' => 'Page Updated!', 'alert-type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }
    public function destroy($id)
    {
        $page=Page::find($id);
        $page->delete();
        $notification=array('messege' => 'Page Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
