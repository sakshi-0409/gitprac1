@extends('main')
@section('main-section')
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <?php $empty = true; ?>
    <style>
        body {
            /* background-color: rgba(230, 235, 236, 0.753); */
            background-image: url('images/cat-bg.gif');
        }

        .min-height {
            min-height: 250px;
        }

        .curve,
        img {
            border-radius: 15px;
        }
    </style>

    <h4 class="text-center text-secondary my-3 "><b>{{ $title }} | Image Gallery</b></h4>



    <div class="container">
        <div class="row row-cols-md-5 row-cols-sm-2 g-4 ">
            @foreach ($products as $product)
                <?php $empty = false; ?>
                <div class="col ">
                    <div class="card curve h-100 bg-secondary-subtle shadow ">
                        <img class="cat-img" src="{{ asset('images/' . $product->p_image) }}" height="250px"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $product->p_name }}</b></h5>
                            <p class="card-text"><b><?php $manufacturer = App\Models\manufacturer::find($product->p_id); ?>{{ $manufacturer->name }}</b><br>{{ $product->des }}
                            </p><b>Rs.
                                <s>{{ $product->actual_price }}</s>/-
                                &nbsp;<span>{{ $product->dis_price }}</span>/-</b><br><br>
                            <div class="card-footer">
                                <button class="badge bg-dark"><a class="text-light dec-none"
                                        href="{{ url('/buy') }}/{{ $product->id }}">Buy &#128717;</a></button>
                                @if (Route::has('login'))
                                    <?php $cartexist = DB::table('carts')
                                        ->where('u_id', '=', @Auth::user()->id)
                                        ->where('p_id', '=', $product->id)
                                        ->count(); ?>
                                    @auth
                                        @if ($cartexist < 1)
                                                <button type="button" data-pid="{{ $product->id }}"
                                                    data-mid="{{ $manufacturer->id }}" data-uid="{{ @Auth::user()->id }}"
                                                    class="badge bg-dark text-light addcart dec-none">
                                                        <span class="cartmsg"> &#128722; </span></button>
                                        @else
                                        <button class="badge bg-dark text-light dec-none">Already in cart</button>
                                        @endif
                                       
                                        <?php $wishexist = DB::table('wishlists')
                                            ->where('u_id', '=', @Auth::user()->id)
                                            ->where('p_id', '=', $product->id)
                                            ->count(); ?>
                                        @if ($wishexist < 1)
                                            <button class="badge bg-dark dec-none wishlist text-light" type="button" data-pid="{{ $product->id }}"
                                                data-mid="{{ $manufacturer->id }}" data-uid="{{ @Auth::user()->id }}">
                                                    &#9825;</button>
                                        @endif
                                        @if ($wishexist >= 1)
                                            <button class="badge bg-dark dec-none remove text-light" type="button" data-pid="{{ $product->id }}"
                                                data-mid="{{ $manufacturer->id }}" data-uid="{{ @Auth::user()->id }}">
                                                &#128151;</button>
                                        @endif
                                    @else
                                        <a class="badge bg-dark dec-none mx-2" href="{{ route('login') }}">Login to add to
                                            &#128722; or &#9825; </a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($empty)
            <div class="container">
                <div class="jumbotron jumbotron-fluid ">
                    <div class="container my-5">
                        <h1 class="display-4 mb-3">Nothing to view</h1>
                        <p class="lead mb-5 mt-3">Please Check After some time may be products will be available here.</p>
                    </div>
                </div>
            </div>
        @endif
        <hr>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".addcart").on('click', function(e) {
                e.preventDefault();
                var mid = $(this).data('mid');
                var pid = $(this).data('pid');
                var uid = $(this).data('uid');
                var url =`{{ url('/cart') }}`+`?uid=${uid}&mid=${mid}&pid=${pid}`;
                var span = $(this);
                console.log(url);
                $.ajax({
                    
                    url: url,
                    data: jQuery('.addcart').serialize(),
                    type: 'get',
                    success: function(response) {
                        swal("Added to Cart!", "Keep Shopping!!", "success");
                        $("#notification").empty().append(response.notifications);
                        
                        (span).find('.cartmsg').text('Already in cart')
                        span.prop('disabled',true);
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

                var url =`{{ url('/wishlist') }}`+`?uid=${uid}&mid=${mid}&pid=${pid}`;
                console.log(url);
                $.ajax({

                    url: url,
                    data: jQuery('.wishlist').serialize(),
                    type: 'get',
                    success: function(response) {
                        swal("Wishlisted!", "Keep Shopping!!", "success");
                        wishlist.empty().append('&#128151;');
                        wishlist.prop('disabled',true);

                    }
                });
            });
        });
        $(document).ready(function() {
        $(".remove").on('click', function(e) {
            e.preventDefault();
                var pid = $(this).data('pid');
                var uid = $(this).data('uid');
                var wishlist = $(this).closest('button');

                var url =`{{ url('/removecatwish') }}`+`?uid=${uid}&pid=${pid}`;
                console.log(url);
            $.ajax({

                url: url,
                data: jQuery('.remove').serialize(),
                type: 'get',
                success: function(response) {
                    wishlist.empty().append('&#9825;');

                }
            });
        });
    });
    </script>
@endsection
