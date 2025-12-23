<nav class="navbar">
    <div class="nav-container">

        {{-- LOGO --}}
        <div class="nav-left">
            <a href="{{ route('home') }}" class="nav-logo">BookTrackr</a>

            {{-- PUBLIC NAV (ONLY ON PUBLIC PAGES) --}}
            @guest
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="{{ route('services') }}" class="nav-link">Services</a>
                <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
            @endguest
        </div>

        {{-- APP NAV (ONLY AFTER LOGIN) --}}
        @auth
            <div class="nav-center">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('books.index') }}" class="nav-link">Books</a>
                <a href="{{ route('books.create') }}" class="nav-link">Add Book</a>
            </div>
        @endauth

        {{-- RIGHT SIDE --}}
        <div class="nav-right">
            @guest
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-link nav-btn">Register</a>
            @endguest

            @auth
                <span class="nav-user">{{ Auth::user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link nav-btn">Logout</button>
                </form>
            @endauth
        </div>

    </div>
</nav>
