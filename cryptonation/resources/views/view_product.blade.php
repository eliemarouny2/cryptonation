@extends('layouts.base')
@section('content')


<section class="shirt-details-component">
   <div class="container leftDiv">
      <div class="row custom001">
         <img class="col-2 left-arrow" src="/images/icons/left.png">
         <img class="col-8 center-tshirt" src="/images/products/1641123148.png">
         <img class="col-2 right-arrow" src="/images/icons/right.png">
      </div>
      <div class="row small-tshirts">
         <img class="col-3 zoomed-tshirts" src="/images/products/1641123148.png">
         <img class="col-3 zoomed-tshirts" src="/images/products/1641123148.png">
         <img class="col-3 zoomed-tshirts" src="/images/products/1641123148.png">
         <img class="col-3 zoomed-tshirts" src="/images/products/1641123148.png">
      </div>
   </div>
   <div class="rightDiv">
      <p class="row tshirt-title"> {{$product->prod_name}} </p>
      <p class="row tshirt-description">
         {{$product->prod_description}}
      </p>
      <div class="row price-row">
         <p class="col-4 td-price"> Price </p>
         <p class="col-4 nb-price"> {{$product->prod_price}}$ </p>
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


@if(count($similars) > 1)
<section class="hero-banner2">
   <div class="container-fluid">
      <h1>More like this</h1>
      <div id="owl-demo-1" class="owl-carousel owl-theme">
         @foreach($similars as $similar)
         <div class="card centered2">
            <div class="item2" id="{{$similar->prod_id}}">
               <div class="content2 mt-5">
                  <img src="/images/products/{{$similar->prod_img_url}}" alt="{{$similar->prod_name}}" />
               </div>
               <div class="content3">
                  <img src="/images/icons/ellipse.png" alt="ellipse" />
               </div>
               <div class="price-name centered2">
                  <p class="tsimilar-name centered2">
                     {{$similar->prod_name}}
                  </p>
                  <p class="price centered2"> {{$similar->prod_price}} $ </p>


               </div>

               </button>

            </div>
            <button class="add-to-cart price-name2" onclick="add_to_cart('{{$similar->prod_id}}')"> Add to cart
         </div>

         @endforeach
      </div>
   </div>
</section>
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