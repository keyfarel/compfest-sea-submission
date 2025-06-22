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

<div class="flex flex-col min-h-screen">
    <x-layouts.header.index/>
    <main class="flex-grow">
        {{ $slot }}
    </main>
    <x-layouts.footer.index/>
</div>

@livewireScripts
</body>
</html>
