@extends('layout')

@section('content')
<section class="container my-5 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card p-4 border-0">
        <h2 class="fw-bold mb-4 text-center text-white">🛒 Your <span class="text-primary">Shopping Cart</span></h2>

        <div id="cart-container" class="text-center">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price (Rs)</th>
                  <th>Quantity</th>
                  <th>Subtotal (Rs)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="cart-items"></tbody>
            </table>
          </div>

          <h4 class="mt-4 mb-4 text-end text-white">Total: <span class="text-accent">Rs <span id="cart-total">0</span></span></h4>

          <div class="d-flex justify-content-end gap-3">
            <button class="btn btn-outline-danger" onclick="clearCart()">Clear Cart</button>
            <a href="{{ route('checkout') }}" class="btn btn-primary px-4">Proceed to Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function loadCart() {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  let tableBody = document.getElementById('cart-items');
  let total = 0;
  tableBody.innerHTML = '';

  if (cart.length === 0) {
    tableBody.innerHTML = `<tr><td colspan="5" class="text-center text-muted">Your cart is empty.</td></tr>`;
    document.getElementById('cart-total').innerText = 0;
    return;
  }

  cart.forEach((item, index) => {
    let subtotal = item.price * (item.quantity || 1);
    total += subtotal;

    tableBody.innerHTML += `
      <tr>
        <td>${item.name}</td>
        <td>${item.price}</td>
        <td>
          <input type="number" min="1" value="${item.quantity || 1}" 
            class="form-control text-center" style="width:80px; margin:auto; color: #000; font-weight: bold;"
            onchange="updateQuantity(${index}, this.value)">
        </td>
        <td>${subtotal}</td>
        <td>
          <button class="btn btn-sm btn-outline-danger" onclick="removeItem(${index})">Remove</button>
        </td>
      </tr>`;
  });

  document.getElementById('cart-total').innerText = total;
}

function updateQuantity(index, newQuantity) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  newQuantity = parseInt(newQuantity);

  if (newQuantity < 1) newQuantity = 1;

  cart[index].quantity = newQuantity;
  localStorage.setItem('cart', JSON.stringify(cart));
  loadCart();
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
