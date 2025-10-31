@extends('layout')

@section('content')
<div class="container my-5">
  <h2 class="fw-bold mb-4 text-center">🧾 Checkout</h2>

  <form action="{{ route('checkout.submit') }}" method="POST" class="mx-auto" style="max-width: 600px;" onsubmit="return handleCheckout(event)">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Delivery Address</label>
      <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Payment Method</label>
      <select class="form-select" id="payment-method" name="payment" required onchange="toggleCardDetails()">
        <option value="">Select Payment Method</option>
        <option value="COD">Cash on Delivery</option>
        <option value="Card">Credit/Debit Card</option>
      </select>
    </div>

    <!-- Card Details Section (Hidden by default) -->
    <div id="card-details" style="display:none;">
      <div class="mb-3">
        <label for="card-number" class="form-label">Card Number</label>
        <input type="text" class="form-control" id="card-number" name="card_number" placeholder="xxxx-xxxx-xxxx-xxxx">
      </div>
      <div class="mb-3">
        <label for="expiry" class="form-label">Expiry Date</label>
        <input type="text" class="form-control" id="expiry" name="expiry" placeholder="MM/YY">
      </div>
      <div class="mb-3">
        <label for="cvv" class="form-label">CVV</label>
        <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123">
      </div>
    </div>

    <h5 class="mt-4">Total: Rs <span id="checkout-total">0</span></h5>

    <button type="submit" class="btn btn-success mt-3 w-100">Place Order</button>
    <a href="{{ route('cart') }}" class="btn btn-outline-secondary mt-2 w-100">Back to Cart</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function loadCheckoutTotal() {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  let total = cart.reduce((sum, item) => sum + item.price, 0);
  document.getElementById('checkout-total').innerText = total;
}

function toggleCardDetails() {
  const paymentMethod = document.getElementById('payment-method').value;
  const cardSection = document.getElementById('card-details');
  if (paymentMethod === 'Card') {
    cardSection.style.display = 'block';
    // Make card fields required
    document.getElementById('card-number').required = true;
    document.getElementById('expiry').required = true;
    document.getElementById('cvv').required = true;
  } else {
    cardSection.style.display = 'none';
    // Remove required attribute
    document.getElementById('card-number').required = false;
    document.getElementById('expiry').required = false;
    document.getElementById('cvv').required = false;
  }
}

function handleCheckout(event) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  if (cart.length === 0) {
    event.preventDefault();
    Swal.fire("Cart is empty!", "Please add items before checkout.", "warning");
    return false;
  }

  localStorage.removeItem('cart');
  Swal.fire({
    title: "Order Placed Successfully!",
    text: "Thank you for shopping with us.",
    icon: "success"
  });
  return true;
}

window.onload = loadCheckoutTotal;
</script>
@endsection
