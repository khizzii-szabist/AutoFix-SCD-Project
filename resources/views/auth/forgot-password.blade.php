@extends('layout')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 py-5">
    
    <div class="card shadow-lg p-5 border-0 bg-dark-card" style="max-width: 500px; width: 100%; border-radius: 15px;">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-white mb-2">Reset Password</h2>
            <p class="text-muted">
                No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="form-label text-muted fw-bold">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary text-muted"><i class="fas fa-envelope"></i></span>
                    <input type="email" id="email" name="email" class="form-control bg-dark border-secondary text-white" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                </div>
                @error('email')
                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary py-2 fw-bold shadow-sm">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-decoration-none text-muted hover-text-white transition-colors">
                    <i class="fas fa-arrow-left me-1"></i> Back to Login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
