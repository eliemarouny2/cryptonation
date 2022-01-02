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

        <section class="hero-banner2">
			<div class="container-fluid">
				<h1>Trending now</h1>
				<div id="owl-demo-1" class="owl-carousel owl-theme">
					@foreach($trendings as $trending)
					<a href="/product/{{$trending->prod_id}}">
					<div class="item" id="{{$trending->prod_id}}">
						<div class="content2 mt-5">
							<img src="products/{{$trending->prod_img_url}}" alt="{{$trending->prod_name}}" />
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

        <section class="video mt-big">
			<iframe class="fullvideo" src="https://www.youtube.com/embed/tgbNymZ7vqY">
			</iframe>
		</section>
		<section class="hero-banner4">
			<div class="container">
				<h1 class="bluish mb-5 mt-5">Vlogs</h1>
				<div id="owl-demo-2" class="owl-carousel owl-theme">
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="hero-banner3">
			<div class="container-fluid">
				<div class="worldtitle">
					<h1>Worldwide</h1>
					<h2>Shipping</h2>
				</div>
				<div class="worldimage"></div>
			</div>
		</section>
		<section class="hero-banner4">
			<div class="container">
				<h1 class="bluish mb-5 mt-5">Blogs</h1>
				<div id="owl-demo-3" class="owl-carousel owl-theme">
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="card">
						<img src="images/icons/blogs.png" class="card-img-top imgblog" alt="..." />
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">
								Some quick example text to build on the card title and make up
								the bulk of the card's content.
							</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</div>
			</div>
		</section>

        	<script
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
			integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
			crossorigin="anonymous"
		></script>
		<!-- Owl Carousel -->
        <script src="js/carouselshome.js"></script>

@endsection
	
