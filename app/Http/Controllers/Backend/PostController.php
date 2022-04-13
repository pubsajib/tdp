<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use DB;
use Auth;
use Image;
use Illuminate\Support\Carbon;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function Index(){        
       // $posts = Post::all();
        $post = DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->join('subcategories','posts.subcategory_id','subcategories.id')
        ->select('posts.*','categories.category','subcategories.subcategory')
        ->orderBy('id','desc')->paginate(10);   

        return view('backend.post.viewpost',compact('post'));
    }

    public function CreatePost(){
        $category = DB::table('categories')->get();
        return view('backend.post.create_post',compact('category'));
    }
    
    public function StorePost(Request $request){   
       
        $validatedData = $request->validate([
            'title' => 'required|max:80',
            'leadnews' => 'required|max:200',
            'category_id' => 'required',
            
            'image' => 'required',
            'details' => 'required',
            'metatitle' => 'required',
            'keyword' => 'required',
            'description' => 'required',
            'tag' => 'required'
            ]);
            
          $data = array();
          $data['title'] = $request->title;
          $data['author'] = $request->author ?? $request->author2 ;
          $data['user_id'] = Auth::id();
          $data['subtitle'] = $request->subtitle;
          $data['followup'] = $request->followup;
          $data['rper_name'] = $request->rper_name;
          $data['category_id'] = $request->category_id;
          $data['subcategory_id'] = $request->subcategory_id;      
          $data['image'] = $request->image;
          $data['imagecredit'] = $request->imagecredit;
          $data['leadnews'] = $request->leadnews;
          $data['details'] = $request->details;
          $data['headline'] = $request->headline;
          $data['bigthumbnail'] = $request->bigthumbnail;
          $data['ent_bigthumbnile'] = $request->ent_bigthumbnile;
          $data['first_section'] = $request->first_section;
          $data['first_section_thumbnail'] = $request->first_section_thumbnail;
          $data['metatitle'] = $request->metatitle;
          $data['keyword'] = $request->keyword;
          $data['description'] = $request->description;
          $data['tag'] = $request->tag;
          $data['post_date'] = date('d F, Y');
          $data['post_time'] = date('H:i'); 
          $data['created_at'] = Carbon::now();
        
                $image = $request->image;
                 if($image) {
                $image_one = uniqid().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(800,500)->save('image/postimg/'.$image_one);
                $data['image'] = 'image/postimg/'.$image_one;
                //image/postimg/254863.jpg
                DB::table('posts')->insert($data);
               // Post::insert();
 
                $notification = array(
                    'message' => 'Post Insert Successfully',
                    'alert_type'=> 'success'
                ); 
                return Redirect()->route('allnews.post')->with($notification);

            }else{
                return Redirect()->back();              
            }

        }//END Method
                          
    public function EditPost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $category = DB::table('categories')->get();

        //$post = Post::find($id);
        //$category = Category::find($id);
        return view('backend.post.edit_post',compact('post','category'));
    }

    public function UpdatePost( Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|max:80',
            'leadnews' => 'required|max:200',
            'category_id' => 'required',
            'details' => 'required',
            'tag' => 'required'
            ]);
             
            $data = array();
            $data['title'] = $request->title;
            $data['author'] = $request->author ?? $request->author2;
            $data['user_id'] = Auth::id();
            $data['subtitle'] = $request->subtitle;
            $data['followup'] = $request->followup;
            $data['rper_name'] = $request->rper_name;
            $data['category_id'] = $request->category_id;
            $data['subcategory_id'] = $request->subcategory_id;
            $data['image'] = $request->image;
            $data['imagecredit'] = $request->imagecredit;
            $data['leadnews'] = $request->leadnews;
            $data['details'] = $request->details;
            $data['headline'] = $request->headline;
            $data['bigthumbnail'] = $request->bigthumbnail;
            $data['ent_bigthumbnile'] = $request->ent_bigthumbnile;
            $data['first_section'] = $request->first_section;
            $data['first_section_thumbnail'] = $request->first_section_thumbnail;
            $data['metatitle'] = $request->metatitle;
            $data['keyword'] = $request->keyword;
            $data['description'] = $request->description;
            $data['tag'] = $request->tag;
            $data['updated_at'] = Carbon::now();
           
                $ex_image = $request->ex_image;
                $image = $request->image;
                   if($image) {
                $image_one = uniqid().'.'.$image->getClientOriginalExtension();
                Image::make($image)->save('image/postimg/'.$image_one);
                $data['image'] = 'image/postimg/'.$image_one;
                //image/postimg/254863.jpg
                DB::table('posts')->where('id',$id)->update($data);
                unlink($ex_image);

                  $notification = array(
                      'message' => 'News Update Successfully',
                      'alert_type'=> 'success'
                  ); 
                  return Redirect()->route('allnews.post')->with($notification);
  
              }else{
                    $data['image'] = $ex_image;
                    DB::table('posts')->where('id',$id)->update($data);
                               
                  $notification = array(
                      'message' => 'News Update Successfully',
                      'alert_type'=> 'success'
                  ); 
                return Redirect()->route('allnews.post')->with($notification);              
              }
    } // Update Post Class End      

    public function DeletePost($id){
        $image = Post::find($id);
        $ex_image = $image->image;
        unlink($ex_image);

        Post::find($id)->delete();
        return Redirect()->back()->with('success', 'Post Deleted Successfully');

    }

    public function GetSubCategory($category_id){
        $sub = DB::table('subcategories')->where('category_id',$category_id)->get();
        return response()->json($sub);

    }

}












