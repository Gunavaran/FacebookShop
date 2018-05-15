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
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{route('updatePassword')}}"  method="POST">
                        {{csrf_field()}}
                        {{--to display any errors during validation--}}
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
                        {{--displays the success message if the password change process is a success--}}
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
                                <input id="old_password" class="form-control col-md-7 col-xs-12" type="password" name="old_password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="control-label col-md-3 col-sm-3 col-xs-12"> New Password *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="new_password" class="form-control col-md-7 col-xs-12" type="password" name="new_password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password" class="control-label col-md-3 col-sm-3 col-xs-12"> Confirm Password *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="new_password_confirmation" class="form-control col-md-7 col-xs-12" type="password" name="new_password_confirmation" required >
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