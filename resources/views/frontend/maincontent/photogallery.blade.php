@extends('frontend.master')

@section('title')
ছবি গ্যালারী
@endsection

@section('content_area')  


<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2></h2>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="#">Photo Gallery</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start News Details Area -->
        <section style="margin-top:20px;">
            <div class="container">
               
                @php 
                   
                    $photobig = DB::table('photos')->where('type',1)->orderBy('id','desc')->first();               
                    $photosmall = DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(2)->get();
                @endphp
                <div class="row">
                                      

                    <div class="col-lg-8">
                        <div class="single-main">
                            <a href="{{route('photo.gallery')}}">
                                <img src="{{ asset($photobig->photo) }}" alt="image">
                            </a>                           
                        </div>
                        <div class="photo-caption"><p>{{$photobig->title}}</p></div>
                    </div>

                    
                    <div class="col-lg-4">
                        <div class="row">

                            @foreach($photosmall as $smph)
                            <div class="col-md-12 col-sm-12">
                                <div class=" div-space-j">
                                    <a href="{{route('photo.gallery')}}">
                                        <img src="{{ asset($smph->photo) }}" alt="image">
                                    </a>
                                </div>
                                    <div class="photo-caption"><p>{{$smph->title}}</p></div>                                                                                                                  
                            </div>

                            @endforeach
                        </div>
                    </div>
                   
                </div>
            </div>
        </section> 

        <section style="margin-top:20px; margin-bottom:20px">>
            <div class="container">            
               
                @php 
                   
                    $photobig = DB::table('photos')->where('type',1)->orderBy('id','desc')->skip(1)->first();               
                    $photosmall = DB::table('photos')->where('type',0)->orderBy('id','desc')->skip(2)->limit(2)->get();
                @endphp
                <div class="row">
                                      

                    
                    <div class="col-lg-4">
                        <div class="row">

                            @foreach($photosmall as $smph)
                            <div class="col-md-12 col-sm-12">
                                <div class=" div-space-j">
                                    <a href="{{route('photo.gallery')}}">
                                        <img src="{{ asset($smph->photo) }}" alt="image">
                                    </a>                                 
                                </div>
                                <div class="photo-caption"><p>{{$smph->title}}</p></div>
                            </div>

                            @endforeach
                        </div>
                    </div>

                    
                    <div class="col-lg-8">
                        <div class="single-main">
                            <a href="{{route('photo.gallery')}}">
                                <img src="{{ asset($photobig->photo) }}" alt="image">
                            </a>
                        </div>
                        <div class="photo-caption"><p>{{$photobig->title}}</p></div>
                    </div>                   
                </div>
            </div>
        </section> 
    <section>
        <div class="container"> 
            <div class="tech-news">
                    
                    @php                  
                        $photobig = DB::table('photos')->where('type',1)->orderBy('id','desc')->skip(1)->first();               
                        $photosmall = DB::table('photos')->where('type',0)->orderBy('id','desc')->skip(4)->limit(3)->get();
                    @endphp
                    <div class="row">
                    @foreach($photosmall as $smph)
                        <div class="col-lg-4 col-md-6">
                            <div>
                                <a href="#">
                                    <img src="{{ asset($smph->photo) }}" alt="image">
                                </a>
                            </div>
                            <div class="photo-caption"><p>{{$smph->title}}</p></div>
                        </div>                     
                            @endforeach             
                    </div>
                </div>        
            </div>        
    </section>

        


@endsection