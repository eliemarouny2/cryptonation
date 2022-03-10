@extends('layouts.base')
@section('content')
<?php

use Illuminate\Support\Facades\DB;

$i = 0;
$ii = 0;
$iii = 0;
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/igorlino/elevatezoom-plus@1.2.3/src/jquery.ez-plus.js"></script>
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
	@if(count($shirts) > 1)
	<section class="hero-banner2 mb-5">
		<div class="container-fluid">
			<h1>Unique T-shirts</h1>
			<div id="owl-demo-1" class="owl-carousel owl-theme">
				@foreach($shirts as $shirt)
				<?php $i++; ?>
				<div class="card" id="{{$shirt->prod_id}}">
					<div class="accordion-item">
						<div class="accordion-header" id="flush-heading<?php echo $shirt->prod_id; ?>">
							<a href="/view_product/{{$shirt->prod_id}}">
								<div class="content2 mt-5">
									<img src="images/products/{{$shirt->prod_img_url}}" alt="{{$shirt->prod_name}}" class="centered-image custom-img-009" />
								</div>
							</a>
							<div class="centered2">
								<p class="tshirt-name">
									{{$shirt->prod_name}}
								</p>
								<p class="price"> {{$shirt->prod_price}}$ </p>
								<div class="text-center flex-mid mb-2">
									<button type="button" class="accordion-button collapsed add-to-cart" data-bs-toggle="collapse" data-bs-target="#flush-<?php echo $shirt->prod_id; ?>" aria-expanded="false" aria-controls="flush-<?php echo $shirt->prod_id; ?>">
										Add to cart
									</button>
								</div>

							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

	@endif

	@if(count($shirts) > 1)
	@foreach($shirts as $shirt)
	<?php
	$galleries = DB::table('image_galleries')
		->select('*')
		->where('product_id', $shirt->prod_id)
		->get();
	?>
	<div id="flush-<?php echo $shirt->prod_id; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $shirt->prod_id; ?>" data-bs-parent="#accordionparent">
		<div class="accordion-body">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6">
						<div class="row">
							<div class="col-2 flexer">
								<img class="left-arrow v-align" src="images/icons/left.png">

							</div>
							<div class="col-8">
								<img class="center-tshirt w-100 rel-001" id="<?php echo $shirt->prod_id; ?>" src="images/products/{{$shirt->prod_img_url}}" data-zoom-image="images/products/{{$shirt->prod_img_url}}">
								<div class="row small-tshirts" id="gal<?php echo $shirt->prod_id; ?>">
									@foreach($galleries as $gallery)
									<div class="col me-2 zoomed-tshirts">
										<a href="#" data-image="" data-zoom-image="">
											<img class="w-100 img-small" id="<?php echo $shirt->prod_id; ?>" src="image_gallery/{{$gallery->img_url}}">
										</a>
									</div>
									@endforeach
								</div>
							</div>
							<div class="col-2 flexer">
								<img class="right-arrow v-align" src="images/icons/right.png">

							</div>
						</div>

					</div>
					<div class="col-12 col-lg-6 ps-5 pt-4 descript">
						<div class="row">
							<div class="col-12">
								<h4 class="row tshirt-title">{{$shirt->prod_name}}</h4>
							</div>
							<div class="col-12">
								<span class="row tshirt-description">
									{{$shirt->prod_description}}
								</span>
							</div>
							<div class="col-12">
								<div class="row price-row mb-4">
									<span class="col-4 td-price">Price</span>
									<span class="col-4 nb-price">{{$shirt->prod_price}} $</span>
									<span class="col-4 td-price">Color</span>
								</div>
							</div>
							<?php
							$mm = 0;
							$mf = 100;
							$colors = explode(',', $shirt->colors);
							$variants = explode(',', $shirt->variants); ?>
							<div class="col-12 resp-disp">
								<div class="row">
									<div class="col-4 sizes">
										@if($shirt->variants)
										<div class="radio">
											@foreach($variants as $variant)
											<input label="{{$variant}}" type="radio" id="sele-{{$mm}}" name="select-{{$shirt->prod_id}}" value="{{$variant}}">
											<?php $mm++; ?>
											@endforeach
										</div>
										@endif
									</div>
									<div class="col-4">
										<div class="row">
											<div class="col-3"><button class="operator" onclick="var result<?php echo $shirt->prod_id; ?> = document.getElementById('sst<?php echo $shirt->prod_id; ?>'); var sst<?php echo $shirt->prod_id; ?> = result<?php echo $shirt->prod_id; ?>.value; if(sst<?php echo $shirt->prod_id; ?>>1)result<?php echo $shirt->prod_id; ?>.value--">-</button></div>
											<div class="col-3"><input class="quantity-count" name="qty" id="sst<?php echo $shirt->prod_id; ?>" value="1" min="1"></div>
											<div class="col-3"><button class="operator" onclick="var result<?php echo $shirt->prod_id; ?> = document.getElementById('sst<?php echo $shirt->prod_id; ?>'); var sst<?php echo $shirt->prod_id; ?> = result<?php echo $shirt->prod_id; ?>.value;result<?php echo $shirt->prod_id; ?>.value++">+</button></div>
										</div>
									</div>
									@if($shirt->colors)
									<div class="col-4 sizes">
										<div class="radio">
											@foreach($colors as $color)
											<input type="radio" value="{{$color}}" class="color-radio" id="color-{{$mf}}" style="background-color:<?php echo $color; ?> !important;color:<?php echo $color; ?> !important;" name="colo-{{$shirt->prod_id}}" value="">
											<?php $mf++; ?>
											@endforeach
										</div>
									</div>
									@endif
								</div>

							</div>
							<div class="row  resp-disp mt-5">
								<button onclick="add_to_cart(<?php echo $shirt->prod_id; ?>)" class="add-to-cart buy-now col-6">Add to cart</button>
							</div>
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
			<div class="col-12 col-lg-7">
				<img src="images/backgrounds/hat.png" class="bet-img w-100">
			</div>
			<div class="col-12 col-lg-5">
				<img src="images/icons/bet.png" class="stocks-betimg w-100">
				<div class="row mt-4">
					<div class="col-6 centered2">
						<span class="w-100 bet-to-own">Actual price</span>
					</div>
					<div class="col-6 centered2">
						<span class="price-of-bet w-100">300$</span>

					</div>
				</div>
				<div class="row mt-4">
					<div class="centered2">
						<button class="bet-now-btn"> Bet now </button>
					</div>
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


<div class="accordion accordion-flush" id="accordionparent2">
	@if(count($caps) > 1)
	<section class="hero-banner2 mb-5">
		<div class="container-fluid">
			<h1>Caps collection</h1>
			<div id="owl-demo-caps" class="owl-carousel owl-theme">
				@foreach($caps as $cap)
				<?php $i++; ?>
				<div class="item" id="{{$cap->prod_id}}">
					<div class="accordion-item">
						<div class="accordion-header" id="flush-heading<?php echo $cap->prod_id; ?>">
							<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-<?php echo $cap->prod_id; ?>" aria-expanded="false" aria-controls="flush-<?php echo $cap->prod_id; ?>">
								<div class="content2 mt-5">
									<img src="images/products/{{$cap->prod_img_url}}" alt="{{$cap->prod_name}}" class="centered-image" />
								</div>
							</button>
						</div>

					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

	@endif

	@if(count($caps) > 1)
	@foreach($caps as $cap)
	<?php
	$galleries = DB::table('image_galleries')
		->select('*')
		->where('product_id', $cap->prod_id)
		->get();
	?>
	<div id="flush-<?php echo $cap->prod_id; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $cap->prod_id; ?>" data-bs-parent="#accordionparent2">
		<div class="accordion-body">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6">
						<div class="row">
							<div class="col-2 flexer">
								<img class="left-arrow v-align" src="images/icons/left.png">

							</div>
							<div class="col-8">
								<img class="center-tshirt w-100 rel-001" id="<?php echo $cap->prod_id; ?>" src="images/products/{{$cap->prod_img_url}}" data-zoom-image="images/products/{{$cap->prod_img_url}}">
							</div>
							<div class="col-2 flexer">
								<img class="right-arrow v-align" src="images/icons/right.png">

							</div>
						</div>

					</div>
					<div class="col-12 col-lg-6 ps-5 pt-4 descript">
						<div class="row">
							<div class="col-12">
								<h4 class="row tshirt-title">{{$cap->prod_name}}</h4>
							</div>
							<div class="col-12">
								<span class="row tshirt-description">
									{{$cap->prod_description}}
								</span>
							</div>
							<div class="col-12">
								<div class="row price-row mb-4">
									<span class="col-4 td-price">Price</span>
									<span class="col-4 nb-price">{{$cap->prod_price}} $</span>
									<span class="col-4 td-price">Color</span>
								</div>
							</div>
							<?php
							$mm = 0;
							$mf = 100;
							$colors = explode(',', $cap->colors);
							$variants = explode(',', $cap->variants); ?>
							<div class="col-12 resp-disp">
								<div class="row">
									<div class="col-4 sizes">
										@if($cap->variants)
										<div class="radio">
											@foreach($variants as $variant)
											<input label="{{$variant}}" type="radio" id="sele-{{$mm}}" name="select-{{$cap->prod_id}}" value="{{$variant}}">
											<?php $mm++; ?>
											@endforeach
										</div>
										@endif
									</div>
									<div class="col-4">
										<div class="row">
											<div class="col-3"><button class="operator" onclick="var result<?php echo $cap->prod_id; ?> = document.getElementById('sst<?php echo $cap->prod_id; ?>'); var sst<?php echo $cap->prod_id; ?> = result<?php echo $cap->prod_id; ?>.value; if(sst<?php echo $cap->prod_id; ?>>1)result<?php echo $cap->prod_id; ?>.value--">-</button></div>
											<div class="col-3"><input class="quantity-count" name="qty" id="sst<?php echo $cap->prod_id; ?>" value="1" min="1"></div>
											<div class="col-3"><button class="operator" onclick="var result<?php echo $cap->prod_id; ?> = document.getElementById('sst<?php echo $cap->prod_id; ?>'); var sst<?php echo $cap->prod_id; ?> = result<?php echo $cap->prod_id; ?>.value;result<?php echo $cap->prod_id; ?>.value++">+</button></div>
										</div>
									</div>
									@if($cap->colors)
									<div class="col-4 sizes">
										<div class="radio">
											@foreach($colors as $color)
											<input type="radio" value="{{$color}}" class="color-radio" id="color-{{$mf}}" style="background-color:<?php echo $color; ?> !important;color:<?php echo $color; ?> !important;" name="colo-{{$cap->prod_id}}" value="">
											<?php $mf++; ?>
											@endforeach
										</div>
									</div>
									@endif
								</div>

							</div>
							<div class="row  resp-disp mt-5">
								<button onclick="add_to_cart(<?php echo $cap->prod_id; ?>)" class="add-to-cart buy-now col-6">Add to cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	@endforeach
	@endif
</div>

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
						<button class="add-to-cart" onclick="add_to_cart(<?php echo $poster->prod_id; ?>)"> Add to cart </button>
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


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	var token = document.getElementsByName('_token')[0];

	function add_to_cart(id) {
		var qnty = $('#sst' + id).val();
		var variant = $("input[type='radio'][name='select-" + id + "']:checked").val();
		var color = $("input[type='radio'][name='colo-" + id + "']:checked").val();
		console.log('quantity: ' + qnty + ', color: ' + color + ', variant: ' + variant);
		if (id == 0) {
			swal("Warning!", "Something went wrong", "error");
			return false;
		}
		if (qnty <= 0) {
			swal("Warning!", "Keep quantity more than 0", "warning");
			return false;
		}
		if (variant == undefined) {
			swal("Warning!", "Please choose a variant", "warning");
			return false;
		}
		if (color == undefined) {
			swal("Warning!", "Please choose a color", "warning");
			return false;
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