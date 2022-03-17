@extends('layouts.base')
@section('content')
<div class="row mt-5">
	<section class="hero-banner2 mb-5">
		@if(count($products)>0)
		<div class="container-fluid">
			<h1 class="width-word2">top search</h1>
			<div id="owl-demo-1" class="owl-carousel owl-theme">
				@foreach($products as $product)
				<div class="card" id="{{$product->prod_id}}">
					<a href="/view_product/{{$product->prod_id}}">
						<div class="content-search mt-5">
							<img src="/images/products/{{$product->prod_img_url}}" alt="{{$product->prod_name}}" class="centered-image custom-img-009 custom-search" />
						</div>
					</a>
					<div class="centered2">
						<p class="tshirt-name">
							{{$product->prod_name}}
						</p>
						<p class="price"> {{$product->prod_price}}$ </p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		@else
		<p class="text-center w-100 mt-5">It looks like there are no products that match your search</p>
		<div class="text-center">
			<a class="backhome-btn mt-4 mb-5" href="/">Back to home page</a>
		</div>
		@endif
	</section>
</div>


@endsection