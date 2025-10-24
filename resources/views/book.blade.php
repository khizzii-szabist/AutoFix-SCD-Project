@extends('layout')

@section('content')
<div class="container my-5 text-center">
  <h2 class="fw-bold mb-4">
    @if($service)
      Booking for: <span class="text-primary" id="serviceName">{{ $service }}</span>
    @else
      Book a Service
    @endif
  </h2>

  <div class="mb-3 text-start mx-auto" style="max-width: 400px;">
    <label class="form-label">Preferred Date</label>
    <input type="date" id="bookingDate" class="form-control">
  </div>

  <button onclick="addBookingToCart()" class="btn btn-primary w-100" style="max-width: 400px;">Add Booking to Cart</button>

  
</div>

<script>
function addBookingToCart() {
  let name = document.getElementById('serviceName').textContent.trim();
  let date = document.getElementById('bookingDate').value;
  let price = 2500; // default price (you can adjust or pass from URL later)

  if (!date) {
    alert("Please select a date before adding to cart!");
    return;
  }

  // Retrieve current cart
  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Add new booking
  cart.push({ name: name + " (Booking: " + date + ")", price: price });

  // Save back to localStorage
  localStorage.setItem('cart', JSON.stringify(cart));

  alert("Booking for " + name + " on " + date + " added to cart!");
}
</script>
@endsection
