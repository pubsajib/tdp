<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class VideoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function ViewVideos(){
        $video = DB::table('videos')->orderBy('id','desc')->paginate(10);
        return view('backend.videos.view_video',compact('video'));

    }

    public function AddVideo(){
        return view('backend.videos.add_video');
    }

    public function StoreVideo(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:100',           
            'embed_code' => 'required',           
            ]);
            
          $data = array();
          $data['title'] = $request->title;         
          $data['embed_code'] = $request->embed_code;
          DB::table('videos')->insert($data);

          $notification = array(
            'message' => 'Video Insert Successfully',
            'alert_type'=> 'success');

          return Redirect()->route('view.videos')->with($notification);
    }

    public function DeleteVideo($id){
        DB::table('videos')->where('id',$id)->delete();
    $notification = array(
        'message' => 'Video Delete Successfully',
        'alert_type'=> 'success'
    ); 
    return Redirect()->route('view.videos')->with($notification);


    }
    
}
