@props(['title' => ''])

<div
    x-data="{ open: @entangle($attributes->wire('model')) }"
    x-cloak
    x-show="open"
    x-on:keydown.escape.window="open = false"
    style="display: none;"
    class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm z-50 flex items-start sm:items-center justify-center sm:p-4"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    <!-- Overlay -->
    <div class="absolute inset-0" x-on:click="open = false"></div>

    <!-- Modal -->
    <div
        x-show="open"
        style="display: none;"
        @class([
            'relative flex flex-col w-full bg-white shadow-xl',
            'h-screen max-h-screen',
            'sm:h-auto sm:max-h-[90vh]',
            'sm:max-w-2xl',
            'sm:rounded-xl',
        ])
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-full sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-full sm:translate-y-0 sm:scale-95"
    >
        <!-- 1. Header Modal -->
        <div class="flex-shrink-0 px-6 sm:px-8 py-4 flex items-center justify-between border-b">
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900">{{ $title }}</h3>
            <button x-on:click="open = false" class="p-1 rounded-full hover:bg-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- 2. Body Modal -->
        <div class="flex-grow overflow-y-auto px-6 sm:px-8 py-6">
            {{ $slot }}
        </div>

        <!-- 3. Footer Modal -->
        @if(isset($footer))
            <div class="flex-shrink-0 px-6 sm:px-8 py-4 text-center border-t bg-gray-50">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
