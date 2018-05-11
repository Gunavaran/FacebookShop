@extends('layout.adminDashboard')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> Photo Gallery
                </h3>
            </div>

            <div class="title_right">
                <form action="{{route('search')}}" method="POST">
                    {{csrf_field()}}
                    <div class="col-md-9 col-sm-9 col-xs-12 form-group pull-right top_search">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                            <span class="input-group-btn">
                                              <button type="submit" class="btn btn-primary"><span style="color: white">Search Category</span></button>
                                          </span>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control" name="searchCategory">
                                            <?php
                                            if (Session::has('searchCategory')){
                                            ?>
                                            <option>{{Session::get('searchCategory')}}</option>
                                            <?php
                                            }
                                            ?>
                                            <option>All</option>
                                            <?php
                                            use App\Http\Models\Category;
                                            use App\Http\Models\Photo;
                                            use Illuminate\Support\Facades\Session;
                                            $newCategory = new Category();
                                            $shopId = Session::get('shopId');
                                            $categories = $newCategory->getCategories($shopId);
                                            foreach ($categories as $category){
                                            ?>
                                            <option>{{$category->category_name}}</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">


                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <?php

                            if (!Session::has('searchCategory') or Session::get('searchCategory') == 'All') {

                                $newPhoto = new Photo();
                                $photos = $newPhoto->getPhotos($shopId);

                            foreach ($photos as $photo) {
                            $photoId = $photo->photo_id;
                            ?>
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;"
                                             src="{{URL::asset('storage/'.$shopId.'/thumbnails/'.$photo->file_name)}}" alt="image"/>
                                        <div class="mask">
                                            <div class="tools tools-bottom">
                                                <a style="float: left" data-toggle="confirmation" href="{{route('removePhoto',['photoId' =>$photoId ])}}"><i
                                                            class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p><strong>Category: {{$photo->category}}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <?php
                            }
                            } else{
                                $newPhoto = new Photo();
                                $photos = $newPhoto->getCategorizedPhotos($shopId,Session::get('searchCategory'));


                            foreach ($photos as $photo) {
                                $photoId = $photo->photo_id;
                            ?>
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;"
                                             src="{{URL::asset('storage/'.$shopId.'/thumbnails/'.$photo->file_name)}}" alt="image"/>
                                        <div class="mask">
                                            <div class="tools tools-bottom">
                                                <a style="float: left" data-toggle="confirmation" href="{{route('removePhoto',['photoId' =>$photoId ])}}"><i
                                                            class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p><strong>Category: {{$photo->category}}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <?php
                            }
                            Session::forget('searchCategory');
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection