@extends('master')
@section('main-section')
<?php
$delivereds = App\Models\Delivered::all();
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<div class="bg-light px-5 w-100">
	<h2 class="  my-3 text-center"><b>Delivered Orders List</b></h2>
	<hr>
	<table id="myTable" class="table table-hover  ">
		<thead>
			<tr>
				<th class=" " scope="col"></th>
				<th class=" " scope="col">Order Id</th>
				<th class=" " scope="col">Product Name</th>
				<th class=" " scope="col">Qty</th>
				<th class=" " scope="col">Amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($delivereds as $delivered)

			<tr>
				<th class=" " scope="row">></th>
                <td class=" ">{{$delivered->order_id}}</td>
                <td class=""><?php $product = App\Models\Products::find($delivered->p_id); ?>{{$product->p_name}}</td>
				<td class="quan ">{{$delivered->quantity}}</td>
                <td class="amt ">{{$delivered->amount}}</td>
				
			</tr>
			@endforeach

		</tbody>
	</table>
</div>
<script src="js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
	let table = new DataTable('#myTable');
</script>
@endsection