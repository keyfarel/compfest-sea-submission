<header class="sticky top-0 z-50 bg-base-100/80 backdrop-blur-lg border-b" x-data="{ open: false }">
    <div class="container mx-auto navbar px-4">
        <x-layouts.header.brand/>
        <x-layouts.header.desktop-menu/>
        <x-layouts.header.desktop-actions/>
        <x-layouts.header.mobile-toggle/>
    </div>

    <x-layouts.header.mobile-menu/>
</header>
