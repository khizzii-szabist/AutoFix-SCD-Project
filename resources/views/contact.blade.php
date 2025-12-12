@extends('layout')

@section('content')
<section class="hero-section text-center d-flex align-items-center justify-content-center" style="min-height: 40vh;">
  <div class="container position-relative z-2">
    <h1 class="fw-bold display-4 text-white">Get in <span class="text-primary">Touch</span></h1>
    <p class="lead text-light">We’d love to hear from you. Contact us with any questions or feedback!</p>
  </div>
</section>

<section class="container my-5">
  <div class="row g-5">
    <!-- Contact Form -->
    <div class="col-lg-6">
      <div class="card h-100 p-4 border-0">
        <div class="card-body">
          <h3 class="fw-bold mb-4 text-primary">Send Us a Message</h3>
          <form id="contactForm">
            <div class="mb-3">
              <label for="name" class="form-label text-muted">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label text-muted">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label text-muted">Message</label>
              <textarea id="message" name="message" rows="4" class="form-control" placeholder="Write your message..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary px-4 w-100">Send Message</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Contact Info + Map -->
    <div class="col-lg-6">
      <div class="card h-100 p-4 border-0">
        <div class="card-body">
          <h3 class="fw-bold mb-4 text-accent">Contact Information</h3>
          <ul class="list-unstyled mb-4">
              <li class="mb-3"><strong class="text-white">Address:</strong> <span class="text-muted">Bike Market, Saddar, Karachi</span></li>
              <li class="mb-3"><strong class="text-white">Phone:</strong> <span class="text-muted">+92 300 1234567</span></li>
              <li class="mb-3"><strong class="text-white">Email:</strong> <span class="text-muted">chotu.mechanic@szabist.pk</span></li>
          </ul>

          <div class="ratio ratio-16x9 rounded overflow-hidden border border-secondary">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14480.148083300195!2d67.02524265000001!3d24.86258515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e6d06bea525%3A0xca5759c73e8b99ce!2sSaddar%20Karachi!5e0!3m2!1sen!2s!4v1761298013738!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Simulate form submission
    Swal.fire({
        title: 'Message Sent!',
        text: 'Thank you for reaching out. We will get back to you shortly!',
        icon: 'success',
        background: '#1f2937', 
        color: '#fff',
        confirmButtonColor: '#3B82F6',
        timer: 3000,
        timerProgressBar: true
    });

    this.reset();
});
</script>
@endsection
