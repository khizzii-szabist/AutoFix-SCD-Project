@extends('layout')

@section('content')
<section class="hero-section text-white d-flex align-items-center justify-content-center text-center">
  <div class="overlay"></div>
  <div class="container position-relative">
    <h1 class="display-4 fw-bold">Keep Your Ride in Perfect Shape</h1>
    <p class="lead mb-4">Professional bike maintenance and repair services you can trust.</p>
    <a href="{{ url('/services') }}" class="btn btn-primary btn-lg">Book Now</a>
  </div>
</section>

<section class="container my-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold">Why Choose Us?</h2>
    <p>We offer expert services, high-quality parts, and passionate professionals for your bike.</p>
  </div>

  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow">
        <div class="card-body">
          <h5 class="card-title">Expert Mechanics</h5>
          <p class="card-text">Our experienced staff ensures your bike gets the care it deserves.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow">
        <div class="card-body">
          <h5 class="card-title">Genuine Parts</h5>
          <p class="card-text">We use only original and certified parts for every service.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow">
        <div class="card-body">
          <h5 class="card-title">Affordable Rates</h5>
          <p class="card-text">Top-quality service doesn’t have to come with a high price tag.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
