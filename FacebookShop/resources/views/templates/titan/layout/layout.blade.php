<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    Document Title
    =============================================
    -->
    <title>Titan Template</title>
    <!--
    Favicons
    =============================================
    -->
    <link href="{{ url('assets/images/favicons/favicon-16x16.png') }}" rel="icon" type="image/png" sizes="16x16"/>
    <link href="{{ url('/manifest.json') }}" rel="manifest">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--
    Stylesheets
    =============================================

    -->

    <!-- Default stylesheets-->
    <link href="{{ url('titan/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Template specific stylesheets-->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700') }}" rel="stylesheet"/>
    <link href="{{ url('https://fonts.googleapis.com/css?family=Volkhov:400i') }}" rel="stylesheet"/>
    <link href="{{ url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800') }}" rel="stylesheet"/>
    <link href="{{ url('titan/lib/animate.css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ url('titan/lib/components-font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('titan/lib/et-line-font/et-line-font.css') }}" rel="stylesheet"/>
    <link href="{{ url('titan/lib/flexslider/flexslider.css') }}" rel="stylesheet"/>
    <link href="{{ url('titan/lib/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('titan/lib/owl.carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('titan/lib/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet"/>
    <link href="{{ url('titan/lib/simple-text-rotator/simpletextrotator.css') }}" rel="stylesheet"/>
    <!-- Main stylesheet and color file-->
    <link href="{{ url('titan/css/style.css') }}" rel="stylesheet"/>
    <link href="{{ url('titan/css/colors/default.css') }}" rel="stylesheet"/>
</head>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<main>
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span
                            class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="
                <?php
                use App\Http\Models\Shop;
                use Illuminate\Support\Facades\Session;
                use App\Http\Models\Customer;
                $shopId = Session::get('shopId');
                echo route('showTemplateHome');

                ?>">

                    <?php

                    echo Shop::where('shop_id', $shopId)->value('shop_name');
                    ?></a>
            </div>
            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a style="font-size: medium" href="{{route('showTemplateHome')}}">Home</a></li>
                    <?php
                    if (!Session::has('customer')) {
                    ?>
                    <li class="dropdown"><a style="font-size: medium" href="{{route('customerLogInPage')}}">Log In</a></li>
                    <li class="dropdown"><a style="font-size: medium" href="{{route('customerRegisterPage')}}">Sign UP</a></li>

                    <?php
                    } else{
                    ?>
                    <li class="dropdown"><a class="dropdown-toggle" href="#" style="font-size: medium" data-toggle="dropdown">{{DB::table('customer')->where('email',Session::get('customer'))->value('first_name')}}</a>
                        <ul class="dropdown-menu">
                            <li><a style="font-size: medium" href="service1.html">Account Settings</a></li>
                            <li><a style="font-size: medium" href="{{route('logoutCustomer')}}">Log Out</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="module-small bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="widget">
                        <h5 class="widget-title font-alt">About Titan</h5>
                        <p>The languages only differ in their grammar, their pronunciation and their most common
                            words.</p>
                        <p>Phone: +1 234 567 89 10</p>Fax: +1 234 567 89 10
                        <p>Email:<a href="#">somecompany@example.com</a></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="widget">
                        <h5 class="widget-title font-alt">Recent Comments</h5>
                        <ul class="icon-list">
                            <li>Maria on <a href="#">Designer Desk Essentials</a></li>
                            <li>John on <a href="#">Realistic Business Card Mockup</a></li>
                            <li>Andy on <a href="#">Eco bag Mockup</a></li>
                            <li>Jack on <a href="#">Bottle Mockup</a></li>
                            <li>Mark on <a href="#">Our trip to the Alps</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="widget">
                        <h5 class="widget-title font-alt">Blog Categories</h5>
                        <ul class="icon-list">
                            <li><a href="#">Photography - 7</a></li>
                            <li><a href="#">Web Design - 3</a></li>
                            <li><a href="#">Illustration - 12</a></li>
                            <li><a href="#">Marketing - 1</a></li>
                            <li><a href="#">Wordpress - 16</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="widget">
                        <h5 class="widget-title font-alt">Popular Posts</h5>
                        <ul class="widget-posts">
                            <li class="clearfix">
                                <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-1.jpg"
                                                                                 alt="Post Thumbnail"/></a></div>
                                <div class="widget-posts-body">
                                    <div class="widget-posts-title"><a href="#">Designer Desk Essentials</a></div>
                                    <div class="widget-posts-meta">23 january</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="widget-posts-image"><a href="#"><img src="assets/images/rp-2.jpg"
                                                                                 alt="Post Thumbnail"/></a></div>
                                <div class="widget-posts-body">
                                    <div class="widget-posts-title"><a href="#">Realistic Business Card Mockup</a></div>
                                    <div class="widget-posts-meta">15 February</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="divider-d">
    <footer class="footer bg-dark" style="margin-top: -2%">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="text-align:center; font-family: 'Karla', sans-serif; font-size: large">&copy; 2018&nbsp;Apptimus
                        Têch, All
                        Rights Reserved</p>
                </div>

            </div>
        </div>
    </footer>
    <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>

</main>
<!--
JavaScripts
=============================================
-->
<script type="text/javascript" src="{{ URL::asset('titan/lib/jquery/dist/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/lib/wow/dist/wow.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('titan/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/lib/isotope/dist/isotope.pkgd.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/lib/imagesloaded/imagesloaded.pkgd.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/lib/flexslider/jquery.flexslider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/lib/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/lib/smoothscroll.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('titan/lib/magnific-popup/dist/jquery.magnific-popup.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('titan/lib/simple-text-rotator/jquery.simple-text-rotator.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('titan/js/main.js') }}"></script>
@if(Session::has('ratingSuccess'))
    <script type='text/javascript'>
        $(window).on('load',function () {
            $('#successMessage').modal('show');
        });
    </script>
@endif
@if(Session::has('ratingFailure'))
    <script type='text/javascript'>
        $(window).on('load',function () {
            $('#failureMessage').modal('show');
        });
    </script>
@endif