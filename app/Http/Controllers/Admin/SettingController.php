<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\File;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting = DB::table('settings')->first();
        return view('admin.setting.setting.index', compact('setting'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['currency'] = $request->currency;
        $data['site_name'] = $request->site_name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['logo'] = $request->logo;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['favicon'] = $request->favicon;
        $data['google_plus'] = $request->google_plus;
/*
        if ($request->logo) {
            if (File::exists($request->oldlogo)) {
                unlink($request->oldlogo);
            }
            $photo=$request->logo;
            $photoname=uniqid().'.'.$photo->getClientOriginalExtension();
            //Image::make($photo)->resize(240,120)->save('public/files/photo/'.$photoname);
            $photo->move('public/files/photo/', $photoname);
            $data['logo']='public/files/photo/'.$photoname;
            DB::table('settings')->where('id', $request->id)->update($data);
            $notification=array('messege' => 'setting updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['logo']=$request->oldlogo;
            DB::table('settings')->where('id', $request->id)->update($data);*/
            DB::table('settings')->where('id',$id)->update($data);
            $notification=array('messege' => 'setting updated!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }

}
