<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
		/>

    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <title>Crypto Nation</title>
</head>

<body>

        <!-- Header bar start -->
        <header>
			<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
				>&times;</a
			>
			<h4 class="mariner">Shopping bag</h4>
			<div class="row mariner mt-5">
				<div class="col-12">dasdasd</div>
			</div>
		</div>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container flexer mb-1">
                    <a class="navbar-brand righter active" aria-current="page" href="/">
                        <img src="/images/icons/logo.png" alt="logo" class="img-logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample03">
                        <ul class="navbar-nav me-auto mb-2 mb-sm-0 mrgbg centered2">
                            <li class="nav-item ml-4">
                                <a class="nav-link lrg" href="/vlogs">Vlog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link lrg" href="/blogs">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link lrg" href="/merch">Merch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link lrg" href="about">About us</a>
                            </li>

                            <!-- <li class="nav-item">
        							<a
        								class="nav-link disabled"
        								href="#"
        								tabindex="-1"
        								aria-disabled="true"
        								>Disabled</a
        							>
        							</li> -->
                            <!-- <li class="nav-item dropdown">
        							<a
        								class="nav-link dropdown-toggle"
        								href="#"
        								id="dropdown03"
        								data-bs-toggle="dropdown"
        								aria-expanded="false"
        								>Dropdown</a
        							>
        							<ul class="dropdown-menu" aria-labelledby="dropdown03">
        								<li><a class="dropdown-item" href="#">Action</a></li>
        								<li><a class="dropdown-item" href="#">Another action</a></li>
        								<li>
        									<a class="dropdown-item" href="#">Something else here</a>
        								</li>
        							</ul>
        							</li> -->
                        </ul>
                        <ul class="navbar-nav me-auto mb-sm-0 centered2">
                            <li class="nav-item">
                                <a class="nav-link mdm mdmone" href="#"><img src="/images/icons/searchbtn.png"
                                        alt="logo" /></a>
                            </li>
                            <li class="nav-item ml-2">
                                <button class="nav-link mdm" onclick="openNav() ">
                                    <img src="/images/icons/cart.png" alt="logo" />
                                </button>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mdm" href="#"><img src="/images/icons/avatar.png" alt="logo" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header bar end -->

        <!-- Stocks chart start -->
        <nav class="navbar navig2 navbar-expand-lg navbar-light ">
            <div class="container-fluid white">
                <div>
                    <p>stocks charts here</p>
                </div>
            </div>
        </nav>
        <!-- Stocks chart end -->

    <!-- Main page start -->
    <main>
        @yield('content')
    </main>
    <!-- Main page end -->

    <!-- footer content start -->
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
							<input
								type="email"
								name="sub_email"
								id="sub_email"
								class="mt-2 newsletter"
								placeholder="Email"
							/>
							<button id="sub_btn">subscribe</button>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-12 pad-topper">
						<div>
							<label>Follow us</label>
							<div class="socialmedia">
								<a href=""
									><img src="/images/icons/linkedin.png" alt="linkedin icon"
								/></a>
								<a href=""
									><img src="/images/icons/facebook.png" alt="facebook icon"
								/></a>
								<a href=""
									><img src="/images/icons/instagram.png" alt="instagram icon"
								/></a>
								<a href=""><img src="/images/icons/mail.png" alt="mail icon" /></a>
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
    <!-- footer content end -->
@csrf
    	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="js/cart.js"></script>
		<script>
        $('body').on('click', '#sub_btn', function() {
        var email = $('#sub_email').val();
        var token =document.getElementsByName('_token')[0];
        if (email == 0) {
            alert('Please enter a valid email');
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

</body>

</html>