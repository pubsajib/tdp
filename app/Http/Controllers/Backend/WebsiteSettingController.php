<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class WebsiteSettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function WebsiteSetting(){
        $website = DB::table('websitesetting')->first();
        return view('backend.setting.website_setting',compact('website'));
    }


    public function UpdateWebsiteSetting(Request $request, $id){       
      
          $data = array();
          $data['image'] = $request->logo;   
         
          $data['phone'] = $request->phone;
          $data['email'] = $request->email;
          $data['address'] = $request->address;
          $data['about_short'] = $request->about_short;
          $data['about_long'] = $request->about_long;       

          
          $exlogo = $request->exlogo;
          $image = $request->logo;
             if($image) {
          $image_one = uniqid().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(260,50)->save('image/websetting/'.$image_one);
          $data['image'] = 'image/websetting/'.$image_one;
          //image/postimg/254863.jpg
          DB::table('websitesetting')->where('id',$id)->update($data);
          unlink($exlogo);

            $notification = array(
                'message' => 'Website Settings Update Successfully',
                'alert_type'=> 'success'
            ); 
            return Redirect()->route('add.setting')->with($notification);

        }else{
              $data['image'] = $exlogo;
              DB::table('websitesetting')->where('id',$id)->update($data);
                         
            $notification = array(
                'message' => 'Website Settings Update Successfully',
                'alert_type'=> 'success'
            ); 
          return Redirect()->route('add.setting')->with($notification);    

        }
        
    } //END Method

}
