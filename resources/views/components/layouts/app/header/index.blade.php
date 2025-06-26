<header class="sticky top-0 z-50 bg-base-100 border-b" x-data="{ open: false }">
    <!-- Header Container -->
    <div class="container mx-auto navbar px-4">
        <x-layouts.app.header.brand/>
        <x-layouts.app.header.desktop-menu/>
        <x-layouts.app.header.desktop-actions/>
        <x-layouts.app.header.mobile-toggle/>
    </div>
    <x-layouts.app.header.mobile-menu/>
</header>
