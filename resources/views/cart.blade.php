@extends('layout')

@section('content')
<div class="container my-5">
  <h2 class="fw-bold mb-4 text-center">Your Cart</h2>

  <div id="cartContainer" class="text-center mb-5"></div>

  <div id="checkoutSection" style="display:none;">
    <h4 class="fw-bold mb-3 text-center">Delivery Details</h4>
    <form id="checkoutForm" class="mx-auto" style="max-width: 500px; text-align:left;">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="tel" id="phone" class="form-control" placeholder="03xx-xxxxxxx" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Delivery Address</label>
        <textarea id="address" class="form-control" rows="2" placeholder="Enter your delivery address" required></textarea>
      </div>

      <h5 class="mt-4 mb-2 fw-bold">Payment Method</h5>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="payment" id="cod" value="Cash on Delivery" checked>
        <label class="form-check-label" for="cod">Cash on Delivery</label>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="payment" id="card" value="Credit/Debit Card">
        <label class="form-check-label" for="card">Credit/Debit Card</label>
      </div>

      <div class="text-center mt-4">
        <button type="button" onclick="checkout()" class="btn btn-success w-100">Checkout</button>
      </div>
    </form>
  </div>

  <div class="text-center mt-4">
    <button class="btn btn-danger" onclick="clearCart()">Clear Cart</button>
  </div>
</div>

<script>
function loadCart() {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  let container = document.getElementById('cartContainer');
  let checkoutSection = document.getElementById('checkoutSection');

  if (cart.length === 0) {
    container.innerHTML = "<p>Your cart is empty. <a href='/services'>Go back</a></p>";
    checkoutSection.style.display = "none";
    return;
  }

  let total = 0;
  let table = `<table class='table table-bordered text-center'>
    <thead class='table-dark'>
      <tr><th>#</th><th>Item</th><th>Price (Rs)</th></tr>
    </thead><tbody>`;

  cart.forEach((item, index) => {
    total += item.price;
    table += `<tr><td>${index + 1}</td><td>${item.name}</td><td>${item.price}</td></tr>`;
  });

  table += `</tbody></table>
    <div class='text-end fw-bold'>Total: Rs ${total}</div>`;

  container.innerHTML = table;
  checkoutSection.style.display = "block";
}

function clearCart() {
  localStorage.removeItem('cart');
  loadCart();
}

function checkout() {
  const name = document.getElementById('name').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const address = document.getElementById('address').value.trim();
  const payment = document.querySelector('input[name="payment"]:checked').value;

  if (!name || !phone || !address) {
    alert("Please fill in all delivery details.");
    return;
  }

  const order = {
    customer: { name, phone, address, payment },
    items: JSON.parse(localStorage.getItem('cart')) || [],
    date: new Date().toLocaleString()
  };

  // Save order temporarily (you can later send to backend)
  localStorage.setItem('lastOrder', JSON.stringify(order));

  alert("✅ Thank you " + name + "! Your order has been placed successfully.");
  localStorage.removeItem('cart');
  loadCart();
}
loadCart();
</script>
@endsection
