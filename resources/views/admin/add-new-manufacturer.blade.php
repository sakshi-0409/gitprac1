@extends('master')
@section('main-section')
    <style>
        div {
            overflow-y: hidden;
        }
    </style>
    <div class="container">
        <div class="container">
            <h2 class="text-light text-center mt-5"><b>Add New Manufacturer</b></h2>
            <div class="jumbotron jumbotron-fluid bg-light mt-5 m-5 p-5">
                <h3 class="">Enter Manufacturer's Name</h3>



                <form id="form" >
                    @csrf
                    <div class="mb-3">
                        <label for="m-name" class="form-label text-light"></label>
                        <input type="text" placeholder="Enter name" class="form-control" name="m-name" id="m-name"
                            aria-describedby="emailHelp">
                            <span class="text-danger m-0">
                                @error('m-name')
                                    {{ $message }}
                                @enderror
                            </span>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="badge bg-danger m-2" data-bs-dismiss="modal">Cancel&#10007;</button>
                        <button type="submit" class="badge bg-success add">Add &#10003;</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#form").on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                
                var url = '{{url("add-manufacturer")}}';
                console.log(url);
                $.ajax({

                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle the success response
                        $("#m-name").val('');
                        swal("Added!", "Manufacture id added to iTouch Electronics", "success")
                        console.log(response.message);
                    },
                    error: function(xhr) {
                        // Handle the error response
                        console.log(xhr.responseText);
                    }
                });
            });
        });


       
    </script>

</body>

</html>
