<div class="navbar-center hidden lg:flex">
    @php
        $activeClasses = 'text-green-600 font-semibold underline';
        $inactiveClasses = 'text-neutral-800 hover:text-green-600 hover:underline';
        $commonClasses = 'hover:bg-transparent decoration-gray-400 decoration-2 underline-offset-4 transition-colors duration-300';
    @endphp

    <ul class="menu menu-horizontal px-1 font-medium">
        <li>
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}" wire:navigate>
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('menu') }}"
               class="{{ request()->routeIs('menu*') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}" wire:navigate>
                Menu
            </a>
        </li>
        <li>
            <a href="{{ route('testimoni') }}"
               class="{{ request()->routeIs('testimoni*') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}" wire:navigate>
                Testimonials
            </a>
        </li>
        <li>
            <a href="{{ route('subscription') }}"
               class="{{ request()->routeIs('subscription*') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}" wire:navigate>
                Subscription
            </a>
        </li>
        <li>
            <a href="{{ route('contact') }}"
               class="{{ request()->routeIs('contact') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}" wire:navigate>
                Contact Us
            </a>
        </li>
    </ul>
</div>
