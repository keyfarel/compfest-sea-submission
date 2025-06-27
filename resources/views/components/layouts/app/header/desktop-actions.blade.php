<!-- Navbar End -->
<div class="navbar-end hidden lg:flex gap-2">
    @guest
        <a href="{{ route('login') }}" class="btn btn-ghost border border-base-300">Log In</a>
        <a href="{{ route('register') }}" class="btn btn-primary bg-green-600 hover:bg-green-700 border-none text-white">Register</a>
    @else
        @if (Auth::user()->role_id == 1)
            <a href="{{ route('admin-dashboard') }}" class="btn btn-ghost border border-base-300">Dashboard</a>
        @else
            <a href="{{ route('user-dashboard') }}" class="btn btn-ghost border border-base-300">Dashboard</a>
        @endif

        <!-- Logout Form Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-error text-white border-none hover:bg-red-600">Logout</button>
        </form>
    @endguest

</div>
