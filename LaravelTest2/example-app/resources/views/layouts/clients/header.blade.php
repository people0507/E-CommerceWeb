<!DOCTYPE html>
<html lang="en">
@php
    \Illuminate\Pagination\Paginator::useBootstrap();
@endphp

<head>
    <meta charset="utf-8">
    <title>ISHEEP WORLD</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="icon" href="{{ asset('images/pages/cart_icon.png') }}" type="image/x-icon" sizes="16x16">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/users/style.css')}}">
     <!-- Libraries Stylesheet -->
    <link href="{{asset('css/users/owl.carousel.min.css')}}" rel="stylesheet">
</head>

<body class ="cartpage">
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                    @if (session('success'))
                    <div class="alert success-alert">
                        {{ session('success') }}
                    </div>

                    <style>
                        .alert {
                            padding: 10px;
                            border-radius: 4px;
                            font-weight: bold;
                            margin-bottom: 10px;
                        }

                        .success-alert {
                            background-color: #4CAF50;
                            color: #ffffff;
                        }
                    </style>

                    <script>
                        setTimeout(function() {
                            document.querySelector('.alert').style.display = 'none';
                        }, 3000); 
                    </script>
                @endif
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if(Auth::check())
                        <a href="{{ route('client.edit') }}"><button class="dropdown-item" type="button">My Profile</button></a>
                        <form action="{{ route('auth.logout') }}" method="post">
                        @csrf
                        <a href="{{ route('auth.logoutuser') }}"><button class="dropdown-item" type="button">Logout</button></a>
                    </form>
                    @else
                        <a href="{{ route('auth.loginuser') }}"><button class="dropdown-item" type="button">Sign in</button></a>
                        <a href="{{ route('auth.register') }}"><button class="dropdown-item" type="button">Register</button></a>
                        @endif
                        </div>
                    </div>
                   
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="{{ route('client.homepage') }}" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Isheep</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">World</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="{{route('client.shopsearch')}}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products" name ="query" >
                        <button type="submit" class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                    </button>
                    </div>
                </form>
            </div>
            @if(Auth::check())
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer is logged in</p>
                <h5 class="m-0">{{ Auth::user()->detail->userdetail_fullname }}</h5>
            </div>
            @endif
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            

            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('client.homepage') }}" class="nav-item nav-link">Home</a>
                            <a href="{{ route('client.shoppage') }}" class="nav-item nav-link">Shop</a>
                            <a href="{{ route('client.contactpage') }}" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="{{ route('client.cartpage') }}" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                @if(session()->get('cart')==null)
                                <span class="badge text-secondary border border-secondary rounded-circle cart-item-count" style="padding-bottom: 2px;">0</span>
                                @else
                                <span class="badge text-secondary border border-secondary rounded-circle cart-item-count" style="padding-bottom: 2px;">{{ count(session()->get('cart')) }}</span>
                                @endif
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    
    <!-- Navbar End -->