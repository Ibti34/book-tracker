<nav class="navbar">
    <div class="nav-container">

        {{-- LEFT --}}
        <div class="nav-left">
            <a href="{{ route('home') }}" class="nav-logo">BookTracker</a>

            @guest
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('about') }}" class="nav-link">About</a>
                <a href="{{ route('services') }}" class="nav-link">Services</a>
                <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
            @endguest
        </div>

        {{-- CENTER --}}
        @auth
            <div class="nav-center">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('books.index') }}" class="nav-link">Books</a>
                <a href="{{ route('books.create') }}" class="nav-link">Add Book</a>
            </div>
        @endauth

        {{-- RIGHT --}}
        <div class="nav-right">

            @guest
                <a href="{{ route('login') }}" class="nav-profile">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile">
                </a>
            @endguest

            @auth
                <div class="nav-user">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile">
                    <span class="nav-username">
                        {{ Auth::user()->name }}
                    </span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-btn">Logout</button>
                </form>
            @endauth

        </div>

    </div>
</nav>
