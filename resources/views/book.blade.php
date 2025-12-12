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

  <div class="card shadow-sm mx-auto p-4" style="max-width: 400px;">
    <div class="mb-3 text-start">
      <label class="form-label">Preferred Date</label>
      <input type="date" id="bookingDate" class="form-control">
    </div>

    <div class="mb-3 text-start">
      <label class="form-label">Preferred Time</label>
      <input type="time" id="bookingTime" class="form-control">
    </div>

    <button onclick="addBookingToCart()" class="btn btn-primary w-100">Add Booking to Cart</button>
  </div>

  <div class="mt-4">
    <a href="/services" class="btn btn-outline-secondary">Back to Services</a>
    <a href="/cart" class="btn btn-success ms-2">Go to Cart</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function addBookingToCart() {
  let name = document.getElementById('serviceName').textContent.trim();
  let date = document.getElementById('bookingDate').value;
  let time = document.getElementById('bookingTime').value;
  let price = 2500; 
  let id = "{{ $id ?? '' }}"; // Get ID from Blade

  if (!date || !time) {
    Swal.fire("Please select both date and time before adding to cart!");
    return;
  }

  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Include id, date, time, and type='service'
  cart.push({ 
    id: id,
    name: `${name} (Booking: ${date} at ${time})`, 
    price: price,
    type: 'service',
    booking_date: date,
    booking_time: time,
    quantity: 1
  });

  localStorage.setItem('cart', JSON.stringify(cart));

  Swal.fire(`Booking for ${name} on ${date} at ${time} added to cart!`);
}
</script>
@endsection
