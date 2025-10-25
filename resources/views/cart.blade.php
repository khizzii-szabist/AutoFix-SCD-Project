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
        <input class="form-check-input" type="radio" name="payment" id="cod" value="Cash on Delivery" checked onchange="toggleCardFields()">
        <label class="form-check-label" for="cod">Cash on Delivery</label>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="payment" id="card" value="Credit/Debit Card" onchange="toggleCardFields()">
        <label class="form-check-label" for="card">Credit/Debit Card</label>
      </div>

      <!-- Hidden card details section -->
      <div id="cardDetails" style="display:none;">
        <h6 class="fw-bold mt-3">Card Details</h6>
        <div class="mb-2">
          <label class="form-label">Card Number</label>
          <input type="text" id="cardNumber" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx">
        </div>
        <div class="mb-2">
          <label class="form-label">Expiry Date</label>
          <input type="month" id="expiryDate" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">CVV</label>
          <input type="password" id="cvv" class="form-control" maxlength="3" placeholder="123">
        </div>
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
  let table = `<table class='table table-bordered text-center align-middle'>
    <thead class='table-dark'>
      <tr><th>#</th><th>Item</th><th>Price (Rs)</th><th>Quantity</th><th>Subtotal</th><th>Action</th></tr>
    </thead><tbody>`;

  cart.forEach((item, index) => {
    let subtotal = item.price * (item.quantity || 1);
    total += subtotal;
    table += `
      <tr>
        <td>${index + 1}</td>
        <td>${item.name}</td>
        <td>${item.price}</td>
        <td>
          <input type='number' min='1' value='${item.quantity || 1}' class='form-control text-center' 
                 style='width:80px; display:inline-block;' 
                 onchange='updateQuantity(${index}, this.value)'>
        </td>
        <td>${subtotal}</td>
        <td>
          <button class='btn btn-sm btn-outline-danger' onclick='deleteItem(${index})'>Delete</button>
        </td>
      </tr>`;
  });

  table += `</tbody></table>
    <div class='text-end fw-bold'>Total: Rs ${total}</div>`;

  container.innerHTML = table;
  checkoutSection.style.display = "block";
}

// ✅ Update quantity in cart
function updateQuantity(index, newQty) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  newQty = parseInt(newQty);
  if (newQty < 1 || isNaN(newQty)) {
    alert("Quantity must be at least 1");
    return;
  }
  cart[index].quantity = newQty;
  localStorage.setItem('cart', JSON.stringify(cart));
  loadCart(); // refresh table
}

// ✅ Delete a single item
function deleteItem(index) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart));
  loadCart();
}

// ✅ Clear entire cart
function clearCart() {
  localStorage.removeItem('cart');
  loadCart();
}

function toggleCardFields() {
  const cardSelected = document.getElementById('card').checked;
  document.getElementById('cardDetails').style.display = cardSelected ? 'block' : 'none';
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

  if (payment === "Credit/Debit Card") {
    const cardNumber = document.getElementById('cardNumber').value.trim();
    const expiryDate = document.getElementById('expiryDate').value;
    const cvv = document.getElementById('cvv').value.trim();

    if (!cardNumber || !expiryDate || !cvv) {
      alert("Please fill in all card details.");
      return;
    }
  }

  const order = {
    customer: { name, phone, address, payment },
    items: JSON.parse(localStorage.getItem('cart')) || [],
    date: new Date().toLocaleString()
  };

  localStorage.setItem('lastOrder', JSON.stringify(order));

  alert("✅ Thank you " + name + "! Your order has been placed successfully.");
  localStorage.removeItem('cart');
  loadCart();
}

loadCart();
</script>
@endsection
