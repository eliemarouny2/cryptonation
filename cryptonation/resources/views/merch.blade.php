@extends('layouts.base')
@section('content')
<section class="hero-banner">

	<div class="slider">
		<div class="slide">
			<div class="image">
				<p class="supreme-title"> Get supreme Shirts </p>
			</div>

		</div>
	</div>
</section>
@if(count($shirts) > 1)
<section class="hero-banner2">
	<div class="container-fluid">
		<h1>Unique T-shirts</h1>
		<div id="owl-demo-1" class="owl-carousel owl-theme">
			@foreach($shirts as $shirt)
			<div class="card centered2">
				<div class="item2" id="{{$shirt->prod_id}}">
					<div class="content2 mt-5">
						<img src="images/products/{{$shirt->prod_img_url}}" alt="{{$shirt->prod_name}}" />
					</div>
					<div class="content3">
						<img src="images/icons/ellipse.png" alt="ellipse" />
					</div>
					<div class="price-name centered2">
						<p class="tshirt-name centered2">
							{{$shirt->prod_name}}
						</p>
						<p class="price centered2"> {{$shirt->prod_price}} $ </p>


					</div>

					</button>

				</div>
				<button class="add-to-cart price-name2" onclick="add_to_cart('{{$shirt->prod_id}}')"> Add to cart
			</div>

			@endforeach
		</div>
	</div>
</section>
@endif
<section class="shirt-details-component">
	<div class="container leftDiv">
		<div class="row custom001">
			<img class="col-2 left-arrow" src="images/icons/left.png">
			<img class="col-8 center-tshirt" src="images/products/1641123148.png">
			<img class="col-2 right-arrow" src="images/icons/right.png">
		</div>
		<div class="row small-tshirts">
			<img class="col-3 zoomed-tshirts" src="images/products/1641123148.png">
			<img class="col-3 zoomed-tshirts" src="images/products/1641123148.png">
			<img class="col-3 zoomed-tshirts" src="images/products/1641123148.png">
			<img class="col-3 zoomed-tshirts" src="images/products/1641123148.png">
		</div>
	</div>
	<div class="rightDiv">
		<p class="row tshirt-title"> Lorem ipsum </p>
		<p class="row tshirt-description"> Lorem ipsum dolor sit amet,
			consectetur adipiscing elit.
			Maecenas ut pharetra libero.
			Praesent et molestie nisl. Integer nec ornare diam.
		</p>
		<div class="row price-row">
			<p class="col-4 td-price"> Price </p>
			<p class="col-4 nb-price"> 60$ </p>
			<p class="col-4 td-price"> Color </p>
		</div>
		<div class="row">
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
					<div class="col-4">
						<button class="operator">
							-
						</button>
					</div>
					<div class="col-4">
						1
					</div>
					<div class="col-4">
						<button class="operator">
							+
						</button>
					</div>
				</div>
			</div>
			<div class="col-4 sizes">
				<input class="col-3 color-btns" type="radio" name="color" id="tshirt-white" value="white" />
				<input class="col-3 color-btns" type="radio" name="color" id="tshirt-red" value="red" />
				<input class="col-3 color-btns" type="radio" name="color" id="tshirt-green" value="green" />
			</div>
		</div>
		<div class="row">
			<button class="add-to-cart buy-now col-6"> Buy now </button>
			<p class="hyperlink-addToCart col-6"> Add to cart </p>
		</div>
	</div>
</section>

<section class="limited">
	<div class="container sizes">
		<h1 class="row bluish title-margin">Limited edition</h1>
		<div class="row">
			<p class="bet-to-own stocks-bet price-row"> Bet on this item to own it </p>
		</div>
		<div class="row">
			<img src="images/icons/aaaaa.png" class="col-7">
			<div class="col-5">
				<img src="images/icons/bet.png" class="stocks-betimg">
				<div class="row">
					<p class="bet-to-own col-6 "> Actual price </p>
					<p class="col-6 price-of-bet"> 300$ </p>
				</div>
				<div class="row">
					<button class="bet-now-btn"> Bet now </button>
				</div>
			</div>
			<div>
				<div class="row">
					<img class="element-to-bet col-12" src="images/icons/whiteshirt.png">
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
						<img src="images/products/{{$cap->prod_img_url}}" alt="{{$cap->prod_name}}" />
					</div>
					<div class="price-name">
						<p class="tshirt-name centered2">
							{{$cap->prod_name}}
						</p>
						<p class="price centered2"> {{$cap->prod_price}} $ </p>
						<div class="centered2">
							<button class="add-to-cart "> Add to cart </button>

						</div>
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
						<img src="images/products/{{$poster->prod_img_url}}" alt="{{$poster->prod_name}}" />
					</div>
					<div class="price-name">
						<p class="tshirt-name centered2">
							{{$poster->prod_name}}
						</p>
						<p class="price centered2"> {{$poster->prod_price}} $ </p>
						<div class="centered2">
							<button class="add-to-cart "> Add to cart </button>

						</div>
					</div>
				</div>
			</div>
			<?php echo Cart::content(); ?>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
	crossorigin="anonymous"></script>
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
			success: function (data) {
				console.log(data);
				$("#tab_up_cart").load(location.href + " #tab_up_cart>*", "");
				swal("Success!", "Product added to cart", "success");

			},
			error: function (data) {
				console.log(data);
				swal("Error!", "Request failed", "warning");

			}
		});
	}



</script>
@endsection