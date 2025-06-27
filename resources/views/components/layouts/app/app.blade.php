<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SEA Catering' }}</title>
    <link rel="icon" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('css')
</head>
<body class="antialiased">

<!-- Layout Container -->
<div class="flex flex-col min-h-screen">
    <!-- Navigation Bar -->
    <x-layouts.app.header.index/>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-layouts.app.footer.index/>
</div>

@livewireScripts
@stack('scripts')
</body>
</html>
