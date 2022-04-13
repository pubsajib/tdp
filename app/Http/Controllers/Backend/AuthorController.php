<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthorController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function AddAuthor(){
        return view('admin.author.addauthor');
    }

    public function StoreAuthor(Request $request){
        $validated = $request->validate([
            'email' => 'required|unique:users|max:35',
        ]);


        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['post'] = $request->post;
        $data['s_setting'] = $request->s_setting;
        $data['p_gallery'] = $request->p_gallery;
        $data['video'] = $request->video;
        $data['ads'] = $request->ads;
        $data['user_rol'] = $request->user_rol;
        $data['type'] = 0;
        
        DB::table('users')->insert($data);
        $notification = array(
            'message' => 'Author Insert Successfully',
            'alert_type'=> 'success'
        ); 
        return Redirect()->route('view.author')->with($notification);
        
    }

    public function ViewAuthor(){
        $author = DB::table('users')->where('type',0)->get();
        return view('admin.author.viewauthor',compact('author'));
    }


    public function EditAuthor($id){
        $author = DB::table('users')->where('id',$id)->first();
        return view('admin.author.edit_author',compact('author'));
    }


    public function UpdateAuthor(Request $request, $id){
        $validated = $request->validate([
            'email' => 'required|unique',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['post'] = $request->post;
        $data['s_setting'] = $request->s_setting;
        $data['p_gallery'] = $request->p_gallery;
        $data['video'] = $request->video;
        $data['ads'] = $request->ads;
        $data['user_rol'] = $request->user_rol;
        
        DB::table('users')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'Author Update Successfully',
            'alert_type'=> 'success'
        ); 
        return Redirect()->route('view.author')->with($notification);
        

    }


    public function DeleteAuthor($id){
        DB::table('users')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Author Delete Successfully',
            'alert_type'=> 'danger'
        ); 
        return Redirect()->route('view.author')->with($notification);
    }
}
