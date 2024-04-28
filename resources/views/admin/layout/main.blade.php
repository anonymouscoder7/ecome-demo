<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{auth()->user()->name}}</div>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span class="logo-name">Admin</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown">
                            <a href="/admin/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="/admin/dashboard" class="nav-link"><i data-feather="users"></i><span>Users</span></a>
                        </li>
                        <li class="menu-header">Category</li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Category</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/create-category">Create Category</a></li>
                                <li><a class="nav-link" href="/admin/category">Category</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Product</li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Product</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="chat.html">Create product</a></li>
                                <li><a class="nav-link" href="portfolio.html">Products</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Order</li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="box"></i><span>Order</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="email-inbox.html">New</a></li>
                                <li><a class="nav-link" href="email-compose.html">Pending</a></li>
                                <li><a class="nav-link" href="email-read.html">All</a></li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="#">Ecommerce</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->

    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>
    <!-- Page Specific JS File -->
    <script src="{{asset('backend/assets/js/page/index.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{asset('backend/assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('backend/assets/js/custom.js')}}"></script>
    <script src="{{asset('backend/assets/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/page/datatables.js')}}"></script>

</body>


</html>