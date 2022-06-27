<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Smtp;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $smtp = DB::table('smtps')->first();
        return view('admin.setting.smtp.index', compact('smtp'));
    }
    public function update(Request $request)
    {
        $data = array();
        $data['mailer'] = $request->mailer;
        $data['host'] = $request->host;
        $data['port'] = $request->port;
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $data['encryption'] = $request->encryption;
        $data['from_name'] = $request->from_name;
        $data['from_address'] = $request->from_address;
        DB::table('smtps')->where('id', $request->id)->update($data);
        // dd($data);
        $notification = array(
            'messege' => 'Successfully Update',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
