import Alpine from 'alpinejs';

// Admin sidebar toggle
Alpine.data('adminSidebar', () => ({
    open: window.innerWidth >= 1024,
    toggle() { this.open = !this.open; },
    close() { this.open = false; },
}));

// Confirm delete dialog
Alpine.data('confirmDelete', () => ({
    show: false,
    formId: null,
    trigger(formId) {
        this.formId = formId;
        this.show = true;
    },
    confirm() {
        if (this.formId) {
            document.getElementById(this.formId).submit();
        }
        this.show = false;
    },
    cancel() {
        this.show = false;
        this.formId = null;
    },
}));

// Image preview
Alpine.data('imagePreview', () => ({
    preview: null,
    handleFile(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => { this.preview = e.target.result; };
            reader.readAsDataURL(file);
        }
    },
}));

// Multi-file preview (Galeri)
Alpine.data('multiFilePreview', () => ({
    previews: [],
    handleFiles(event) {
        this.previews = [];
        const files = Array.from(event.target.files);
        files.forEach(file => {
            const reader = new FileReader();
            reader.onload = (e) => { this.previews.push(e.target.result); };
            reader.readAsDataURL(file);
        });
    },
}));

// Flash message auto-dismiss
Alpine.data('flashMessage', () => ({
    show: true,
    init() {
        setTimeout(() => { this.show = false; }, 4000);
    },
}));

// Tab component
Alpine.data('tabs', (defaultTab = 0) => ({
    active: defaultTab,
    setTab(index) { this.active = index; },
}));

window.Alpine = Alpine;
Alpine.start();
