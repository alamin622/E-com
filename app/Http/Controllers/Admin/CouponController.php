<?php

namespace App\Http\Controllers\Admin;
use App\Models\Coupon;
use DB;
use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('coupons')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="'.route('coupon.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete_coupon"><i class="fas fa-trash"></i>
                      	</a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.offer.coupon.index');
    }

    public function store(Request $request)
    {
        $data=array();
        $data['coupon_code']=$request->coupon_code;
        $data['coupon_amount']=$request->coupon_amount;
        $data['type']=$request->type;
        $data['valid_date']=$request->valid_date;
        $data['status']=$request->status ;
        DB::table('coupons')->insert($data);
        $notification=array('messege' => 'Coupon Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data = Coupon::find($id);
        return view('admin.offer.coupon.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $data=array();
        $data['coupon_code']=$request->coupon_code;
        $data['coupon_amount']=$request->coupon_amount;
        $data['type']=$request->type;
        $data['valid_date']=$request->valid_date;
        DB::table('coupons')->where('id',$request->id)->update($data);
        $notification=array('messege' => 'Coupon Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function destroy($id)
    {
        DB::table('coupons')->where('id',$id)->delete();
        $notification=array('messege' => 'Coupon Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

}
