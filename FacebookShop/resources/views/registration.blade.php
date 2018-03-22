
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Amazing landing Free html template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ url('css/fonticons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('fonts/stylesheet.css') }}" rel="stylesheet" type="text/css" />

    <!--For Plugins external css-->
    <link href="{{ url('css/plugins.css') }}" rel="stylesheet" type="text/css" />

    <!--Theme custom css -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" />

    <!--Theme Responsive css-->
    <link href="{{ url('css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ URL::asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>

    <!--===============================================================================================-->
    <link href="{{ url('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
    <link href="{{ url('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
    <link href="{{ url('vendor/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
    <link href="{{ url('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
    <link href="{{ url('vendor/animsition/css/animsition.min.css') }}" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
    <link href="{{ url('vendor/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
    <link href="{{ url('vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
    <link href="{{ url('css/util.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/main.css') }}" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
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
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
                                    <li><a href="{{route('home')}}"; style="color: #727b84">Home</a></li>
                                    <li><a href="{{route('loginForm')}}"; style="color: #727b84">Log In</a></li>
                                </ul>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</header> <!--End of header -->

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" action="{{route('registerUser')}}" method="post">
                {{csrf_field()}}
					<span class="login100-form-title p-b-43">
						Sign Up To Continue
					</span>
                @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger"> {{$error}}</p>
                @endforeach
                @endif
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="firstName" value="{{old('firstName')}}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">First Name</span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="lastName" value="{{old('lastName')}}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Last Name</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" value="{{old('email')}}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="contactNo" value="{{old('contactNo')}}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Contact No</span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="country" value="{{old('country')}}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Country</span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="username" value="{{old('username')}}">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Username</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Confirmation required">
                    <input class="input100" type="password" name="password_confirmation">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirm Password</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div>
                        <a href="#" class="txt1">
                            Forgot Password?
                        </a>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign Up
                    </button>
                </div>
                {{--Option to sign up using facebook--}}
                {{--<div class="text-center p-t-46 p-b-20">--}}
                {{--<span class="txt2">--}}
                {{--or sign up using--}}
                {{--</span>--}}
                {{--</div>--}}

                {{--<div class="login100-form-social flex-c-m">--}}
                {{--<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">--}}
                {{--<i class="fa fa-facebook-f" aria-hidden="true"></i>--}}
                {{--</a>--}}

                {{--<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">--}}
                {{--<i class="fa fa-twitter" aria-hidden="true"></i>--}}
                {{--</a>--}}
                {{--</div>--}}
            </form>
            <div class="login100-more" style="background-image:url({{ asset('images/registration.jpg') }}">
            </div>
        </div>
    </div>
</div> <!--End of form -->



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
</footer> <!--End of Footer -->



<!-- START SCROLL TO TOP  -->

<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>

<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ URL::asset('js/mainLogin.js') }}"></script>
</body>
</html>
