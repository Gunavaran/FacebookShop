{{--@extends(DB::table('vendor') -> where('username', Session::get('username')) -> value('admin') ? 'layout.adminDashboard' : 'layout.dashboard')--}}
@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Change Password <small></small></h2>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('updatePassword')}}"  method="POST">
                        {{csrf_field()}}
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger"> {{$error}}</p>
                            @endforeach
                        @endif

                        @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get("error")}}
                        </div>'
                        @endif

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                {{Session::get("success")}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="old_password" class="control-label col-md-3 col-sm-3 col-xs-12"> Old Password *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="old_password" class="form-control col-md-7 col-xs-12" type="text" name="old_password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="control-label col-md-3 col-sm-3 col-xs-12"> New Password *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="new_password" class="form-control col-md-7 col-xs-12" type="text" name="new_password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password" class="control-label col-md-3 col-sm-3 col-xs-12"> Confirm Password *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="new_password_confirmation" class="form-control col-md-7 col-xs-12" type="text" name="new_password_confirmation" >
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