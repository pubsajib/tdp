<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function Index(){
        $subcategory = DB::table('subcategories')
        ->join('categories','subcategories.category_id','categories.id')
        ->select('subcategories.*','categories.category')

        ->orderBy('id','desc')->paginate(20);
        return view('backend.subcategory.viewsubcategory',compact('subcategory'));
    }
    


    public function AddSubCategory(){
        $category = DB::table('categories')->get();
        return view('backend.subcategory.createsubcategory',compact('category'));

    }



    public function StoreSubCategory(Request $request){
        $validated = $request->validate([
            'subcategory' => 'required|unique:subcategories|max:255',
            'category_id' => 'required',
        ]);

        $data=array();
        $data['subcategory'] = $request->subcategory;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'Sub-Category Insert Successfully',
            'alert_type'=> 'success'
        );
        return Redirect()->route('subcategories')->with($notification);
    }




    public function EditSubCategory($id){
        $subcategory= DB::table('subcategories')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('backend.subcategory.editsubtcategory',compact('subcategory', 'category'));
    }

    public function UpdateSubCategory(Request $request, $id){
         $validated = $request->validate([
            'subcategory' => 'required|unique:subcategories|max:255',
        ]);

        $data=array();
        $data['subcategory'] = $request->subcategory;
        $data['category_id'] = $request->category_id;
        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Sub-Category Update Successfully',
            'alert_type'=> 'success'
        );
        return Redirect()->route('subcategories')->with($notification);

    }


    public function DeleteSubCategory($id){
        DB::table('subcategories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Sub-Category Delete Successfully',
            'alert_type'=> 'success'
        ); 
        return Redirect()->route('subcategories')->with($notification);

    }

}
