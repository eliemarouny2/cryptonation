<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Crypto Nation</title>
</head>

<body>

    <!-- header start -->
    <header>

        <!-- Header bar end -->
        <nav class="navbar navig1 navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand home white" href="#">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item title">
                            <a class="nav-link white" href="#">Vlog</a>
                        </li>
                        <li class="nav-item title">
                            <a class="nav-link white" href="#">Blog</a>
                        </li>
                        <li class="nav-item title">
                            <a class="nav-link white" href="#">Merch</a>
                        </li>
                        <li class="nav-item title">
                            <a class="nav-link white" href="#">About us</a>
                        </li>
                        <li class="nav-item neg-mt">
                            <a class="nav-link white" href="#"><img src="/images/icons/cart.png" alt="cart image"
                                    width="50" height="50"></a>
                        </li>
                        <li class="nav-item title dropdown ">
                            <a class="nav-link dropdown- neg-mt white" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/images/icons/cart.png" alt="cart image" width="50" height="50"></a>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">item 1</a></li>
                                <li><a class="dropdown-item" href="#">item 2</a></li>
                                <li><a class="dropdown-item" href="#">item 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item neg-mt">
                            <a class="nav-link white" href="#"><img src="/images/icons/cart.png" alt="cart image"
                                    width="50" height="50"></a></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header bar end -->

        <!-- Stocks chart start -->
        <nav class="navbar navig2 navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid white">
                <div>
                    <p>stocks charts here</p>
                </div>
            </div>
        </nav>
        <!-- Stocks chart end -->

    </header>
    <!-- header start -->

    <!-- Main page start -->
    <main>
        @yield('content')
    </main>
    <!-- Main page end -->

    <!-- footer content start -->
    <footer>
        <nav class="navbar navig1 navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand home white" href="#">Home</a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link white" href="#">Vlog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link white" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link white" href="#">Merch</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </footer>
    <!-- footer content end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>