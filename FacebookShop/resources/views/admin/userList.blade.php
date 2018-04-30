@extends('layout.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title" style="color: #1da1f2">
                    <h2><b>Users List</b>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Vendor ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Country</th>
                            <th>Username</th>
                            <th>Date</th>
                            <th>Shop ID</th>


                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        use App\Http\Models\Vendor;
                        use App\Http\Models\Shop;

                        $users = Vendor::where('admin', '0')->get();
                        ?>
                        @foreach( $users as $user)

                            <tr>
                                <td>{{$user->vendor_id}}</td>
                                <td>{{$user->first_name.' '.$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->contact_no}}</td>
                                <td>{{$user->country}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><a href="{{route('showSpecificShop',[
                                'username'=>$user->username
                                ])}}">
                                        <button type="button" class="btn btn-link">
                                            <?php
                                                $shop = Shop::where('username',$user->username)->first();
                                                echo $shop->shop_id;
                                            ?>
                                        </button>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection