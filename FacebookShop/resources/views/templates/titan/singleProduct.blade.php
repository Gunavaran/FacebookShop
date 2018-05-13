@extends('templates.titan.layout.layout')
@section('content')
    <?php
    use Illuminate\Support\Facades\Input;
    use App\Http\Models\Product;
    use Illuminate\Support\Facades\Session;
    use App\Http\Models\Feedback;
    use App\Http\Models\Customer;

    $product = Product::where('product_id', Input::get('productId'))->first();
    $shopId = Session::get('siteShopId');
    $image = $product->file_name;

    ?>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-sm-40"><a class="gallery"><img
                                src="{{URL::asset('storage/'.$shopId.'/thumbnails/'.$image)}}"
                                alt="Single Product Image"/></a>
                    {{--<ul class="product-gallery">--}}
                    {{--<li><a class="gallery" href="assets/images/shop/product-8.jpg"></a><img--}}
                    {{--src="assets/images/shop/product-8.jpg" alt="Single Product"/></li>--}}
                    {{--<li><a class="gallery" href="assets/images/shop/product-9.jpg"></a><img--}}
                    {{--src="assets/images/shop/product-9.jpg" alt="Single Product"/></li>--}}
                    {{--<li><a class="gallery" href="assets/images/shop/product-10.jpg"></a><img--}}
                    {{--src="assets/images/shop/product-10.jpg" alt="Single Product"/></li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="product-title font-alt">{{$product ->product_name }}</h1>
                        </div>
                    </div>
                    <?php

                    $newFeedback = new Feedback();
                    $count = $newFeedback->getFeedbackCount($product->product_id);
                    if($count != 0 ){


                    $feedbacks = $newFeedback->getFeedback($product->product_id);

                    $totalRating = 0;
                    foreach ($feedbacks as $feedback) {
                        $rating = $feedback->rating;
                        $totalRating += $rating;
                    }

                    $rating = round($totalRating / $count);

                    ?>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <?php
                            for($i = 0; $i < $rating; $i++){
                            ?>
                            <span style="font-size: large"><i class="fa fa-star star"></i></span>
                            <?php
                            }

                            for($i = 0; $i < 5 - $rating; $i++){
                            ?>
                            <span style="font-size: large"><i class="fa fa-star star-off"></i></span>
                            <?php
                            }

                            ?>

                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="price font-alt"><span
                                        class="amount">{{$product->currency_type.' '.$product->price}}
                                    <?php
                                    if($product->availability == 'yes'){
                                    ?>
                                    <span style="font-size: xx-large; color: #00A000">[Available]</span>
                                    <?php
                                    } else{
                                    ?>
                                    <span style="font-size: xx-large; color: red">[Not Available]</span>
                                    <?php
                                    }
                                    ?>
                                </span></div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-sm-12">
                            <div class="description">
                                <p style="font-size: large">{{$product -> description}}</p>
                            </div>
                        </div>
                    </div>
                    <form method="POST"
                          action="{{route('addToCart',['productId'=>$product->product_id,'shopId'=>$shopId,'customerId'=>Session::get('customerId')])}}">
                        {{csrf_field()}}
                        <div class="row mb-20">
                            <div class="col-sm-4 mb-sm-20">
                                <input class="form-control input-lg" type="number" name="quantity" value="1" max="40"
                                       min="1" required/>
                            </div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-lg btn-block btn-round btn-b">Add To Cart</button>
                            </div>
                        </div>
                    </form>

                    {{--****************When you are going to use tags*****************--}}
                    {{--<div class="row mb-20">--}}
                        {{--<div class="col-sm-12">--}}
                            {{--<div class="product_meta">Tags:<a href="#"> Man, </a><a href="#">Clothing, </a><a--}}
                                        {{--href="#">T-shirts</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-70">
                <div class="col-sm-12">
                    <div class="comment-form mt-30">
                        <h4 style="font-size: xx-large;" class="comment-form-title font-alt"><b>Add review</b></h4>
                        <form method="post"
                              action="{{route('rateProduct',['productId' => $product->product_id,'customerId' => Session::get('customerId') ])}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select class="form-control" name="rating" style="font-size: medium">
                                            <option selected="true" disabled="">Rating</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                                <textarea style="font-size: medium" class="form-control" id="feedback"
                                                          name="feedback" rows="4"
                                                          placeholder="Review"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button style="font-size: medium" class="btn btn-round btn-d" type="submit">Submit
                                        Review
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-70">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs font-alt" role="tablist">
                        <li><a href="#data-sheet" style="font-size: large" data-toggle="tab"><span
                                        class="icon-tools-2"></span><b>Product
                                    Details</b></a>
                        </li>
                        <li><a href="#reviews" style="font-size: large" data-toggle="tab"><span
                                        class="icon-tools-2"></span><b>Reviews</b> </a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="data-sheet">
                            <table style="font-size: medium" class="table table-striped ds-table table-responsive">
                                <tbody>
                                <tr>
                                    <th>Item</th>
                                    <th>Details</th>
                                </tr>
                                <tr>
                                    <td>Item Name</td>
                                    <td>{{$product->product_name}}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{$product->product_category}}</td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>{{$product->size}}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>{{$product->currency_type.' '.$product->price}}</td>
                                </tr>
                                <tr>
                                    <td>Availability</td>
                                    <td>{{$product->availability}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="reviews">
                            <div class="comments reviews">
                                <?php

                                $newFeedback = new Feedback();
                                $feedbacks = $newFeedback->getFeedback($product->product_id);
                                foreach($feedbacks as $feedback){
                                $customerId = $feedback->customer_id;
                                $firstName = Customer::where('customer_id', $customerId)->value('first_name');
                                $lastName = Customer::where('customer_id', $customerId)->value('last_name');
                                $customerName = $firstName . ' ' . $lastName;
                                $rating = $feedback->rating;

                                ?>
                                <div class="comment clearfix">
                                    <div class="comment-content clearfix">
                                        <div class="comment-author font-alt"><p style="font-size:medium;">
                                                <b>{{$customerName}}</b></p></div>
                                        <div class="comment-body">
                                            <p style="font-size:medium;"> {{$feedback->feedback}}</p>
                                        </div>
                                        <div class="comment-meta font-alt"><p
                                                    style="font-size:medium;">{{$feedback->created_at}} -
                                                <?php
                                                for($i = 0; $i < $rating;$i++){
                                                ?>
                                                <span><i class="fa fa-star star"></i></span>
                                                <?php
                                                }

                                                for($i = 0; $i < 5 - $rating;$i++){
                                                ?>
                                                <span><i class="fa fa-star star-off"></i></span>
                                                <?php
                                                }
                                                ?>


                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade success-popup" id="successMessage" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Thank You!</h4>
                </div>
                <div class="modal-body text-center">
                    <p class="lead">Your feedback is saved successfully</p>
                    {{--<a  class="rd_more btn btn-default">OK</a>--}}
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade success-popup" id="failureMessage" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sorry!!!</h4>
                </div>
                <div class="modal-body text-center">
                    <p class="lead">You can rate a product only once.</p>
                    {{--<a  class="rd_more btn btn-default">OK</a>--}}
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade success-popup" id="notAvailableMessage" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sorry!!!</h4>
                </div>
                <div class="modal-body text-center">
                    <p class="lead">The product is not available...</p>
                    {{--<a  class="rd_more btn btn-default">OK</a>--}}
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade success-popup" id="checkoutFailure" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sorry!!!</h4>
                </div>
                <div class="modal-body text-center">
                    <p class="lead">The product already exists in shopping cart</p>
                    {{--<a  class="rd_more btn btn-default">OK</a>--}}
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade success-popup" id="checkoutSuccess" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Success!!!</h4>
                </div>
                <div class="modal-body text-center">
                    <p class="lead">Products are added successfully.</p>
                    {{--<a  class="rd_more btn btn-default">OK</a>--}}
                </div>

            </div>
        </div>
    </div>

    <hr class="divider-w">
    <section class="module-medium">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt"><b>Related Products</b></h2>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel text-center" data-items="4" data-pagination="false" data-navigation="false">
                    <?php
                    $productCategory = $product->product_category;

                    $relatedProducts = Product::where('shop_id', $shopId)->where('product_category', $productCategory)->where('product_id', '!=', $product->product_id)->get();

                    foreach($relatedProducts as $relatedProduct){
                    $image = $relatedProduct->file_name;
                    $productName = $relatedProduct->product_name;
                    $price = $relatedProduct->currency_type . ' ' . $relatedProduct->price;
                    ?>
                    {{--<div class="col-sm-6 col-md-3 col-lg-3">--}}
                    {{--<div class="shop-item">--}}
                    {{--<div class="shop-item-image"><img src="{{URL::asset('storage/'.$shopId.'/thumbnails/'.$image)}}"--}}
                    {{--/>--}}
                    {{--<div class="shop-item-detail"><a href="{{route('singleProduct',['productId' => $relatedProduct->product_id])}}" class="btn btn-round btn-b"><span class="icon-basket">Click For More</span></a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<h4 class="shop-item-title font-alt"><a href="{{route('singleProduct',['productId' => $relatedProduct->product_id])}}">{{$productName}}</a></h4>{{$price}}--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="owl-item">
                        <div class="col-sm-12">
                            <div class="ex-product"><a style="font-size:medium;"
                                                       href="{{route('singleProduct',['productId' => $relatedProduct->product_id])}}"><img
                                            src="{{URL::asset('storage/'.$shopId.'/thumbnails/'.$image)}}"
                                    /></a>
                                <h4 class="shop-item-title font-alt"><a style="font-size:medium;"
                                                                        href="{{route('singleProduct',['productId' => $relatedProduct->product_id])}}">{{$productName}}</a>
                                </h4>
                                <a style="font-size:medium;"
                                   href="{{route('singleProduct',['productId' => $relatedProduct->product_id])}}">{{$price}}</a>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <hr class="divider-w">
    {{--<section class="module">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-6 col-sm-offset-3">--}}
    {{--<h2 class="module-title font-alt">Exclusive products</h2>--}}
    {{--<div class="module-subtitle font-serif">The languages only differ in their grammar, their--}}
    {{--pronunciation and their most common words.--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">--}}

    {{--<div class="owl-item">--}}
    {{--<div class="col-sm-12">--}}
    {{--<div class="ex-product"><a href="#"><img src="assets/images/shop/product-1.jpg"--}}
    {{--alt="Leather belt"/></a>--}}
    {{--<h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>£12.00--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

@endsection