<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PostviewController extends Controller
{
    public function SingleNews($id){

        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->join('subcategories','posts.subcategory_id','subcategories.id')
        ->join('users','posts.user_id','users.id')
        ->select('posts.*','categories.category','subcategories.subcategory','users.name','users.position')
        ->where('posts.id',$id)->first();
        return view('frontend.maincontent.single_post',compact('post'));

    }
    /*
    public function CatPostc($id, $category){

        $catpost = DB::table('categories')
        ->join('posts','categories.id','=','posts.category_id')
        ->select('categories.*','posts.category_id','posts.title','posts.category_id')->get();
        
        return view('frontend.allpost',compact('catpost'));

    }   /*/

    public function CatPost($id, $category){
        $catpost =DB::table('posts')->where('category_id',$id)->orderBy('id','desc')->paginate(10);
        return view('frontend.maincontent.allpost',compact('catpost'));

    }  

    public function SubcatPost($id, $subcategory){
        $subcatpost =DB::table('posts')->where('subcategory_id',$id)->orderBy('id','desc')->paginate(4);
        return view('frontend.maincontent.allsubpost',compact('subcatpost'));

    }

    public function PhotoGallery(){
       
        return view('frontend.maincontent.photogallery');
    }

    public function Viewterms(){
        return view('frontend.maincontent.terms');
    }


    public function UserPost($id, $name){
        $userpost = DB::table('users')
        ->join('posts','users.id','=','posts.user_id')
        ->select('users.*','posts.title','posts.id','posts.image','posts.details','posts.category_id')->orderBy('post_date','desc')->paginate(10);
        return view('frontend.maincontent.author_post',compact('userpost'));
    }
    
}
