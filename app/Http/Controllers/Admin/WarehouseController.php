<?php

namespace App\Http\Controllers\Admin;

use App\Models\Warehouse;

use DataTables;
use DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=DB::table('warehouses')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionbtn='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="'.route('warehouse.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                      	</a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $warehouse=DB::table('warehouses')->get();
        return view('admin.category.warehouse.index',compact('warehouse'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Warehouse::insert([
            'name'=> $request->name,
            'address'=> $request->address,
            'phone'=> $request->phone,
        ]);
        $notification=array('messege' => 'Warehouse Inserted!', 'alert-type' => 'success');
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
        $data = Warehouse::find($id);
        return view('admin.category.warehouse.edit', compact('data'));
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
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;

        DB::table('warehouses')->where('id',$request->id)->update($data);
        //dd($data);

        $notification=array('messege' => 'Warehouse Updated!', 'alert-type' => 'success');
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

        $warehhouse =Warehouse::where('id',$id)->first();
        $warehhouse->delete();

        $notification=array('messege' => 'Warehouse Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
