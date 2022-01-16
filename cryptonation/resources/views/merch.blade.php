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

		<section class="hero-banner2">
			<div class="container-fluid">
				<h1>Unique T-shirts</h1>
				<div id="owl-demo-1" class="owl-carousel owl-theme">
					<div class="card">
						<div class="item" >
							<div class="content2 mt-5">
								<img src="images/products/1641123160.png" />
							</div>
							<div class="content3">
								<img src="images/icons/ellipse.png"/>
							</div>
						</div>
						<p class="tshirt-name">
							Lorem ipsum
						</p>
						<p class="price"> 60$ </p>
						<button class="add-to-cart"> Add to cart </button>
					</div>
					<div class="card">
						<div class="item" >
							<div class="content2 mt-5">
								<img src="images/products/1641123182.png" />
							</div>
							<div class="content3">
								<img src="images/icons/ellipse.png"/>
							</div>
						</div>
						<p class="tshirt-name">
								Lorem ipsum
						</p>
						<p class="price"> 60$ </p>
						<button class="add-to-cart"> Add to cart </button>
					</div>
					<div class="card">
						<div class="item" >
							<div class="content2 mt-5">
								<img src="images/products/1641123148.png" />
							</div>
							<div class="content3">
								<img src="images/icons/ellipse.png"/>
							</div>
						</div>
						<p class="tshirt-name">
								Lorem ipsum
						</p>
						<p class="price"> 60$ </p>
						<button class="add-to-cart"> Add to cart </button>
					</div>
				</div>
			</div>
		</section>
		<section class="shirt-details-component">
			<div class="container leftDiv">
					<div class="row">
						<img class="col-2 left-arrow" src="images/icons/white-arrowCHANGEME.png">
						<img class="col-8 center-tshirt" src="images/products/1641123148.png">
						<img class="col-2 right-arrow" src="images/icons/white-arrowCHANGEME.png">
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
				<h1 class="row bluish ">Limited edition</h1>
				<div class="row">
					<p class="bet-to-own stocks-bet price-row"> Bet on this item to own it </p>
				</div>
				<div class="row">
					<img src="images/icons/aaaaa.png" class="col-6">
					<div class="col-6">
						<img src="images/icons/aaaaa.png" class="stocks-bet">
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
						<img class="element-to-bet col-12" src="images/products/1641123148.png">
					</div>
			</div>

		<</section>

		<section>
			Cart({{Cart::content()->count()}})
				@csrf
			<button id="add_to_cart">add to cart</button>
		</section>


		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
			integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
			crossorigin="anonymous"
		></script>
				<script>
        $('body').on('click', '#add_to_cart', function() {
			alert('hello1');
        var token =document.getElementsByName('_token')[0];
		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token.value
    }
});
        $.ajax({
            type: "post",
            async: true,
        dataType:'json',

            url: '/add_new_subscriber',
            data: {email:email,
			},
            success: function(data) {
				swal("Success!", "You subscribed to our newsletter", "success");
            },
            error: function() {
               swal("Good job!", "You clicked the button!", "success");
            }
        });
    });
		</script>
@endsection