@extends('layout')

@section('content')
<div class="container my-5 text-center">
  <h2 class="fw-bold mb-4">Available Parts</h2>

  <div class="row justify-content-center">
    @php
      $parts = [
        [
          'name' => 'Battery',
          'price' => 7000,
          'image' => 'https://images.unsplash.com/photo-1615397349754-9bca29e61ab2?auto=format&fit=crop&w=800&q=60'
        ],
        [
          'name' => 'Brake Pads',
          'price' => 2500,
          'image' => 'https://images.unsplash.com/photo-1621391947747-2581bdb1e7e0?auto=format&fit=crop&w=800&q=60'
        ],
        [
          'name' => 'Headlight',
          'price' => 1200,
          'image' => 'https://images.unsplash.com/photo-1603575448363-9c595e4f1b2b?auto=format&fit=crop&w=800&q=60'
        ],
        [
          'name' => 'Chain Set',
          'price' => 3500,
          'image' => 'https://images.unsplash.com/photo-1589739906069-24e6c9e0d3a1?auto=format&fit=crop&w=800&q=60'
        ],
        [
          'name' => 'Tyre',
          'price' => 5500,
          'image' => 'https://images.unsplash.com/photo-1620398611264-9b9b6c4b7ed8?auto=format&fit=crop&w=800&q=60'
        ],
        [
          'name' => 'Spark Plug',
          'price' => 800,
          'image' => 'https://images.unsplash.com/photo-1631939839913-0a2b3b061e11?auto=format&fit=crop&w=800&q=60'
        ],
      ];
    @endphp

    @foreach($parts as $part)
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0">
          <img src="{{ $part['image'] }}" class="card-img-top" alt="{{ $part['name'] }}" style="height:200px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $part['name'] }}</h5>
            <p class="card-text text-muted">Rs {{ number_format($part['price']) }}</p>
            <button class="btn btn-primary btn-sm" onclick="addToCart('{{ $part['name'] }}', {{ $part['price'] }})">Add to Cart</button>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<script>
function addToCart(name, price) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push({ name: name, price: price });
  localStorage.setItem('cart', JSON.stringify(cart));
  alert(name + ' added to cart!');
}
</script>
@endsection
