@extends('templates.titan.layout.layout')
@section('content')
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 mb-sm-40">
                    <h4 class="font-alt" style="text-align: center; font-size: x-large"><b>Login</b></h4>
                    <hr class="divider-w mb-10">
                    <form class="form" action="{{route('authCustomer')}}">
                        {{csrf_field()}}
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger"> {{$error}}</p>
                            @endforeach
                        @endif

                        @if(Session::has('error'))
                            <p class="alert alert-danger"> {{Session::get('error')}}</p>
                        @endif

                        <div class="form-group">
                            <input class="form-control" style="text-transform: none;font-size: medium" id="email" type="text" name="email" required
                                   placeholder="Email" value="{{old('email')}}"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" style="text-transform: none;font-size: medium" id="password" type="password" name="password" required
                                   placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-round btn-b" style="font-size: medium" type="submit">Login</button>
                            <button class="btn btn-round btn-b" style="font-size: medium" type="button"><a href="{{route('customerRegisterPage')}}" style="color: white;">Sign Up</a></button>

                        </div>
                    </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection