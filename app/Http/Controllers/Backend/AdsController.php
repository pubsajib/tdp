<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class AdsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function ViewAds(){
        $ads = DB::table('ads')->orderBy('id','desc')->paginate(10);
        return view('backend.ads.list_ads',compact('ads'));

    }

    public function AddAds(){
        return view('backend.ads.addads');
    }
    public function StoreAds(Request $request){

        $data = array();
        $data['link'] = $request->link;
      
       if ($request->type == 2) {
            
               $image = $request->ads;
               
                  $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
                  Image::make($image)->resize(970,90)->save('image/ads/'.$image_one);
                  $data['ads'] = 'image/ads/'.$image_one;
                  // image/photogallery/343434.png
                  $data['type'] = 2;
                  DB::table('ads')->insert($data);
   
   
                  $notification = array(
                'message' => 'Harizontal Ads Inserted Successfully',
                'alert-type' => 'success'
            );
   
            return Redirect()->route('view.ads')->with($notification);
   
       }else{
   
              $image = $request->ads;
               
                  $image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
                  Image::make($image)->resize(400,350)->save('image/ads/'.$image_one);
                  $data['ads'] = 'image/ads/'.$image_one;
                  // image/photogallery/343434.png
                  $data['type'] = 1;
                  DB::table('ads')->insert($data);
   
   
                  $notification = array(
                'message' => 'Vertical Ads Inserted Successfully',
                'alert-type' => 'info'
            );
   
            return Redirect()->route('view.ads')->with($notification);
       
       }
   
    } // End Method

    public function DeleteAds($id){
        DB::table('ads')->where('id',$id)->delete();
    $notification = array(
        'message' => 'Ads Delete Successfully',
        'alert_type'=> 'success'
    ); 
    return Redirect()->route('view.ads')->with($notification);


    }

}