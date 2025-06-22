<!-- Mobile Toggle -->
<div class="navbar-end lg:hidden">

    <!-- Button to toggle mobile menu visibility -->
    <button class="btn btn-ghost" @click="open = !open">
        <!-- Hamburger icon when menu is closed -->
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg> <!-- End of Hamburger icon -->

        <!-- Close icon when menu is open -->
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>  <!-- End of Close icon -->
    </button> <!-- End of Button to toggle mobile menu visibility -->
</div> <!-- End of Mobile Toggle -->
