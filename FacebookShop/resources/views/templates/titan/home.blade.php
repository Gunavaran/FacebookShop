@extends('templates.titan.layout.layout')
@section('content')
    <section class="home-section home-full-height photography-page" id="home">
        <div class="hero-slider">
            <ul class="slides">
                <?php
                use App\Http\Models\Template;
                use Illuminate\Support\Facades\Session;
                $shopId = Session::get('siteShopId');
                $template = new Template();
                $sliderImages = $template->getSliderImages($shopId);
                $count = 0;
                foreach($sliderImages as $sliderImage){
                $imageName = $sliderImage->content;
                if ($count % 3 == 0 ){

                ?>

                <li class="bg-dark-30 bg-dark"
                    style="background-image:url({{URL::asset('storage/'.$shopId.'/template/images/'.$imageName)}})">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-30 titan-title-size-1"></div>
                            <div class="font-alt mb-40 titan-title-size-3">
                                <?php
                                    $text = $template->getSliderText($shopId,$count);
                                echo $text->content;
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
                } elseif($count % 3 == 1){
                ?>
                <li class="bg-dark-30 bg-dark"
                    style="background-image:url({{URL::asset('storage/'.$shopId.'/template/images/'.$imageName)}})">
                    <div class="titan-caption">
                        <div class="caption-content">
                            {{--<div class="font-alt mb-30 titan-title-size-1">Hello &amp; welcome</div>--}}
                            <div class="font-alt mb-40 titan-title-size-4">
                                <?php
                                $text = $template->getSliderText($shopId,$count);
                                echo $text->content;
                                ?>
                            </div>

                        </div>
                    </div>
                </li>
                <?php

                } else{
                ?>
                <li class="bg-dark-30 bg-dark"
                    style="background-image:url({{URL::asset('storage/'.$shopId.'/template/images/'.$imageName)}})">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-40 titan-title-size-4">
                                <?php
                                $text = $template->getSliderText($shopId,$count);
                                echo $text->content;
                                ?>
                            </div>

                        </div>
                    </div>
                </li>
                <?php

                }
                $count++;
                }
                ?>
            </ul>
        </div>
    </section>
    <section class="module-small">
        <div class="container">
            <form class="row" action="{{route('searchProductCategory')}}">
                <div class="col-sm-4 mb-sm-20">
                    <select class="form-control" name="sorting">
                        <option selected="selected" value="default">Default Sorting</option>
                        <option value="high_price">High Price</option>
                        <option value="low_price">Low Price</option>
                        <option value="latest">Latest</option>
                        <option value="popular">Popular</option>

                    </select>
                </div>
                {{--<div class="col-sm-2 mb-sm-20">--}}
                {{--<select class="form-control">--}}
                {{--<option selected="selected">Woman</option>--}}
                {{--<option>Man</option>--}}
                {{--</select>--}}
                {{--</div>--}}

                <div class="col-sm-3 mb-sm-20">
                    <select class="form-control" name="productCategory">
                        <option selected="selected" value="all">All</option>
                        <?php
                        use App\Http\Models\Category;
                        use App\Http\Models\Product;
                        $category = new Category();
                        $categories = $category->getCategories($shopId);
                        foreach($categories as $category){
                        ?>
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block btn-round btn-g" type="submit">Apply</button>
                </div>
            </form>
        </div>
    </section>
    <hr class="divider-w">
    <section class="module-small">
        <div class="container">
            <div class="row multi-columns-row">

                <?php
                $newProduct = new Product();
                if (!Session::has('productCategory')) {
                    $products = $newProduct->getProducts($shopId);
                } else if (Session::get('productCategory') == 'all') {
                    $sort = Session::get('sorting');
                    if ($sort == 'default') {
                        $products = $newProduct->getProducts($shopId);
                    } else if ($sort == 'high_price') {
                        $products=$newProduct->getHighPricedProducts($shopId);
                    } else if ($sort == 'low_price') {
                        $products = $newProduct->getLowPricedProducts($shopId);
                    } else if ($sort == 'latest') {
                        $products = $newProduct->getLatestProducts($shopId);
                    }
                    Session::forget('productCategory');
                    Session::forget('sorting');
                } else {
                    $sort = Session::get('sorting');
                    if ($sort == 'default') {
                        $products = $newProduct->getCategorizedProducts($shopId,Session::get('productCategory'));
                    } else if ($sort == 'high_price') {
                        $products = $newProduct->getCategorizedHighPricedProducts($shopId,Session::get('productCategory'));
                    } else if ($sort == 'low_price') {
                        $products = $newProduct->getCategorizedLowPricedProducts($shopId,Session::get('productCategory'));
                    } else if ($sort == 'latest') {
                        $products = $newProduct->getCategorizedLatestProducts($shopId,Session::get('productCategory'));
                    }
                    Session::forget('productCategory');
                    Session::forget('sorting');
                }
                foreach($products as $product){
                $image = $product->file_name;
                ?>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="shop-item">
                        <div class="shop-item-image"><img src="{{URL::asset('storage/'.$shopId.'/thumbnails/'.$image)}}"
                                                          alt="Accessories Pack"/>
                            <div class="shop-item-detail"><a href="{{route('singleProduct',['productId' => $product->product_id])}}" class="btn btn-round btn-b"><span class="icon-basket">Click For More</span></a>
                            </div>
                        </div>
                        <h4 class="shop-item-title font-alt"><a href="{{route('singleProduct',['productId' => $product->product_id])}}">{{$product->product_name}}</a>
                        </h4>{{$product->currency_type.' '.$product->price}}
                    </div>
                </div>

                <?php
                }


                ?>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="pagination font-alt"><a href="#"><i class="fa fa-angle-left"></i></a><a class="active"
                                                                                                        href="#">1</a><a
                                href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#"><i
                                    class="fa fa-angle-right"></i></a></div>
                </div>
            </div>
        </div>
    </section>
@endsection