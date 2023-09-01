<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <link rel="icon" href="{{ asset('images/pages/cart_icon.png') }}" type="image/x-icon" sizes="16x16">
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('css/admins/styles.css')}}">
    
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    


    
    <title>Dashboard | NDN Admin</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">ISHEEPWORLD</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="{{ asset('images/users/' . Auth::user()->detail->userdetail_avatar) }}" alt="">
                    <a href="#" onclick="profileToggle()" class="font-bold text-white p-2 no-underline hidden md:block lg:block">{{ Auth::user()->detail->userdetail_fullname }}</a>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                        <ul class="list-reset">
                          <li><a href="{{ route('userdetail.edit') }}" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My Profile</a></li>
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                          <li><hr class="border-t mx-2 border-grey-ligght"></li>
                          <li><a href="{{ route('auth.logout') }}" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--/Header-->

        
        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <li class="menu-item w-full h-full py-3 px-2 border-b border-light-border ">
                        <a href="{{ route('dashboard.index')}}"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-down float-right"></i></span>
                        </a>
                    </li>
                    <li class="menu-item w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="#"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            Product 
                            <span><i class="fa fa-angle-down float-right"></i></span>
                        </a>
                        <ul class="submenu list-reset -mx-2 bg-white-medium-dark">
                            <li class="submenu-item border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                <a href="{{ route('category.index') }}"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Category Infomation
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="submenu-item border-t border-light-border w-full h-full px-2 py-3">
                                <a href="{{ route('producer.index') }}"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Producer Infomation
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="submenu-item border-t border-light-border w-full h-full px-2 py-3">
                                <a href="{{ route('product.index') }}"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Product Infomation
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="#"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-grip-horizontal float-left mx-2"></i>
                            User 
                            <span><i class="fa fa-angle-down float-right"></i></span>
                        </a>
                        <ul class="submenu list-reset -mx-2 bg-white-medium-dark">
                            <li class="submenu-item border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                <a href="{{ route('user.index') }}"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    User Account
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="submenu-item border-t border-light-border w-full h-full px-2 py-3">
                                <a href="{{ route('role.index') }}"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    User Role
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="submenu-item border-t border-light-border w-full h-full px-2 py-3">
                                <a href="{{ route('userdetail.index') }}"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    User Detail
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="#"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                           <i class="fas fa-table float-left mx-2"></i>
                            Order 
                            <span><i class="fa fa-angle-down float-right"></i></span>
                        </a>
                        <ul class="submenu list-reset -mx-2 bg-white-medium-dark">
                            <li class="submenu-item border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                <a href="{{ route('order.index') }}"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Customer Order
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                   
                    
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->