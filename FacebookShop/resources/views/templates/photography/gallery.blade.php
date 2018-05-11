@extends('templates.photography.layout.layout')
@section('content')
    <section class="module bg-dark-60 portfolio-page-header"
             data-background="{{URL::asset('photography/images/gallery.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h1 class="module-title font-alt">
                        <p style=" font-size: 60px ;">
                            <b>Welcome To Our Gallery</b>
                        </p>
                    </h1>

                    <div class="module-subtitle font-serif"><p style="font-size: 30px">
                            "everything at one place"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="filter font-alt" id="filters">
                        <li><a class="current wow fadeInUp" href="#" data-filter="*"><p
                                        style="font-family: 'Karla', sans-serif;; font-size: medium"><b>All</b></p></a>
                        </li>
                        <?php
                        use App\Http\Models\Category;
                        use App\Http\Models\Photo;
                        use App\Http\Models\Counter;

                        $newCategory = new \App\Http\Models\Category();

                        $shopId=\Illuminate\Support\Facades\Session::get('siteShopId');
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
                                        style="font-family: 'Karla', sans-serif;; font-size: medium">{{$category->category_name}}</b></a>
                        </li>

                        <?php

                        }
                        ?>
                    </ul>
                </div>
            </div>
            <ul class="works-grid works-grid-masonry works-hover-w works-grid-2" id="works-grid">
                <?php

                foreach($categories as $category){
                    $newPhoto = new Photo();
                    $photos=$newPhoto->getCategorizedPhotos($shopId,$category->category_name);

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
                    <a id="counter" class="magnify-image" data-img="{{$photo->photo_id}}" href="{{URL::asset($originalPath)}}">
                        <div class="work-image"><img src="{{URL::asset($galleryPath)}}" alt="Portfolio Item"/></div>
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
    </section>

@endsection