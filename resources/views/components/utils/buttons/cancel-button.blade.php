@props([
    'wireClick' => '', // Aksi yang dipanggil, misalnya "$set('modal', false)"
    'text' => 'Batal', // Default teks tombol
])

<button wire:click="{{ $wireClick }}" type="button"
    {{ $attributes->merge([
        'class' => 'inline-flex justify-center w-full sm:w-auto px-4 py-2 bg-gray-200 text-gray-800 rounded-lg
                    hover:bg-gray-300 transition duration-200 text-sm font-semibold
                    focus:outline-none focus:ring-0 focus:border-none active:ring-0 active:border-none'
    ]) }}>
    {{ $text }}
</button>
