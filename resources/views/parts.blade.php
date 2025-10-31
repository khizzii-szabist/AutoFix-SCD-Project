@extends('layout')

@section('content')
<div class="container my-5 text-center">
  <h2 class="fw-bold mb-4">Available Parts</h2>

  <div class="row justify-content-center">

    <!-- Battery Card -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100 border-0">
        <a href="{{ url('/battery') }}">
          <img src="https://static.vecteezy.com/system/resources/thumbnails/055/768/265/small/motorcycle-battery-on-a-white-background-photo.jpg" 
               class="card-img-top" alt="Battery" style="height:200px; object-fit:cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">Battery</h5>
          <p class="card-text text-muted">Rs 7,000</p>
          <button class="btn btn-primary btn-sm" onclick="addToCart('Battery', 7000)">Add to Cart</button>
          <a href="{{ url('/battery') }}" class="btn btn-outline-secondary btn-sm mt-2">View More</a>
        </div>
      </div>
    </div>

    <!-- Brake Pads Card -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100 border-0">
        <a href="{{ url('/brake-pads') }}">
          <img src="https://www.sparify.co/cdn/shop/products/20221215_000704_0000.png?v=1671043199&width=533" 
               class="card-img-top" alt="Brake Pads" style="height:200px; object-fit:cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">Brake Pads</h5>
          <p class="card-text text-muted">Rs 2,500</p>
          <button class="btn btn-primary btn-sm" onclick="addToCart('Brake Pads', 2500)">Add to Cart</button>
          <a href="{{ url('/brake-pads') }}" class="btn btn-outline-secondary btn-sm mt-2">View More</a>
        </div>
      </div>
    </div>

    <!-- Headlight Card -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100 border-0">
        <a href="{{ url('/headlight') }}">
          <img src="https://www.roadiesstore.com/wp-content/uploads/2020/02/4_Motorcycle-Dominator-Grill-Twins-Dual-Headlight-Streetfighter-Double-Headlamp-For-Harley-Cafe-Racer-Honda-Yamaha-Custom-1-300x300.jpg" 
               class="card-img-top" alt="Headlight" style="height:200px; object-fit:cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">Headlight</h5>
          <p class="card-text text-muted">Rs 1,200</p>
          <button class="btn btn-primary btn-sm" onclick="addToCart('Headlight', 1200)">Add to Cart</button>
          <a href="{{ url('/headlight') }}" class="btn btn-outline-secondary btn-sm mt-2">View More</a>
        </div>
      </div>
    </div>

    <!-- Chain Set Card -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100 border-0">
        <a href="{{ url('/chain-set') }}">
          <img src="https://i.ebayimg.com/images/g/CckAAOSwyZlnofY2/s-l400.jpg" 
               class="card-img-top" alt="Chain Set" style="height:200px; object-fit:cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">Chain Set</h5>
          <p class="card-text text-muted">Rs 3,500</p>
          <button class="btn btn-primary btn-sm" onclick="addToCart('Chain Set', 3500)">Add to Cart</button>
          <a href="{{ url('/chain-set') }}" class="btn btn-outline-secondary btn-sm mt-2">View More</a>
        </div>
      </div>
    </div>

    <!-- Tyre Card -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100 border-0">
        <a href="{{ url('/tyre') }}">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBNCrtAkLzSxx2JEoT-pqLmvQQV-B8etLV5A&s" 
               class="card-img-top" alt="Tyre" style="height:200px; object-fit:cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">Tyre</h5>
          <p class="card-text text-muted">Rs 5,500</p>
          <button class="btn btn-primary btn-sm" onclick="addToCart('Tyre', 5500)">Add to Cart</button>
          <a href="{{ url('/tyre') }}" class="btn btn-outline-secondary btn-sm mt-2">View More</a>
        </div>
      </div>
    </div>

    <!-- Spark Plug Card -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm h-100 border-0">
        <a href="{{ url('/spark-plug') }}">
          <img src="https://image.made-in-china.com/202f0j00WnNlbywzGdup/High-Quality-Motorbike-Genuine-LG-12cm-Spark-Plug-D8TC-or-100cc-150cc-200cc-Classic-Motorcycle-ATV-Dirt-Bike-Accessories.webp" 
               class="card-img-top" alt="Spark Plug" style="height:200px; object-fit:cover;">
        </a>
        <div class="card-body">
          <h5 class="card-title">Spark Plug</h5>
          <p class="card-text text-muted">Rs 800</p>
          <button class="btn btn-primary btn-sm" onclick="addToCart('Spark Plug', 800)">Add to Cart</button>
          <a href="{{ url('/spark-plug') }}" class="btn btn-outline-secondary btn-sm mt-2">View More</a>
        </div>
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
