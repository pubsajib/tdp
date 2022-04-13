<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imgpost;
use App\Models\Img;

class HomeController extends Controller
{
    public function Index(){
        return view('frontend.maincontent.homecontent');
    }

    public function NewsDetails(){
        return view('frontend.maincontent.newsdetails');
    }

    public function NewsCategory(){
        return view('frontend.maincontent.newscategory');
    }

    public function ImgPost(){
        $imgposts =Imgpost::all();
        $images =Img::all();
        return view('frontend.maincontent.homecontent',compact('imgposts','images'));
    }

}
