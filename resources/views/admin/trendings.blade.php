@extends('master')
@section('main-section')
<?php
$trendings = App\Models\Trendings::all();
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<div class="bg-light px-5 w-100">
	<h2 class="  my-3 text-center"><b>Trendings</b></h2>
	<hr>
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
			@foreach($trendings as $trending)

			<tr>
				<th class=" " scope="row">></th>
				<td class=" "><?php $manufacturer = App\Models\Manufacturer::find($trending->p_id) ?> {{$manufacturer->name}}</td>
				<td class=" ">{{$trending->p_name}}</td>
				<td class=" "><img src="{{ asset('images/'.$trending->p_image) }}" height="45px" width="50px" alt="img"></td>
				<td class=" ">{{$trending->des}}</td>
				<td class=" ">{{$trending->dis_price}}</td>
				<td class=" ">
					<button class="badge bg-danger rounded mx-2 remove text-light" data-id="{{$trending->id}}">Remove</button>
					
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
            $(".remove").on('click', function(e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $(this).data('id');
                var url = `{{ url('/remove') }}/?id=${id}`;
               
                console.log(url);
                $.ajax({

                    url: url,
                    data: jQuery('.remove').serialize(),
                    type: 'get',
                    success: function(response) {
                        swal("Removed!", "Succesfully!!", "error");
                        row.remove();
                        console.log('response',response );
                    }
                });
            });
        });
</script>

@endsection