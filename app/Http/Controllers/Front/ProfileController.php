<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function ProfileHome(){
        return view('frontend.profile.index');
    }

    public function ProfileSetting(){
        return view('frontend.profile.profile_setting');
    }
    public function ProfileSettingUpdate(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['password_confirmation'] = $request->password_confirmation;
        DB::table('users')->where('id', $request->id)->update($data);
        $notification = array(
            'messege' => 'Successfully Update',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

        }
}
