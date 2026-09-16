import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import intersect from '@alpinejs/intersect';

// Register Alpine plugins
Alpine.plugin(collapse);
Alpine.plugin(intersect);

// Hero Slider component
Alpine.data('heroSlider', () => ({
    current: 0,
    slides: [],
    autoPlayInterval: null,
    init() {
        this.slides = this.$el.querySelectorAll('[data-slide]');
        if (this.slides.length > 1) {
            this.startAutoPlay();
        }
    },
    startAutoPlay() {
        this.autoPlayInterval = setInterval(() => this.next(), 5000);
    },
    stopAutoPlay() {
        clearInterval(this.autoPlayInterval);
    },
    next() {
        this.current = (this.current + 1) % this.slides.length;
    },
    prev() {
        this.current = (this.current - 1 + this.slides.length) % this.slides.length;
    },
    goTo(index) {
        this.current = index;
        this.stopAutoPlay();
        this.startAutoPlay();
    },
}));

// Mobile menu
Alpine.data('mobileMenu', () => ({
    open: false,
    toggle() { this.open = !this.open; },
    close() { this.open = false; },
}));

// Dropdown menu
Alpine.data('dropdown', () => ({
    open: false,
    toggle() { this.open = !this.open; },
    close() { this.open = false; },
}));

// Scroll to top
Alpine.data('scrollTop', () => ({
    show: false,
    init() {
        window.addEventListener('scroll', () => {
            this.show = window.scrollY > 400;
        });
    },
    scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    },
}));

// Animate on scroll (uses intersect plugin)
Alpine.data('fadeInUp', () => ({
    visible: false,
}));

// Flash message auto-dismiss
Alpine.data('flashMessage', () => ({
    show: true,
    init() {
        setTimeout(() => { this.show = false; }, 5000);
    },
}));

window.Alpine = Alpine;
Alpine.start();
