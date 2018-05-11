@extends('templates.photography.layout.layout')

@section('content')
    <section class="home-section home-full-height photography-page" id="home">
        <div class="hero-slider">
            <ul class="slides">
                <?php
                use App\Http\Models\Template;
                use Illuminate\Support\Facades\Session;
                $shopId = Session::get('siteShopId');
                $template = new Template();
                $sliderImages = $template->getSliderImages($shopId);
                $count = 0;
                foreach($sliderImages as $sliderImage){
                $imageName = $sliderImage->content;
                if ($count % 3 == 0 ){

                ?>
                <li class="bg-dark-30 bg-dark"
                    style="background-image:url({{URL::asset('storage/'.$shopId.'/template/images/'.$imageName)}})">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-30 titan-title-size-1"></div>
                            <div class="font-alt mb-40 titan-title-size-3">
                                <?php
                                $text = $template->getSliderText($shopId, $count);
                                echo $text->content;
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
                } elseif($count % 3 == 1){
                ?>
                <li class="bg-dark-30 bg-dark"
                    style="background-image:url({{URL::asset('storage/'.$shopId.'/template/images/'.$imageName)}})">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-40 titan-title-size-4">
                                <?php
                                $text = $template->getSliderText($shopId, $count);
                                echo $text->content;
                                ?>
                            </div>

                        </div>
                    </div>
                </li>
                <?php

                } else{
                ?>
                <li class="bg-dark-30 bg-dark"
                    style="background-image:url({{URL::asset('storage/'.$shopId.'/template/images/'.$imageName)}})">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-40 titan-title-size-4">
                                <?php
                                $text = $template->getSliderText($shopId, $count);
                                echo $text->content;
                                ?>
                            </div>

                        </div>
                    </div>
                </li>
                <?php

                }
                $count++;
                }
                ?>
            </ul>
        </div>
    </section>
    <section class="module" style="margin-top: -5%">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4><p style="text-align:center; font-family: 'Karla', sans-serif; font-size: 50px"><b>Glimpse Of
                                Our Work</b>
                        </p></h4>
                    <hr class="divider-w mt-10 mb-20">

                    <ul class="filter font-alt" id="filters" style="margin-top: 50px">
                        <li><a class="current wow fadeInUp" href="#" data-filter="*"><b
                                        style="font-family: 'Karla', sans-serif; font-size: medium">All</b></a></li>
                        <?php
                        $newCategory = new \App\Http\Models\Category();

                        $categories = $newCategory->getCategories($shopId);
                        foreach($categories as $category){
                        $category_name = explode(" ", $category->category_name);
                        $combinedName = '';
                        foreach ($category_name as $name) {
                            $combinedName = $combinedName . $name;
                        }
                        ?>
                        <li><a class="wow fadeInUp" href="#" data-filter=".{{$combinedName}}"
                               data-wow-delay="0.2s"><b
                                        style="font-family: 'Karla', sans-serif; font-size: medium">{{$category->category_name}}</b></a>
                        </li>

                        <?php

                        }

                        ?>

                    </ul>
                    <ul class="works-grid works-grid-masonry works-hover-w works-grid-2" id="works-grid">
                        <?php
                        $categories = $newCategory->getCategories($shopId);
                        $newPhoto = new \App\Http\Models\Photo();
                        foreach($categories as $category){
                            $photos = $newPhoto->getLimitedPhotos($shopId, $category->category_name,5);
                            $category_name = explode(" ", $category->category_name);
                            $combinedName = '';
                            foreach ($category_name as $name) {
                                $combinedName = $combinedName . $name;
                            }
                            foreach ($photos as $photo) {
                                $galleryPath = 'storage/' . $shopId . '/thumbnails/' . $photo->file_name;
                                $originalPath = 'storage/' . $shopId . '/images/' . $photo->file_name;
                        ?>
                        <li class="work-item &nbsp; {{$combinedName}}">
                            <a id="counter" class="magnify-image" data-img="{{$photo->photo_id}}"
                               href="{{URL::asset($originalPath)}}">
                                <div class="work-image"><img src="{{URL::asset($galleryPath)}}" alt="Portfolio Item"/>
                                </div>
                                <div class="work-caption font-alt">
                                    <h3 class="work-title">{{$category->category_name}}</h3>
                                    <div class="work-descr">
                                        <b style="font-size: 20px">
                                            <?php
                                            $newCounter = new \App\Http\Models\Counter();
                                            $count = $newCounter->getCount($photo->photo_id);
                                            echo "Views: " . $count;
                                            ?>
                                        </b>

                                    </div>
                                </div>
                            </a></li>
                        <?php
                        }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class=" col-sm-12" style="text-align: center; margin-top: 20px">
                <a href="{{route('gallery')}}">
                    <button style="text-align:center; font-family: 'Karla', sans-serif; font-size: large"
                            class="btn btn-b btn-circle btn-lg" type="submit">
                        View More
                    </button>&nbsp;
                </a>

            </div>
        </div>

    </section>


@endsection
