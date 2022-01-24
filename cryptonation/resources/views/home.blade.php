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

@if(count($trendings) > 1)
<section class="hero-banner2">
    <div class="container-fluid">
        <h1>Trending now</h1>
        <div id="owl-demo-1" class="owl-carousel owl-theme">
            @foreach($trendings as $trending)
            <a href="/view_product/{{$trending->prod_id}}">
                <div class="item" id="{{$trending->prod_id}}">
                    <div class="content2 mt-5">
                        <img src="images/products/{{$trending->prod_img_url}}" alt="{{$trending->prod_name}}"  class="centered-image"/>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="video mt-big">
    <iframe class="fullvideo" src="{{$video->video_url}}">
    </iframe>
</section>



@if(count($trendings_caps) > 1)
<section class="hero-banner2">
    <div class="container-fluid">
        <h1>Trending now</h1>
        <div id="owl-demo-2" class="owl-carousel owl-theme">
            @foreach($trendings_caps as $trending)
            <a href="/view_product/{{$trending->prod_id}}">
                <div class="item" id="{{$trending->prod_id}}">
                    <div class="content2 mt-5">
                        <img src="images/products/{{$trending->prod_img_url}}" alt="{{$trending->prod_name}}"  class="centered-image" />
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="hero-banner3">
    <div class="container-fluid">
        <div class="worldtitle">
            <h1>Worldwide</h1>
            <h2>Shipping</h2>
        </div>
        <div class="worldimage"></div>
    </div>
</section>

@if(count($trendings_posters) > 1)
<section class="hero-banner2">
    <div class="container-fluid">
        <h1>Trending now</h1>
        <div id="owl-demo-3" class="owl-carousel owl-theme mb-5">
            @foreach($trendings_posters as $trending)
            <a href="/view_product/{{$trending->prod_id}}">
                <div class="item" id="{{$trending->prod_id}}">
                    <div class="content2 mt-5">
                        <img src="images/products/{{$trending->prod_img_url}}" alt="{{$trending->prod_name}}"  class="centered-image" />
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