@extends('templates.titan.layout.layout')
@section('content')
    <?php
    use App\Http\Models\Checkout;



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

                        <tr>
                            <td class="hidden-xs"><a href="#"><img src="assets/images/shop/product-14.jpg"/></a></td>
                            <td>
                                <h5 style="font-size: large" class="product-title font-alt">Accessories Pack</h5>
                            </td>
                            <td class="hidden-xs">
                                <h5 style="font-size: large" class="product-title font-alt">£20.00</h5>
                            </td>
                            <td>
                                <h5 style="font-size: large" class="product-title font-alt">£20.00</h5>
                            </td>
                            <td>
                                <h5 style="font-size: large" class="product-title font-alt">£20.00</h5>
                            </td>
                            <td class="pr-remove">
                                <button class="btn btn-b btn-round" href="#" style="font-size: medium">Remove</button>
                            </td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" type="text" id="" name="" placeholder="Coupon code"/>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <button class="btn btn-round btn-g" type="submit">Apply</button>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-3">
                    <div class="form-group">
                        <button class="btn btn-block btn-round btn-d pull-right" type="submit">Update Cart</button>
                    </div>
                </div>
            </div>
            <hr class="divider-w">
            <div class="row mt-70">
                <div class="col-sm-5 col-sm-offset-7">
                    <div class="shop-Cart-totalbox">
                        <h4 class="font-alt">Cart Totals</h4>
                        <table class="table table-striped table-border checkout-table">
                            <tbody>
                            <tr>
                                <th>Cart Subtotal :</th>
                                <td>£40.00</td>
                            </tr>
                            <tr>
                                <th>Shipping Total :</th>
                                <td>£2.00</td>
                            </tr>
                            <tr class="shop-Cart-totalprice">
                                <th>Total :</th>
                                <td>£42.00</td>
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