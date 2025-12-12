@extends('layout')

@section('content')
<div class="container text-center my-5">
  <div class="card shadow p-5 mx-auto" style="max-width: 600px; border-radius: 20px;">
    <h2 class="fw-bold mb-4 text-success">🎉 Thank You for Your Order!</h2>
    <p class="lead mb-4">
      Your order has been placed successfully. We truly appreciate your trust in us.
    </p>
    <p class="text-muted">You will receive an email confirmation shortly.</p>

    <a href="{{ route('home') }}" class="btn btn-primary mt-4 px-4">🏠 Go to Home Page</a>

  </div>
</div>
  </div>
</div>

<script>
    // Clear the cart on successful order
    localStorage.removeItem('cart');
</script>
@endsection
