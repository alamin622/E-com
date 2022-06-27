<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Image;
use File;
use DB;
class CampaignsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('campaigns')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($row){
                    if ($row->status==1){
                        return '<a href="#" > <i class="fa fa-eye text-danger"></i> Active </a>';
                    }else{
                        return '<a href="#"> <i class="fa fa-eye text-green"></i> Deactive </a>';
                    }
                })
                ->addColumn('action', function($row){
                    $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="'.route('campaign.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                      	</a>';
                    return $actionbtn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('admin.offer.campaign.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required',
            'discount' => 'required',
            'title' => 'required|unique:campaigns|max:55',
            'image' => 'required|',

        ]);
        $data=array();
        $data['start_date']=$request->start_date;
        $data['end_date']=$request->end_date;
        $data['title']=$request->title;
        $data['discount']=$request->discount;
        $data['status']=$request->status;
        $data['month'] =date('F');
        $data['year'] = date('Y');

        //working with image
        $photo=$request->image;
        $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
        $photo->move('public/files/campaign/',$photoname);  //without image intervention
        //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);  //image intervention

        $data['image']='public/files/campaign/'.$photoname;   // public/files/brand/plus-point.jpg
        DB::table('campaigns')->insert($data);
        $notification=array('messege' => 'Campaign Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function edit($id)
    {
        $data=DB::table('campaigns')->where('id',$id)->first();
        return view('admin.offer.campaign.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $data['start_date']=$request->start_date;
        $data['end_date']=$request->end_date;
        $data['title']=$request->title;
        $data['discount']=$request->discount;
        $data['status']=$request->status;
        $data['month'] =date('F');
        $data['year'] = date('Y');
        if ($request->image) {
            if (File::exists($request->image)) {
                unlink($request->image);
            }
            $photo=$request->image;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);
            $photo->move('public/files/campaign/',$photoname);
            $data['image']='public/files/campaign/'.$photoname;
            DB::table('campaigns')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'campaign Updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            $data['image']=$request->old_logo;
            DB::table('campaigns')->where('id',$request->id)->update($data);
            $notification=array('messege' => 'Campaign Updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {
        $data=DB::table('campaigns')->where('id',$id)->first();
        $image=$data->image;

        if (File::exists($image)) {
            unlink($image);
        }
        DB::table('campaigns')->where('id',$id)->delete();
        $notification=array('messege' => 'Campaign Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
