@extends('master')
@section('main-section')
<?php
$products = App\Models\Products::all();
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<div class="bg-light px-5 w-100">
	<h2 class="  my-3 text-center"><b>Products List</b></h2>
	<hr>
    <div class="table-responsive">
	<table id="myTable" class="table table-hover  ">
		<thead>
			<tr>
				<th class=" " scope="col"></th>
				<th class=" " scope="col">Manufacturer Name</th>
				<th class=" " scope="col">Product Name</th>
				<th class=" " scope="col">Image</th>
				<th class=" " scope="col">Description</th>
				<th class=" " scope="col">Price</th>
				<th class=" " scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)

			<tr>
				<th class=" " scope="row">></th>
				<td class=" "><?php $manufacturer = App\Models\Manufacturer::find($product->p_id) ?> {{$manufacturer->name}}</td>
				<td class=" ">{{$product->p_name}}</td>
				<td class=" "><img src="{{ asset('images/'.$product->p_image) }}" height="45px" width="50px" alt="img"></td>
				<td class=" ">{{$product->des}}</td>
				<td class=" ">{{$product->dis_price}}</td>
				<td class=" ">
					<button class="badge bg-success rounded m-1"><a class=" text-light " href="{{url('edit')}}/{{$product->id}}">Edit</a></button>
					<button class="badge bg-danger m-1 text-light remove" data-id="{{$product->id}}"> Delete</button>
					<button class="badge bg-primary m-1 text-light dec-none trendings"  data-id="{{$product->id}}"> Add to trendings</button>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
</div>
</div>
<script src="js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
	let table = new DataTable('#myTable');
</script>
<script>
	$(document).ready(function() {
		$('body').on('click', '.remove', function(e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $(this).data('id');
                var url = `{{ url('/delete') }}/?id=${id}`;
               
                console.log(url);
                $.ajax({

                    url: url,
                    data: jQuery('.remove').serialize(),
                    type: 'get',
                    success: function(response) {
                        swal("Deleted!", "Succesfully!!", "error");
                        row.remove();
                        console.log('response',response );
                    }
                });
            });
        });


	$(document).ready(function() {
		$('body').on('click', '.trendings', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = `{{ url('/trendings') }}/?id=${id}`;
               
                console.log(url);
                $.ajax({
                    url: url,
                    data: jQuery('.trendings').serialize(),
                    type: 'get',
                    success: function(response) {
                        swal("Added!", "Succesfully!!", "success");
                        console.log('response',response );
                    }
                });
            });
        });
</script>

@endsection