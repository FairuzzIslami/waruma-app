import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // 1. Toggle Hamburger Menu
    const btn = document.getElementById('hamburger-btn');
    const menu = document.getElementById('mobile-menu');
    const iconBurger = document.getElementById('icon-hamburger');
    const iconClose = document.getElementById('icon-close');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    if (btn && menu) {
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            iconBurger.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });

        // Tutup menu saat link diklik
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
                iconBurger.classList.remove('hidden');
                iconClose.classList.add('hidden');
            });
        });
    }

    // 2. Scroll To Top Visibility & Action
    const scrollTopBtn = document.getElementById('scroll-top-btn');
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.remove('hidden');
            } else {
                scrollTopBtn.classList.add('hidden');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});

// Global Shortcut Ctrl + K untuk Focus ke Field Pencarian
document.addEventListener('keydown', (e) => {
    if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
        e.preventDefault();

        // Cari elemen input yang memiliki atribut data-search-input atau ID inputCari
        const searchInput = document.querySelector('[data-search-input]') || document.getElementById('inputCari');

        if (searchInput) {
            searchInput.focus();
            if (typeof searchInput.select === 'function') {
                searchInput.select();
            }
        }
    }
});
