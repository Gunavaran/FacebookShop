{{--@extends(DB::table('vendor') -> where('username', Session::get('username')) -> value('admin') ? 'layout.adminDashboard' : 'layout.dashboard')--}}
@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add New Product / Update Details </h2>

                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                          enctype="multipart/form-data" method="post"
                          action="{{route('addNewProduct')}}">
                        {{csrf_field()}}
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger"> {{$error}}</p>
                            @endforeach
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                {{Session::get("success")}}
                            </div>
                        @endif
                        <?php
                        use App\Http\Models\Category;
                        use App\Http\Models\Shop;
                        use App\Http\Models\Product;
                        use Illuminate\Support\Facades\Input;
                        $product = new Product();
                        if(Input::has('productId')){
                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Product Id</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="product_id" required
                                       value=<?php
                                    if (Input::has('productId')) {
                                        $product->getProductDetails($productId, 'product_id');
                                    }
                                    ?>>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Product Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="product_name" required
                                       value="<?php
                                    if (Input::has('productId')) {
                                        $product->getProductDetails($productId, 'product_name');
                                    }
                                    ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Category</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="product_category">
                                    <?php
                                    if (Input::has('productId')){
                                    ?>
                                    <option value="{{$product->getProductDetails($productId, 'product_category')}}">{{$product->getProductDetails($productId, 'product_category')}}</option>
                                    <?php
                                    }
                                    $shop = new Shop();
                                    $shopId = $shop->getShopId();
                                    $categories = Category::where('shop_id', $shopId)->get();
                                    foreach ( $categories as $category){
                                    $categoryName = $category->category_name;
                                    ?>
                                    <option value="{{$categoryName}}">{{$categoryName}}</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="resizable_textarea form-control" name="description"
                                          placeholder="brief description about the product">
                                    <?php
                                    if (Input::has('productId')) {
                                        $product->getProductDetails($productId, 'description');
                                    }
                                    ?>
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Size *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="size"
                                       placeholder="leave it blank if not relevant" value=<?php
                                    if (Input::has('productId')) {
                                        $product->getProductDetails($productId, 'size');
                                    }
                                    ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Price</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="price" required
                                       value=<?php
                                    if (Input::has('productId')) {
                                        $product->getProductDetails($productId, 'price');
                                    }
                                    ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Currency Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="currency_type"
                                       required value=<?php
                                    if (Input::has('productId')) {
                                        $product->getProductDetails($productId, 'currency_type');
                                    }
                                    ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> No. of Items Available *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="items_available"
                                       placeholder="leave it blank if not relevant" value=<?php
                                    if (Input::has('productId')) {
                                        $product->getProductDetails($productId, 'items_available');
                                    }
                                    ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Availability</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control" tabindex="-1" name="availability">
                                    <?php
                                    if(Input::has('productId')){
                                    ?>
                                    <option value="{{$product->getProductDetails($productId, 'availability')}}">{{$product->getProductDetails($productId, 'availability')}}</option>
                                    <?php
                                    }
                                    ?>
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>

                                </select>
                            </div>
                        </div>
                        <?php
                        if(!Input::has('productId')){
                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Image</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="file" name="image" required>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="control-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Key Words *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tags_1" type="text" class="tags form-control" name="keywords[]" value=<?php
                                    if (Input::has('productId')) {
                                        $product->getProductDetails($productId, 'keywords');
                                    }
                                    ?>>
                                <div id="suggestions-container"
                                     style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel
                                </button>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <?php
                                if (Input::has('productId')) {
                                    ?>
                                <a data-toggle="confirmation" href="{{route('removeProduct',['productId'=> Input::get('productId')])}}">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection