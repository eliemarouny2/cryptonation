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


<section class="merchsection mt-5">
    <div class="container">
        <h1 class="uniqueshirts">Unique T-shirts</h1>
    </div>
</section>

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
        data: {
            email: email,
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