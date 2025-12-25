<nav class="navbar">
    <div class="nav-container">

        {{-- LOGO --}}
        <div class="nav-left">
            <a href="{{ route('home') }}" class="nav-logo">BookTrackr</a>

            {{-- PUBLIC NAV --}}
            @guest
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="{{ route('services') }}" class="nav-link">Services</a>
                <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
            @endguest
        </div>

        {{-- APP NAV --}}
        @auth
            <div class="nav-center">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('books.index') }}" class="nav-link">Books</a>
                <a href="{{ route('books.create') }}" class="nav-link">Add Book</a>
            </div>
        @endauth

        {{-- RIGHT SIDE --}}
        <div class="nav-right">

            {{-- GUEST: profile icon → login --}}
            @guest
                <a href="{{ route('login') }}" class="nav-profile">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile">
                </a>
            @endguest

            {{-- AUTH: profile icon → dashboard --}}
            @auth
                <a href="{{ route('dashboard') }}" class="nav-profile">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile">
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link nav-btn">Logout</button>
                </form>
            @endauth

        </div>

    </div>
</nav>
