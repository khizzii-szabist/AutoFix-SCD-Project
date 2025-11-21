@extends('layout')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ filter_var($product->image, FILTER_VALIDATE_URL) ? $product->image : '/images/' . $product->image }}" class="img-fluid rounded shadow" alt="{{ $product->name }}" style="width: 100%; height: 400px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <h1 class="fw-bold">{{ $product->name }}</h1>
            <p class="text-muted fs-4">Rs {{ number_format($product->price) }}</p>
            <p class="lead">{{ $product->description }}</p>
            <p><strong>Stock:</strong> {{ $product->stock > 0 ? $product->stock . ' available' : 'Out of Stock' }}</p>
            
            <div class="mt-4">
                <button class="btn btn-primary btn-lg" onclick="addToCart('{{ $product->name }}', {{ $product->price }})">Add to Cart</button>
                <a href="{{ url('/parts') }}" class="btn btn-outline-secondary btn-lg ms-2">Back to Parts</a>
            </div>
        </div>
    </div>
</div>

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
