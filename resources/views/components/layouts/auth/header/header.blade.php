<header class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex justify-between items-center">

        <a href="/" wire:navigate
           class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Home
        </a>

        <a href="/" wire:navigate
           class="flex items-center gap-2 text-lg font-bold text-green-700">
           <x-partials.logo />

            {{-- Teks "SEA Catering" hanya akan muncul di layar 'sm' (640px) ke atas --}}
            <span class="hidden sm:inline">SEA Catering</span>
        </a>

    </div>
</header>
