@extends('master')
@section('main-section')
    <?php
    $manufacturers = App\Models\Manufacturer::all();
    ?>

    <div class="container bg-light px-5 py-3">

        <h2 class="text-center text-secondary"><b>{!! $title !!}</b></h2>
        <form id="form"  enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <label for="p_id">Select Manufacturer's Name &nbsp;</label><br>
                <select class="form-select" id="p_id" name="p_id" aria-label="Default select example">
                    <option selected>Open this to select name</option>
                    @foreach ($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="p_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="p_name" id="p_name"
                    value="{{ @$product->p_name != null ? @$product->p_name : old('p_name') }}"
                    placeholder="Enter Product Name" aria-describedby="emailHelp">
                    <span class="text-danger m-0">
                        @error('p_name')
                            {{ $message }}
                        @enderror
                    </span>
            </div>
            <div class="mb-3">
                <label for="p_image" class="form-label">Product Image</label>
                <input type="file" class="form-control"
                    value="{{ @$product->p_image != null ? @$product->p_image : old('p_image') }}" name="p_image"
                    id="p_image">
                    <span class="text-danger m-0">
                        @error('p_image')
                            {{ $message }}
                        @enderror
                    </span>
            </div>
            <div class="input-group mb-3">
                <label for="color">Select Product Color &nbsp;</label><br>
                <select class="form-select" id="color" name="color" aria-label="Default select example">
                    <option selected>Open this to select color</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="yellow">Yellow</option>
                        <option value="green">Green</option>
                        <option value="pink">Pink</option>
                        <option value="gray">Gray</option>
                </select>
                <span class="text-danger m-0">
                    @error('color')
                        {{ $message }}
                    @enderror
                </span>

            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Product Description</label>
                <input type="text" class="form-control"
                    value="{{ @$product->des != null ? @$product->des : old('des') }}"
                    placeholder="Enter Product Speciality" name="des" id="des">
                    <span class="text-danger m-0">
                        @error('des')
                            {{ $message }}
                        @enderror
                    </span>
            </div>
            <div class="mb-3">
                <label for="actual_price" class="form-label">Product Actual Price</label>
                <input type="number" class="form-control"
                    value="{{ @$product->actual_price != null ? @$product->actual_price : old('actual_price') }}"
                    placeholder="Enter Price" name="actual_price" id="actual_price">
                    <span class="text-danger m-0">
                        @error('actual_price')
                            {{ $message }}
                        @enderror
                    </span>
            </div>
            <div class="mb-3">
                <label for="dis_price" class="form-label">Product Discounted Price</label>
                <input type="number" class="form-control"
                    value="{{ @$product->dis_price != null ? @$product->dis_price : old('dis_price') }}"
                    placeholder="Enter Discounted Price" name="dis_price" id="dis_price">
                    <span class="text-danger m-0">
                        @error('dis_price')
                            {{ $message }}
                        @enderror
                    </span>
            </div>

            <button type="button" class="badge bg-danger" data-bs-dismiss="modal">Cancel&#10007;</button>
            <button type="submit" class="badge bg-success">Save &#10003;</button>
        </form>
    </div>
    </div>
    </div>

    <script src="js/app.js"></script>
    <script>
        $(document).ready(function() {
            $("#form").on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                console.log(formData);
                var imageFile = $('#p_image')[0].files[0];

                console.log(formData);
                formData.append('image', imageFile);
                var url = '{{url("add-product")}}';
                $.ajax({

                    url: url,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle the success response
                        swal("Added!", "Product id added to iTouch Electronics", "success")
                        $("#p_id").val('');
                        $("#p_name").val('');
                        $("#p_image").val('');
                        $("#color").val('');
                        $("#des").val('');
                        $("#actual_price").val('');
                        $("#dis_price").val('');
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
@endsection
