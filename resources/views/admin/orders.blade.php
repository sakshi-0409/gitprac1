@extends('master')
@section('main-section')
<?php
$orders = App\Models\Orders::all();
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<div class="bg-light px-5 w-100">
	<h2 class="  my-3 text-center"><b>Orders List</b></h2>
	<hr>
	<table id="myTable" class="table table-hover  ">
		<thead>
			<tr>
				<th class=" " scope="col"></th>
				<th class=" " scope="col">Order Id</th>
				<th class=" " scope="col">Manufacture</th>
				<th class=" " scope="col" hidden>hidden p_id</th>
				<th class=" " scope="col">Product Name</th>
				<th class=" " scope="col">Color</th>
				<th class=" " scope="col">Qty</th>
				<th class=" " scope="col">Amount</th>
				<th class=" " scope="col">PayMode</th>
				<th class=" " scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)

			<tr>
				<th class=" " scope="row">></th>
                <td class="o_id ">{{$order->order_id}}</td>
                <td class=" "><?php $product = App\Models\Products::find($order->p_id); $manufacture = App\Models\Manufacturer::find($product->p_id); ?>{{$manufacture->name}}</td>
                <td class=" p_id " hidden><?php $product = App\Models\Products::find($order->p_id); ?>{{$product->id}}</td>
				<td class=" "><?php $product = App\Models\Products::find($order->p_id); ?>{{$product->p_name}}</td>
                <td class=" "><?php $product = App\Models\Products::find($order->p_id); ?>{{$product->color}}</td>
				<td class="quan ">{{$order->quantity}}</td>
                <td class="amt ">{{$order->amt}}</td>
				<td class=" ">{{$order->paymode}}</td>
				<td class=" ">
					<button class="badge bg-success text-light delivered" > Mark As Delivered</button>
				</td>
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
<script>
        $(document).ready(function() {
            $(".delivered").on('click', function(e) {
                e.preventDefault();
				var o_id = $(this).closest('tr').find('.o_id').text();
				var p_id = $(this).closest('tr').find('.p_id').text();
				var quan = $(this).closest('tr').find('.quan').text();
				var amt = $(this).closest('tr').find('.amt').text();
				var row =  $(this).closest('tr');
				
				 var url = '{{url("/delivered")}}';

				 $.ajax({

					url: url,
					data: {
						o_id: o_id,
						p_id: p_id,
						quan: quan,
						amt: amt,
						_token: "{{ csrf_token() }}",
					},
					type: 'post',
					success: function(response) {
				row.remove();
				swal("Delivered!", "Have a Good Day!!", "success");

}
});	






			});
		});
</script>

@endsection