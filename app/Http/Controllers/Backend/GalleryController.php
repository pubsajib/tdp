<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imgpost;
use App\Models\Img;
use File;
use DB;
use Image;
use Illuminate\Support\Carbon;

class GalleryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function ViewGallery(){
            $photo = DB::table('photos')->orderBy('id','desc')->paginate(10);
            return view('backend.gallery.photo',compact('photo'));
    }

    public function ViewPostImage(){
        $photo = DB::table('photos')->orderBy('id','desc')->paginate(10);
        return view('backend.gallery.post_image',compact('photo'));
    }

    

    public function AddPhoto(){
        return view('backend.gallery.addphoto');
    }

    public function StorePhoto(Request $request){       
        $validatedData = $request->validate([
            'title' => 'required|max:100',           
            'photo' => 'required',           
            ]);
            
          $data = array();
          $data['title'] = $request->title;         
          $data['photo'] = $request->photo;         
          $data['type'] = $request->type;                
          $data['created_at'] = Carbon::now();


                $photo = $request->photo;
                 if($photo) {
                $photo_one = uniqid().'.'.$photo->getClientOriginalExtension();
                Image::make($photo)->resize(800,800)->save('image/galleryimg/'.$photo_one);
                $data['photo'] = 'image/galleryimg/'.$photo_one;
                //image/postimg/254863.jpg
                DB::table('photos')->insert($data);
               // Post::insert();
 
                $notification = array(
                    'message' => 'Photo Insert Successfully',
                    'alert_type'=> 'success'
                ); 
                return Redirect()->route('view.photogallery')->with($notification);

            }else{
                return Redirect()->back();              
            }
        
        } //END Method

        public function DeletePhoto($id){
            DB::table('photos')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Photo Delete Successfully',
            'alert_type'=> 'success'
        ); 
        return Redirect()->route('view.photogallery')->with($notification);
    

    }
//---------------Multi Image section------------------

    public function MultiImg(){
        $imgposts =Imgpost::all();
        return view('backend.gallery.multiimg')->with('imgposts',$imgposts);
    }  


    public function AddMultiImg(){
        return view('backend.gallery.add_multiimg');
    }


    public function StoreMultiImg(Request $request){

        if($request->hasFile("coverimg")){
            $file=$request->file("coverimg");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("image/imagepost/cover/"),$imageName);

            $imgpost =new Imgpost([
                "title" => $request->title,
                "description" => $request->description,
                "coverimg" => $imageName,
            ]);

            $imgpost->save();
        }

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['imgpost_id']=$imgpost->id;
                $request['image']=$imageName;
                $file->move(\public_path("/image/imagepost/image"),$imageName);
                Img::create($request->all());

            }

            return Redirect()->route('multiimg');
             
        }


    }//end method

    public function DeleteMultiImg($id){

        $imgpost = Imgpost::findOrFail($id);
        
        if(File::exists("image/imagepost/cover/".$imgpost->coverimg)){
            File::delete("image/imagepost/cover/".$imgpost->coverimg);
        }
        $imgs=Img::where("imgpost_id",$imgpost->id)->get();
        foreach($imgs as $img){
            if(File::exists("image/imagepost/image/".$img->image)){
                File::delete("image/imagepost/image/".$img->image);
            }
        }
        $imgpost->delete();
        return back();
    }



    //---------------------corona update functions

    public function ViewCoronaUp(){
        $coronaphoto = DB::table('coronas')->orderBy('id','desc')->paginate(10);
        return view('backend.corona.view_corona_photo',compact('coronaphoto'));

    }

    public function AddCoronaPhoto(){
        return view('backend.corona.add_corona_photo');
    }


    public function StoreCoronaPhoto(Request $request){       
             
          $data = array();             
          $data['photo'] = $request->photo;                 
                                        
          $data['created_at'] = Carbon::now();

           
          $photo = $request->photo;
          if($photo) {
         $photo_one = uniqid().'.'.$photo->getClientOriginalExtension();
         Image::make($photo)->resize(400,200)->save('image/corona/'.$photo_one);
         $data['photo'] = 'image/corona/'.$photo_one;
         //image/postimg/254863.jpg
         DB::table('coronas')->insert($data);
        // Post::insert();

         $notification = array(
             'message' => 'Photo Insert Successfully',
             'alert_type'=> 'success'
         ); 
         return Redirect()->route('view.coronaup')->with($notification);

     }else{
         return Redirect()->back();              
     }
 
        
    } //END Method


    
    public function EditCoroan($id){
        $coronaphoto = DB::table('coronas')->where('id',$id)->first();
        
        return view('backend.corona.edit_corona',compact('coronaphoto'));

    }



    public function UpdateCoroan(Request $request, $id){

        $data = array();             
        $data['photo'] = $request->photo;                                              
        $data['created_at'] = Carbon::now();

        $ex_image = $request->ex_image;
                $photo = $request->photo;
                  
                $image_one = uniqid().'.'.$photo->getClientOriginalExtension();
                Image::make($photo)->resize(1200,200)->save('image/corona/'.$image_one);
                $data['photo'] = 'image/corona/'.$image_one;
                //image/postimg/254863.jpg
                DB::table('coronas')->where('id',$id)->update($data);
                unlink($ex_image);

                  $notification = array(
                      'message' => 'News Update Successfully',
                      'alert_type'=> 'success'
                  ); 
                  return Redirect()->route('view.coronaup')->with($notification);                                 
              
    }


       public function DeleteCoronaPhoto($id){

            DB::table('coronas')->where('id',$id)->delete();

        $notification = array(
            'message' => 'Photo Delete Successfully',
            'alert_type'=> 'success'
        ); 
        return Redirect()->route('view.coronaup')->with($notification);
    

    }

                 
}    