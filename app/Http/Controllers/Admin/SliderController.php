<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Image;
use File;
use DB;
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('sliders')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row){
                    if ($row->status==1){
                        return '<a href="#" data-id="'.$row->id.'" class="deactive_status"> <i class="fa fa-eye text-danger"></i> Active </a>';
                    }else{
                        return '<a href="#" data-id="'.$row->id.'" class="active_status"> <i class="fa fa-eye text-green"></i> DeActive </a>';
                    }
                })
                ->addColumn('action', function($row){
                    $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="'.route('slider.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                      	</a>';
                    return $actionbtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin.slider.index');
    }

    public function store(Request $request)
    {

        $data=array();
        $data['link']=$request->link;

        //working with image
     /*   if ($request->photo){
            $photo=$request->photo;
            $photoname= hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            $photo->move('public/files/slider/',$photoname);  //without image intervention
            //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention
            $data['photo']=$photoname;   // public/files/brand/plus-point.jpg

        }*/
        //working with image
        $photo=$request->photo;
        $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
        $photo->move('public/files/slider/',$photoname);  //without image intervention
        //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention
        $data['photo']='public/files/slider/'.$photoname;   // public/files/brand/plus-point.jpg
        DB::table('sliders')->insert($data);
        $notification=array('messege' => 'Slider Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data=DB::table('sliders')->where('id',$id)->first();
        return view('admin.slider.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $data=array();
        $data['link']=$request->link;
        if ($request->photo) {
            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }
            $photo=$request->photo;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);
            $photo->move('public/files/slider/',$photoname);
            $data['photo']='public/files/slider/'.$photoname;
            DB::table('sliders')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'Slider Updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $data['photo']=$request->old_logo;
            DB::table('sliders')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'Slider Updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {
        $data=DB::table('sliders')->where('id',$id)->first();
        $image=$data->photo;

        if (File::exists($image)) {
            unlink($image);
        }
        DB::table('sliders')->where('id',$id)->delete();
        $notification=array('messege' => 'Slider Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //*************active deactive status***************
    public function Activestatus($id){
        DB::table('sliders')->where('id', $id)->update(['status'=>1]);
        $notification=array('messege' => 'Status Deactive!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function Deactivestatus($id){
        DB::table('sliders')->where('id', $id)->update(['status'=>0]);
        $notification=array('messege' => 'Status Active!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
