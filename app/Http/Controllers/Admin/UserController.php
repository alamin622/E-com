<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
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

    public function index()
    {
         $data=User::all();  //eloquent ORM
        return view('admin.user.index',compact('data'));

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
        $validated = $request->validate([
           'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
       ]);


        //Eloquent ORM
        User::insert([
           'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        $notification=array('messege' => 'User Inserted!', 'alert-type' => 'success');
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
       $user=DB::table('users')->where('id',$id)->first();
        return view('admin.user.edit',compact('user'));

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

       $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email",
            'password' => 'sometimes|nullable|min:6',
        ]);

       //Eloquent ORM
       $user=User::where('id',$request->id)->first();
       $user->update([
       'name'=>$request->name,
       'email'=> $request->email,
       'password'=> $request->password,
       ]);


        $notification=array('messege' => 'USer Updated!', 'alert-type' => 'success');
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
        //eleqoent ORM
        $user=User::find($id);
        $user->delete();

        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

  
}
