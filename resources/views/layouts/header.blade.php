<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <title>iTouch | The World Of Gadgets</title>
</head>
<style>
    .itouch {
        color: rgba(5, 110, 110, 0.753);
    }

    .itouch:hover {
        color: rgba(6, 153, 153, 0.753);
    }

    .navitem {
        color: rgb(136, 173, 173)
    }

    .navitem:hover {
        color: rgb(96, 147, 160);
        font-weight: bold;
    }

    .m-name:hover {
        color: rgb(243, 241, 241);
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky sticky-top my-0 opacity-95">
        <div class="container-fluid">
            <a class="navbar-brand mx-3 itouch" title="iTouch" href="{{ url('/') }}"><b>iTouch</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link ms-3 navitem" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navitem ms-3" aria-current="page"
                            href="{{ url('/catalogue') }}">Catalogue</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navitem ms-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Explores
                        </a>
                        <ul class="dropdown-menu opacity-75">
                            <li><a class="dropdown-item " href="{{ url('/search?search=Mobile') }}">Mobiles</a></li>
                            <li><a class="dropdown-item" href="{{ url('/search?search=Laptop') }}">Laptops</a></li>
                            <li><a class="dropdown-item" href="{{ url('/search?search=Headphones') }}">Headphones</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/search?search=Earbuds') }}">Earbuds</a></li>
                            <li><a class="dropdown-item" href="{{ url('/search?search=Watch') }}">Watch</a></li>
                            <li><a class="dropdown-item" href="{{ url('/search?search=television') }}">Television</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navitem ms-3" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navitem ms-3" href="{{ url('/about') }}">About Us</a>
                    </li>

                </ul>
                <!-- <form action="{{ url('/search') }}" method="GET" class="d-flex" role="search">
                    <input class="form-control me-2 h-50 rounded-pill " name="search" id="search" type="search"
                        placeholder="&#128269;Search iTouch" aria-label="Search">
                </form> -->
                
                <a class=" mx-2 text-dark dec-none heart d-none d-lg-block" title="" href="tel:+919999999999">&#9990; <span
                        style="font-size: 14px" >+91 9999999999</span> </a>

                @if (Route::has('login'))
                    @auth
                        <a class=" mx-2 text-dark dec-none heart position-relative d-none d-lg-block" title="Wishlist"
                            href="{{ url('/showwishlist') }}">&#9825;
                        </a>
                        </a>
                        <a class=" mx-2 dec-none  position-relative d-none d-lg-block" title="Cart" href="{{ url('/viewcart') }}"
                            id="cart">&#128722;
                            <?php
                            $cartnotifications = DB::table('carts')
                                ->where('u_id', '=', @Auth::user()->id)
                                ->count();
                            ?>

                            @if ($cartnotifications > 0)
                                <span id="notification"
                                    class="d-none d-lg-block position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartnotifications }}<span class="visually-hidden">unread messages</span>
                                </span>
                        </a>
                    @endif

                    <a class="text-secondary dec-none d-none d-lg-block" href="{{ url('/profile') }}"><b>{{ @Auth::user()->name }}</b></a>
                    <img data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                            src="{{ asset('images/d-user.jpg') }}" title="" class="d-none d-lg-block rounded-circle mx-2"
                            style="cursor: pointer" height="40px" width="45px" alt="">
                @else
                    <a class="badge bg-secondary mx-2 d-none d-lg-block" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="badge bg-secondary d-none d-lg-block" href="{{ route('register') }}">Sign
                            Up</a>
                    @endif
                @endauth
                @endif

                <div>


                </div>

            </div>
        </div>

    </nav>
    <nav class="d-lg-none  nav justify-content-end">
        <a class=" mx-2 text-dark dec-none heart " title="" href="tel:+919999999999">&#9990;  </a>

    @if (Route::has('login'))
        @auth
            <a class=" mx-2 text-dark dec-none heart position-relative" title="Wishlist"
                href="{{ url('/showwishlist') }}">&#9825;
            </a>
            </a>
            <a class=" mx-2 dec-none  position-relative" title="Cart" href="{{ url('/viewcart') }}"
                id="cart">&#128722;</a>
                <?php
                $cartnotifications = DB::table('carts')
                    ->where('u_id', '=', @Auth::user()->id)
                    ->count();
                ?>

                @if ($cartnotifications > 0)
                    <span id="notification"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cartnotifications }}<span class="visually-hidden">unread messages</span>
                    </span>
            </a>
        @endif

        <img data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                src="{{ asset('images/d-user.jpg') }}" title="" class="rounded-circle mx-2"
                style="cursor: pointer" height="40px" width="45px" alt="">
    @else
        <a class="badge bg-secondary mx-2" href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
            <a class="badge bg-secondary" href="{{ route('register') }}">Sign
                Up</a>
        @endif
    @endauth
    @endif
    </nav>
    <nav>
    <form action="{{ url('/search') }}" method="GET" class="col-md-5  mx-auto my-1 " role="search">
                    <input class="form-control  h-50 rounded " name="search" id="search" type="search"
                        placeholder="&#128269;Search iTouch" aria-label="Search">
                </form>
    </nav>
    <nav>
        <ul class="nav justify-content-center border bg-dark-subtle">
            <?php
            $manufacturers = App\Models\Manufacturer::all();
            ?>
            @foreach ($manufacturers as $manufacturer)
                <li class="nav-item">
                    <a class="nav-link  text-light" aria-current="page" href="/product/{{ $manufacturer->id }}"><b
                            class="m-name">{{ $manufacturer->name }}</b></a>
                </li>
            @endforeach

        </ul>
    </nav>
    <marquee class="m-0 p-0 bg-light" behavior="scroll" direction="left" scrollamount="6"
        style="color: rgba(24, 70, 77, 0.479)"><b>Welcome to iTouch Electronics &nbsp;&nbsp;&nbsp;&nbsp; |
            &nbsp;&nbsp;&nbsp;&nbsp;
            The world Of Gadgets &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; The Era Of Technology
            &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; Best Service Available &nbsp;&nbsp;&nbsp;&nbsp; |
            &nbsp;&nbsp;&nbsp;&nbsp; Get different types Of Electronic Items</b></marquee>





    <div class="offcanvas offcanvas-end bg-secondary-subtle opacity-95" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <img src="{{ asset('images/d-user.jpg') }}" id="offcanvasRightLabel" title=""
                class="rounded-circle mx-2 offcanvas-title" style="cursor: pointer" height="60px" width="60px"
                alt="">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h4 class="user"><b>{{ @Auth::user()->name }}</b></h4>
            <h6 class="user"><b>{{ @Auth::user()->email }}</b></h6>
            <h6 class="user"><b>
                    @if (@Auth::user()->role == 1)
                        <a class="user dec-none " href="{{ url('index') }}"><b>Dashboard</b></a>
                    @endif
                </b></h6>
            <ul class="my-5">
                <li><a href="" class="dec-none">All Returns</a></li>
                <li><a href="" class="dec-none">Address Details</a></li>
                <li><a href="" class="dec-none">Bank Details</a></li>
                <li><a href="" class="dec-none">Refer This Site</a></li>
                <li><a class="dec-none" href="{{ url('/profile') }}">Edit Profile</a></li>
                <li><a href="" class="dec-none">Switch Account</a></li>
            </ul>
            <a class="badge bg-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>