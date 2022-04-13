<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <!-- <i class="fas fa-laugh-wink"></i> -->
    </div>
    <div class="sidebar-brand-text mx-3">DPB Admin Dashboard <sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{URL::to('/')}}" target="blank">
        <i class="fas fa-fw fa-globe-americas"></i>
        <span>Go to Website</span></a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item nav-category">
           
          @if(Auth::user()->category == 1 )
         
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item"> <a class="nav-link" href="{{route('categories')}}">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('subcategories')}}">Sub-Category</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif


          @if(Auth::user()->post == 1 )
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#post" aria-expanded="false" aria-controls="post">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Post</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="" id="post">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item"> <a class="nav-link" href="{{route('create.post')}}">Create News Post</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('allnews.post')}}">All News Post</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('post.image')}}" target="blank">Post Image</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('addpost.image')}}" target="blank">Add Post Image</a></li>
              </ul>
            </div>
          </li>
          @else
          @endif

          @if(Auth::user()->s_setting == 1 )
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#socialsettings" aria-expanded="false" aria-controls="socialsettings">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="socialsettings">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item"> <a class="nav-link" href="{{route('add.socialmedia')}}">Social Setting</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('seo.setting')}}">SEO Setting</a></li>
                <li class="menu-title"> <a class="nav-link" href="{{route('add.setting')}}">Website Setting</a></li>
              </ul>
            </div>
          </li>
          @else

          @endif


           @if(Auth::user()->p_gallery == 1 )
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#photogallery" aria-expanded="false" aria-controls="photogallery">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Photo Gallery </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="photogallery">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item"> <a class="nav-link" href="{{route('view.photogallery')}}">View Photo Gallery</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add.photogallery')}}">Add Photo in Gallery</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add.coronaup')}}">Corona Update</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('view.coronaup')}}">Corona Update Banner Here</a></li>
                <!--<li class="nav-item"> <a class="nav-link" href="{{route('multiimg')}}">Multi Images Post</a></li>--->
              </ul>
            </div>
          </li>
          @else

          @endif


          @if(Auth::user()->video == 1 )
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#videos" aria-expanded="false" aria-controls="videos">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Videos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="videos">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item"> <a class="nav-link" href="{{route('view.videos')}}">View Video Gallery</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add.video')}}">Add Video</a></li>
              </ul>
            </div>
          </li>
          @else

          @endif

          @if(Auth::user()->ads == 1 )
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#manageads" aria-expanded="false" aria-controls="manageads">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Manage Ads</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manageads">
              <ul class="nav flex-column sub-menu">
               
                <li class="nav-item"> <a class="nav-link" href="{{route('view.ads')}}">View All Ads</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('add.video')}}">Add Ads</a></li>
              </ul>
            </div>
          </li>
          @else

          @endif

          @if(Auth::user()->user_rol == 1 )
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#usermanage" aria-expanded="false" aria-controls="usermanage">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Manage Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="usermanage">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('add.author')}}">Add Author</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('view.author')}}">View All Users</a></li>
                
              </ul>
            </div>
          </li>
          @else

          @endif


         



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>