{{--@extends(DB::table('vendor') -> where('username', Session::get('username')) -> value('admin') ? 'layout.adminDashboard' : 'layout.dashboard')--}}
@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>My Account Details <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('updateUserDetails')}}">
                        {{csrf_field()}}
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger"> {{$error}}</p>
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
                            <label for="user_id" class="control-label col-md-3 col-sm-3 col-xs-12"> User ID </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input readonly id="user_id" class="form-control col-md-7 col-xs-12" type="text" name="user_id" value={{DB::table('vendor')->where('username',$username)->value('vendor_id')}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12"> First Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="first_name" class="form-control col-md-7 col-xs-12" type="text" name="first_name" value={{DB::table('vendor')->where('username',$username)->value('first_name')}}>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Last Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="last_name" class="form-control col-md-7 col-xs-12" type="text" name="last_name" value={{DB::table('vendor')->where('username',$username)->value('last_name')}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12"> Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" class="form-control col-md-7 col-xs-12" type="text" name="email" value={{DB::table('vendor')->where('username',$username)->value('email')}} readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-no" class="control-label col-md-3 col-sm-3 col-xs-12"> Contact No</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contact_no" class="form-control col-md-7 col-xs-12" type="text" name="contact_no" value={{DB::table('vendor')->where('username',$username)->value('contact_no')}}>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12"> Country</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="country" class="form-control col-md-7 col-xs-12" type="text" name="country" value="{{DB::table('vendor')->where('username',$username)->value('country')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12"> Username</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="username" class="form-control col-md-7 col-xs-12" type="text" name="username" value="{{DB::table('vendor')->where('username',$username)->value('username')}}" readonly>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        @if(Session::get('username')==$username)
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection