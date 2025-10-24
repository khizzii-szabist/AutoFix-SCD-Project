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
          'image' => 'https://static.vecteezy.com/system/resources/thumbnails/055/768/265/small/motorcycle-battery-on-a-white-background-photo.jpg'
        ],
        [
          'name' => 'Brake Pads',
          'price' => 2500,
          'image' => 'https://www.sparify.co/cdn/shop/products/20221215_000704_0000.png?v=1671043199&width=533'
        ],
        [
          'name' => 'Headlight',
          'price' => 1200,
          'image' => 'https://www.roadiesstore.com/wp-content/uploads/2020/02/4_Motorcycle-Dominator-Grill-Twins-Dual-Headlight-Streetfighter-Double-Headlamp-For-Harley-Cafe-Racer-Honda-Yamaha-Custom-1-300x300.jpg'
        ],
        [
          'name' => 'Chain Set',
          'price' => 3500,
          'image' => 'https://i.ebayimg.com/images/g/CckAAOSwyZlnofY2/s-l400.jpg'
        ],
        [
          'name' => 'Tyre',
          'price' => 5500,
          'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBNCrtAkLzSxx2JEoT-pqLmvQQV-B8etLV5A&s'
        ],
        [
          'name' => 'Spark Plug',
          'price' => 800,
          'image' => 'https://image.made-in-china.com/202f0j00WnNlbywzGdup/High-Quality-Motorbike-Genuine-LG-12cm-Spark-Plug-D8TC-or-100cc-150cc-200cc-Classic-Motorcycle-ATV-Dirt-Bike-Accessories.webp'
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
