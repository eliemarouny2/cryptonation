@extends('layouts.base')


@section('content')

<section class="hero-banner">
    <div class="slider">
        <div class="slide">
            <div class="image">
                <div class="contenttitle">
                    <h1>{{ __('msg.get_supreme_shirts')}}</h1>
                </div>
                <div class="content">
                    <div class="shopbtn">
                        <a href="/merch">{{ __('msg.shop_now')}} > > ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(count($trending_shirts) > 1)
<section class="hero-banner2">
    <div class="container-fluid">
        <h1 class="width-word">Trending now</h1>
        <div id="owl-demo-1" class="owl-carousel owl-theme">
            @foreach($trending_shirts as $trending_shirt)
            <a href="/view_product/{{$trending_shirt->prod_id}}">
                <div class="item" id="{{$trending_shirt->prod_id}}">
                    <div class="content2 mt-5">
                        <img src="images/products/{{$trending_shirt->prod_img_url}}" alt="{{$trending_shirt->prod_name}}"  class="centered-image"/>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="video mt-big mb-5">
    <iframe class="fullvideo" src="{{$video->video_url}}">
    </iframe>
</section>



@if(count($trendings_caps) > 1)
<section class="hero-banner2">
    <div class="container-fluid">
        <h1 class="width-word mt-5">Caps</h1>
        <div id="owl-demo-2" class="owl-carousel owl-theme">
            @foreach($trendings_caps as $trending_cap)
            <a href="/view_product/{{$trending_cap->prod_id}}">
                <div class="item" id="{{$trending_cap->prod_id}}">
                    <div class="content2 mt-5 ">
                        <img src="images/products/{{$trending_cap->prod_img_url}}" alt="{{$trending_cap->prod_name}}"  class="centered-image" />
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="hero-banner3 mb-5">
    <div class="container-fluid">
        <div class="worldtitle">
            <h1 class="world-title">Worldwide</h1>
            <h2 class="world-subtitle">Shipping</h2>
        </div>
        <div class="worldimage"></div>
    </div>
</section>

@if(count($trendings_posters) > 1)
<section class="hero-banner2">
    <div class="container-fluid">
        <h1 class="width-word mt-5">designer poster</h1>
        <div id="owl-demo-3" class="owl-carousel owl-theme mb-5">
            @foreach($trendings_posters as $trending_poster)
            <a href="/view_product/{{$trending_poster->prod_id}}">
                <div class="item" id="{{$trending_poster->prod_id}}">
                    <div class="content2 mt-5 p-3 mb-4">
                        <img src="images/products/{{$trending_poster->prod_img_url}}" alt="{{$trending_poster->prod_name}}"  class="centered-image" />
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif




<!-- Owl Carousel -->

@endsection