<header class="sticky top-0 z-50 bg-base-100 border-b" x-data="{ open: false }">
    <!-- Header Container -->
    <div class="container mx-auto navbar px-4">
        <x-app.header.brand/>
        <x-app.header.desktop-menu/>
        <x-app.header.desktop-actions/>
        <x-app.header.mobile-toggle/>
    </div>
    <x-app.header.mobile-menu/>
</header>
