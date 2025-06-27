<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }} - SEA Catering</title>
    <link rel="icon" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('css')
</head>
<body class="antialiased bg-gray-100">

<div x-data="{ sidebarOpen: window.innerWidth >= 1024 }" @resize.window="sidebarOpen = window.innerWidth >= 1024"
     class="relative min-h-screen">

    <x-layouts.dashboard.user.sidebar.index/>

    <div x-show="sidebarOpen" @click="sidebarOpen = false"
         class="fixed inset-0 z-20 bg-black/30 backdrop-blur-sm lg:hidden" x-cloak></div>


    <div class="flex flex-1 flex-col transition-all duration-300 ease-in-out"
         :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-0'">

        <x-layouts.dashboard.user.header.index/>
        <x-layouts.dashboard.user.breadcrumb.index/>

        <main class="flex-1 overflow-y-auto">
            <div class="mx-auto px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

@livewireScripts
@stack('scripts')
</body>
</html>
