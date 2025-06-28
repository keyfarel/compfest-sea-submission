@if ($paginator->hasPages())
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">

        <!-- Mobile Pagination -->
        @include('components.utils.paginations.tabel-pagination-mobile')

       <!-- Desktop Pagination -->
        @include('components.utils.paginations.tabel-pagination-desktop')
    </div>
@endif
