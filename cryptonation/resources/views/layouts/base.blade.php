<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

$cartitems = Cart::content();
$quantity = Cart::count();
$total = Cart::total() - Cart::tax();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
	<link rel="stylesheet" href="/css/styles.css">
	<link rel="stylesheet" href="/css/responsive.css">

	<title>Cryptonations</title>
	<link rel="icon" href="/images/icons/logo.png" type="image/x-icon">
</head>


<body>
	<!-- cart start -->
	<div id="tab_up_cart">
		<div id="mySidenav" class="sidenav">
			<div class="wrapper">
				<a href="javascript:void(0)" class="closebtn exit" onclick="closeNav()">&times;</a>
				<h4 class="mariner2">Shopping bag</h4>
				@foreach($cartitems as $cartitem)
				<div class="cartitem row mt-4">
					<div class="col-5">
						<img src="/images/products/{{$cartitem->options['image_url']}}" class="cartitemimage" alt="">
					</div>
					<div class=" col-7 cartitemname">
						<div class="row">
							<div class="col-9">
								<span class="cartitemtitle">{{$cartitem->name}}</span> <br>
								<span class="cartitemprice">{{$cartitem->price}}$</span><br>
								<span class="cartitemvariant">&nbsp;{{$cartitem->options['variant']}}&nbsp;</span><br>
								<span class="cartitemqnty">Qty: {{$cartitem->qty}}</span>
							</div>
							<div class="col-3 remove-from-cart">
								<button onclick="remove_from_cart('<?php echo $cartitem->rowId; ?>')">x</button>
							</div>
						</div>

					</div>
				</div>
				@endforeach
				@if($quantity!=0)
				<div class="subtotal">
					<label>Subtotal</label>
					<label class="subtotal-amount">{{$total}}$</label>
				</div>
				@endif
				<div class="buttons">
					@if($quantity!=0)
					<a href="/checkout" class="checkout">Go to Checkout</a>
					@endif
					<a href="/merch" class="continue">Continue Shopping</a>
				</div>
			</div>
		</div>
	</div>
	<!-- cart end -->
	<div id="main-body">
		<!-- Header bar start -->
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark">
				<div class="container flexer mb-1">
					<a class="navbar-brand righter active" aria-current="page" href="/">
						<img src="/images/icons/logo.png" alt="logo" class="img-logo" />
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarsExample03">
						<ul class="navbar-nav me-auto mb-2 mb-sm-0 mrgbg centered2">
							<li class="nav-item ml-4">
								<a class="nav-link lrg white-color acumin" href="/vlogs">Vlog</a>
							</li>
							<li class="nav-item">
								<a class="nav-link lrg white-color acumin" href="/blogs">Blog</a>
							</li>
							<li class="nav-item">
								<a class="nav-link lrg white-color acumin" href="/merch">Merch</a>
							</li>
							<li class="nav-item">
								<a class="nav-link lrg white-color acumin" href="/about">About us</a>
							</li>
						</ul>
						<ul class="navbar-nav me-auto mb-sm-0 centered2">
							<li class="nav-item dropdown">
								<a class="nav-link mdm mdmone dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false"><img src="/images/icons/searchbtn.png" alt="logo" /></a>
								<ul class="dropdown-menu search" aria-labelledby="dropdown04">
									<form action="/search" method="POST" class="search-form">
										<h5 class="mariner2">Search here</h5>
										<input type="text" placeholder="enter item here" class="form-control mariner2">
										@csrf
										<button class="btn btn-light mariner2 righty" type="submit">Search</button>
									</form>
							</li>
						</ul>
						</li>
						<li class="nav-item ml-2">
							<button class="nav-link mdm" onclick="openNav()">
								<img src="/images/icons/cart.png" alt="logo" />
							</button>
						</li>
						@if (Route::has('login'))
						@auth
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle mdm" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false"><img src="/images/icons/avatar.png" alt="logo" /></a>

							<ul class="dropdown-menu" aria-labelledby="dropdown03">
								<li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
								<li>
									<form action="{{route('logout')}}" method="POST">
										@csrf
										<button class="dropdown-item" type="submit">Sign out</button>
									</form>
								</li>
							</ul>
						</li>
						@else
						<li class="nav-item">
							<a class="nav-link mdm" href="/login"><img src="/images/icons/avatar.png" alt="logo" /></a>
						</li>
						@endauth
						@endif
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<!-- Header bar end -->
		<?php
		$url = 'https://api.coingecko.com/api/v3/simple/price';
		$parameters = [
			'ids' => 'bitcoin,ethereum,ripple,solana,dogecoin,cardano',
			'vs_currencies' => 'USD',
			'include_24hr_change' => 'true'
		];
		$qs = http_build_query($parameters); // query string encode the parameters
		$request = "{$url}?{$qs}"; // create the request URL


		$curl = curl_init(); // Get cURL resource
		// Set cURL options
		curl_setopt_array($curl, array(
			CURLOPT_URL => $request,            // set the request URL
			CURLOPT_SSL_VERIFYPEER => FALSE,
			CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
		));

		$response = curl_exec($curl); // Send the request, save the response
		$r = json_decode($response);
		curl_close($curl); // Close request
		?>
		<!-- Stocks chart start -->
		<nav class="navbar navig2 navbar-expand-lg navbar-light ">
			<div class="container-fluid white custom-coin">
				<div class="coin-data">
					<?php if ($r->bitcoin->usd_24h_change < 0) { ?>
						<img src="/images/icons/red.png" class="chart-image" alt="red image">
					<?php } else { ?>
						<img src="/images/icons/green.png" class="chart-image" alt="red image">
					<?php } ?>
					<div class="coin-info">
						<span>
							BTC
						</span>
						<span>
							<?php  echo $r->bitcoin->usd; ?>
						</span>
						<span>
							<?php echo number_format($r->bitcoin->usd_24h_change ,2); ?>
						</span>
					</div>
					<span></span>
				</div>
				<div class="coin-data">
					<?php if ($r->ethereum->usd_24h_change < 0) { ?>
						<img src="/images/icons/red.png" class="chart-image" alt="red image">
					<?php } else { ?>
						<img src="/images/icons/green.png" class="chart-image" alt="red image">
					<?php } ?>
					<div class="coin-info">
						<span>
							ETH
						</span>
						<span>
							<?php  echo $r->ethereum->usd; ?>
						</span>
						<span>
							<?php echo number_format($r->ethereum->usd_24h_change ,2); ?>
						</span>
					</div>
					<span></span>
				</div>
				<div class="coin-data">
					<?php if ($r->ripple->usd_24h_change < 0) { ?>
						<img src="/images/icons/red.png" class="chart-image" alt="red image">
					<?php } else { ?>
						<img src="/images/icons/green.png" class="chart-image" alt="red image">
					<?php } ?>
					<div class="coin-info">
						<span>
							XRP
						</span>
						<span>
							<?php  echo $r->ripple->usd; ?>
						</span>
						<span>
							<?php echo number_format($r->ripple->usd_24h_change ,2); ?>
						</span>
					</div>
					<span></span>
				</div>
				<div class="coin-data">
					<?php if ($r->dogecoin->usd_24h_change < 0) { ?>
						<img src="/images/icons/red.png" class="chart-image" alt="red image">
					<?php } else { ?>
						<img src="/images/icons/green.png" class="chart-image" alt="red image">
					<?php } ?>
					<div class="coin-info">
						<span>
							DOGE
						</span>
						<span>
							<?php  echo $r->dogecoin->usd; ?>
						</span>
						<span>
							<?php echo number_format($r->dogecoin->usd_24h_change ,2); ?>
						</span>
					</div>
					<span></span>
				</div>
				<div class="coin-data">
					<?php if ($r->solana->usd_24h_change < 0) { ?>
						<img src="/images/icons/red.png" class="chart-image" alt="red image">
					<?php } else { ?>
						<img src="/images/icons/green.png" class="chart-image" alt="red image">
					<?php } ?>
					<div class="coin-info">
						<span>
							SOL
						</span>
						<span>
							<?php  echo $r->solana->usd; ?>
						</span>
						<span>
							<?php echo number_format($r->solana->usd_24h_change ,2); ?>
						</span>
					</div>
					<span></span>
				</div>
				<div class="coin-data">
					<?php if ($r->cardano->usd_24h_change < 0) { ?>
						<img src="/images/icons/red.png" class="chart-image" alt="red image">
					<?php } else { ?>
						<img src="/images/icons/green.png" class="chart-image" alt="red image">
					<?php } ?>
					<div class="coin-info">
						<span>
							ADA
						</span>
						<span>
							<?php  echo $r->cardano->usd; ?>
						</span>
						<span>
							<?php echo number_format($r->cardano->usd_24h_change ,2); ?>
						</span>
					</div>
					<span></span>
				</div>
			</div>
		</nav>
		<!-- Stocks chart end -->


		<!-- Main page start -->
		<main>
			@yield('content')
		</main>
		<!-- Main page end -->

		<!-- footer start -->
		<footer>
			<div class="container mb-3">
				<div class="row">
					<div class="col-xl-2 col-md-4 col-sm-12 col-12 imgtopper">
						<img src="/images/icons/logo.png" alt="logo" />
					</div>
					<div class="col-xl-2 col-md-4 col-sm-6 col-6">
						<ul class="centered">
							<li class="active">
								<a href="/about">About us</a>
							</li>
							<li class="active">
								<a href="/contactus">Contact us</a>
							</li>
						</ul>
					</div>
					<div class="col-xl-2 col-md-4 col-sm-6 col-6">
						<ul class="centered">
							<li class="active">
								<a href="/vlogs">Vlog</a>
							</li>
							<li class="active">
								<a href="/blogs">Blog</a>
							</li>
							<li class="active">
								<a href="/merch">Merch</a>
							</li>
						</ul>
					</div>
					<div class="col-xl-3 col-md-6 col-12 pad-topper">
						<div>
							<label for="newsletter">Subscribe to our newsletter</label>
							<input type="email" name="sub_email" id="sub_email" class="mt-2 newsletter" placeholder="Email" />
							<button id="sub_btn" class="inside"><img src="/images/icons/subscribe.png" alt=""></button>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-12 pad-topper">
						<div>
							<?php
							$instagram = DB::table('social')->where('social_name', 'instagram')->first();
							$facebook = DB::table('social')->where('social_name', 'facebook')->first();
							$youtube = DB::table('social')->where('social_name', 'youtube')->first();
							$mail = DB::table('social')->where('social_name', 'mail')->first();
							?>
							<label>Follow us</label>
							<div class="socialmedia">
								@if($youtube->status)
								<a href="{{$youtube->social_url}}" target="_blank"><img src="/images/icons/youtube.png" alt="youtube icon" /></a>
								@endif
								@if($facebook->status)
								<a href="{{$facebook->social_url}}" target="_blank"><img src="/images/icons/facebook.png" alt="facebook icon" /></a>
								@endif
								@if($instagram->status)
								<a href="{{$instagram->social_url}}" target="_blank"><img src="/images/icons/instagram.png" alt="instagram icon" /></a>
								@endif
								@if($mail->status)
								<a href="mailto:{{$mail->social_url}}" target="_blank"><img src="/images/icons/mail.png" alt="mail icon" /></a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="foot col-12 mt-4">
				<div class="trademark">
					<p class="copyright">
						Crypto Nations<sup>TM</sup>, All Rights Reserved, 2022 &copy;
					</p>
				</div>
			</div>
		</footer>
	</div>
	<!-- footer end end -->

	@csrf
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

	<script src="../js/carouselshome.js"></script>

	<script src="https://cdn.jsdelivr.net/gh/igorlino/elevatezoom-plus@1.2.3/src/jquery.ez-plus.js"></script>



	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



	<script src="/js/cart.js"></script>
	<script>
		$('body').on('click', '#sub_btn', function() {
			var email = $('#sub_email').val();
			var token = document.getElementsByName('_token')[0];
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

			if (email.match(mailformat)) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': token.value
					}
				});
				$.ajax({
					type: "post",
					async: true,
					dataType: 'json',
					url: '/add_new_subscriber',
					data: {
						email: email,
					},
					success: function(data) {
						swal("Success!", "You subscribed to our newsletter!", "success");
					},
					error: function() {
						swal("Error!", "Could not add your email address!", "error");
					}
				});
			} else {
				alert('please enter a valid email address');
			}
		});
	</script>
	<script>
		function remove_from_cart(id) {
			var token = document.getElementsByName('_token')[0];
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': token.value
				}
			});
			$.ajax({
				type: "post",
				async: true,
				url: '/remove_from_cart',
				data: {
					id: id,
				},
				success: function(data) {
					console.log(data);
					$("#mySidenav").load(location.href + " #mySidenav>*", "");
					swal("Success!", "Product removed from cart", "success");

				},
				error: function(data) {
					console.log(data);
					swal("Error!", "Request failed", "warning");

				}
			});
		}
	</script>


</body>

</html>