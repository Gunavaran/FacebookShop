@extends('templates.titan.layout.layout')
@section('content')
    <?php
    use App\Http\Models\Checkout;
    use App\Http\Models\Product;
    use Illuminate\Support\Facades\Session;

    $customerId = Session::get('customerId');
    $newCheckout = new Checkout();

    //to obtain the checkouts related to that customer
    $checkouts = $newCheckout->getCheckoutDetails($customerId);

    $product = new Product();
    $shopId = Session::get('siteShopId');

    $cartTotal = 0;
    $currencyType = '';

    ?>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt" style="font-size: xx-large"><b>Checkout</b></h1>
                </div>
            </div>
            <hr class="divider-w pt-20">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-border checkout-table">
                        <tbody>
                        <tr style="font-size: large">
                            <th class="hidden-xs">Item</th>
                            <th>Item Name</th>
                            <th class="hidden-xs">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        <?php

                        foreach($checkouts as $checkout){
                            $productId = $checkout->product_id;
                            $image = $product->getProductDetails($productId,'file_name');

                            $cartTotal += $checkout->quantity * $product->getProductDetails($productId,'price');
                            $currencyType = $product->getProductDetails($productId,'currency_type');

                        ?>
                        <tr>
                            <td class="hidden-xs"><img height=100 width=100 src="{{URL::asset('storage/'.$shopId.'/thumbnails/'.$image)}}"/></td>
                            <td>
                                <h5 style="font-size: large" class="product-title font-alt">{{$product->getProductDetails($productId,'product_name')}}</h5>
                            </td>
                            <td class="hidden-xs">
                                <h5 style="font-size: large" class="product-title font-alt">{{$product->getProductDetails($productId,'currency_type').' '.$product->getProductDetails($productId,'price')}}</h5>
                            </td>
                            <td>
                                <h5 style="font-size: large" class="product-title font-alt">{{$checkout->quantity}}</h5>
                            </td>
                            <td>
                                <h5 style="font-size: large" class="product-title font-alt">{{$product->getProductDetails($productId,'currency_type').' '.$checkout->quantity * $product->getProductDetails($productId,'price')}}</h5>
                            </td>
                            <td class="pr-remove">
                                <a href="{{route('removeFromCheckout',['customerId'=>$customerId,'productId'=>$productId])}}">
                                    <button class="btn btn-primary btn-round btn-xs"  style="font-size: medium">Remove</button>
                                </a>
                            </td>

                        </tr>
                        <?php
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>

            {{--*********to add coupan code***********************--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-3">--}}
                    {{--<div class="form-group">--}}
                        {{--<input class="form-control" type="text" id="" name="" placeholder="Coupon code"/>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3">--}}
                    {{--<div class="form-group">--}}
                        {{--<button class="btn btn-round btn-g" type="submit">Apply</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-sm-offset-3">--}}
                    {{--<div class="form-group">--}}
                        {{--<button class="btn btn-block btn-round btn-d pull-right" type="submit">Update Cart</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <hr class="divider-w">
            <div class="row mt-70">
                <div class="col-sm-5 col-sm-offset-7">
                    <div class="shop-Cart-totalbox">
                        <h4 style="font-size: x-large" class="font-alt"><b>Cart Totals</b></h4>
                        <table class="table table-striped table-border checkout-table">
                            <tbody style="font-size: large">
                            <tr>
                                <th>Cart Subtotal :</th>
                                <td>{{$currencyType.' '.$cartTotal}}</td>
                            </tr>
                            {{--<tr>--}}
                                {{--<th>Shipping Total :</th>--}}
                                {{--<td>£2.00</td>--}}
                            {{--</tr>--}}
                            <tr class="shop-Cart-totalprice">
                                <th>Total :</th>
                                <td>{{$currencyType.' '.$cartTotal}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-lg btn-block btn-round btn-d" type="submit">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection