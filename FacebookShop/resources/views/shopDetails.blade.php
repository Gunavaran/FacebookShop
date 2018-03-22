@extends(DB::table('vendor') -> where('username', Session::get('username')) -> value('admin') ? 'layout.adminDashboard' : 'layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Shop Details <small>update on your wish...</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('updateShopDetails')}}" method="POST">
                        {{csrf_field()}}

                        {{--displaying validation errors--}}
                        @if(count($errors)>0)
                            @foreach($errors -> all() as $error)
                                <div class = "alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                {{Session::get("success")}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="shop_name" class="control-label col-md-3 col-sm-3 col-xs-12"> Shop Name * </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="shop_name" class="form-control col-md-7 col-xs-12" type="text" name="shop_name" value="{{DB::table('shop') -> where('username',Session::get('username')) -> value('shop_name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="resizable_textarea form-control" name="description"> {{DB::table('shop') -> where('username',Session::get('username')) -> value('description')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact_no" class="control-label col-md-3 col-sm-3 col-xs-12"> Contact No. * </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contact_no" class="form-control col-md-7 col-xs-12" type="text" name="contact_no" value="{{DB::table('shop') -> where('username',Session::get('username')) -> value('contact_no')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12"> E-mail * </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email" value="{{DB::table('shop') -> where('username',Session::get('username')) -> value('email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="resid-no" class="control-label col-md-3 col-sm-3 col-xs-12"> Resident No. </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="resid-no" class="form-control col-md-7 col-xs-12" type="text" name="resid-no" value="{{DB::table('shop') -> where('username',Session::get('username')) -> value('resident_no')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="street" class="control-label col-md-3 col-sm-3 col-xs-12"> Street </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="street" class="form-control col-md-7 col-xs-12" type="text" name="street" value="{{DB::table('shop') -> where('username',Session::get('username')) -> value('street')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="control-label col-md-3 col-sm-3 col-xs-12"> City </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="city" class="form-control col-md-7 col-xs-12" type="text" name="city" value="{{DB::table('shop') -> where('username',Session::get('username')) -> value('city')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12"> Country </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="country" class="form-control col-md-7 col-xs-12" type="text" name="country" value="{{DB::table('shop') -> where('username',Session::get('username')) -> value('country')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zip-code" class="control-label col-md-3 col-sm-3 col-xs-12"> Zip Code </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="zip-code" class="form-control col-md-7 col-xs-12" type="text" name="zip-code" value="{{DB::table('shop') -> where('username',Session::get('username')) -> value('zip_code')}}">
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