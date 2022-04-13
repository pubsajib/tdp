@extends('frontend.master')

@section('title')
    @php 
        $seo = DB::table('seos')->first();
    @endphp
    {{ $seo->meta_title }}
@endsection

@section('keyword')
    @php 
    $seo = DB::table('seos')->first();
    @endphp
    {{ $seo->meta_keyword }}
@endsection

@section('content_area')  

@php
$firstsectionmain = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
$ads = DB::table('ads')->where('type',2)->first();
@endphp
     

<!--- Banner Ads 

<!---- Start Main News Section--->
        <section class="main-news-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-main-news">
                            <a href="{{ URL::to('view/post/'.$firstsectionmain->id)}}">
                                <img src="{{ asset($firstsectionmain->image) }}" alt="image">
                            </a>
                            <div class="news-content">
                                
                                <h3>
                                    <a href="{{ URL::to('view/post/'.$firstsectionmain->id)}}">{{$firstsectionmain->title}}</a>
                                </h3>
                                <span><a href=""></a>{{ \Carbon\Carbon::parse($firstsectionmain->created_at)->diffForHumans() }}</span>
                                
                            </div>
                        </div>
                    </div>    
                                                        
                   <div class="col-lg-6">
                        <div class="row">
                            @php
                            $firstsection = DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(4)->get();
                            @endphp
                                @foreach($firstsection as $news)
                                <div class="col-md-6 col-sm-6">	  
                                    <div class="single-main-news-inner div-space-j">
                                            <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                <img src="{{ asset($news->image) }}" alt="image">
                                            </a>
                                            <div class="news-content">
                                                
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{ $news->title }}</a>
                                                </h3>
                                                <span>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</span>
                                            </div>
                                    </div>
                                </div>
                                @endforeach                          
                        </div>
                    </div> 

                </div>
            </div>
        </section>
        <!-- End Main News Area -->
        <!--
        <section class="main-news-area" style="margin-bottom:40px;">
            @php 
            $corona = DB::table('coronas')->first();
            @endphp
            <div class="container">
                <div class="row">
                    <div class="" style="border: 1px solid #eee; margin:-5px;">
                        <img src="{{$corona->photo}}" alt="">
                    </div>
                </div>
            </div>
        </section>  -->
        <!-- Start National News Area -->
        <section class="default-news-area">
            <div class="container">
                <div class="row">
                    @php
                    $bd_category = DB::table('categories')->where('id',21)->first(); 
                        $bd_category_post = DB::table('posts')->where('category_id',$bd_category->id)->where('first_section_thumbnail',NULL)
                        ->where('first_section',NULL)->orderBy('id','desc')->limit(6)->get();
                    @endphp
                    <div class="col-lg-12">
                        <div class="most-popular-news">
                            <div class="section-title"> 
                                <h2><a href="{{ URL::to('category/'.$bd_category->id.'/'.$bd_category->category) }}">{{$bd_category->category}}</a></h2> 
                            </div>
                            <div class="row">                          
                                @foreach($bd_category_post as $news)
                                    <div class="col-lg-4">                              
                                        <div class="single-business-news">
                                            <div class="business-news-image">
                                                <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                    <img src="{{ asset($news->image) }}" alt="image">
                                                </a>
                                            </div>
                                            
                                            <div class="business-news-content">
                                                <span></span>
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                                </h3>
                                                <p><a href="#"></a>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>                                
                                @endforeach         
                            </div>
                        </div>
                  </div>
                </div>
            </div>
        </section> 
        <!-- End National News Area -->

        <!----Start Photo Gallery Section----> 
        <section style="margin-top:-30px;">        
            <div class="container">
                @php 
                $politics_category = DB::table('categories')->where('id',13)->first(); 
                $politics_category_post = DB::table('posts')->where('category_id',$politics_category->id)->orderBy('id','desc')->limit(4)->get();   
                @endphp
                <div>
                    <div class="health-news">
                            <div class="section-title"> 
                                <h2>{{$politics_category->category}}</h2> 
                            </div>
                        <div class="health-news-slides owl-carousel owl-theme">  
                             @foreach($politics_category_post as $news)                                          
                                <div class="single-health-news">
                               
                                    <div class="health-news-image">
                                        <a href="{{ URL::to('view/post/'.$news->id)}}">
                                            <img src="{{asset($news->image)}}" alt="image">
                                        </a>
                                    </div>
                                    <div class="health-news-content">                                    
                                        <h3>
                                            <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                        </h3>
                                        <p><a href="#"></a>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</p>                              
                                    </div>
                                </div>
                                @endforeach                             
                        </div>
                    </div>
                </div>
            </div>
        </section>  
            <!---International News area section 2-->
        <section class="default-news-area">
            <div class="container">
                <div class="row">
                        @php
                            $int_category = DB::table('categories')->where('id',17)->first(); 
                            $int_category_post = DB::table('posts')->where('category_id',$int_category->id)->orderBy('id','desc')->limit(4)->get();
                        @endphp
                        <div class="col-lg-12">
                            <div class="politics-news">
                                <div class="section-title"> 
                                    <h2><a href="{{ URL::to('category/'.$int_category->id.'/'.$int_category->category) }}">{{$int_category->category}}</a></h2> 
                                </div>
                                <div class="row">
                                    @foreach($int_category_post as $news)
                                    <div class="col-lg-3">
                                        <div class="single-business-news">
                                            <div class="business-news-image">
                                                <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                    <img src="{{ asset($news->image) }}" alt="image">
                                                </a>
                                            </div>
                                           
                                            <div class="business-news-content">
                                                <span></span>
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                                </h3>
                                                <p><a href="#"></a> </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
        
           <!----Section Sports, Business and widget---->
        <section class="">  
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <!----Sports News Section start---->
                        <div class="row">
                            @php
                                $sports_category = DB::table('categories')->where('id',16)->first(); 
                                $sports_big_thub = DB::table('posts')->where('bigthumbnail',1)->orderBy('id','desc')->first();
                                $sports_category_post = DB::table('posts')->where('category_id',$sports_category->id)->where('bigthumbnail',NULL)->orderBy('id','desc')->limit(2)->get();
                            @endphp
                            <div class="culture-news">
                                <div class="section-title"> 
                                    <h2><a href="{{ URL::to('category/'.$sports_category->id.'/'.$sports_category->category) }}">{{$sports_category->category}}</a></h2> 
                                </div>
    
                                <div class="row">
                                    <div class="col-lg-9 col-md-9">
                                        <div class="single-health-news">
                                            <div class="health-news-image">
                                                <a href="{{ URL::to('view/post/'.$sports_big_thub->id)}}">
                                                    <img src="{{ asset($sports_big_thub->image) }}" alt="image">
                                                </a>
                                            </div>
                                            
                                            <div class="health-news-content">
                                                <span>{{$sports_category->category}}</span>
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$sports_big_thub->id)}}">{{$sports_big_thub->title}}</a>
                                                </h3>
                                                <span><p><a href="#"></a>{{ \Carbon\Carbon::parse($sports_big_thub->created_at)->diffForHumans() }}</p></span>   
                                            </div>                               
                                        </div>
                                    </div> 
                                        <div class="col-lg-3">
                                        @foreach($sports_category_post as $news)
                                            <div class="single-politics-news">
                                                <div class="politics-news-image">
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                        <img src="{{ asset($news->image) }}" alt="image">
                                                    </a>
                                                </div>
                                                
                                                <div class="politics-news-content">
                                                
                                                    <h3>
                                                        <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                                    </h3>
                                                    <p><a href="#"></a>{{ \Carbon\Carbon::parse($sports_big_thub->created_at)->diffForHumans() }}</p> 
                                                </div>
                                            </div>
                                            @endforeach 
                                        </div>                                       
                                </div>
                            </div>
                            </div> 
                       <!----End Sports News Section----> 
                       
                       <!----Start Bangladesh News Section----> 

                       <div class="row">
                        @php
                            $bd_category = DB::table('categories')->where('id',14)->first(); 
                            $bd_category_post = DB::table('posts')->where('category_id',$bd_category->id)->orderBy('id','desc')->limit(6)->get();
                        @endphp
                        <div class="col-lg-12">
                            <div class="politics-news">
                                <div class="section-title"> 
                                    <h2><a href="{{ URL::to('category/'.$bd_category->id.'/'.$bd_category->category) }}">{{$bd_category->category}}</a></h2> 
                                </div>

                                    <div class="row">
                                        @foreach($bd_category_post as $news)
                                        <div class="col-lg-4">
                                            <div class="single-business-news">
                                                <div class="business-news-image">
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                        <img src="{{ asset($news->image) }}" alt="image">
                                                    </a>
                                                </div>
                                            
                                                <div class="business-news-content">
                                                    <span></span>
                                                    <h3>
                                                        <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                                    </h3>
                                                    <p><a href="#"></a> </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>                                                                   
                       <!---- Business News Section Start----> 

                            <div class="row">

                                @php
                                    $business_category = DB::table('categories')->where('id',9)->first(); 
                                    $business_category_post = DB::table('posts')->where('category_id',$business_category->id)->orderBy('id','desc')->limit(4)->get();
                                 @endphp

                                <div class="business-news">
                                    <div class="section-title"> 
                                        <h2><a href="{{ URL::to('category/'.$business_category->id.'/'.$business_category->category) }}">{{$business_category->category}}</a></h2> 
                                    </div>
                                    <div class="business-news-slides owl-carousel owl-theme">
                                        @foreach($business_category_post as $news)
                                        <div class="single-business-news">
                                            <div class="business-news-image">
                                                <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                    <img src="{{ asset($news->image) }}" alt="image">
                                                </a>
                                            </div>
                                            <div class="business-news-content">                                            
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                        @endforeach                                                                                        
                                    </div>
                                </div>
                            </div>
                         <!---   banner ads  --->
                            <div class="row" style="padding-top:20px; padding-bottom: 30px;">           
                                <div class="col-lg-12 d-flex justify-content-center">
                                      
                                </div>          
                            </div>                                                                                                 
                        </div>   
                    <!---witget area start--->

                        <div class="col-lg-3">
                            <aside class="widget-area">
                                <section class="widget widget_latest_news_thumb">
                                    @php 
                                        $category = DB::table('categories')->first();
                                        $letest = DB::table('posts')->orderBy('id','desc')->limit(5)->get();       
                                    @endphp

                                    <h3 class="widget-title">সর্বশেষ</h3>

                                    @foreach($letest as $row)
            
                                    <article class="item">
                                        <a href="{{ URL::to('view/post/'.$row->id)}}" class="thumb">
                                            <span class="" role="img"><img src="{{asset($row->image)}}"></span>
                                        </a>
                                        <div class="info">
                                            <h4 class="title usmall"><a href="{{ URL::to('view/post/'.$row->id)}}">{{$row->title}}</a></h4>
                                            <span>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </article>
                                   @endforeach
                                </section>
                                 <!--- Banner ad---->
                                 <section class="widget widget_most_shared">
                                    @php 
                                        $ads = DB::table('ads')->where('type',1)->first();
                                    @endphp
                                    <div class="">
                                        <div class="">
                                            <a href="{{ URL::to($ads->link)}}">
                                                <img src="{{ asset($ads->ads) }}" alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </section>
                                <section class="widget widget_latest_news_thumb">
                                    @php 
                                    $category = DB::table('categories')->inRandomOrder()->get();
                                    $favourite = DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(5)->get();
                                    @endphp
                                    <h3 class="widget-title">সর্বাধিক  পঠিত</h3>

                                    @foreach($favourite as $row)
                                    <article class="item">
                                        <a href="{{ URL::to('view/post/'.$row->id)}}" class="thumb">
                                            <span class="fullimage" role="img"><img src="{{asset($row->image)}}"></span>
                                        </a>
                                        <div class="info">
                                            <h4 class="title usmall"><a href="{{ URL::to('view/post/'.$row->id)}}">{{$row->title}}</a></h4>
                                            <span> {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </article>                                       
                                   @endforeach
                                </section>
                                <!--
                                <section class="widget widget_stay_connected">
                                    @php 
                                    $sociallink = DB::table('socials')->first();
                                    @endphp
                                    <h3 class="widget-title">আমাদের সঙ্গে থাকুন</h3>
                                    
                                    <ul class="stay-connected-list">
                                        <li>
                                            <a href="{{ $sociallink->facebook }}">
                                                <i class='bx bxl-facebook'></i>
                                               
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->twitter }}" class="twitter">
                                                <i class='bx bxl-twitter'></i>
                                                
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->linkedin }}" class="linkedin">
                                                <i class='bx bxl-linkedin'></i>
                                               
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->youtube }}" class="youtube">
                                                <i class='bx bxl-youtube'></i>
                                                
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->instagram }}" class="instagram">
                                                <i class='bx bxl-instagram'></i>
                                                
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->facebook }}" class="wifi">
                                                <i class='bx bx-wifi'></i>
                                               rs
                                            </a>
                                        </li>
                                    </ul>
                                </section>--->
    
                                <!---
                                <section class="widget widget_most_shared">
                                    <h3 class="widget-title">Most shared</h3>
    
                                    <div class="single-most-shared">
                                        <div class="most-shared-image">
                                            <a href="#">
                                                <img src="{{ asset('frontend/assets/img/most-shared/most-shared-1.jpg') }}" alt="image">
                                            </a>
    
                                            <div class="most-shared-content">
                                                <h3>
                                                    <a href="#">All the highlights from western fashion week summer 2021</a>
                                                </h3>
                                                <p><a href="#">Patricia</a> / 28 September, 2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>  --->
                                    <!--
                                <section class="widget widget_tag_cloud">
                                    <h3 class="widget-title">Tags</h3>
    
                                    <div class="tagcloud">
                                        <a href="#">News</a>
                                        <a href="#">Business</a>
                                        <a href="#">Health</a>
                                        <a href="#">Politics</a>
                                        <a href="#">Magazine</a>
                                        <a href="#">Sport</a>
                                        <a href="#">Tech</a>
                                        <a href="#">Video</a>
                                        <a href="#">Global</a>
                                        <a href="#">Culture</a>
                                        <a href="#">Fashion</a>
                                    </div>
                                </section> -->
    
                                <section class="widget widget_instagram">
                                    <h3 class="widget-title">ফেসবুক</h3>
                                    <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" 
                                        nonce="SyOaBFUs">
                                    </script>

                                    <div class="fb-page" data-href="https://www.facebook.com/tdpbangladesh" data-tabs="" data-width=""
                                     data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" 
                                     data-show-facepile="false"><blockquote cite="https://www.facebook.com/tdpbangladesh" class="fb-xfbml-parse-ignore">
                                    <a href="https://www.facebook.com/tdpbangladesh">Phenomenal Bangladesh</a></blockquote></div>
                                </section>  
                            </aside>
                        </div>
                  </div>
                </div>
           </section> 
           <section>
            <div class="container">
                <div class="row">
                        @php
                            $corona_category = DB::table('categories')->where('id',7)->first(); 
                            $corona_category_post = DB::table('posts')->where('category_id',$corona_category->id)->orderBy('id','desc')->limit(4)->get();
                        @endphp
                        <div class="col-lg-12">
                            <div class="politics-news">
                                <div class="section-title"> 
                                    <h2><a href="{{ URL::to('category/'.$corona_category->id.'/'.$corona_category->category) }}">{{$corona_category->category}}</a></h2> 
                                </div>

                                <div class="row">
                                    @foreach($corona_category_post as $news)
                                    <div class="col-lg-3">
                                        <div class="single-business-news">
                                            <div class="business-news-image">
                                                <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                    <img src="{{ asset($news->image) }}" alt="image">
                                                </a>
                                            </div>
                                            <div class="business-news-content">
                                                <span></span>
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                                </h3>
                                                <p><a href="#"></a> </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
            <!---- EnterTainment News Section---->
           <section class="new-news-area">
            <div class="container">
                            @php
                                $entertainment_category = DB::table('categories')->where('id',12)->first(); 
                                $education_category = DB::table('categories')->where('id',11)->first(); 
                                $entertainment_big_thub = DB::table('posts')->where('ent_bigthumbnile',1)->orderBy('id','desc')->first();
                                $entertainment_category_post = DB::table('posts')->where('category_id',$entertainment_category->id)
                                ->where('ent_bigthumbnile',NULL)->orderBy('id','desc')->limit(2)->get();
                                $education_category_post = DB::table('posts')->where('category_id',$education_category->id)
                                ->orderBy('id','desc')->limit(4)->get();
                            @endphp   
                    <div class="section-title"> 
                        <h2><a href="{{ URL::to('category/'.$entertainment_category ->id.'/'.$entertainment_category ->category) }}">{{$entertainment_category ->category}}</a></h2> 
                    </div>
                <div class="row">
                    <div class="col-lg-3">
                        @foreach($entertainment_category_post as $news)
                        <div class="single-new-news">
                            <div class="new-news-image">
                                <a href="#">
                                    <img src="{{ asset($news->image)}}" alt="image">
                                </a>
                                <div class="new-news-content">
                                    <h3>
                                        <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                    </h3>
                                    <p> {{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <div class="single-new-news-box">
                            <div class="new-news-image">
                                <a href="#">
                                    <img src="{{asset($entertainment_big_thub->image)}}" alt="image">
                                </a>
                                <div class="new-news-content">
                                    <h3 style="font-size: 24px; font-weight:600;">
                                        <a href="{{ URL::to('view/post/'.$entertainment_big_thub->id)}}">{{$entertainment_big_thub->title}}</a>
                                    </h3>
                                    <p>{{ \Carbon\Carbon::parse($entertainment_big_thub->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="daily-briefing-item">
                        <div class="section-title"> 
                            <h2><a href="{{ URL::to('category/'.$education_category ->id.'/'.$education_category ->category) }}">{{$education_category ->category}}</a></h2> 
                        </div>
                            @foreach( $education_category_post as $news)
                            <div class="daily-briefing-content">
                               
                                <h4>
                                    <a href="#">{{$news->title}}</a>
                                </h4>
                                <p>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</p>
                            </div>                 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>    <!----end EnterTainment News Section---->

        <section style="margin-top:-30px;">
            <div class="container">
                        <div class="section-title"> 
                            <h2>ছবি ঘর</h2> 
                        </div> 
                @php 
                   
                    $photobig = DB::table('photos')->where('type',1)->orderBy('id','desc')->first();               
                    $photosmall = DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(4)->get();
                @endphp
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-main-default-news-inner">
                            <a href="{{route('photo.gallery')}}">
                                <img src="{{ asset($photobig->photo) }}" alt="image">
                            </a>
                            <div class="news-content">
                                                            
                                <span><a> </a></span>
                                <h3>
                                    <a href="{{route('photo.gallery')}}">{{$photobig->title}}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            @foreach($photosmall as $smph)
                            <div class="col-md-6 col-sm-6">
                                <div class="single-main-news-inner div-space-j">
                                    <a href="{{route('photo.gallery')}}">
                                        <img src="{{ asset($smph->photo) }}" alt="image">
                                    </a>
                                    <div class="news-content">
                                        <h3>
                                            <a href="{{route('photo.gallery')}}">{{$smph->title}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section> 
            <section>
                <div class="container">
                    <div class="row">
                    @php 
                    $it_subcategory = DB::table('subcategories')->where('id',50)->first();
                    $fashion_subcategory = DB::table('subcategories')->where('id',51)->first();
                    $travel_subcategory = DB::table('subcategories')->where('id',52)->first();

                    $it_subcategory_post = DB::table('posts')->where('subcategory_id',$it_subcategory->id)->orderBy('id','desc')->limit(4)->get();   
                    $fashion_subcategory_post = DB::table('posts')->where('subcategory_id',$fashion_subcategory ->id)->orderBy('id','desc')->limit(4)->get();   
                    $travel_subcategory_post = DB::table('posts')->where('subcategory_id',$travel_subcategory->id)->orderBy('id','desc')->limit(4)->get();   
                    @endphp
                        <div class="col-lg-12"> 
                         <div class="row"  style="margin-top: 50px;">
                            <div class="col-lg-4">
                                <div class="section-title"> 
                                    <h2><a href="{{ URL::to('subcategory/'.$it_subcategory->id.'/'.$it_subcategory->subcategory) }}">{{$it_subcategory->subcategory}}</a></h2> 
                                </div>
                                @foreach($it_subcategory_post as $news)
                                <div class="single-sports-news">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="">
                                                <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                    <img src="{{ asset($news->image) }}" alt="image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <div class="sports-news-content">
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                                </h3>
                                                <p>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                                @endforeach
                            </div>
                            <div class="col-lg-4">
                                <div class="section-title"> 
                                    <h2>{{$fashion_subcategory->subcategory}}</h2> 
                                </div>
                                @foreach($fashion_subcategory_post as $news)
                                <div class="single-tech-news">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="tech-news-image">
                                                <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                    <img src="{{ asset($news->image) }}" alt="image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <div class="tech-news-content">
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{ $news->title }}</a>
                                                </h3>
                                                <p>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                                                         
                            </div>
                            <div class="col-lg-4">
                                <div class="section-title"> 
                                    <h2>{{$travel_subcategory->subcategory}}</h2> 
                                </div>
                                @foreach($travel_subcategory_post as $news)
                                <div class="single-tech-news">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="tech-news-image">
                                                <a href="{{ URL::to('view/post/'.$news->id)}}">
                                                    <img src="{{ asset($news->image) }}" alt="image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <div class="tech-news-content">
                                                <h3>
                                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                                </h3>
                                                <p>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach                                                          
                            </div>
                         </div>
                        </div>
                    </div>
                </div>          
        </section> 
        <section class="new-news-area">
            <div class="container">
                    @php 
                        $lokjibon_subcategory = DB::table('subcategories')->where('id',49)->first();
                        $helth_subcategory = DB::table('subcategories')->where('id',53)->first();
                        $socialme_subcategory = DB::table('subcategories')->where('id',56)->first();
                        $relegion_subcategory = DB::table('subcategories')->where('id',55)->first();

                        $lokjibon_big = DB::table('posts')->where('subcategory_id',$lokjibon_subcategory->id)->first();
                        $lokjibon_subcategory_post = DB::table('posts')->where('subcategory_id',$lokjibon_subcategory->id)->skip(1)->orderBy('id','asc')->limit(3)->get();   
                        
                        $helth_big = DB::table('posts')->where('subcategory_id',$helth_subcategory->id)->first();
                        $helth_subcategory_post = DB::table('posts')->where('subcategory_id',$helth_subcategory->id)->skip(1)->orderBy('id','asc')->limit(3)->get();

                        $socialme_big = DB::table('posts')->where('subcategory_id',$socialme_subcategory->id)->first();
                        $socialme_subcategory_post = DB::table('posts')->where('subcategory_id',$socialme_subcategory->id)->skip(1)->orderBy('id','asc')->limit(3)->get();

                        $relegion_big = DB::table('posts')->where('subcategory_id',$relegion_subcategory->id)->first();
                        $relegion_subcategory_post = DB::table('posts')->where('subcategory_id',$relegion_subcategory->id)->skip(1)->orderBy('id','asc')->limit(3)->get();
                    @endphp  
                    
                <div class="row">
                    <!--- Lokjibon section --->
                    <div class="col-lg-3">
                                <div class="section-title"> 
                                    <h2><a href="{{ URL::to('subcategory/'.$lokjibon_subcategory->id.'/'.$lokjibon_subcategory->subcategory) }}">{{$lokjibon_subcategory->subcategory}}</a></h2> 
                                </div>                      
                        <div class="daily-briefing-item">
                            <div class="new-news-image">
                                <a href="{{ URL::to('view/post/'.$news->id)}}">
                                    <img src="{{ asset($lokjibon_big->image)}}" alt="image">
                                </a>
                                <div class="daily-briefing-content">
                                    <h4>
                                        <a href="{{ URL::to('view/post/'.$news->id)}}">{{$lokjibon_big->title}}</a>
                                    </h4>
                                </div>
                            </div>
                            @foreach( $lokjibon_subcategory_post as $news)
                            <div class="daily-briefing-content" style="border-top: 1px solid #eee;">                              
                                <h4>
                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                </h4>
                            </div>                 
                            @endforeach
                        </div>                      
                    </div>  
                     <!--- social media section --->
                    <div class="col-lg-3"> 
                            <div class="section-title"> 
                                        <h2><a href="{{ URL::to('subcategory/'.$socialme_subcategory->id.'/'.$socialme_subcategory->subcategory) }}">{{$socialme_subcategory->subcategory}}</a></h2> 
                                    </div>                       
                            <div class="daily-briefing-item">
                            <div class="new-news-image">
                                <a href="{{ URL::to('view/post/'.$socialme_big->id)}}">
                                    <img src="{{asset($socialme_big->image)}}" alt="image">
                                </a>
                                <div class="daily-briefing-content">
                                    <h4>
                                        <a href="{{ URL::to('view/post/'.$socialme_big->id)}}">{{$socialme_big->title}}</a>
                                    </h4>                                  
                                </div>
                            </div>
                            @foreach($socialme_subcategory_post  as $news)
                            <div class="daily-briefing-content" style="border-top: 1px solid #eee;">                              
                                <h4>
                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                </h4>                           
                            </div>                 
                            @endforeach
                        </div>                       
                    </div> 
                    <!--- Helth section --->
                    <div class="col-lg-3"> 
                        <div class="section-title"> 
                                    <h2><a href="{{ URL::to('subcategory/'.$helth_subcategory->id.'/'.$helth_subcategory->subcategory) }}">{{$helth_subcategory->subcategory}}</a></h2> 
                                </div>                       
                        <div class="daily-briefing-item">
                            <div class="new-news-image">
                                <a href="{{ URL::to('view/post/'.$helth_big->id)}}">
                                    <img src="{{asset($helth_big->image)}}" alt="image">
                                </a>
                                <div class="daily-briefing-content">
                                    <h4>
                                        <a href="{{ URL::to('view/post/'.$helth_big->id)}}">{{$helth_big->title}}</a>
                                    </h4>                                  
                                </div>
                            </div>
                            @foreach($helth_subcategory_post as $news)
                            <div class="daily-briefing-content" style="border-top: 1px solid #eee;">                              
                                <h4>
                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                </h4>                           
                            </div>                 
                            @endforeach
                        </div>                       
                    </div> 
                    <!--- Religion section --->
                    <div class="col-lg-3"> 
                        <div class="section-title"> 
                                    <h2><a href="{{ URL::to('subcategory/'.$relegion_subcategory->id.'/'.$relegion_subcategory->subcategory) }}">{{$relegion_subcategory->subcategory}}</a></h2> 
                                </div>                       
                        <div class="daily-briefing-item">
                            <div class="new-news-image">
                                <a href="{{ URL::to('view/post/'.$relegion_big->id)}}">
                                    <img src="{{asset($relegion_big->image)}}" alt="image">
                                </a>
                                <div class="daily-briefing-content">
                                    <h4>
                                        <a href="{{ URL::to('view/post/'.$relegion_big->id)}}">{{$relegion_big->title}}</a>
                                    </h4>                                  
                                </div>
                            </div>
                            @foreach($relegion_subcategory_post as $news)
                            <div class="daily-briefing-content" style="border-top: 1px solid #eee;">                              
                                <h4>
                                    <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                </h4>                           
                            </div>                 
                            @endforeach
                        </div>                       
                    </div>

                </div>
            </div>
        </section> 
        

@endsection