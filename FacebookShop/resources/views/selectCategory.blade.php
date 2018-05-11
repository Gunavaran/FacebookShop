@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="color: red"><b>Select Category</b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            {{Session::get("success")}}
                            {{Session::forget('success')}}

                        </div>
                    @endif

                    <?php
                    use App\Http\Models\Category;
                    use Illuminate\Support\Facades\Session;

                    $newCategory = new Category();
                    $categories = $newCategory->getCategories(Session::get('shopId'));
                    foreach($categories as $category){
                    ?>
                    <form class="form-horizontal form-label-left" method="POST" action="{{route('uploadPhotosForm')}}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="category_name" class="form-control"
                                           aria-label="Text input with dropdown button"
                                           value="{{$category->category_name}}">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Select</button>
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