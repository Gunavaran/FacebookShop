<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Facebook Shop</title>

    <!-- Bootstrap -->
    <link href="{{ url('vendorsTemplate/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="{{ url('vendorsTemplate/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <!-- NProgress -->
    <link href="{{ url('vendorsTemplate/nprogress/nprogress.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
{{--    <link href="{{ url('vendorsTemplate/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"/>--}}
<!-- iCheck -->
    <link href="{{ url('vendorsTemplate/iCheck/skins/flat/green.css') }}" rel="stylesheet"/>
    <!-- Datatables -->
    <link href="{{ url('vendorsTemplate/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('vendorsTemplate/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('vendorsTemplate/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ url('vendorsTemplate/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
          rel="stylesheet"/>
    <link href="{{ url('vendorsTemplate/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
          rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{{ url('build/css/custom.min.css') }}" rel="stylesheet"/>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{route('dashboard')}}" class="site_title"><i class="fa fa-shopping-cart"></i>
                        <span>Facebook Shop</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    {{--The profile picture and user anme should be added--}}

                    {{--<div class="profile_pic">--}}
                    {{--<img src="images/img.jpg" alt="..." class="img-circle profile_img">--}}
                    {{--</div>--}}
                    {{--<div class="profile_info">--}}
                    {{--<span>Welcome,</span>--}}
                    {{--<h2>John Doe</h2>--}}
                    {{--</div>--}}
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <?php
                            use App\Http\Models\Shop;
                            use Illuminate\Support\Facades\Session;
                            if(Session::has('shopId')){
                                $shop = new Shop();
                                $shopTemplate = $shop->getShopDetailsViaId(Session::get('shopId'),'template');
                            ?>
                            <li><a href="{{route('viewMyShop')}} " target="_blank"><i class="fa fa-shopping-cart"></i>View
                                    My Shop</a>
                            </li>
                            <?php
                                    if($shopTemplate == 'photography'){
                                        ?>
                                <li><a><i class="fa fa-photo"></i> Photos <span
                                                class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('viewPhotos')}}">Gallery</a></li>
                                        <li><a href="{{route('uploadPhotos_selectCategory')}}">Upload Photos</a>
                                        </li>
                                        <li><a href="{{route('showCategories')}}">Categories</a></li>
                                    </ul>
                                </li>
                                <?php

                                    }
                            }
                            ?>



                            {{--this tab deals with details of the vendor who is the user here--}}
                            <li><a><i class="fa fa-user"></i> Account <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('myDetails')}}">My Details</a></li>
                                    <li><a href="{{route('changePassword')}}">Change Password</a></li>
                                </ul>
                            </li>
                            {{--This tab deals with shop that will be created--}}
                            {{--For create shop option, a new button has to be put in the top menu bar--}}
                            <li><a><i class="fa fa-shopping-basket"></i> Shop <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('showCreateShopForm')}}">Create Shop</a></li>
                                    <li><a href="{{route('showShopDetails')}}">Shop Details</a></li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-cubes"></i> Products <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('showCategories')}}">Categories</a></li>
                                    <li><a href="{{route('showNewProductForm')}}">Add Product</a></li>
                                    <li><a href="{{route('showProductsDetails')}}">Product Details</a></li>
                                </ul>
                            </li>

                            <li><a href="{{route('showMessages',['shopId',null])}}"><i class="fa fa-envelope"></i>Notifications</a>
                            </li>

                            <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('showUsersList')}}">Users List</a></li>
                                    <li><a href="{{route('showShopsList')}}">Shops List</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-users"></i> Templates <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('chooseTemplate')}}">Choose Template</a></li>
                                    <?php

                                    if(Session::has('shopId')){
                                    $shopId = Session::get('shopId');

                                    $vendorShop = Shop::where('shop_id', $shopId)->first();

                                    if($vendorShop->template != null){
                                    ?>
                                    <li><a href="{{route('designTemplate')}}">Design</a></li>
                                    <li><a href="{{route('designTemplateText')}}">Design Text</a></li>

                                    <?php

                                    }
                                    }
                                    ?>

                                </ul>
                            </li>
                                <?php
                                if(Session::has('shopId')){
                                    ?>
                                <li><a href="{{route('showMessages',['shopId'=>$shopId])}}"><i class="fa fa-envelope"></i>Messages</a>
                                </li>

                            <?php
                                }
                                    ?>

                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="" alt=""> {{Session::get('username')}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{route('myDetails')}}"> Profile</a></li>
                                <li><a href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                        {{--<li role="presentation" class="dropdown">--}}
                        {{--<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"--}}
                        {{--aria-expanded="false">--}}
                        {{--<i class="fa fa-envelope-o"></i>--}}
                        {{--<span class="badge bg-green">6</span>--}}
                        {{--</a>--}}
                        {{--<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">--}}

                        {{--<li>--}}
                        {{--<a>--}}
                        {{--<span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>--}}
                        {{--<span>--}}
                        {{--<span>John Smith</span>--}}
                        {{--<span class="time">3 mins ago</span>--}}
                        {{--</span>--}}
                        {{--<span class="message">--}}
                        {{--Film festivals used to be do-or-die moments for movie makers. They were where...--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<div class="text-center">--}}
                        {{--<a>--}}
                        {{--<strong>See All Alerts</strong>--}}
                        {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
            {{--@if(!empty($message))--}}
            {{--<p class="alert alert-danger"> {{$message}}</p>--}}
            {{--@endif--}}
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                ©Futura Labs 2018. All Rights Reserved
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/Chart.js/dist/Chart.min.js') }}"></script>--}}
<!-- jQuery Sparklines -->
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
{{--<!-- Flot -->--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/Flot/jquery.flot.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/Flot/jquery.flot.pie.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/Flot/jquery.flot.time.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/Flot/jquery.flot.stack.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/Flot/jquery.flot.resize.js') }}"></script>--}}
{{--<!-- Flot plugins -->--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/flot-spline/js/jquery.flot.spline.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/flot.curvedlines/curvedLines.js') }}"></script>--}}
{{--<!-- DateJS -->--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/DateJS/build/date.js') }}"></script>--}}
<!-- bootstrap-daterangepicker -->
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/moment/min/moment.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/bootstrap-daterangepicker/daterangepicker.js') }}"></script>--}}

<!-- iCheck -->
<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/iCheck/icheck.min.js') }}"></script>
<!-- jQuery Tags Input -->
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>

<!-- Datatables -->
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/jszip/dist/jszip.min.js') }}"></script>

{{--<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>--}}
{{--<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>--}}

<!-- Custom Theme Scripts -->
<script type="text/javascript" src="{{ URL::asset('build/js/custom.min.js') }}"></script>
<script>
    $('#datatable-fixed-header').DataTable({
        destroy: true,
        aaData: response.data
    });
    $('#datatable').DataTable({
        destroy: true,
        aaData: response.data
    });
</script>
<script type="text/javascript"
        src="{{ URL::asset('vendorsTemplate/bs-confirmation-master/bootstrap-confirmation.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/popper.js/dist/popper.js') }}"></script>
<script>
    $('[data-toggle=confirmation]').confirmation();
</script>

<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/dropzone-bootsnipp/preview.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendorsTemplate/dropzone-bootsnipp/bootsnipp.js') }}"></script>
</body>
</html>
