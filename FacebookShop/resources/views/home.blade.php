{{--This is the page which is shown first--}
{{--Has the facility to contact the admin through Contact Us--}}

        <!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> Facebook Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="{{ url('css/fonticons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('fonts/stylesheet.css') }}" rel="stylesheet" type="text/css"/>

    <!--For Plugins external css-->
    <link href="{{ url('css/plugins.css') }}" rel="stylesheet" type="text/css"/>

    <!--Theme custom css -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css"/>

    <!--Theme Responsive css-->
    <link href="{{ url('css/responsive.css') }}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{ URL::asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<header id="main_menu" class="header navbar-fixed-top">
    <div class="main_menu_bg">
        <div class="container">
            <div class="row">
                <div class="nave_menu">
                    <nav class="navbar navbar-default" id="navmenu">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#home">
                                    <img src="{{URL::asset('/images/logo1.png')}}">
                                </a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#home">Home</a></li>
                                    <li><a href="#service">Service</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                    <li><a href="{{route('loginForm')}}">Log In</a></li>
                                    <li><a href="{{route('registrationForm')}}">Sign Up</a></li>
                                </ul>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</header> <!--End of header -->


<section id="home" class="home">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="main_home_slider text-center">
                        <div class="single_home_slider">
                            <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                <h1>FACEBOOK SHOP</h1>
                                <p class="subtitle">start your dream business...</p>

                                {{--<div class="home_btn">--}}
                                    {{--<a href="" class="btn btn-md">Learn More</a>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                        <div class="single_home_slider">
                            <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                <h1>Have Your Own Shop</h1>
                                <p class="subtitle">be your own boss...</p>

                                {{--<div class="home_btn">--}}
                                    {{--<a href="" class="btn btn-md">Learn More</a>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                        <div class="single_home_slider">
                            <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                <h1>Conquer Facebook</h1>
                                <p class="subtitle">sell online...</p>

                                {{--<div class="home_btn">--}}
                                    {{--<a href="" class="btn btn-md">Learn More</a>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                        <div class="single_home_slider">
                            <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                <h1>Have Your Own Website</h1>
                                <p class="subtitle">shop or service</p>

                                {{--<div class="home_btn">--}}
                                {{--<a href="" class="btn btn-md">Learn More</a>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade success-popup" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Thank You !</h4>
            </div>
            <div class="modal-body text-center">
                <p class="lead">Successfully submitted. Thank you, We will get back to you soon!</p>
                <a href="" class="rd_more btn btn-default">OK</a>
            </div>

        </div>
    </div>
</div>
<section id="service" class="service">
    <div class="container">
        <div class="row">
            <div class="main_service_area sections">
                <div class="col-sm-6">
                    <div class="signle_service_left">
                        <h2>What
                            You
                            Can
                            Do</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="single_service_right">
                        <div class="single_service">
                            <div class="single_service_icon">
                                <i class="lnr lnr-laptop-phone"></i>
                            </div>
                            <div class="single_service_content">
                                <h3>Create Your Shop</h3>
                                <p>Design your own shop in a mouse click. You are your own boss. You can choose from
                                    multiple available templates
                                    which suits our business an taste.</p>
                            </div>
                        </div>
                        <div class="single_service">
                            <div class="single_service_icon">
                                <i class="lnr lnr-screen"></i>
                            </div>
                            <div class="single_service_content">
                                <h3>Business Analysis</h3>
                                <p>Get to know your trending products. Get to know your peak business hours. Get to know
                                    your
                                    least significant product. </p>
                            </div>
                        </div>
                        <div class="single_service">
                            <div class="single_service_icon">
                                <i class="lnr lnr-picture"></i>
                            </div>
                            <div class="single_service_content">
                                <h3>Showcase Your Products</h3>
                                <p>No matter what products / services, showcase them to the world. How you are going to
                                    shocase them is in your hand.
                                    Add multiple images.... let the customers rate your products.... have a
                                    forum....</p>
                            </div>
                        </div>
                        <div class="single_service">
                            <div class="single_service_icon">
                                <i class="lnr lnr-laptop-phone"></i>
                            </div>
                            <div class="single_service_content">
                                <h3>Sell on Facebook</h3>
                                <p>Make Facebook, the largest social network, our place of business. Capture the heart
                                    of 2.2 billion users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="choose" class="choose">
    <div class="container-fluid">
        <div class="row">
            <div class="main_choose_area sections">
                <div class="col-sm-7 col-sm-offset-1">
                    <div class="main_choose_content text-left">
                        <div class="single_choose_content">
                            <h1>Exceptional Customer Service</h1>
                            <p>We will be available 24 / 7 at your service. Ask any inquiries. Just drop a message and
                                our team
                                will get to you. </p>

                            <a href="" class="btn btn-larg">Need to help? lets Chat <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="main_contact sections">
                <div class="head_title text-center">
                    <h2>Contact Us</h2>
                    <p></p>
                </div>

                <div class="row">
                    <div class="contact_contant">

                        <div class="col-sm-6 col-xs-12">
                            <h4>Leave A Message</h4>
                            <div class="single_contant_left">
                                <form action="{{route('contactUsForm')}}" id="formid" method="POST">
                                    @if(count($errors)>0)
                                        @foreach($errors -> all() as $error)
                                            <div class="alert alert-danger">
                                                {{$error}}
                                            </div>
                                        @endforeach
                                    @endif
                                <!--<div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">-->
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="first name"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="8" placeholder="Message"
                                                  required></textarea>
                                    </div>

                                    <div class="">
                                        <input type="submit" value="Send" class="btn btn-primary" id="formbutton">
                                    </div>
                                    <!--</div>-->
                                </form>
                            </div>
                        </div>


                        <div class="col-sm-5 col-sm-offset-1 col-xs-12">
                            <div class="single_message_right_info">
                                <h4>Address :</h4>
                                <ul>
                                    <li><a href=""><i class="fa fa-home"></i> 56 / 5, Kaladdy Amman Kovil Road
                                            Jaffna</a></li>
                                    <li><a href=""><i class="fa fa-phone"></i> +94 77 2479350</a></li>

                                    <li><a href=""><i class="fa fa-envelope"></i> gunavaran.15@cse.mrt.ac.lk</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- End of messsage content-->
                </div>
            </div>
        </div>
    </div>
</section>


<footer id="footer" class="footer">
    <div class="container">
        <div class="main_footer">
            <div class="row">

                <div class="col-sm-6 col-xs-12">
                    <div class="copyright_text">
                        <p class=" wow fadeInRight" data-wow-duration="1s">©Futura Labs 2018. All Rights Reserved</p>
                    </div>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <div class="footer_socail">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-google-plus"></i></a>
                        <a href=""><i class="fa fa-rss"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-dribbble"></i></a>
                        <a href=""><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- START SCROLL TO TOP  -->

<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>


<script type="text/javascript" src="{{ URL::asset('js/vendor/jquery-1.11.2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.easypiechart.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.mixitup.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.easing.1.3.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

{{--function to show pop up success message--}}
@if(Session::has('success'))
    <script type='text/javascript'>
        $(window).load(function () {
            $('#myModal').modal('show');
        });
    </script>
@endif

</body>
</html>
