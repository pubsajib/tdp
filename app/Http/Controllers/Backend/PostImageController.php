<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use Illuminate\Support\Carbon;

class PostImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function ViewPostImage(){
        $photo = DB::table('postphotos')->orderBy('id','desc')->paginate(10);
        return view('backend.postimage.post_image',compact('photo'));
    }


    public function AddPostImage(){
        return view('backend.postimage.add_postimage');
    }

    public function StorePostImage(Request $request){       
        $validatedData = $request->validate([
                     
            'postphoto' => 'required',           
            ]);
            
          $data = array();        
          $data['postphoto'] = $request->postphoto;                      
          $data['created_at'] = Carbon::now();


                $photo = $request->postphoto;
                 if($photo) {
                $photo_one = uniqid().'.'.$photo->getClientOriginalExtension();
                Image::make($photo)->save('image/postimage2/'.$photo_one);
                $data['postphoto'] = 'image/postimage2/'.$photo_one;
                //image/postimg/254863.jpg
                DB::table('postphotos')->insert($data);
               // Post::insert();
 
                $notification = array(
                    'message' => 'Photo Insert Successfully',
                    'alert_type'=> 'success'
                ); 
                return Redirect()->route('post.image')->with($notification);

            }else{
                return Redirect()->back();              
            }
        
        } //END Method

        public function DeletePostImage($id){
            DB::table('postphotos')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Photo Delete Successfully',
            'alert_type'=> 'success'
        ); 
        return Redirect()->route('post.image')->with($notification);
    

    }
}
