<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function AddSocialMedia(){
        $social = DB::table('socials')->first();
        return view('backend.setting.social_setting',compact('social'));
    }

    public function UpdateSocialMedia(Request $request, $id){
        
        $data=array();
        $data['facebook']= $request->facebook;
        $data['twitter']= $request->twitter;
        $data['linkedin']= $request->linkedin;
        $data['instagram']= $request->instagram;
        $data['youtube']= $request->youtube;

        DB::table('socials')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Social Settings Update Successfully',
            'alert_type'=> 'success'
        );
        return Redirect()->route('add.socialmedia')->with($notification);
    }

    public function SeoSetting(){
        $seo = DB::table('seos')->first();
        return view('backend.setting.seo',compact('seo'));
    }


    public function UpdateSeo(Request $request, $id){

        $data=array();
        $data['meta_author']= $request->meta_author;
        $data['meta_title']= $request->meta_title;
        $data['meta_keyword']= $request->meta_keyword;
        $data['meta_description']= $request->meta_description;
        $data['google_analytics']= $request->google_analytics;
        $data['google_verification']= $request->google_verification;
        $data['alexa_analytics']= $request->alexa_analytics;

        DB::table('seos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'SEO Settings Update Successfully',
            'alert_type'=> 'success'
        );
        return Redirect()->route('seo.setting')->with($notification);


    }
    
}
