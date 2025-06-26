<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SEA Catering' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('css')
</head>
<body class="antialiased">

<div class="min-h-screen flex flex-col">
    <x-layouts.auth.header.header/>
    <main class="flex-grow flex items-center justify-center p-4">
        {{ $slot }}
    </main>
</div>

@livewireScripts
@stack('scripts')
</body>
</html>
