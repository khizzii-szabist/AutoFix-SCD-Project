@extends('layout')

@section('content')
<div class="container my-5 text-center">
  <h2 class="fw-bold mb-4">Motorcycle Battery</h2>

  <div class="card mx-auto shadow-sm" style="max-width: 400px;">
    <img src="https://static.vecteezy.com/system/resources/thumbnails/055/768/265/small/motorcycle-battery-on-a-white-background-photo.jpg"
         class="card-img-top" alt="Battery" style="height:250px; object-fit:cover;">
    <div class="card-body">
      <h4 class="card-title">Battery</h4>
      <p class="card-text text-muted">High-performance motorcycle battery suitable for most 70cc–150cc bikes.</p>
      <p class="fw-bold mb-3">Price: Rs 7,000</p>
      <button class="btn btn-primary" onclick="addToCart('Battery', 7000)">Add to Cart</button>
      <br><br>
      <a href="{{ url('/') }}" class="btn btn-secondary btn-sm">Back to Parts</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function addToCart(name, price) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push({ name, price });
  localStorage.setItem('cart', JSON.stringify(cart));
  Swal.fire({
    title: "Added To Cart!",
    text: `${name} of RS.${price} added to cart!`,
    icon: "success"
  });
}
</script>
@endsection
