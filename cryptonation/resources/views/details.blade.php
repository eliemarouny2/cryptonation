@extends('layouts.base')
@section('content')


<?php print_r($similars); ?>

@foreach($similars as $similar)
echo 'hii';
@endforeach

@if(count($similars) >= 1)
<section class="hero-banner2">
   <div class="container-fluid mb-5">
      <h1>Caps collection</h1>
      <div id="owl-demo-8" class="owl-carousel owl-theme">

         @foreach($similars as $cap)
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

@endsection