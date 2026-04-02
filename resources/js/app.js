import './bootstrap';

// ========== SWIPER HERO ==========
new Swiper('.mySwiper', {
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    autoplay: { delay: 4000, disableOnInteraction: false },
});

// ========== TABS ==========
document.querySelectorAll('.media-tab-button').forEach(function(tabBtn) {
    tabBtn.addEventListener('click', function() {
        document.querySelectorAll('.media-tab-button').forEach(b => {
            b.classList.remove('active', 'border-orange-500', 'text-orange-600');
            b.classList.add('border-transparent', 'text-gray-500');
        });
        this.classList.add('active', 'border-orange-500', 'text-orange-600');
        this.classList.remove('border-transparent', 'text-gray-500');
        const targetId = this.getAttribute('data-tab');
        document.querySelectorAll('.media-tab-content').forEach(tc => tc.classList.add('hidden'));
        document.getElementById(targetId).classList.remove('hidden');
    });
});
