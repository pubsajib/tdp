
@php
    $seo = DB::table('seos')->first();
@endphp

<!doctype html>
<html lang="bn">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="meta_author" content="{{ $seo->meta_author }}">

        <meta name="meta_keyword" content="@yield('keyword')">
        <meta name="meta_title" content="@yield('metatitle')">
        <meta name="meta_description" content="{{ $seo->meta_description }}">
        <meta name="google_tag_manager" content="{{ $seo->google_tag_manager }}">
        <meta name="google_verification" content="{{ $seo->google_verification }}">
        <meta name="alexa_analytics" content="{{ $seo->alexa_analytics }}">

        <meta property="fb:app_id" content="649000086450414" />
        <meta property="og:url"    content="website" />
        <meta property="og:type"   content="article" />
        <meta property="og:title"  content="@yield('title')" />
        <meta property="og:description" content="" />
        <meta property="og:image"       content="https://phenomenalbangladesh.com/@yield('image')" />
        <meta property="og:image:width" content="800"/>
        <meta property="og:image:height" content="500"/>
        <meta name="tag" content="@yield('tag')">

        <meta name="twitter:card" content="summary"/>
        <meta property="twitter:title"  content="@yield('title')"/>
        <meta property="twitter:image"  content="https://phenomenalbangladesh.com/@yield('image')" />


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('frontend//assets/css/bootstrap.min.css') }}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css') }}">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/boxicons.min.css') }}">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
        <!-- Owl Carousel Default CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.min.css') }}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.min.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <!-- Responsive CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
        <!-- Custom css -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">

        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60ede07d003943001ce6e891&product=inline-share-buttons" async="async"></script>

        <link rel="icon" type="image/ico" href="{{ asset('upload/dpb-faveicon.png') }}">

        <style>
            p{
                font-size:16px;
            }
        </style>
    </head>

    <body>

        <!-- Start Top Header Area -->
        @include('frontend.includes.header')
        <!-- End Navbar Area -->

        <!-- Start Main News Area -->

        @yield('content_area')
        <!-- End Default News Area -->

        <!-- Start Footer Area -->
        @include('frontend.includes.footer')
        <!-- End Footer Area -->

        <!-- Jquery Slim JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
        <!-- Popper JS -->
        <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <!-- Meanmenu JS -->
        <script src="{{ asset('frontend/assets/js/jquery.meanmenu.js') }}"></script>
        <!-- Owl Carousel JS -->
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <!-- Magnific Popup JS -->
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Nice Select JS -->
        <script src="{{ asset('frontend/assets/js/nice-select.min.js') }}"></script>
        <!-- Ajaxchimp JS -->
		<script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
		<!-- Form Validator JS -->
		<script src="{{ asset('frontend/assets/js/form-validator.min.js') }}"></script>
		<!-- Contact JS -->
        <script src="{{ asset('frontend/assets/js/contact-form-script.js') }}"></script>
        <!-- Wow JS -->
        <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <!-- Custom JS -->
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
         <script>
            $(document).ready(function(){
                $('img').lazyload();
            })
        </script>


    </body>
</html>
