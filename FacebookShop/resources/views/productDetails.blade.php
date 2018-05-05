@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title" style="color: #1da1f2">
                    <h2><b>Users List</b>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Currency</th>
                            <th>Items Available</th>
                            <th>Availability</th>
                            <th>More Details</th>
                            <th>Remove</th>


                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        use App\Http\Models\Product;
                        use App\Http\Models\Shop;

                        $shop = new Shop();
                        $shopId = $shop->getShopId();
                        $products = Product::where('shop_id',$shopId)->get();
                        ?>
                        @foreach( $products as $product)
                            <tr>
                                <td>{{$product->product_id}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_category}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->currency_type}}</td>
                                <td>{{$product->items_available}}</td>
                                <td>{{$product->availability}}</td>
                                <td><a href="{{route('showSpecificProduct',['productId'=> $product->product_id])}}">
                                        <button type="button" class="btn btn-primary">
                                            View More
                                        </button>
                                    </a>

                                </td>

                                <td><a data-toggle="confirmation" href="{{route('removeProduct',['productId'=> $product->product_id])}}">
                                        <button class="btn btn-danger" type="button" >
                                            Remove
                                        </button>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection