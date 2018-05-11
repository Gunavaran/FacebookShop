@extends('layout.adminDashboard')

@section('content')
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><b>Add Slider Images</b>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <?php
                            use Illuminate\Support\Facades\Input;
                            use App\Http\Models\Shop;
                            use App\Http\Models\Template;
                            use Illuminate\Support\Facades\Session;

                            $shop = new Shop();
                            $shopId = $shop->getShopId();
                            if (Shop::where('shop_id', $shopId)->value('template') == 'titan' or Shop::where('shop_id', $shopId)->value('template') == 'photography' ) {
                            ?>
                            <html>
                            <head>

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
                                <script type="text/javascript" src="http://www.expertphp.in/js/jquery.form.js"></script>

                                <script>
                                    function preview_images() {
                                        var total_file = document.getElementById("images").files.length;
                                        for (var i = 0; i < total_file; i++) {
                                            $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
                                        }
                                    }
                                </script>
                            </head>
                            <body>
                            <div class="row">

                                <form action="{{route('setSliderImage')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="col-md-6">
                                        <input type="file" class="form-control" id="images" name="images[]"
                                               onchange="preview_images();" multiple/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-primary" name='submit_image'
                                               value="Upload Images"/>
                                    </div>

                                </form>
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{Session::get("error")}}
                                    </div>
                                @endif
                                @if(Session::has('failure'))
                                    <div class="alert alert-danger">
                                        {{Session::get("failure")}}
                                        {{Session::forget('failure')}}
                                    </div>'
                                @endif
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{Session::get("success")}}
                                    </div>
                                @endif

                            </div>
                            <div class="row" id="image_preview"></div>
                            </body>
                            </html>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><b>Slider Images</b>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            @if(Session::has('removeSuccess'))
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    {{Session::get("removeSuccess")}}
                                </div>
                            @endif
                            <?php
                            $shopId = Session::get('shopId');
                            $images = Template::where('shop_id',$shopId )->where('category','slider_image')->get();
                            foreach($images as $image){
                                $fileName = $image->content;
                            ?>

                            <div class="col-md-6">
                                <div class="carousel-item-prev">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;"
                                             src="{{URL::asset('storage/'.$shopId.'/template/thumbnails/'.$fileName)}}" alt="image"/>
                                        <div class="mask">
                                            <a data-toggle="confirmation" href="{{route('removeSliderImage',['imageName'=>$fileName])}}">
                                                <button type="button"  class="btn btn-danger">Remove</button>

                                            </a>
                                            <div class="tools tools-bottom">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        {{--if you want to add caption, add here--}}
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

@endsection