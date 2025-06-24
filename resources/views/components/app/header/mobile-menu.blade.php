<!-- Mobile Navigation -->
<div x-show="open" x-transition class="lg:hidden px-4 pb-4">
    <ul class="menu bg-base-100 w-full rounded-box space-y-2">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('menu') }}">Menu</a></li>
        <li><a href="{{ route('testimoni') }}">Testimonials</a></li>
        <li><a href="{{ route('subscription') }}">Subscription</a></li>
        <li><a href="{{ route('contact') }}">Contact Us</a></li>
        <li><a href="#" class="btn btn-ghost w-full border border-base-300 mt-3">Log In</a></li>
        <li><a href="#" class="btn btn-primary bg-green-600 hover:bg-green-700 border-none text-white w-full">Order Now</a></li>
    </ul>
</div>
