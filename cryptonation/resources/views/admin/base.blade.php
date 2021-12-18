<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/admin/css/bootstrap.css">
    <link rel="stylesheet" href="/admin/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="/admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/admin/css/app.css">
    <link rel="stylesheet" href="/admin/css/styles.css">
    <link rel="shortcut icon" href="/admin/images/favicon.svg" type="image/x-icon">

    <title>Admin</title>
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item active ">
                            <a href="/panel" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="triangle" width="20"></i>
                                <span>Categories</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="/manage_categories">Manage Categories</a></li>
                                <li><a href="/add_category">Add Category</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Products</span>
                            </a>
                            <ul class="submenu ">
                                <li><a href="/manage_products">Manage Products</a></li>
                                <li><a href="/add_product">Add Product</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file-plus" width="20"></i>
                                <span>Blogs</span>
                            </a>
                            <ul class="submenu ">
                                <li><a href="/manage_blogs">Manage Blogs</a></li>
                                <li><a href="/add_blog">Add Blog</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Vlogs</span>
                            </a>
                            <ul class="submenu ">
                                <li><a href="/manage_vlogs">Manage Vlogs</a></li>
                                <li><a href="/add_vlog">Add Vlog</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Customers</span>
                            </a>
                            <ul class="submenu ">
                                <li><a href="/manage_customers">Manage Customers</a></li>
                                <li><a href="/add_customer">Add Customer</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="image" width="20"></i>
                                <span>Image Gallery</span>
                            </a>
                            <ul class="submenu ">
                                <li><a href="/manage_images">Manage Images</a></li>
                                <li><a href="/add_image">Add Image</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item ">
                            <a href="/manage_biddings" class='sidebar-link'>
                                <i data-feather="trending-up" width="20"></i>
                                <span>Bidding</span>
                            </a>
                        </li>
                        <li class='sidebar-title'>Web Settings</li>
                        <li class="sidebar-item  ">
                            <a href="/manage_aboutus" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>About</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="/manage_mission" class='sidebar-link'>
                                <i data-feather="layers" width="20"></i>
                                <span>Our Mission</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="/manage_settings" class='sidebar-link'>
                                <i data-feather="settings" width="20"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('admincontent')

        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Cryptonation</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="/admin/js/feather-icons/feather.min.js"></script>
    <script src="/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/admin/js/app.js"></script>
    <script src="/admin/vendors/chartjs/Chart.min.js"></script>
    <script src="/admin/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="/admin/js/pages/dashboard.js"></script>
    <script src="/admin/js/main.js"></script>
</body>


</body>

</html>