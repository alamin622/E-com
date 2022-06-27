<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\PickupPoint;
use DataTables;
use Illuminate\Http\Request;

class PickuppointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('pickup_points')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="'.route('pickup_point.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                      	</a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pickup_point.index');
    }
    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['pickup_status'] = $request->pickup_status;
        $data['cash_on_pickup_status'] = $request->cash_on_pickup_status;
        DB::table('pickup_points')->where('id',$request->id)->insert($data);
        $notification=array('messege' => 'Pickup point Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = DB::table('pickup_points')->where('id',$id)->first();
        return view('admin.pickup_point.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = array(
            'name' =>$request->name,
            'address' =>$request->address,
            'phone' =>$request->phone,
        );
      //  $data['name'] = $request->name;
        //$data['address'] = $request->address;
       // $data['phone'] = $request->phone;
      //  $data['pickup_status'] = $request->pickup_status;
     //   $data['cash_on_pickup_status'] = $request->cash_on_pickup_status;
        DB::table('pickup_points')->where('id',$request->id)->update($data);
        //dd($data);
        $notification=array('messege' => 'Pick up point Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function destroy($id)
    {

        DB::table('pickup_points')->where('id',$id)->delete();

        $notification=array('messege' => 'Pickup point  Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
