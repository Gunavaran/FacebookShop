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
    <title>
        <?php
        use App\Http\Models\Shop;
        use Illuminate\Support\Facades\Session;
        use App\Http\Models\Customer;
        $shopId = Session::get('siteShopId');
        $shop = new Shop();
        $shopName = $shop->getShopDetailsViaId($shopId, 'shop_name');

        echo $shopName;
        ?>
    </title>
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
                echo route('showTemplateHome');

                ?>">

                    <?php
                    echo $shopName;
                    ?></a>
            </div>
            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a style="font-size: medium" href="{{route('showTemplateHome')}}">Home</a></li>
                    <?php
                    if (!Session::has('customerId')) {
                    ?>
                    <li class="dropdown"><a style="font-size: medium" href="{{route('customerLogInPage')}}">Log In</a>
                    </li>
                    <li class="dropdown"><a style="font-size: medium" href="{{route('customerRegisterPage')}}">Sign
                            UP</a></li>

                    <?php
                    } else{
                    $customer = new Customer();
                    $customerName = $customer->getCustomerDetails(Session::get('customerId'), 'first_name');
                    ?>
                    <li class="dropdown"><a class="dropdown-toggle" href="#" style="font-size: medium"
                                            data-toggle="dropdown">{{$customerName}}</a>
                        <ul class="dropdown-menu">
                            <li><a style="font-size: medium" href="{{route('accountSettings')}}">Account Settings</a></li>
                            <li><a style="font-size: medium" href="{{route('logoutCustomer')}}">Log Out</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a style="font-size: medium" href="{{route('checkoutPage')}}">Checkout</a></li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="module-small bg-dark" style="margin-top: -5%">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title"><b style="font-size:large">Get In Touch</b></h5>
                        <p style="font-family: 'Karla', sans-serif; font-size: medium">Tel No :
                            {{$shop->getShopDetailsViaId($shopId,'contact_no')}}&nbsp; </p>
                        <p style="font-family: 'Karla', sans-serif; font-size: medium">Email :
                            &nbsp;{{$shop->getShopDetailsViaId($shopId,'email')}} </p>
                        <p style="font-family: 'Karla', sans-serif; font-size: medium">Address :
                            {{$shop->getShopDetailsViaId($shopId,'resident_no').', '.$shop->getShopDetailsViaId($shopId,'street').', '.$shop->getShopDetailsViaId($shopId,'city').', '.$shop->getShopDetailsViaId($shopId,'country')}}
                            &nbsp; </p>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title"><b style="font-size:large">Contact Us </b></h3>
                        <form method="post" action="{{route('storeShopMessage')}}">
                            {{csrf_field()}}
                            @if(count($errors) > 0)
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger"> {{$error}}</p>
                                @endforeach
                            @endif
                            <div class="form-group">
                                <label class="sr-only" for="name">Name</label>
                                <input style="text-transform: none;font-size: medium" class="form-control" id="name" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name."/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input style="text-transform: none;font-size: medium" class="form-control" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email address."/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <textarea style="text-transform: none;font-size: medium" class="form-control" rows="7" id="message" name="message" placeholder="Your Message" required="required" data-validation-required-message="Please enter your message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <input style="text-transform: none;font-size: medium" class="form-control" type="hidden" id="shop_id" value="{{$shopId}}" name="shop_id"/>
                            <div class="text-center">
                                <button class="btn btn-primary btn-round" type="submit">Submit</button>
                            </div>
                        </form>

                        {{--<p style="font-family: 'Karla', sans-serif; font-size: medium">Photography</p>--}}
                        {{--<p style="font-family: 'Karla', sans-serif; font-size: medium">Videography</p>--}}
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
                    <p style="text-align:center; font-family: 'Karla', sans-serif; font-size: large">&copy; 2018&nbsp;Futura
                        Labs, All
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
        $(window).on('load', function () {
            $('#successMessage').modal('show');
        });
    </script>
    {{Session::forget('ratingSuccess')}}
@endif
@if(Session::has('ratingFailure'))
    <script type='text/javascript'>
        $(window).on('load', function () {
            $('#failureMessage').modal('show');
        });
    </script>
    {{Session::forget('ratingFailure')}}
@endif

@if(Session::has('checkoutSuccess'))
    <script type='text/javascript'>
        $(window).on('load', function () {
            $('#checkoutSuccess').modal('show');
        });
    </script>
    {{Session::forget('checkoutSuccess')}}
@endif

@if(Session::has('checkoutFailure'))
    <script type='text/javascript'>
        $(window).on('load', function () {
            $('#checkoutFailure').modal('show');
        });
    </script>
{{Session::forget('checkoutFailure')}}
@endif