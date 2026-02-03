@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero">
  <div class="hero-overlay">
    <div class="hero-content">
      <h2>Welcome to BookTracker</h2>

      <p>
        Track your reading, manage book lists, and discover new favorites — all in one place.
      </p>

      <!-- LOGIN / REGISTER BUTTONS -->
      <div class="hero-buttons">
        <a href="{{ route('login') }}" class="cta-button">Login</a>
        <a href="{{ route('register') }}" class="cta-button">Register</a>
      </div>

    </div>
  </div>
</section>

<!-- Features -->
<section class="features">
  <div class="container">
    <h3>Why Choose BookTracker?</h3>

    <div class="features-grid">
      <div class="feature-card">
        <h4>📚 Book Lists</h4>
        <p>
          Organize your reading lists by categories like “To Read”, “Reading”, and “Finished”.
        </p>
      </div>
    </div>
  </div>
</section>

<footer class="text-center py-6">
  &copy; 2025 BookTracker
</footer>

@endsection
