@extends('main')
@section('main-section')
  <style>
  .contact{
    background-image: url('images/contactgif.gif')
  }
  @media (min-width: 200px) and (max-width: 767px) {
      .contact {
        background-size: contain;
        background-repeat: no-repeat;
      }
    }
  @media (min-width: 768px) and (max-width: 991px) {
      .contact {
        background-size: 50% auto;
      }
    }

    /* Change background size for large screens (992px and above) */
    @media (min-width: 992px) {
      .contact {
        background-size: 100% auto;
      }
    }
  input{
    opacity: 60%;
  }  
  </style>  
<div class="container mt-5">
    <section class="h-50 text-secondary rounded mb-0 contact" >
      <h3 class=" pt-5 pb-5 ml-2 ms-2 mb-0 left-animation">Contact Us!!</h3>
    <form action="{{url('/contact')}}" method="post" class="container w-50">
      @csrf
  <div class="mb-3">
      <div class="mb-2">Fill this form and you will get a response call from us within 24 hours!!</div>
    <input type="name" class="form-control rounded-pill " name="name"  placeholder="Enter your name" id="name" aria-describedby="emailHelp">
    <span class="text-danger m-0">
      @error('name')
      {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <input type="email" name="email"  placeholder="Enter your e-mail" class="form-control rounded-pill" id="email">
    <span class="text-danger m-0">
      @error('email')
      {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <input type="tel" name="phone" maxlength="13"  placeholder="Enter your contact number" class="form-control rounded-pill" id="phone">
    <span class="text-danger m-0">
      @error('phone')
      {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <input type="text" name="des" maxlength="100" placeholder="Optional description" class="form-control rounded-pill" id="des">
  </div>
  
  <button type="submit" class="badge bg-success mb-5 ms-3 ">&#10003; Send</button>
</form>
   
</section>
    <section class="bg-light opacity-50 pt-5 pb-5"><h2>GET IN TOUCH</h2></section>
</div></div>    
@endsection