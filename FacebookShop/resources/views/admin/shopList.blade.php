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
                            <th>Shop ID</th>
                            <th>Shop Name</th>
                            <th>Description</th>
                            <th>Contact No</th>
                            <th>email</th>
                            <th>Address</th>
                            <th>Zip Code</th>
                            <th>Date</th>
                            <th>Vendor ID</th>


                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        use App\Http\Models\Vendor;
                        use App\Http\Models\Shop;
                        $users = Vendor::where('admin', '0')->get();
                        ?>
                        @foreach( $users as $user)
                            @php
                               $shop = Shop::where('username',$user->username)->first();
                           @endphp
                            <tr>
                                <td>{{$shop->shop_id}}</td>
                                <td>{{$shop->shop_name}}</td>
                                <td>{{$shop->description}}</td>
                                <td>{{$shop->contact_no}}</td>
                                <td>{{$shop->email}}</td>
                                <td>{{$shop->resident_no . ' '. $shop->street.' '.$shop->city.' '.$shop->country}}</td>
                                <td>{{$shop->zip_code}}</td>
                                <td>{{$shop->created_at}}</td>
                                <td><a href="{{route('showSpecificVendor',[
                                'username'=>$user->username
                                ])}}">
                                        <button type="button" class="btn btn-link">
                                            {{$user->vendor_id}}
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