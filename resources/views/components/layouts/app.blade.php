<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SEA Catering' }}</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="antialiased">

<!-- Layout Container -->
<div class="flex flex-col min-h-screen">
    <!-- Navigation Bar -->
    <x-app.header.index/>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-app.footer.index/>
</div>

@livewireScripts
</body>
</html>
