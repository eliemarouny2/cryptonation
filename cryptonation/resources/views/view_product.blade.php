@extends('layouts.base')
@section('content')

<div class="row mt-5">
   <div class="col-12 col-lg-6">
      <div class="row">
         <div class="col-2 flexer">
            <img class="left-arrow v-align" src="/images/icons/left.png">
         </div>
         <div class="col-8">
            <img class="center-tshirt w-100 rel-001" id="<?php echo $product->prod_id; ?>" src="/images/products/{{$product->prod_img_url}}" data-zoom-image="images/products/{{$product->prod_img_url}}">
            <div class="row small-tshirts" id="gal<?php echo $product->prod_id; ?>">
               @foreach($galleries as $gallery)
               <div class="col me-2 zoomed-tshirts">
                  <a href="#" data-image="" data-zoom-image="">
                     <img class="w-100 img-small" id="<?php echo $product->prod_id; ?>" src="/image_gallery/{{$gallery->img_url}}">
                  </a>
               </div>
               @endforeach
            </div>
         </div>
         <div class="col-2 flexer">
            <img class="right-arrow v-align" src="/images/icons/right.png">

         </div>
      </div>

   </div>

   <div class="col-12 col-lg-6 pt-4 descript">
      <div class="row">
         <div class="col-12">
            <h4 class="row tshirt-title">{{$product->prod_name}}</h4>
         </div>
         <div class="col-12">
            <span class="row tshirt-description">
               {{$product->prod_description}}
            </span>
         </div>
         <div class="col-12">
            <div class="row price-row mb-4">
               <span class="col-4 td-price">Price</span>
               <span class="col-4 nb-price">{{$product->prod_price}} $</span>
               <span class="col-4 td-price">Color</span>
            </div>
         </div>
         <?php
         $mm = 0;
         $mf = 100;
         $colors = explode(',', $product->colors);
         $variants = explode(',', $product->variants); ?>
         <div class="col-12 resp-disp">
            <div class="row">
               <div class="col-4 sizes">
                  @if($product->variants)
                  <div class="radio">
                     @foreach($variants as $variant)
                     <input label="{{$variant}}" type="radio" id="sele-{{$mm}}" name="select-{{$product->prod_id}}" value="{{$variant}}">
                     <?php $mm++; ?>
                     @endforeach
                  </div>
                  @endif
               </div>
               <div class="col-4">
                  <div class="row">
                     <div class="col-3"><button class="operator" onclick="var result<?php echo $product->prod_id; ?> = document.getElementById('sst<?php echo $product->prod_id; ?>'); var sst<?php echo $product->prod_id; ?> = result<?php echo $product->prod_id; ?>.value; if(sst<?php echo $product->prod_id; ?>>1)result<?php echo $product->prod_id; ?>.value--">-</button></div>
                     <div class="col-3"><input class="quantity-count" name="qty" id="sst<?php echo $product->prod_id; ?>" value="1" min="1"></div>
                     <div class="col-3"><button class="operator" onclick="var result<?php echo $product->prod_id; ?> = document.getElementById('sst<?php echo $product->prod_id; ?>'); var sst<?php echo $product->prod_id; ?> = result<?php echo $product->prod_id; ?>.value;result<?php echo $product->prod_id; ?>.value++">+</button></div>
                  </div>
               </div>
               @if($product->colors)
               <div class="col-4 sizes">
                  <div class="radio">
                     @foreach($colors as $color)
                     <input type="radio" value="{{$color}}" class="color-radio" id="color-{{$mf}}" style="background-color:<?php echo $color; ?> !important;color:<?php echo $color; ?> !important;" name="colo-{{$product->prod_id}}" value="">
                     <?php $mf++; ?>
                     @endforeach
                  </div>
               </div>
               @endif
            </div>

         </div>
         <div class="row  resp-disp mt-5">
            <button onclick="add_to_cart(<?php echo $product->prod_id; ?>)" class="add-to-cart2 buy-now col-6">Add to cart</button>
         </div>
      </div>
   </div>



   @if(count($similars) > 1)
   <section class="hero-banner2 mb-5">
		<div class="container-fluid">
			<h1 class="width-word2">More like this</h1>
			<div id="owl-demo-1" class="owl-carousel owl-theme">
				@foreach($similars as $similar)
				<div class="card" id="{{$similar->prod_id}}">
							<a href="/view_product/{{$similar->prod_id}}">
								<div class="content2 mt-5">
									<img src="/images/products/{{$similar->prod_img_url}}" alt="{{$similar->prod_name}}" class="centered-image custom-img-009" />
								</div>
							</a>
							<div class="centered2">
								<p class="tshirt-name">
									{{$similar->prod_name}}
								</p>
								<p class="price"> {{$similar->prod_price}}$ </p>
							</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
</div>
@endif




<!-- <section>
			Cart({{Cart::content()->count()}})
				@csrf
			<button id="add_to_cart">add to cart</button>
		</section> -->



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