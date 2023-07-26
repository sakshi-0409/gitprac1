@extends('main')
@section('main-section')
    <?php
    $products = App\models\Cart::where('u_id', '=', @Auth::user()->id)->get();
    $amount = App\models\Cart::where('u_id', '=', @Auth::user()->id)->sum('dis_price');
    $empty = true;
    ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: rgba(230, 235, 236, 0.753)
        }

        .min-height {
            min-height: 250px;
        }

        .curve,
        .p-img {
            border-radius: 3px;
        }

        .p-img:hover {
            scale: 1.5;
        }
    </style>

    <h4 class="text-center text-secondary my-3"><b>Cart</b> &#128722; - {{ @Auth::user()->name }}</h4>



    <div class="container ">
    <div class="table-responsive">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th class=" bg-secondary-subtle" scope="col"></th>
                    <th class="bg-secondary-subtle " scope="col">Brand</th>
                    <th class=" bg-secondary-subtle" scope="col">Product Name</th>
                    <th class="bg-secondary-subtle " scope="col">Image</th>
                    <th class=" bg-secondary-subtle" scope="col">Description</th>
                    <th class="bg-secondary-subtle " scope="col">Price</th>
                    <th class="bg-secondary-subtle " scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <?php $empty = false; ?>
                    
                    <tr class="tdata">
                        <th class="bg-secondary-subtle " scope="row">></th>
                        <td class="id" data-id="{{ $product->id }}" hidden></td>
                        <td class=" bg-secondary-subtle"><?php $manufacturer = App\Models\Manufacturer::find($product->m_id); ?> {{ $manufacturer->name }}</td>
                        <td class="bg-secondary-subtle">{{ $product->p_name }}<?php $available = App\Models\Products::find($product->p_id); ?> @if(!$available) <span class="text-danger">&nbsp; Currently Unavailable </span> @endif </td>
                        <td class=" bg-secondary-subtle "><img class="p-img" title="{{ $product->p_name }}"
                                src="{{ asset('images/' . $product->p_image) }}" height="50px" width="50px"
                                alt="img"></td>
                        <td class=" bg-secondary-subtle">{{ $product->des }}</td>
                        <td class="bg-secondary-subtle ">{{ $product->dis_price }}</td>
                        <td class=" bg-secondary-subtle">
                           <a class="text-light badge bg-dark dec-none"
                                    href="{{ url('/buy') }}/{{ $product->p_id }}">Buy Now &#128717;</a>
                            <?php $wishexist = DB::table('wishlists')
                                ->where('u_id', '=', @Auth::user()->id)
                                ->where('p_id', '=', $product->p_id)
                                ->count(); ?>
                            @if ($wishexist < 1)
                                <button class="badge bg-dark dec-none wishlist text-light" type="button"
                                    data-pid="{{ $product->p_id }}" data-mid="{{ $manufacturer->id }}"
                                    data-uid="{{ @Auth::user()->id }}">
                                    &#9825;</button>
                            @endif
                            @if ($wishexist >= 1)
                                <button class="badge bg-dark dec-none removewish text-light" type="button"
                                    data-pid="{{ $product->p_id }}" data-mid="{{ $manufacturer->id }}"
                                    data-uid="{{ @Auth::user()->id }}">
                                    &#128151;</button>
                            @endif


                            <button class="text-light dec-none remove badge bg-danger"
                                data-id="{{ $product->id }}">&#9587;</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <b><button class="nav-link btn bg-light border text-dark m-2 " aria-current="page">Total -
                        <span id="amt">{{ $amount }}</span></button></b>
            </li>
        </ul>
        <ul class="nav justify-content-end">

            <li class="nav-item">
                <a class="nav-link badge bg-secondary text-light m-2" aria-current="page"
                    href="{{ url('/catalogue') }}"><b>Continue Shopping </b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link badge bg-secondary text-light m-2" aria-current="page"
                    href={{url('/checkout')}}><b>Checkout</b></a>
            </li>
        </ul>
    </div>
    @if ($empty)
        <div class="container">
            <div class="jumbotron jumbotron-fluid ">
                <div class="container my-5">
                    <h1 class="display-4 mb-3">Nothing to view</h1>
                    <p class="lead mb-5 mt-3">Go to <a href="{{ url('/catalogue') }}">Catalogue</a> to Add products to
                        Cart</p>
                </div>
            </div>
        </div>
    @endif
    <hr>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".remove").on('click', function(e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $(this).data('id');
                var url = `{{ url('/removecart') }}/?id=${id}`;

                console.log(url);
                $.ajax({
                    url: url,
                    data: jQuery('.remove').serialize(),
                    type: 'get',
                    success: function(response) {
                        swal("Deleted!", "Keep Shopping!!", "error");
                        row.remove();
                        console.log('response', response);
                        $("#notification").empty().append(response.notifications);
                        $("#amt").empty().append(response.amt);
                    }
                });
            });
        });
        
        $(document).ready(function() {
            $(".wishlist").on('click', function(e) {
                e.preventDefault();
                var mid = $(this).data('mid');
                var pid = $(this).data('pid');
                var uid = $(this).data('uid');
                var wishlist = $(this).closest('button');
                var url = `{{ url('/wishlist') }}` + `?uid=${uid}&mid=${mid}&pid=${pid}`;
                console.log(url);
                $.ajax({

                    url: url,
                    data: jQuery('.wishlist').serialize(),
                    type: 'get',
                    success: function(response) {
                        swal("Wishlisted!", "Keep Shopping!!", "success");
                        wishlist.empty().append('&#128151;');

                    }
                });
            });
        });
        $(document).ready(function() {
            $(".removewish").on('click', function(e) {
                e.preventDefault();
                var pid = $(this).data('pid');
                var uid = $(this).data('uid');
                var wishlist = $(this).closest('button');

                var url = `{{ url('/removecatwish') }}` + `?uid=${uid}&pid=${pid}`;
                console.log(url);
                $.ajax({

                    url: url,
                    data: jQuery('.removewish').serialize(),
                    type: 'get',
                    success: function(response) {
                        wishlist.empty().append('&#9825;');

                    }
                });
            });
        });

       
    </script>
@endsection
