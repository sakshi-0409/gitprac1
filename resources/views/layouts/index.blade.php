@extends('main')
@section('main-section')
    <?php
    $trendings = App\Models\Trendings::all();
    ?>
    <style>
        h2,
        h3,
        h1,
        p {
            color: rgba(36, 81, 83, 0.692);
        }

        h4 {
            color: cadetblue;
            font-weight: bold;
        }

        li {
            color: darkcyan;
            cursor: pointer;
        }

        li:hover {
            color: rgb(36, 62, 83);
            padding-left: 6px;
        }
        .trend{
            /* background-image: url('images/trend-bg.gif');
            background-repeat: no-repeat;
            background-size: cover; */
            background-color: white;
        }
      
    </style>
    <div class="row d-flex flex-wrap">
        <div class="col d-none d-md-block d-lg-block">
            <img src="{{ asset('images/mob-laptop.webp') }}" class="my-0 row mx-0 absolute top-0 inline h-100 w-100 home-img left-animation">
        </div>
        <div class="col py-5 my-5 mx-3">
            <h3 class="top-animation">Welcome to </h3> <br>
            <h1><b class="bottom-animation">iTouch electronics </b></h1>
            <p class="bottom-animation">The world of Gadgets | Best Service | Branded Electronic Items</p><button class="badge bg-secondary bottom-animation"><a 
                    href="{{ url('/contact') }}" class="text-light dec-none ">Contact us!</a></button>
        </div>
    </div>
    </div>
    <hr class="py-0 my-0">

    <section class="trend pb-5 bg-secondary-subtle">
        <h2 class="text-center pt-3 pb-5 "><b>TRENDING</b></h2>

        <div class="row g-3 m-2 ">
            <div class="col-md-3 bg-body-secondary opacity-75 shadow-lg ">
                <h4 class=" mx-5 my-3 d-none d-lg-block d-md-block">Key Products</h4>
                <ul>
                    <li class="mx-5 d-none d-lg-block d-md-block">Mobile Phones</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Laptops</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Lcd Monitor</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Tablet</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Monitor</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Touch Pads</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Keyboard</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Home Theater</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Speakers</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Watches</li>
                </ul>
                <br>
                <ul>
                    <li style="list-style: none "><b>Search by color:</b></li>
                    <a type="button" href="{{ url('/search?search=red') }}" class="bg-danger px-1 rounded border border-secondary dec-none text-light">Red</a>
                    <a type="button" href="{{ url('/search?search=blue') }}" class="bg-info  px-1 rounded border border-secondary dec-none text-light">Blue</a>
                    <a type="button" href="{{ url('/search?search=black') }}" class="bg-dark px-1  rounded border border-secondary dec-none text-light">Black</a><br>
                    <a type="button" href="{{ url('/search?search=white') }}" class="bg-light  px-1 rounded border border-secondary dec-none text-dark">White</a>
                    <a type="button" href="{{ url('/search?search=yellow') }}" class="bg-warning px-1  rounded border border-secondary dec-none text-light">Yellow</a>
                    <a type="button" href="{{ url('/search?search=green') }}" class="bg-success px-1  rounded border border-secondary dec-none my-1 text-light">Green</a><br>
                    <a type="button" href="{{ url('/search?search=pink') }}" style="background-color: palevioletred" class=" px-1  rounded border border-secondary dec-none my-1 text-light">Pink</a>
                    <a type="button" href="{{ url('/search?search=gray') }}" style="background-color: grey" class=" px-1  rounded border border-secondary dec-none my-1 text-light">Gray</a>
                   
                      
                    </li>
                </ul>
            </div>
            

            <div class="col-md-6 col-sm-12">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-sm-2 g-4">
                        @foreach ($trendings as $trending)
                            <div class="col " style="cursor: pointer">
                                <div class="card h-100">
                                    <img class="cat-img rounded" src="{{ asset('images/' . $trending->p_image) }}" height="200px"
                                        class="card-img-top" alt="...">
                                    <div class="card-body bg-secondary-subtle">
                                        <h5 class="card-title text-secondary"><a href="{{ url('/catalogue') }}"
                                                class="dec-none text-secondary"><b>{{ $trending->p_name }}</b></a></h5>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bg-body-secondary opacity-75 shadow-lg">
                <h4 class="mx-5 my-3 d-none d-lg-block d-md-block">Best In Us</h4>
                <ul>
                    <li class="mx-5 d-none d-lg-block d-md-block">Service within 12 hrs</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Good Marketplace</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Delivery within 24 hrs</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Maximum number of brands</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Customer Trust</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Available Latest Models</li>
                    <li class="mx-5 d-none d-lg-block d-md-block">Branches in different cities</li>

                <ul>
                    {{-- <li style="list-style: none"><b>Apply Filter:</b></li> --}}
                    <li class="mt-3 justify-content-center"> <b>Apply Price Filter: </b>
                        <ul class=" opacity-75">
                            <li><a class="text-dark dec-none" href="{{ url('/search?search=5000') }}">Under 5,000/-</a></li>
                            <li><a class="text-dark dec-none" href="{{ url('/search?search=10000') }}">Under 10,000/-</a></li>
                            <li><a class="text-dark dec-none" href="{{ url('/search?search=20000') }}">Under 20,000/-</a>
                            </li>
                            <li><a class="text-dark dec-none" href="{{ url('/search?search=25000') }}">Under 25,000/-</a></li>
                            <li><a class="text-dark dec-none" href="{{ url('/search?search=50000') }}">Under 50,000/-</a></li>
                            <li><a class="text-dark dec-none" href="{{ url('/search?search=75000') }}">Under 75,000/-</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

    </section>
@endsection
