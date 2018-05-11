@extends('layout.adminDashboard')

@section('content')

    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><b>Choose Template</b>
                            <small> that suits your shop</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="carousel-item-prev">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" height=350 width=800
                                             src="{{URL::asset('images/titan.jpg')}}" alt="image"/>
                                        <div class="mask">
                                            <div class="tools tools-bottom">
                                                <a href="{{route('showTemplateDemo',['templateName'=>'titan'])}}"
                                                   target="_blank">
                                                    <button type="button" class="btn btn-dark">Demo</button>
                                                </a>
                                                <a href="{{route('setTemplate',['templateName'=>'titan'])}}">
                                                    <button type="button" class="btn btn-success">Select</button>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>Multipurpose Template suitable for Shopping Websites</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="carousel-item-prev">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;"
                                             height=350 width=800 src="{{URL::asset('images/photography.jpg')}}" alt="image"/>
                                        <div class="mask">
                                            <div class="tools tools-bottom">
                                                <a href="{{route('showTemplateDemo',['templateName'=>'photography'])}}"
                                                   target="_blank">
                                                    <button type="button" class="btn btn-dark">Demo</button>
                                                </a>
                                                <a href="{{route('setTemplate',['templateName'=>'photography'])}}">
                                                    <button type="button" class="btn btn-success">Select</button>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>Photography/Multipurpose Template for Service Websites</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection