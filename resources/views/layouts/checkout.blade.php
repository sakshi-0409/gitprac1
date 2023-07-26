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
        input[type='radio']{
            background-color: gray;
        }
        input[type='radio']:checked{
            background-color: green;
        }
      
    </style>

    <h4 class="text-center text-secondary my-3"><b>Checkout &#128717;</b> - {{ @Auth::user()->name }}</h4>



    <div class="container ">
        <div class="table-responsive">
        <table id="myTable" class="table ">
            <thead>
                <tr>
                    <th class=" bg-secondary-subtle" scope="col"></th>
                    <th class="bg-secondary-subtle " scope="col">Brand</th>
                    <th class=" bg-secondary-subtle" scope="col">Product Name</th>
                    <th class="bg-secondary-subtle " scope="col">Image</th>
                    <th class="bg-secondary-subtle " scope="col">Quantity</th>
                    <th class=" bg-secondary-subtle" scope="col">Description</th>
                    <th class="bg-secondary-subtle " scope="col">Price</th>
                    <th class="bg-secondary-subtle " scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <?php $empty = false; ?>

                    <tr class="tdata">
                        <th class="bg-secondary-subtle " scope="row">></th>
                        <td class="p_id" data-id="{{ $product->p_id }}" hidden>{{ $product->p_id }}</td>
                        <td class=" bg-secondary-subtle name_m"><?php $manufacturer = App\Models\manufacturer::find($product->m_id); ?> {{ $manufacturer->name }}</td>
                        <td class="bg-secondary-subtle ">{{ $product->p_name }}</td>
                        <td class=" bg-secondary-subtle "><img class="p-img"
                                src="{{ asset('images/' . $product->p_image) }}" height="50px" width="50px"
                                alt="img"></td>
                        <td class=" bg-secondary-subtle ">
                            <button class="decrease btn_new">-</button>
                            <button class="quantity">1</button>
                            <button class="increase btn_new">+</button>
                        </td>
                        <td class=" bg-secondary-subtle">{{ $product->des }}</td>
                        <td class="bg-secondary-subtle price" data-price="{{ $product->dis_price }}">
                            {{ $product->dis_price }}</td>
                        <td class="bg-secondary-subtle fw-bold amt">{{ $product->dis_price }}</td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
    <div class="container ">
        <div class="jumbotron bg-secondary-subtle mt-3 jumbotron-fluid py-3">
            <h3 class="text-center"></b></h3>
            <div class="container">
                <h3 class="">Payment Details:-</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio"  name="paymode" value="COD" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Cash On Delivery
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymode" value="UPI" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Payment via UPI
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymode" value="NET" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        NET Banking
                    </label>
                </div>

                <hr>
                <p class="lead text-center">Total Amt - <span id="total" class=" fw-bold">{{ $amount }}</span>/-
                </p>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <button class="btn btn-sm btn-success m-2"><a class=" text-light dec-none" aria-current="page"
                                id="placeOrder" href="#">Place Order</a></button>
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
                var price = $(this).closest('td').siblings('.price').data('price');

                quantity++;
                console.log(quantity, price);
                console.log(quantity * price);

                quantityElement.empty().append(quantity);
                $(this).closest('td').siblings('.amt').empty().append(quantity * price);
            });

            $('.decrease').click(function() {
                var quantityElement = $(this).siblings('.quantity');
                var quantity = parseInt(quantityElement.text());
                var price = $(this).closest('td').siblings('.price').data('price');
                if (quantity > 1) {
                    quantity--;
                }
                console.log(quantity, price);
                console.log(quantity * price);

                quantityElement.empty().append(quantity);
                $(this).closest('td').siblings('.amt').empty().append(quantity * price);
            });

            $(document).ready(function() {
                $('.amt').keyup(function() {

                    var sum = 0;

                    $('.amt').each(function() {
                        sum += Number($(this).val());
                    });

                    console.log($('#total').val(sum));

                });
            });

            $(document).on('click', '.btn_new', function() {
                // alert('yes');
                let sum = 0;

                $('.amt').each(function() {
                    const value = parseFloat($(this).text());

                    if (!isNaN(value)) {
                        sum += value;
                    }
                });
                console.log(sum);
                $("#total").text(sum);
            });


            $(document).on('click', '#placeOrder', function() {
                var p_arr = [];
                var quan_arr = [];
                var amt_arr = [];
                const paymode = document.querySelector('input[name="paymode"]:checked').value;

                // const uniqueId = Date.now().toString(36);
                // const randomString = Math.random().toString(36).substr(2, 5);
                // const orderId = uniqueId + randomString;
                // console.log(orderId);
                console.log(paymode);

                $('.p_id').each(function() {
                    const value = $(this).text();
                    p_arr.push(value);
                });
                // const pid_arr = JSON.stringify(p_arr);
                // console.log(pid_arr);


                $('.quantity').each(function() {
                    const value = $(this).text();
                    quan_arr.push(value);
                });
                // const quantity_arr = JSON.stringify(quan_arr);
                // console.log(quantity_arr);


                $('.amt').each(function() {
                    const value = $(this).text();
                    amt_arr.push(value);
                });
                // const amount_arr = JSON.stringify(amt_arr);
                // console.log(amount_arr);

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
