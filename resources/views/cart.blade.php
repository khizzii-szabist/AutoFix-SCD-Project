@extends('layout')

@section('content')
<div class="container my-5">
  <h2 class="fw-bold mb-4 text-center">🛒 Your Shopping Cart</h2>

  <div id="cart-container" class="text-center">
    <table class="table table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th>Product</th>
          <th>Price (Rs)</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="cart-items"></tbody>
    </table>

    <h4 class="mt-3">Total: Rs <span id="cart-total">0</span></h4>

    <div class="mt-4">
      <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
      <button class="btn btn-danger" onclick="clearCart()">Clear Cart</button>
    </div>
  </div>
</div>

<script>
function loadCart() {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  let tableBody = document.getElementById('cart-items');
  let total = 0;
  tableBody.innerHTML = '';

  if (cart.length === 0) {
    tableBody.innerHTML = `<tr><td colspan="3" class="text-center text-muted">Your cart is empty.</td></tr>`;
    return;
  }

  cart.forEach((item, index) => {
    total += item.price;
    tableBody.innerHTML += `
      <tr>
        <td>${item.name}</td>
        <td>${item.price}</td>
        <td><button class="btn btn-sm btn-outline-danger" onclick="removeItem(${index})">Remove</button></td>
      </tr>`;
  });

  document.getElementById('cart-total').innerText = total;
}

function removeItem(index) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart));
  loadCart();
}

function clearCart() {
  localStorage.removeItem('cart');
  loadCart();
}

window.onload = loadCart;
</script>
@endsection
