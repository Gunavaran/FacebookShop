@extends('layout.adminDashboard')

@section('content')
    <?php
    use Illuminate\Support\Facades\Session;
    use App\Http\Models\Shop;
    use App\Http\Models\Product;

    $shop = new Shop();
    if( $shop->checkShopExist(Session::get('username')) == true){
    $shopId = $shop->getShopId();
    $count = $shop->getCustomerCount($shopId);

    ?>
    <div class="">
        <div class="row top_tiles">

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-group"></i></div>
                    <div class="count">{{$count}}</div>
                    <h3>Customers</h3>
                    <p></p>
                </div>
            </div>


        </div>
    </div>
    <?php
    } else{
    if(!Session::has('admin')){

    $vendor = new \App\Http\Models\Vendor();
    $name = $vendor->getVendorDetails(Session::get('username'), 'first_name');


    ?>
    <div class="x_content">

        <div class="bs-example" data-example-id="simple-jumbotron">
            <div class="jumbotron">
                <h1>Hei... {{$name}} </h1>
                <p>
                    Welcome to FacebookShop.
                    Let's get started by creating a shop. Click on Help tab for further help.
                </p>

            </div>
        </div>

    </div>
    <?php
    } else {
    $vendor = new \App\Http\Models\Vendor();
    $vendorCount = $vendor->getVendorCount();
    $latestSignups = $vendor->getLatestSignUps();

    $shop = new Shop();
    $shopCount = $shop->getShopCount();
    ?>

    <div class="">
        <div class="row top_tiles">

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-group"></i></div>
                    <div class="count">{{$vendorCount}}</div>
                    <h3>Users</h3>
                    <p></p>
                </div>
            </div>

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                    <div class="count">{{$shopCount}}</div>
                    <h3>Shops</h3>
                    <p></p>
                </div>
            </div>

            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-sign-in"></i></div>
                    <div class="count">{{$latestSignups}}</div>
                    <h3>New Sign Ups</h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>




    <?php
    }
    }
    ?>

@endsection