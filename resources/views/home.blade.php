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

{{-- 🔧 Product Listing Section --}}
<section class="container my-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold">Popular Bike Parts</h2>
    <p>Check out our top-selling, high-quality parts for your bike.</p>
  </div>

  <div class="row justify-content-center">
    @foreach($products as $product)
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100 text-center">
          <a href="{{ route('product.detail', $product->id) }}">
            <img src="/images/{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height:220px; object-fit:cover;">
          </a>
          <div class="card-body">
            <a href="{{ route('product.detail', $product->id) }}" class="text-decoration-none text-dark">
              <h5 class="card-title">{{ $product->name }}</h5>
            </a>
            <p class="card-text text-muted">Rs {{ number_format($product->price) }}</p>
            <button class="btn btn-primary btn-sm" onclick="addToCart('{{ $product->name }}', {{ $product->price }})">Add to Cart</button>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="text-center mt-4">
    <a href="{{ url('/parts') }}" class="btn btn-outline-primary btn-lg">View More</a>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function addToCart(name, price) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push({ name: name, price: price });
  localStorage.setItem('cart', JSON.stringify(cart));
  Swal.fire({
    title: "Added To Cart!",
    text: `${name} of RS.${price} added to cart!`,
    icon: "success"
  });
}
</script>
@endsection
