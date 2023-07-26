@extends('main')
@section('main-section')
    <style>
        .m-auto {
            display: block;
            margin: auto;
        }
    </style>
    <h2 class="text-center text-secondary my-3">&#128717;&nbsp;{{ @$product->p_name }}</h2>
    <h2 class="text-center text-secondary my-3" hidden id="p_id">{{ @$product->id }}</h2>

    <div class="container my-5 ">

        <div class="col-6 m-auto">
            <div class="card h-100">
                <img src="{{ asset('images/' . @$product->p_image) }}" height="350px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><b><?php $manufacturer = App\Models\Manufacturer::find(@$product->p_id) ?>{{ @$manufacturer->name }}</b></h5>
                    <h6 class="card-title"><b>{{ @$product->p_name }}</b></h6>
                    <p class="card-text price">{{ @$product->des }}</p><b>Rs.
                        <span>{{ @$product->actual_price }}</span>/- &nbsp;
                        <span class="price" data-price="{{ @$product->dis_price }}">{{ @$product->dis_price }}</span>/-</b><br><br>
                    <p class="card-text">Quantity : 
                        <button class="decrease btn_new">-</button>
                        <button class="quantity">1</button>
                        <button class="increase btn_new">+</button></p>
                </div>
            </div>
        </div>
    </div>
   <div class="container ">
        <div class="jumbotron bg-secondary-subtle mt-3 jumbotron-fluid py-3">
            <h3 class="text-center"> Product name - <span><b>{{ @$product->p_name }}</b></h3>
            <div class="container">
                <h3 class="">Payment Details:-</h3>
                <div class="form-check">
                    <input class="form-check-input" value="COD" type="radio" name="paymode" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Cash On Delivery
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="UPI" type="radio" name="paymode" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Payment via UPI
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="NET" type="radio" name="paymode" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Online Payment
                    </label>
                </div>

                <p class="lead text-center" >Price - <span class="fw-bold" id="price">{{ @$product->dis_price }}</span></span>/-</p>
                <p class="lead text-center" >Quantity - <span id="quantity" class="fw-bold">1</span></span></p>

                <hr>
                <p class="lead text-center" >Total Amt - <span class="fw-bold" id="amount">{{ @$product->dis_price }}</span>/-</p>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <button class="btn btn-sm btn-success m-2"><a id="placeOrder" class=" text-light dec-none" aria-current="page"
                                href="#">Place Order</a></button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-sm btn-danger m-2"><a class=" text-light dec-none"
                                href="{{ url('/catalogue') }}">Cancel Order</a></button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-sm btn-secondary m-2"><a class=" text-light dec-none" href="#">Edit
                                Payment Details</a></button>
                    </li>

                </ul>
            </div>
        </div>
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
            $('.increase').click(function(e) {
                e.preventDefault();
                var quantityElement = $(this).siblings('.quantity');
                var quantity = parseInt(quantityElement.text());
                var price = $('#price').text();

                quantity++;
                console.log(quantity, price);
                console.log(quantity * price);

                quantityElement.empty().append(quantity);
                $('#amount').empty().append(quantity * price);
                $('#quantity').empty().append(quantity);
            });

            $('.decrease').click(function() {
                var quantityElement = $(this).siblings('.quantity');
                var quantity = parseInt(quantityElement.text());
                var price = $('#price').text();
                if (quantity > 1) {
                    quantity--;
                }
                console.log(quantity, price);
                console.log(quantity * price);

                quantityElement.empty().append(quantity);
                $('#amount').empty().append(quantity * price);
                $('#quantity').empty().append(quantity);
            });

            $(document).on('click', '#placeOrder', function() {
                var p_arr = [];
                var quan_arr = [];
                var amt_arr = [];
                const paymode = document.querySelector('input[name="paymode"]:checked').value;
                
                
                $('#p_id').each(function() {
                    const value = $(this).text();
                    p_arr.push(value);
                });

                $('#quantity').each(function() {
                    const value = $(this).text();
                    quan_arr.push(value);
                });

                $('#amount').each(function() {
                    const value = $(this).text();
                    amt_arr.push(value);

                });


                $.ajax({
                    url: '{{ url("order") }}',
                    type: 'post',
                    data: {
                        pid_arr: p_arr,
                        quantity_arr: quan_arr,
                        amount_arr: amt_arr,
                        paymode: paymode,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        swal("Order Placed!", "Keep Shopping!!", "success");
                        $("#notification").empty().append(response.notifications);
                        window.location.href = "/";
                    }
                });
            });
        });





            
    </script>
@endsection
