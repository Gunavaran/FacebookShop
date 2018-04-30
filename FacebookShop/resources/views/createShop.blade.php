{{--@extends(DB::table('vendor') -> where('username', Session::get('username')) -> value('admin') ? 'layout.adminDashboard' : 'layout.dashboard')--}}
@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Your Shop <small>you are one step ahead...</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('storeShopDetails')}}" method="POST">
                        {{csrf_field()}}

                        {{--displaying validation errors--}}
                        @if(count($errors)>0)
                            @foreach($errors -> all() as $error)
                                <div class = "alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <label for="shop_name" class="control-label col-md-3 col-sm-3 col-xs-12"> Shop Name * </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="shop_name" class="form-control col-md-7 col-xs-12" type="text" name="shop_name" value="{{old('shop_name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="resizable_textarea form-control" placeholder="Brief introduction about your shop" name="description" value="{{old('description')}}"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact_no" class="control-label col-md-3 col-sm-3 col-xs-12"> Contact No. * </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contact_no" class="form-control col-md-7 col-xs-12" type="text" name="contact_no" value="{{old('contact_no')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12"> E-mail * </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="resid-no" class="control-label col-md-3 col-sm-3 col-xs-12"> Resident No. </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="resid-no" class="form-control col-md-7 col-xs-12" type="text" name="resid-no" value="{{old('resid-no')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="street" class="control-label col-md-3 col-sm-3 col-xs-12"> Street </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="street" class="form-control col-md-7 col-xs-12" type="text" name="street" value="{{old('street')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="control-label col-md-3 col-sm-3 col-xs-12"> City </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="city" class="form-control col-md-7 col-xs-12" type="text" name="city" value="{{old('city')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12"> Country </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="country" class="form-control col-md-7 col-xs-12" type="text" name="country" value="{{old('country')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zip-code" class="control-label col-md-3 col-sm-3 col-xs-12"> Zip Code </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="zip-code" class="form-control col-md-7 col-xs-12" type="text" name="zip-code" value="{{old('zip-code')}}">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection