<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-blue-900 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white text-xl font-bold">
            eProcurement
        </a>
        <div class="hidden md:flex space-x-4">
            @if (Route::has('login'))
                @auth
                    <span class="text-white">Welcome, {{ Auth::user()->registrant }}</span>
                    @if (Auth::user()->role == 0)
                        <a href="{{ url('/admin/dashboard') }}" class="text-white">Dashboard</a>
                    @elseif (Auth::user()->role == 1)
                        <a href="{{ url('/vendor/dashboard') }}" class="text-white">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-white">Register</a>
                    @endif
                @endauth
            @endif
        </div>
        <div class="md:hidden">
            <button id="navbar-toggle" class="text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    <div id="navbar-menu" class="hidden md:hidden">
        @if (Route::has('login'))
            @auth
                <span class="block text-white py-2">Welcome, {{ Auth::user()->registrant }}</span>
                @if (Auth::user()->role == 0)
                    <a href="{{ url('/admin/dashboard') }}" class="block text-white py-2">Dashboard</a>
                @elseif (Auth::user()->role == 1)
                    <a href="{{ url('/vendor/dashboard') }}" class="block text-white py-2">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="block py-2">
                    @csrf
                    <button type="submit" class="text-white w-full text-left">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-white py-2">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block text-white py-2">Register</a>
                @endif
            @endauth
        @endif
    </div>
</nav>
