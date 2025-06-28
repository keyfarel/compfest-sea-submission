@props(['title' => ''])

<div
    x-data="{ open: @entangle($attributes->wire('model')) }"
    x-init="$watch('open', value => document.body.classList.toggle('overflow-hidden', value))"
    x-cloak
    x-show="open"
    x-on:keydown.escape.window="open = false"
    style="display: none;"
    class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm z-50 flex items-center justify-center sm:p-4"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    <div class="absolute inset-0" x-on:click="open = false"></div>

    <div
        x-show="open"
        style="display: none;"
        @class([
            'relative flex flex-col w-full bg-white shadow-xl',
            'h-screen max-h-screen', // Tetap tinggi penuh di mobile
            'sm:h-auto sm:max-h-[90vh]',
            'sm:max-w-2xl',
            'sm:rounded-xl',
        ])
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        {{-- DIUBAH: justify-center untuk mobile, justify-between untuk desktop --}}
        <div class="flex-shrink-0 px-6 sm:px-8 py-4 flex items-center justify-center sm:justify-between border-b">
            <h3 class="text-lg sm:text-xl font-bold text-gray-900 text-center sm:text-left">{{ $title }}</h3>
        </div>

        {{-- DIUBAH: Body sekarang menjadi flex container untuk memusatkan konten di mobile --}}
        <div class="flex-grow overflow-y-auto px-6 sm:px-8 py-6 flex flex-col justify-center">
            {{ $slot }}
        </div>

        @if(isset($footer))
            <div class="flex-shrink-0 px-6 sm:px-8 py-4 border-t bg-gray-50">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
