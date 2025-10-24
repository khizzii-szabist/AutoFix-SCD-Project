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
          <p><strong>Address:</strong> Bike Market, Saddar, Karachi</p>
          <p><strong>Phone:</strong> +92 300 1234567</p>
          <p><strong>Email:</strong> chotu.mechanic@szabist.pk</p>

          <hr>
          <div class="ratio ratio-16x9">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14480.148083300195!2d67.02524265000001!3d24.86258515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e6d06bea525%3A0xca5759c73e8b99ce!2sSaddar%20Karachi!5e0!3m2!1sen!2s!4v1761298013738!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
