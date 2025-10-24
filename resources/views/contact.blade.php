@extends('layout')

@section('content')
<section class="contact-header text-center py-5 text-white">
  <div class="overlay"></div>
  <div class="container position-relative">
    <h1 class="fw-bold display-5">Get in Touch</h1>
    <p class="lead">We’d love to hear from you. Contact us with any questions or feedback!</p>
  </div>
</section>

<section class="container my-5">
  <div class="row g-5">
    <!-- Contact Form -->
    <div class="col-lg-6">
      <div class="card shadow border-0">
        <div class="card-body p-4">
          <h3 class="fw-bold mb-4 text-primary">Send Us a Message</h3>
          <form method="POST" action="#">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea id="message" name="message" rows="4" class="form-control" placeholder="Write your message..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4">Send Message</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Contact Info + Map -->
    <div class="col-lg-6">
      <div class="card shadow border-0">
        <div class="card-body p-4">
          <h3 class="fw-bold mb-4 text-primary">Contact Information</h3>
          <p><strong>Address:</strong> 123 Bike Street, Cityville</p>
          <p><strong>Phone:</strong> +92 300 1234567</p>
          <p><strong>Email:</strong> info@mylaravelapp.com</p>

          <hr>
          <div class="ratio ratio-16x9">
            <iframe 
              src="https://www.google.com/maps?q=Lahore&output=embed" 
              allowfullscreen 
              loading="lazy">
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
