@extends('layouts.base')
@section('content')
<section class="hero-banner">
	<div class="slider">
		<div class="slide">
			<div class="image">
				<div class="contenttitle">
					<h1> Get supreme Shirts </h1>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="accordion accordion-flush" id="accordionparent">
	<?php $i = 0; ?>
	@if(count($shirts) > 1)
	<section class="hero-banner2 mb-5">
		<div class="container-fluid">
			<h1>Unique T-shirts</h1>
			<div id="owl-demo-1" class="owl-carousel owl-theme">
				@foreach($shirts as $shirt)
				<?php $i++; ?>
				<div class="item" id="{{$shirt->prod_id}}">
					<div class="accordion-item">
						<div class="accordion-header" id="flush-heading<?php echo $shirt->prod_id; ?>">
							<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-<?php echo $shirt->prod_id; ?>" aria-expanded="false" aria-controls="flush-<?php echo $shirt->prod_id; ?>">
								<div class="content2 mt-5">
									<img src="images/products/{{$shirt->prod_img_url}}" alt="{{$shirt->prod_name}}" class="centered-image" />
								</div>
						</div>
						</button>

					</div>


				</div>
				@endforeach

			</div>
		</div>
	</section>

	@endif

	@if(count($shirts) > 1)
	@foreach($shirts as $shirt)
	<div id="flush-<?php echo $shirt->prod_id; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $shirt->prod_id; ?>" data-bs-parent="#accordionparent">
		<div class="accordion-body">

			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6">
						<div class="row custom001">
							<img class="col-2 left-arrow" src="images/icons/left.png">
							<img class="col-8 center-tshirt" src="images/products/{{$shirt->prod_img_url}}">
							<img class="col-2 right-arrow" src="images/icons/right.png">
						</div>
						<div class="row small-tshirts">
							<img class="col-3 zoomed-tshirts" src="images/products/1641123148.png">
							<img class="col-3 zoomed-tshirts" src="images/products/1641123148.png">
							<img class="col-3 zoomed-tshirts" src="images/products/1641123148.png">
							<img class="col-3 zoomed-tshirts" src="images/products/1641123148.png">
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<h4 class="row tshirt-title">{{$shirt->prod_name}}</h4>
						<span class="row tshirt-description">
							{{$shirt->prod_description}}
						</span>
						<div class="row price-row mb-4">
							<span class="col-4 td-price">Price</span>
							<span class="col-4 nb-price">{{$shirt->prod_price}} $</span>
							<span class="col-4 td-price">Color</span>
						</div>
						<div class="row resp-disp">
							<div class="col-4 sizes">
								<input class="col-3 size-btns" type="radio" name="size" id="tshirt-small" value="small" />
								<label class="size-letter" for="tshirt-small"> S </label>
								<input class="col-3 size-btns" type="radio" name="size" id="tshirt-medium" value="medium" />
								<label class="size-letter" for="tshirt-medium"> M </label>
								<input class="col-3 size-btns" type="radio" name="size" id="tshirt-large" value="large" />
								<label class="size-letter" for="tshirt-large"> L </label>
							</div>
							<!-- Maroune check this for the php https://www.phptutorial.net/php-tutorial/php-radio-button/ for the php >-->
							<div class="col-4">
								<div class="row">
									<div class="col-3"><button class="operator">-</button></div>
									<div class="col-3"><span class="quantity-count">1</span></div>
									<div class="col-3"><button class="operator">+</button></div>
								</div>
							</div>
							<div class="col-4 sizes resp-colors">
								<input class="col-3 color-btns" type="radio" name="color" id="tshirt-white" value="white" />
								<input class="col-3 color-btns" type="radio" name="color" id="tshirt-red" value="red" />
								<input class="col-3 color-btns" type="radio" name="color" id="tshirt-green" value="green" />
							</div>
						</div>
						<div class="row  resp-disp mt-5">
							<button class="add-to-cart buy-now col-6">Buy now</button>
							<a href="" class="hyperlink-addToCart col-6">Add to cart</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	@endforeach
	@endif
</div>




<section class="limited">
	<div class="container-fluid sizes">
		<h1 class="row bluish title-margin ms-4">Limited edition</h1>
		<div class="row">
			<p class="bet-to-own stocks-bet price-row ms-5"> Bet on this item to own it </p>
		</div>
		<div class="row">
			<div class="col-7">
				<img src="images/backgrounds/hat.png" class="bet-img w-100">
			</div>
			<div class="col-5">
				<img src="images/icons/bet.png" class="stocks-betimg w-100">
				<div class="row">
					<p class="bet-to-own col-6 "> Actual price </p>
					<p class="col-6 price-of-bet"> 300$ </p>
				</div>
				<div class="row">
					<button class="bet-now-btn"> Bet now </button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<img class="w-100" src="images/icons/whiteshirt.png">
			</div>
		</div>
	</div>
</section>
@if(count($caps) >= 1)
<section class="hero-banner2">
	<div class="container-fluid">
		<h1>Caps collection</h1>
		<div id="owl-demo-caps" class="owl-carousel owl-theme">
			@foreach($caps as $cap)
			<div class="card">
				<div class="item23" id="{{$cap->prod_id}}">
					<div class="content23 mt-5">

						<img class="resp-cap-owel" src="images/products/{{$cap->prod_img_url}}" alt="{{$cap->prod_name}}" />
					</div>
					<div class="centered2">
						<p class="tshirt-name">
							{{$cap->prod_name}}
						</p>
						<p class="price"> {{$cap->prod_price}} $ </p>
						<button class="add-to-cart "> Add to cart </button>
					</div>
				</div>
			</div>

			@endforeach
		</div>
	</div>
</section>
@endif

@if(count($posters) >= 1)
<section class="hero-banner2">
	<div class="container-fluid">
		<h1>deSIGNER POSTER</h1>
		<div id="owl-demo-posters" class="owl-carousel owl-theme">
			@foreach($posters as $poster)
			<div class="card">
				<div class="item24" id="{{$poster->prod_id}}">
					<div class="content2 mt-5">
						<img src="images/products/{{$poster->prod_img_url}}" alt="{{$poster->prod_name}}" class="centered-image" />
					</div>
					<div class="centered2">
						<p class="tshirt-name">
							{{$poster->prod_name}}
						</p>
						<p class="price"> {{$poster->prod_price}} $ </p>
						<button class="add-to-cart "> Add to cart </button>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
@csrf


<!-- <section>
			Cart({{Cart::content()->count()}})
				@csrf
			<button id="add_to_cart">add to cart</button>
		</section> -->



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	var token = document.getElementsByName('_token')[0];

	function add_to_cart(id) {
		// var qnty = $('#qnty').val();
		// var variant = $('#variant').val();
		// var color = $('#color').val();
		var qnty = 2;
		var variant = 'large';
		var color = 'black';
		if (id == 0) {
			swal("Warning!", "Something went wrong", "error");

			return false;
		}
		if (qnty <= 0) {

			swal("Warning!", "Keep quantity more than 0", "warning");

			return false;
		}
		if (variant != 'undefine') {
			if (variant <= 0) {

				swal("Warning!", "Please choose a variant", "warning");

				return false;
			}
		}
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': token.value
			}
		});
		$.ajax({
			type: "post",
			async: true,
			url: '/add_to_cart',
			data: {
				id: id,
				quantity: qnty,
				variant: variant,
				color: color
			},
			success: function(data) {
				console.log(data);
				$("#tab_up_cart").load(location.href + " #tab_up_cart>*", "");
				swal("Success!", "Product added to cart", "success");

			},
			error: function(data) {
				console.log(data);
				swal("Error!", "Request failed", "warning");

			}
		});
	}
</script>
@endsection