@guest
    <li>
        <a href="{{ route('login') }}"
           class="btn btn-ghost w-full border border-base-300 mt-3">Log In</a>
    </li>
    <li>
        <a href="{{ route('register') }}"
           class="btn btn-primary bg-green-600 hover:bg-green-700 border-none text-white w-full">Register</a>
    </li>
@else
    @if (Auth::user()->role_id == 1)
        <li>
            <a href="{{ route('admin-dashboard') }}"
               class="btn btn-ghost w-full border border-base-300 mt-3">Dashboard</a>
        </li>
    @else
        <li>
            <a href="{{ route('user-dashboard') }}"
               class="btn btn-ghost w-full border border-base-300 mt-3">Dashboard</a>
        </li>
    @endif

    <li>
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="btn btn-error w-full mt-3 hover:bg-red-600 active:bg-red-700 text-white border-none">
            Logout
        </a>
    </li>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
        @csrf
    </form>
@endguest
