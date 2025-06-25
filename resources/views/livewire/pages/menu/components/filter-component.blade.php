{{-- [FINAL] Satu Filter Cerdas untuk Semua Ukuran Layar --}}
<div
    x-data="scrollableFilter()"
    x-init="init()"
    class="relative mb-12">

    {{-- Tombol Panah Kiri --}}
    <button
        x-show="isScrollable && canScrollLeft"
        x-on:click="scrollLeft()"
        class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm h-full px-2 z-10 transition-opacity">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    {{-- Kontainer yang bisa di-scroll --}}
    <div
        x-ref="content"
        x-on:scroll.debounce.100ms="updateArrows()"
        :class="isScrollable ? 'justify-start' : 'justify-center'"
        class="no-scrollbar flex items-center overflow-x-auto">

        {{-- Grup tombol --}}
        <div class="inline-flex items-center space-x-2 p-1 bg-gray-100 rounded-lg">
            {{-- Tombol-tombol filter statis untuk tampilan --}}
            <button
                class="px-5 py-2 text-sm font-semibold text-white bg-green-600 rounded-md shadow-sm flex-shrink-0">
                All
            </button>
            <button
                class="px-5 py-2 text-sm font-semibold text-gray-600 hover:bg-white/60 hover:text-gray-900 rounded-md flex-shrink-0">
                Individual
            </button>
            <button
                class="px-5 py-2 text-sm font-semibold text-gray-600 hover:bg-white/60 hover:text-gray-900 rounded-md flex-shrink-0">
                Family
            </button>
            <button
                class="px-5 py-2 text-sm font-semibold text-gray-600 hover:bg-white/60 hover:text-gray-900 rounded-md flex-shrink-0">
                Specialized
            </button>
        </div>
    </div>

    {{-- Tombol Panah Kanan --}}
    <button
        x-show="isScrollable && canScrollRight"
        x-on:click="scrollRight()"
        class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/80 backdrop-blur-sm h-full px-2 z-10 transition-opacity">
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</div>

{{-- Script Alpine.js "hidup" bersama dengan HTML-nya di dalam komponen ini --}}
@push('scripts')
    <script>
        function scrollableFilter() {
            return {
                isScrollable: false,
                canScrollLeft: false,
                canScrollRight: false,

                init() {
                    this.$nextTick(() => {
                        this.updateArrows();
                    });
                    new ResizeObserver(this.updateArrows.bind(this)).observe(this.$refs.content);
                },
                updateArrows() {
                    const el = this.$refs.content;
                    if (!el) return;
                    const isContentWider = el.scrollWidth > el.clientWidth + 1;
                    this.isScrollable = isContentWider;
                    if (!isContentWider) {
                        this.canScrollLeft = false;
                        this.canScrollRight = false;
                        return;
                    }
                    this.canScrollLeft = el.scrollLeft > 0;
                    this.canScrollRight = Math.ceil(el.scrollLeft) < el.scrollWidth - el.clientWidth;
                },
                scrollLeft() {
                    this.$refs.content.scrollBy({left: -250, behavior: 'smooth'});
                },
                scrollRight() {
                    this.$refs.content.scrollBy({left: 250, behavior: 'smooth'});
                }
            }
        }
    </script>
@endpush
