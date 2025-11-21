@extends('layout')

@section('content')
<div class="container my-5 text-center">
  <h2 class="fw-bold mb-4">Available Parts</h2>

    @foreach ($products as $product)
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100 border-0">
          <a href="{{ route('product.detail', $product->id) }}">
            <img src="/images/{{ $product->image }}" 
                 class="card-img-top" alt="{{ $product->name }}" style="height:200px; object-fit:cover;">
          </a>
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text text-muted">Rs {{ $product->price }}</p>
            <button class="btn btn-primary btn-sm" onclick="addToCart('{{ $product->name }}', {{ $product->price }})">Add to Cart</button>
            <a href="{{ route('product.detail', $product->id) }}" class="btn btn-outline-secondary btn-sm ">View More</a>
        </div>
      </div>
    </div>
    @endforeach
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
