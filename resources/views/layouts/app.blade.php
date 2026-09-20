<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Polres Malang — Portal Resmi Kepolisian')</title>
    <meta name="description" content="@yield('meta_description', 'Website Resmi Polres Malang — Informasi layanan publik kepolisian, berita presisi, dan portal pengaduan masyarakat.')">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Styles & Scripts (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-[#F5F7FA] text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    <!-- Top Navigation Bar -->
    <x-navbar />

    <!-- Main Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- Scroll to top button -->
    <div x-data="scrollTop" x-show="show" x-transition.opacity.duration.200ms class="fixed bottom-6 right-6 z-40">
        <button @click="scrollToTop()" type="button"
                class="w-10 h-10 bg-navy-700 hover:bg-navy-800 text-gold-400 border border-navy-600
                       flex items-center justify-center transition-colors duration-150 shadow-lg rounded"
                title="Kembali ke Atas">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </button>
    </div>

    @stack('scripts')
</body>
</html>
