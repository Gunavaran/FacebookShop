@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><b style="color: red">Add New Category</b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                          action="{{route('storeCategory')}}" method="POST">
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
                        @if(Session::has('exist'))

                            <p class="alert alert-danger"> {{Session::get('exist')}}</p>

                        @endif

                        <div class="form-group">
                            <label for="category_name"
                                   class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="category_name" class="form-control col-md-7 col-xs-12" type="text"
                                       name="category_name" required>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="color: red"><b>Available Categories</b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if(Session::has('removeSuccess'))
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span>
                            </button>
                            {{Session::get("removeSuccess")}}
                        </div>
                    @endif

                    <?php
                    use App\Http\Models\Category;
                    use App\Http\Models\Shop;
                    use Illuminate\Support\Facades\Session;

                    $shop = Shop::where('username', Session::get('username'))->first();
                    $category = new Category();
                    $categories = $category->getCategories($shop->shop_id);

                    foreach($categories as $category){
                    ?>

                    <form class="form-horizontal form-label-left" method="POST" action="{{route('removeCategory')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="category_name" class="form-control"
                                           aria-label="Text input with dropdown button"
                                           value="{{$category->category_name}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" data-toggle="confirmation">Remove
                                            Category
                                        </button>
                                    </div>
                                    <!-- /btn-group -->
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>


@endsection