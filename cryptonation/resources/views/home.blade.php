@extends('layouts.base')


@section('content')

<section class="hero-banner">
			<div class="slider">
				<div class="slide">
					<div class="image">
						<div class="contenttitle">
							<h1>Get supreme shirts</h1>
						</div>
						<div class="content">
							<div class="shopbtn">
								<a href="/merch">Shop now > > ></a>
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
					<a href="/product/{{$trending->prod_id}}">
					<div class="item" id="{{$trending->prod_id}}">
						<div class="content2 mt-5">
							<img src="images/products/{{$trending->prod_img_url}}" alt="{{$trending->prod_name}}" />
						</div>
						<div class="content3">
							<img src="images/icons/ellipse.png" alt="ellipse" />
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

		@if(count($vlogs) > 0)
		<section class="hero-banner4">
			<div class="container">
				<h1 class="bluish mb-5 mt-5">Vlogs</h1>
				<div id="owl-demo-2" class="owl-carousel owl-theme">
					@foreach($vlogs as $vlog)
					<div class="card">
						<img src="/images/vlogs/{{$vlog->vlog_image_url}}" class="card-img-top imgblog" alt="vlog image" />
						<div class="card-body">
							<h5 class="card-title">{{$vlog->vlog_image_url}}</h5>
							<p class="card-text">
								{{$vlog->vlog_description}}
							</p>
						</div>
					</div>
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

		@if(count($blogs) > 0)
		<section class="hero-banner4 mb-5">
			<div class="container">
				<h1 class="bluish mb-5 mt-5">Blogs</h1>
				<div id="owl-demo-3" class="owl-carousel owl-theme">
					@foreach($blogs as $blog)
					<div class="card">
						<img src="/images/blogs/{{$blog->blog_image_url}}" class="card-img-top imgblog" alt="blog image" />
						<div class="card-body">
							<h5 class="card-title">{{$blog->blog_image_url}}</h5>
							<p class="card-text">
								{{$blog->blog_description}}
							</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		@endif


		<!-- Owl Carousel -->

@endsection
	
