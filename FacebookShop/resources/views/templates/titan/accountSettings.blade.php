@extends('templates.titan.layout.layout')
@section('content')
    <?php
            use App\Http\Models\Customer;
            use Illuminate\Support\Facades\Session;
            $customer = new Customer();
            $customerId = Session::get('customerId');

    ?>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h4 style="font-size: xx-large;" class="font-alt mb-0"><b>Account Details</b></h4>
                    <hr class="divider-w mt-10 mb-20">
                    <form class="form" role="form" action="{{route('updateAccountDetails')}}">
                        {{csrf_field()}}
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger"> {{$error}}</p>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <input style="font-size: large;text-transform: none" name="first_name" class="form-control input-lg"  value="{{$customer->getCustomerDetails($customerId,'first_name')}}"/>
                        </div>
                        <div class="form-group">
                            <input style="font-size: large;text-transform: none" name="last_name" class="form-control input-lg"  value="{{$customer->getCustomerDetails($customerId,'last_name')}}"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control input-lg"  name="email" style="font-size: large;text-transform: none" value="{{$customer->getCustomerDetails($customerId,'email')}}"/>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="customer_id" class="form-control input-lg" value="{{$customerId}}"/>
                        </div>
                        <button style="float: right;font-size: large" class="btn btn-b btn-round" type="submit">Update</button>;

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection