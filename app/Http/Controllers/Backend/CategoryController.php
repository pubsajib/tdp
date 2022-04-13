<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function ShowCategory(){
        $category = DB::table('categories')->orderBy('id','desc')->paginate(10);
        return view('backend.category.viewcategory',compact('category'));
    }



    public function AddCategory(){
        return view('backend.category.createcategory');
    }



    public function StoreCategory(Request $request){
        $validated = $request->validate([
            'category' => 'required|unique:categories|max:255',
        ]);

        $data=array();
        $data['category']= $request->category;
        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category Insert Successfully',
            'alert_type'=> 'success'
        );
        return Redirect()->route('categories')->with($notification);
    }



    public function EditCategory($id){
        $category= DB::table('categories')->where('id',$id)->first();
        return view('backend.category.editcategory',compact('category'));
    }



    public function UpdateCategory(Request $request,$id){
        $data=array();
        $data['category']= $request->category;
        DB::table('categories')->where('id',$id)->update($data);

        $notification = array(
            'message' => 'Category Update Successfully',
            'alert_type'=> 'success'
        );
        return Redirect()->route('categories')->with($notification);

    }


    public function DeleteCategory($id){
        DB::table('categories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert_type'=> 'success'
        ); 
        return Redirect()->route('categories')->with($notification);
    }

}
