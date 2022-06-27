<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $seo = DB::table('seos')->first();
        return view('admin.setting.seo.index', compact('seo'));
    }
    public function update(Request $request)
    {
        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['alexa_analytics'] = $request->alexa_analytics;
        $data['link'] = $request->link;
        $data['google_verification'] = $request->google_verification;
        DB::table('seos')->where('id', $request->id)->update($data);
        $notification = array(
            'messege' => 'Successfully Update',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
