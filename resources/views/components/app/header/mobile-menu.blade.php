<!-- Mobile Navigation -->
@php
    $activeClasses = 'text-green-600 font-semibold';
    $inactiveClasses = 'text-gray-800 hover:text-green-500';
    $commonClasses = 'hover:bg-transparent transition-colors duration-300';
@endphp




<div x-show="open" x-transition class="lg:hidden px-4 pb-4">
    <ul class="menu bg-base-100 w-full rounded-box space-y-2">
        <li>
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}"
               wire:navigate>
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('menu') }}"
               class="{{ request()->routeIs('menu*') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}"
               wire:navigate>
                Menu
            </a>
        </li>
        <li>
            <a href="{{ route('testimoni') }}"
               class="{{ request()->routeIs('testimoni*') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}"
               wire:navigate>
                Testimonials
            </a>
        </li>
        <li>
            <a href="{{ route('subscription') }}"
               class="{{ request()->routeIs('subscription*') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}"
               wire:navigate>
                Subscription
            </a>
        </li>
        <li>
            <a href="{{ route('contact') }}"
               class="{{ request()->routeIs('contact') ? $activeClasses : $inactiveClasses }} {{ $commonClasses }}"
               wire:navigate>
                Contact Us
            </a>
        </li>

        <li><a href="#" class="btn btn-ghost w-full border border-base-300 mt-3">Log In</a></li>
        <li><a href="#" class="btn btn-primary bg-green-600 hover:bg-green-700 border-none text-white w-full">Order
                Now</a></li>
    </ul>
</div>
