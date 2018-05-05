@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><b>Add Slider Text</b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                          action="{{route('setSliderText')}}" method="POST">
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

                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-1 col-xs-12">Text</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" name="sliderText"
                                          placeholder="type text here..." required></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-1">
                                <button type="submit" class="btn btn-primary">Add Text</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><b>Slider Texts</b></h2>
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
                    use App\Http\Models\Template;
                    use Illuminate\Support\Facades\Session;
                    $shopId = Session::get('shopId');
                    $texts = Template::where('shop_id', $shopId)->where('category', 'text')->get();

                    foreach($texts as $text){
                    ?>
                    <form class="form-horizontal form-label-left" method="POST" action="{{route('removeSliderText')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="sliderText" class="form-control"
                                           aria-label="Text input with dropdown button"
                                           value="{{$text->content}}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" data-toggle="confirmation">Remove
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