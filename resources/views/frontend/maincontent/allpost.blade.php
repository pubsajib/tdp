@extends('frontend.master')

@section('title')
    @php 
        $seo = DB::table('seos')->first();
    @endphp
    {{ $seo->meta_title }}
@endsection


@section('content_area') 
<!-- Start Page Banner -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                   
                    <ul>
                        <li><a href="{{URL::to('/')}}">হোম</a></li>
                        
                        <li><a href="#">ক্যাটাগরি</a></li>                                                              
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start News Area -->
        <section class="news-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach($catpost as $news)
                        <div class="single-news-item">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="news-image">
                                        <a href="{{ URL::to('view/post/'.$news->id)}}">
                                            <img src="{{asset($news->image)}}" alt="image">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="news-content">
                                        
                                        <h3>
                                            <a href="{{ URL::to('view/post/'.$news->id)}}">{{$news->title}}</a>
                                        </h3>
                                        <p>{!! Str::limit($news->details,200) !!}</p>
                                        <p><a href="#"></a>{{$news->post_date}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach    
                        
                        {{ $catpost->links('paginationlinks') }}
                        <!--
                        <div class="pagination-area">
                            <a href="#" class="prev page-numbers">
                                <i class='bx bx-chevron-left'></i>
                            </a>
                            <a href="#" class="page-numbers">1</a>
                            <span class="page-numbers current" aria-current="page">2</span>
                            <a href="#" class="page-numbers">3</a>
                            <a href="#" class="page-numbers">4</a>
                            <a href="#" class="next page-numbers">
                                <i class='bx bx-chevron-right'></i>
                            </a>
                        </div>
                        -->
                    </div>
                    

                    <div class="col-lg-4">
                        <aside class="widget-area">
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
                                        $letest = DB::table('posts')->orderBy('id','desc')->limit(4)->get();                                      
                                    @endphp
                                  <h3 class="widget-title">সর্বশেষ</h3>
                                    @foreach($letest as $row)           
                                    <article class="item">
                                        <a href="{{ URL::to('view/post/'.$row->id)}}" class="thumb">
                                            <span class="" role="img"><img src="{{asset($row->image)}}"></span>
                                        </a>
                                        <div class="info">
                                            <h4 class="title usmall"><a href="{{ URL::to('view/post/'.$row->id)}}">{{$row->title}}</a></h4>
                                            <span>{{$row->post_date}}</span>
                                        </div>
                                    </article>  
                                   @endforeach
                               
                            </section>

                            <section class="widget widget_latest_news_thumb">
                            @php 
                                         $favourite = DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(4)->get();
                                    @endphp
                                  <h3 class="widget-title">সর্বাধিকক পঠিত</h3>
                                    @foreach($letest as $row)           
                                    <article class="item">
                                        <a href="{{ URL::to('view/post/'.$row->id)}}" class="thumb">
                                            <span class="" role="img"><img src="{{asset($row->image)}}"></span>
                                        </a>
                                        <div class="info">
                                            <h4 class="title usmall"><a href="{{ URL::to('view/post/'.$row->id)}}">{{$row->title}}</a></h4>
                                            <span>{{$row->post_date}}</span>
                                        </div>
                                    </article>  
                                   @endforeach
                               
                            </section>

                               

                                 <section class="widget widget_stay_connected">
                                    @php 
                                    $sociallink = DB::table('socials')->first();
                                    @endphp
                                    <h3 class="widget-title">আমাদের সঙ্গে থাকুন</h3>
                                    
                                    <ul class="stay-connected-list">
                                        <li>
                                            <a href="{{ $sociallink->facebook }}">
                                                <i class='bx bxl-facebook'></i>
                                               Facebook
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->twitter }}" class="twitter">
                                                <i class='bx bxl-twitter'></i>
                                               Twitter 
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->linkedin }}" class="linkedin">
                                                <i class='bx bxl-linkedin'></i>      
                                                Linked in                                        
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->youtube }}" class="youtube">
                                                <i class='bx bxl-youtube'></i>    
                                                Youtube                                            
                                            </a>
                                        </li>
    
                                        <li>
                                            <a href="{{ $sociallink->instagram }}" class="instagram">
                                                <i class='bx bxl-instagram'></i> 
                                                Instagram                                              
                                            </a>
                                        </li>                                   
                                    </ul>
                                </section>
                                <section class="widget widget_tag_cloud">
                                @php
                                $category = DB::table('categories')->orderBy('id','desc')->get();                                            
                                @endphp 
                                <div class="single-footer-widget">
                                    <h2>Top Category</h3>
    
                                    <div class="tagcloud">
                                    @foreach($category as $getcat)
                                        <a href="{{ URL::to('category/'.$getcat->id.'/'.$getcat->category) }}">{{ $getcat->category}}</a>
                                    @endforeach
                                    </div>
                                </div>
                           
                                </section>                          
                        </aside>
                    </div>
                </div>
            </div>
        </section>

@endsection