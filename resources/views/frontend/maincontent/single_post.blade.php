@extends('frontend.master')

@section('title')
{{ $post->title }}
@endsection

@section('image')
{{ $post->image}}
@endsection

@section('keyword')
    {{ $post->keyword }}
@endsection

@section('metatitle')
    {{ $post->metatitle }}
@endsection

@section('tag')
{{ $post->tag }}
@endsection

@section('content_area')  

<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2></h2>
                    <ul>
                        <li><a href="{{url('/')}}">হোম</a></li>
                        <li><a href="#">{{ $post->category }}</a></li>
                        <li><a href="#">{{ $post->subcategory }}</a></li>   
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start News Details Area -->
        <section class="news-details-area ptb-50">
            <div class="container">
                <div class="row">
                     <!----- Start 8 Colum----->
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="blog-details-desc">
                            
                            <div class="news-details-head">                                
                                <span class="followup"><h6>{{ $post->followup }}</h6></span>
                                <span class="headline"><h3>{{ $post->title }}</h3></span>
                                <span class="sub-headline"><h6>{{ $post->subtitle }}</h6></span>
                            </div>
                            <div class="row">
                                <div class="jurnalist-name"><a href="#"> @if($post->author == NULL)<span>{{$post->name}}</span>@else<span>{{$post->author}}</span>@endif  , </a><span>{{ $post->position }}</span></div>
                              
                            </div>
                            <div class="row news-publish-date">
                                @php $t=strtotime($post->post_date); @endphp
                                     <span><a href="#">প্রকাশঃ</a> {{bangla_date( $t, "en", "d m, y") }} | {{ $post->post_time }}<a href="#"></a></span>               
                            </div>

                            <div class="article-image">
                                <img src="{{ asset($post->image) }}" alt="image">   
                                <br>
                                <div><span><p>{{ $post->imagecredit }}</p></span></div>
                                </div>

                            <div class="article-content">
                                
                                <span><p class="led-news-font">{!! $post->leadnews !!}</p></span>                                                             
                                <div> {!! $post->details !!}</div>              
                            </div>
                            <!--- Share Option--->
                            <div class="article-footer">
                                <div class="article-share">
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                            </div>

                             <!----- navigation----->

                            <div class="post-navigation">
                            <div id="fb-root"></div>
                                <script async defer crossorigin="anonymous" 
                                src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0" nonce="PCUjkdfA"></script>
                                <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
                            </div>
                            <!----- Start Comment Area----->
                          
                             <!----- End Comment section----->

                            <!----- Related News section----->

                                <div class="row">
                                    @php
                                        $more = DB::table('posts')->where('category_id',$post->category_id)->orderBy('id','desc')->limit(8)->get();
                                    @endphp
                                
                                        <div class="politics-news">                                          
                                            <div class="row">
                                                @foreach($more as $news)
                                                <div class="col-lg-3 col-md-3 col-sm-3">
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
                                <!------End Related News Secton--->
                        </div>
                    </div>
                        <!----- End 8 colum----->
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                        <!-----Start Sideber Section----->
                    <div class="col-lg-3">
                        <aside class="widget-area">
                            <div class="widget widget_search">
                                <form class="search-form">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" class="search-field" placeholder="Search...">
                                    </label>
                                    <button type="submit">
                                        <i class='bx bx-search'></i>
                                    </button>
                                </form>
                            </div>
                            <section class="widget widget_most_shared">
                                    @php 
                                        $ads = DB::table('ads')->where('type',1)->skip(1)->first();
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
                                  <h3 class="widget-title">Leatest</h3>
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

                            <section class="widget widget_latest_news_thumb">
                                    @php 
                                         $favourite = DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(4)->get();
                                    @endphp
                                  <h3 class="widget-title">Most Read</h3>
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
                                    <section class="widget widget_stay_connected">
                                    @php 
                                    $sociallink = DB::table('socials')->first();
                                    @endphp
                                    <h3 class="widget-title">Connected Us</h3>                                   
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
                                               Linkedin
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
                        </aside>
                    </div>

                    <!---- End Sideber Section---->
                </div>
            </div>
        </section>


@endsection