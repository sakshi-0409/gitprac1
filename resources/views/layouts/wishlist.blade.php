@extends('main')
@section('main-section')
    <?php
    $products = App\models\Wishlists::where('u_id', '=', @Auth::user()->id)->get();
    $empty = true;
    ?>

    <style>
        body {
            background-color: rgba(230, 235, 236, 0.753)
        }

        .min-height {
            min-height: 250px;
        }

        .curve,
        img {
            border-radius: 15px;
        }
    </style>

    <h4 class="text-center text-secondary my-3"><b>Wishlisted | &#9825; </b></h4>



    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4 ">
            @foreach ($products as $product)
                <?php $empty = false; ?>
                <div class="col wishlist-card">
                    <div class="card curve h-100 bg-secondary-subtle">
                        <img class="cat-img" src="{{ asset('images/' . $product->p_image) }}" height="250px"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $product->p_name }}</b></h5>
                            <p class="card-text"><b><?php $manufacturer = App\Models\Manufacturer::find($product->p_id); ?>{{ $manufacturer->name ?? null}}</b><br>{{ $product->des }}
                            </p><b>Rs.
                                <s>{{ $product->actual_price }}</s>/-
                                &nbsp;<span>{{ $product->dis_price }}</span>/-</b><br><br>
                            <div class="card-footer">
                                <button class="badge bg-dark"><a class="text-light dec-none"
                                        href="{{ url('/buy') }}/{{ $product->p_id }}">Buy &#128717;</a></button>

                                <button class="badge bg-dark addcart text-light dec-none" data-pid="{{ $product->id }}"
                                    data-mid="{{ $manufacturer->id ?? null }}" data-uid="{{ @Auth::user()->id }}"> &#128722;</button>
                                <button  data-id="{{ $product->id }}" class="badge remove bg-dark text-light dec-none">&#128151;</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($empty)
            <div class="container my-5">
            <div class="jumbotron jumbotron-fluid ">
                <div class="container  mb-5">
                    <h1 class="display-4 mb-3">Nothing to view</h1>
                    <p class="lead mt-3">Go to <a href="{{url('/catalogue')}}">Catalogue</a> to Add products to Wishlist. </p>
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
            var card = $(this).closest('.wishlist-card');
            var id = $(this).data('id');
            var url = `{{ url('/removewishlist') }}/?id=${id}`;
            console.log(url);
            $.ajax({

                url: url,
                data: jQuery('.remove').serialize(),
                type: 'get',
                success: function(response) {
                    swal("Removed!", "Keep Shopping!!", "error");
                    card.remove();
                }
            });
        });
    });

    $(document).ready(function() {
            $(".addcart").on('click', function(e) {
                e.preventDefault();
                var mid = $(this).data('mid');
                var pid = $(this).data('pid');
                var uid = $(this).data('uid');
                var url =`{{ url('/cart') }}`+`?uid=${uid}&mid=${mid}&pid=${pid}`;
                console.log(url);
                $.ajax({

                    url: url,
                    data: jQuery('.addcart').serialize(),
                    type: 'get',
                    success: function(response) {
                        swal("Added!", "Keep Shopping!!", "success");
                    }
                });
            });
        });
</script>
@endsection
