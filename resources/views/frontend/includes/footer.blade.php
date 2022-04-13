    <section class="footer-area pt-100 pb-40">
            @php
            
            $sociallink = DB::table('socials')->first();
            $websetting = DB::table('websitesetting')->first();
            @endphp  
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <a href="#">
                                <img src="{{ asset($websetting->image)}}" alt="image">
                            </a>
                            <p>{{ $websetting->about_short}}</p>

                          
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>যোগাযোগ</h2>

                            <div class="post-content">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                    <ul class="useful-links-list">
                                <li>
                                    <a href="#">{{ $websetting->address}}</a>
                                </li>
                                <li>
                                    <a href="#">{{ $websetting->phone}}</a>
                                </li>
                                <li>
                                    <a href="#">{{ $websetting->email}}</a>
                                </li>
                                
                                
                            </ul>
                                    </div>

                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>
                            </div>

                         

                           
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>Useful links</h2>

                            <ul class="useful-links-list">
                                <li>
                                    <a href="#">Archive</a>
                                </li>
                                
                                <li>
                                    <a href="{{route('head.privacy')}}">Privacy & Policy</a>
                                </li>
                                <li>
                                    <a href="{{route('termsncondition')}}">Terms & Conditions</a>
                                   
                                </li>
                               
                                
                            </ul>
                        </div>
                    </div>

                   
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="single-footer-widget">
                        <ul class="social">
                                <li>
                                    <a href="{{ $sociallink->facebook}}" class="facebook" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $sociallink->instagram}}" class="twitter" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $sociallink->linkedin}}" class="pinterest" target="_blank">
                                        <i class='bx bxl-linkedin'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $sociallink->twitter}}" class="linkedin" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $sociallink->youtube}}" class="linkedin" target="_blank">
                                        <i class='bx bxl-youtube'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </section>
        <!-- End Footer Area -->

        <!-- Start Copy Right Area -->
        <div class="copyright-area">
            <div class="container">
                <div class="copyright-area-content">
                    <p>
                        Copyright © 2021 The Daily Phenomenal Bangladesh All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
        <!-- End Copy Right Area -->

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class='bx bx-up-arrow-alt'></i>
        </div>
        <!-- End Go Top Area -->
        