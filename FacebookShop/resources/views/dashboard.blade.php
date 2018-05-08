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
    }
    ?>


@endsection