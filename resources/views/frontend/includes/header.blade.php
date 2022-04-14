  @php
  $websetting = DB::table('websitesetting')->first();
  $sociallink = DB::table('socials')->first();
  @endphp


    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="top-header-social date-time-bn-en">
                              <p>
                              <?php
                                date_default_timezone_set('Asia/Dhaka');
                                echo bangla_date(time(),"en","d m, y"); ?> |
                                <?php
                                echo bangla_date(time(),"bn","d m, y");
                                ?>
                                </p>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3">
                        <ul class="top-header-social">
                            <li>
                                <a href="{{ $sociallink->facebook}}" class="facebook" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $sociallink->instagram}}" class="instagram" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $sociallink->linkedin}}" class="linkedin" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $sociallink->twitter}}" class="twitter" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $sociallink->youtube}}" class="youtube" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Top Header Area -->

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="{{URL::to('/')}}">
                                <img src="{{ asset($websetting->image)}}" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{URL::to('/')}}">
                            <img src="{{ asset($websetting->image)}}" alt="image">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{URL::to('/')}}" class="nav-link active">
                                        প্রচ্ছদ
                                    </a>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',21)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',13)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',17)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',14)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',7)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',16)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',9)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',12)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',11)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',22)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    @php
                                    $singlecat = DB::table('categories')->where('id',23)->first();
                                    $subcategory = DB::table('subcategories')->where('category_id',$singlecat->id)->get();
                                    @endphp
                                    <a href="{{ URL::to('category/'.$singlecat->id.'/'.$singlecat->category) }}" class="nav-link">
                                    {{ $singlecat->category }}
                                    </a>
                                    <ul class="dropdown-menu">
                                    @foreach($subcategory as $subcat)
                                        <li class="nav-item">
                                            <a href="{{ URL::to('subcategory/'.$subcat->id.'/'.$subcat->subcategory) }}" class="nav-link">
                                                {{ $subcat->subcategory }}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
        </div>
    </div>
