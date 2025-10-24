<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autofix</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Your Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- ✅ Bootstrap JS Bundle (for Navbar toggle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Autofix</a>

      <!-- Hamburger button for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/parts') }}">Parts</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">Cart</a></li>

        </ul>
      </div>
    </div>
  </nav>
</header>

    <main>
        @yield('content')
    </main>

   <footer class="bg-dark text-white text-center py-3 mt-5">
  <p class="mb-0">&copy; {{ date('Y') }} Auto Fix. All rights reserved.</p>
</footer>

</body>
</html>
