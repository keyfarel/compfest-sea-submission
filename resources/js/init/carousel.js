// resources/js/carousel.js

window.initializeCarousel = function () {
    const inner = document.getElementById('carouselInner');
    if (!inner || inner.children.length === 0) return;

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const items = inner.children;

    let currentScroll = 0;
    let itemWidth = 0;
    let totalScrollableWidth = 0;

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func(...args), wait);
        };
    }

    function updateButtons() {
        prevBtn.classList.toggle('hidden', currentScroll < 1);
        nextBtn.classList.toggle('hidden', currentScroll >= totalScrollableWidth - 1);
    }

    function handlePrevClick() {
        currentScroll = Math.max(0, currentScroll - itemWidth);
        inner.style.transform = `translateX(-${currentScroll}px)`;
        updateButtons();
    }

    function handleNextClick() {
        currentScroll = Math.min(totalScrollableWidth, currentScroll + itemWidth);
        inner.style.transform = `translateX(-${currentScroll}px)`;
        updateButtons();
    }

    function setupCarousel() {
        currentScroll = 0;
        inner.style.transform = 'translateX(0px)';

        const screenWidth = window.innerWidth;
        let visibleItems = screenWidth < 640 ? 1 : screenWidth < 1024 ? 2 : 3;

        itemWidth = items[0].offsetWidth;
        totalScrollableWidth = (items.length - visibleItems) * itemWidth;

        if (items.length > visibleItems) {
            nextBtn.classList.remove('hidden');
            prevBtn.onclick = handlePrevClick;
            nextBtn.onclick = handleNextClick;
        } else {
            prevBtn.classList.add('hidden');
            nextBtn.classList.add('hidden');
            prevBtn.onclick = null;
            nextBtn.onclick = null;
        }

        updateButtons();
    }

    setupCarousel();
    window.addEventListener('resize', debounce(setupCarousel, 250));
};

// Jalankan di load awal
document.addEventListener('DOMContentLoaded', () => {
    window.initializeCarousel();
});

// Jalankan ulang setelah navigasi Livewire SPA
document.addEventListener('livewire:navigated', () => {
    window.initializeCarousel();
});
