<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="canonical" href="{{ url('https://demo-basic.adminkit.io/') }}" />

    <title>Admin - iTouch Electronics</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap') }}"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" >
                    <span class="align-middle">iTouch - {{@Auth::user()->name}} </span>
                </a>

                <ul class="sidebar-nav">
                    

                    

                    


                    <li class="sidebar-header">
                        Stock Management
                    </li>
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('operation') }}">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Inventory</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('add-new-manufacturer') }}">
                            <i class="align-middle" data-feather="square"></i> <span class="align-middle">Add New
                                Manufacturer</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('add-new-product') }}">
                            <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Add New
                                Product</span>
                        </a>
                    </li>


                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('trending') }}">
                            <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Manage
                                Trending</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('view-orders') }}">
                            <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Manage
                                Order Detail</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('view-delivered-orders') }}">
                            <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">
                                Delivered Orders </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('logout') }}">
                            <i class="align-middle" data-feather="align-left"></i> <span class="align-middle"><button class="badge bg-danger">Log out</button></span>
                        </a>
                    </li>







                </ul>


            </div>
        </nav>
        <script src="public\js\app.js"></script>
        <script src="public\js\app.js.map"></script>
