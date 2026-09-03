<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $siteTitle = \App\Models\Setting::get('site_title', 'Power Family Investment — Wauzaji wa Viwanja, Nyumba na Magari Tanzania');
        $siteDesc = \App\Models\Setting::get('meta_description', 'Tunakuunganisha na chaguo sahihi. Wauzaji wa Viwanja vilivyopimwa, Nyumba za kisasa na Magari yenye ubora Tanzania.');
        $phone = \App\Models\Setting::get('company_phone', '+255 759 423 626');
        $phone2 = \App\Models\Setting::get('company_phone_2', '+255 658 003 626');
        $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '255759423626');
        $email = \App\Models\Setting::get('company_email', 'info@powerfamilyinvestment.co.tz');
        $address = \App\Models\Setting::get('company_address', 'Tanzania');
        $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsappNumber);
    @endphp

    <title>@yield('title', $siteTitle)</title>
    
    <!-- SEO & Open Graph Meta Tags -->
    <meta name="description" content="@yield('meta_description', $siteDesc)">
    <meta name="keywords" content="viwanja tanzania, viwanja vya makazi, viwanja vya biashara, nyumba za kuuza, magari ya kuuza, uwekezaji tanzania, power family investment">
    
    <meta property="og:title" content="@yield('title', $siteTitle)">
    <meta property="og:description" content="@yield('meta_description', $siteDesc)">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
</head>
<body class="flex flex-col min-h-screen bg-neutral-50 text-gray-900 font-sans antialiased selection:bg-[#D48B16] selection:text-white" x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 50)">

    <!-- Premium Full-Width Navigation -->
    <header 
        class="fixed inset-x-0 top-0 w-full z-50 transition-all duration-300 bg-white"
        :class="scrolled ? 'h-20 shadow-md' : 'h-24 shadow-sm'"
    >
        <div class="max-w-[1600px] mx-auto w-full h-full flex items-center justify-between px-6 sm:px-10 lg:px-16 xl:px-24">
        <!-- Brand Identity -->
        <a href="{{ route('home') }}" class="flex items-center gap-4 shrink-0">
            <div class="w-12 h-12 lg:w-14 lg:h-14 bg-[#F8FAFC] rounded-full flex items-center justify-center border border-gray-100 shadow-sm overflow-hidden p-1.5">
                <img src="{{ asset('images/logo.png') }}" alt="Power Family" class="w-full h-full object-contain">
            </div>
            <div class="flex flex-col">
                <span class="font-black text-[15px] lg:text-[17px] tracking-tight text-[#0E1726] leading-none">
                    POWER FAMILY
                </span>
                <span class="text-[8px] lg:text-[9px] tracking-[0.3em] text-[#D48B16] font-bold uppercase mt-1">
                    INVESTMENT
                </span>
            </div>
        </a>

        <!-- Editorial Desktop Nav -->
        <nav class="hidden lg:flex items-center gap-6 xl:gap-8 flex-1 justify-center">
            <a href="{{ route('home') }}" class="text-[14px] font-bold py-2 border-b-2 {{ request()->routeIs('home') ? 'text-[#750D15] border-[#750D15]' : 'text-gray-700 border-transparent hover:text-[#750D15]' }}">
                {{ __('app.nav_home') }}
            </a>

            <a href="{{ route('pages.about') }}" class="text-[14px] font-bold py-2 border-b-2 {{ request()->routeIs('pages.about') ? 'text-[#750D15] border-[#750D15]' : 'text-gray-700 border-transparent hover:text-[#750D15]' }}">
                {{ __('app.nav_about') }}
            </a>

            <!-- Properties -->
            <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button class="flex items-center gap-1 text-[14px] font-bold py-2 border-b-2 {{ request()->routeIs('plots.*') || request()->routeIs('houses.*') ? 'text-[#750D15] border-[#750D15]' : 'text-gray-700 border-transparent hover:text-[#750D15]' }}">
                    <span>{{ __('app.nav_properties') }}</span>
                </button>
                <div x-show="open" class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-48 bg-white shadow-xl rounded-2xl py-2 flex flex-col z-50 border border-gray-100" style="display: none;">
                    <a href="{{ route('plots.index') }}" class="px-4 py-2 text-[13px] font-bold text-gray-700 hover:text-[#750D15] hover:bg-gray-50">{{ __('app.nav_res_plots') }}</a>
                    <a href="{{ route('plots.index') }}" class="px-4 py-2 text-[13px] font-bold text-gray-700 hover:text-[#750D15] hover:bg-gray-50">{{ __('app.nav_com_plots') }}</a>
                    <a href="{{ route('houses.index') }}" class="px-4 py-2 text-[13px] font-bold text-gray-700 hover:text-[#750D15] hover:bg-gray-50">{{ __('app.nav_houses') }}</a>
                </div>
            </div>

            <!-- Vehicles (Direct Link) -->
            <a href="{{ route('vehicles.index') }}" class="text-[14px] font-bold py-2 border-b-2 {{ request()->routeIs('vehicles.*') ? 'text-[#750D15] border-[#750D15]' : 'text-gray-700 border-transparent hover:text-[#750D15]' }}">
                {{ __('app.nav_vehicles') }}
            </a>

            <!-- Investment -->
            <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <button class="flex items-center gap-1 text-[14px] font-bold py-2 border-b-2 {{ request()->routeIs('pages.blog') ? 'text-[#750D15] border-[#750D15]' : 'text-gray-700 border-transparent hover:text-[#750D15]' }}">
                    <span>{{ __('app.nav_investment') }}</span>
                </button>
                <div x-show="open" class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-56 bg-white shadow-xl rounded-2xl py-2 flex flex-col z-50 border border-gray-100" style="display: none;">
                    <a href="{{ route('pages.blog') }}" class="px-4 py-2 text-[13px] font-bold text-gray-700 hover:text-[#750D15] hover:bg-gray-50">{{ __('app.nav_inv_opp') }}</a>
                    <a href="{{ route('pages.about') }}" class="px-4 py-2 text-[13px] font-bold text-gray-700 hover:text-[#750D15] hover:bg-gray-50">{{ __('app.nav_why_invest') }}</a>
                    <a href="{{ route('pages.about') }}" class="px-4 py-2 text-[13px] font-bold text-gray-700 hover:text-[#750D15] hover:bg-gray-50">{{ __('app.nav_how_invest') }}</a>
                </div>
            </div>

            <a href="{{ route('plots.index') }}" class="text-[14px] font-bold py-2 border-b-2 border-transparent text-gray-700 hover:text-[#750D15]">
                {{ __('app.nav_offers') }}
            </a>
        </nav>

        <!-- Right Actions: Lang + CTA -->
        <div class="hidden lg:flex items-center gap-6 shrink-0">
            
            <!-- Language Switcher (Premium Minimal) -->
            <div class="flex items-center gap-2">
                <a href="{{ route('lang.switch', 'sw') }}" class="text-[12px] font-bold tracking-widest transition-colors {{ app()->getLocale() === 'sw' ? 'text-[#750D15]' : 'text-gray-400 hover:text-[#750D15]' }}">SW</a>
                <span class="text-gray-300 text-[10px]">/</span>
                <a href="{{ route('lang.switch', 'en') }}" class="text-[12px] font-bold tracking-widest transition-colors {{ app()->getLocale() === 'en' ? 'text-[#750D15]' : 'text-gray-400 hover:text-[#750D15]' }}">EN</a>
            </div>

            <!-- Primary CTA -->
            <a href="{{ route('pages.contact') }}" class="border-2 border-[#750D15] text-[#750D15] hover:bg-[#750D15] hover:text-white px-8 py-2.5 rounded-full font-bold text-[12px] uppercase tracking-wider transition-all duration-300 flex-shrink-0 flex items-center justify-center whitespace-nowrap">
                Wasiliana Nasi
            </a>
        </div>

        <!-- Mobile Header Actions -->
        <div class="flex lg:hidden items-center gap-4 shrink-0">
            <!-- Mobile Lang (Premium Pill) -->
            <div class="flex items-center p-0.5 rounded-full border border-gray-200 bg-white shadow-sm">
                <a href="{{ route('lang.switch', 'sw') }}" class="px-2.5 py-1 rounded-full text-[10px] font-extrabold tracking-widest transition-all {{ app()->getLocale() === 'sw' ? 'bg-[#750D15] text-white shadow-md' : 'text-gray-400' }}">SW</a>
                <a href="{{ route('lang.switch', 'en') }}" class="px-2.5 py-1 rounded-full text-[10px] font-extrabold tracking-widest transition-all {{ app()->getLocale() === 'en' ? 'bg-[#750D15] text-white shadow-md' : 'text-gray-400' }}">EN</a>
            </div>

            <!-- Mobile Hamburger -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 flex flex-col items-center justify-center gap-1.5 focus:outline-none shadow-sm hover:bg-gray-100 transition-colors">
                <span class="w-5 h-0.5 bg-[#0E1726] rounded-full transition-all duration-300" :class="mobileMenuOpen ? 'rotate-45 translate-y-2' : ''"></span>
                <span class="w-5 h-0.5 bg-[#0E1726] rounded-full transition-all duration-300" :class="mobileMenuOpen ? 'opacity-0' : ''"></span>
                <span class="w-5 h-0.5 bg-[#0E1726] rounded-full transition-all duration-300" :class="mobileMenuOpen ? '-rotate-45 -translate-y-2' : ''"></span>
            </button>
        </div>
        </div>
    </header>

        <!-- Premium Off-Canvas Mobile Drawer -->
        <div x-show="mobileMenuOpen" class="xl:hidden fixed inset-0 z-50 flex justify-end" style="display: none;">
            <!-- Backdrop -->
            <div 
                x-show="mobileMenuOpen" 
                x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="mobileMenuOpen = false" 
                class="fixed inset-0 bg-[#1C0305]/70 backdrop-blur-sm"
            ></div>

            <!-- Drawer Container -->
            <div 
                x-show="mobileMenuOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="relative w-full max-w-xs sm:max-w-sm bg-white h-full shadow-2xl flex flex-col justify-between overflow-y-auto z-10"
            >
                <!-- Drawer Header -->
                <div class="p-5 border-b border-gray-100 bg-neutral-50 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Power Family" class="w-10 h-10 object-contain rounded-full shadow-sm bg-white p-0.5 border border-[#D48B16]/30">
                        <div>
                            <span class="font-extrabold text-sm text-[#750D15] block leading-tight">POWER FAMILY</span>
                            <span class="text-[9px] text-[#D48B16] font-bold uppercase tracking-wider block">INVESTMENT</span>
                        </div>
                    </div>
                    <button @click="mobileMenuOpen = false" class="p-2 rounded-xl text-gray-500 hover:text-gray-900 hover:bg-gray-200 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Navigation Links with Icons -->
                <div class="p-4 space-y-1.5 flex-1">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 block mb-1">Mali & Huduma</span>
                    
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('home') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span>{{ __('app.nav_home') }}</span>
                    </a>

                    <a href="{{ route('plots.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('plots.*') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                            <span>{{ __('app.nav_plots') }}</span>
                        </div>
                        <span class="text-[10px] font-bold bg-[#FAC955]/20 text-[#750D15] px-2 py-0.5 rounded-full">Hot</span>
                    </a>

                    <a href="{{ route('houses.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('houses.*') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>{{ __('app.nav_houses') }}</span>
                    </a>

                    <a href="{{ route('vehicles.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('vehicles.*') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h8m-8 5h8m-4-9v18m-7-4a2 2 0 104 0 2 2 0 00-4 0zm10 0a2 2 0 104 0 2 2 0 00-4 0z"/></svg>
                        <span>{{ __('app.nav_vehicles') }}</span>
                    </a>

                    <a href="{{ route('locations.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('locations.*') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ __('app.nav_locations') }}</span>
                    </a>

                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 block pt-3 mb-1">Taarifa & Kampuni</span>

                    <a href="{{ route('gallery.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('gallery.*') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ __('app.nav_gallery') }}</span>
                    </a>

                    <a href="{{ route('pages.blog') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('pages.blog') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        <span>{{ __('app.nav_blog') }}</span>
                    </a>

                    <a href="{{ route('pages.about') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('pages.about') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ __('app.nav_about') }}</span>
                    </a>

                    <a href="{{ route('pages.contact') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('pages.contact') ? 'bg-[#FDF5F6] text-[#750D15]' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ __('app.nav_contact') }}</span>
                    </a>
                </div>

                <!-- Drawer Footer Actions -->
                <div class="p-4 bg-neutral-50 border-t border-gray-100 space-y-2.5">
                    <div class="grid grid-cols-2 gap-2">
                        <a href="tel:{{ $phone }}" class="flex items-center justify-center space-x-1.5 py-2.5 px-3 rounded-xl bg-white border border-gray-200 text-xs font-bold text-gray-800 shadow-sm active:scale-95 transition">
                            <svg class="w-3.5 h-3.5 text-[#750D15]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>Piga Simu</span>
                        </a>
                        <a href="https://wa.me/{{ $cleanWhatsapp }}" target="_blank" class="flex items-center justify-center space-x-1.5 py-2.5 px-3 rounded-xl bg-[#25D366] text-white text-xs font-bold shadow-sm active:scale-95 transition">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.777.78 2.796.78 3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.518-4.482 10-10 10-1.748 0-3.385-.45-4.819-1.238l-7.181 1.884 1.918-7.009c-.878-1.493-1.385-3.23-1.385-5.084 0-5.518 4.482-10 10-10s10 4.482 10 10z"/></svg>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                    <a href="{{ route('pages.contact') }}" class="w-full bg-pfi-gradient text-white flex items-center justify-center space-x-2 py-3 rounded-xl text-xs font-extrabold shadow-md active:scale-95 transition">
                        <span>{{ __('app.nav_cta') }} →</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Alerts -->
    @if(session('success'))
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-12 mt-4">
            <div class="p-4 rounded-2xl bg-emerald-50 text-emerald-800 border border-emerald-200 flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-12 mt-4">
            <div class="p-4 rounded-2xl bg-rose-50 text-rose-800 border border-rose-200 flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-semibold">{{ session('error') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- Page Main Content Slot -->
    <main class="flex-grow w-full pb-16 xl:pb-0">
        @yield('content')
    </main>

    <!-- Fixed Mobile App Bottom Bar (Airbnb / Modern App Bar) -->
    <nav class="xl:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-gray-200/80 shadow-[0_-4px_25px_rgba(0,0,0,0.08)] px-2 py-1.5 flex items-center justify-around text-center">
        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center py-1 px-2.5 min-w-[54px] rounded-xl transition active:scale-95 {{ request()->routeIs('home') ? 'text-[#750D15] font-bold' : 'text-gray-500 hover:text-gray-900' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('home') ? 'text-[#750D15]' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span class="text-[10px] mt-0.5 tracking-tight font-medium">{{ __('app.nav_home') }}</span>
        </a>
        <a href="{{ route('plots.index') }}" class="flex flex-col items-center justify-center py-1 px-2.5 min-w-[54px] rounded-xl transition active:scale-95 {{ request()->routeIs('plots.*') ? 'text-[#750D15] font-bold' : 'text-gray-500 hover:text-gray-900' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('plots.*') ? 'text-[#750D15]' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
            <span class="text-[10px] mt-0.5 tracking-tight font-medium">{{ __('app.nav_plots') }}</span>
        </a>
        <a href="{{ route('houses.index') }}" class="flex flex-col items-center justify-center py-1 px-2.5 min-w-[54px] rounded-xl transition active:scale-95 {{ request()->routeIs('houses.*') ? 'text-[#750D15] font-bold' : 'text-gray-500 hover:text-gray-900' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('houses.*') ? 'text-[#750D15]' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            <span class="text-[10px] mt-0.5 tracking-tight font-medium">{{ __('app.nav_houses') }}</span>
        </a>
        <a href="{{ route('vehicles.index') }}" class="flex flex-col items-center justify-center py-1 px-2.5 min-w-[54px] rounded-xl transition active:scale-95 {{ request()->routeIs('vehicles.*') ? 'text-[#750D15] font-bold' : 'text-gray-500 hover:text-gray-900' }}">
            <svg class="w-5 h-5 {{ request()->routeIs('vehicles.*') ? 'text-[#750D15]' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h8m-8 5h8m-4-9v18m-7-4a2 2 0 104 0 2 2 0 00-4 0zm10 0a2 2 0 104 0 2 2 0 00-4 0z"/></svg>
            <span class="text-[10px] mt-0.5 tracking-tight font-medium">{{ __('app.nav_vehicles') }}</span>
        </a>
        <a href="https://wa.me/{{ $cleanWhatsapp }}" target="_blank" class="flex flex-col items-center justify-center py-1 px-2.5 min-w-[54px] rounded-xl text-[#25D366] font-semibold active:scale-95 transition">
            <div class="w-6 h-6 rounded-full bg-[#25D366] text-white flex items-center justify-center shadow-sm">
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.777.78 2.796.78 3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.518-4.482 10-10 10-1.748 0-3.385-.45-4.819-1.238l-7.181 1.884 1.918-7.009c-.878-1.493-1.385-3.23-1.385-5.084 0-5.518 4.482-10 10-10s10 4.482 10 10z"/></svg>
            </div>
            <span class="text-[10px] mt-0.5 font-bold tracking-tight">WhatsApp</span>
        </a>
    </nav>

    <!-- Floating WhatsApp Action -->
    <div class="fixed bottom-20 sm:bottom-6 right-4 sm:right-6 z-50 flex items-center space-x-3" x-data="{ tooltip: true }">
        <div x-show="tooltip" class="hidden sm:flex items-center bg-white text-gray-800 text-xs px-4 py-2 rounded-2xl shadow-xl border border-gray-100 animate-fadeIn">
            <span class="font-semibold text-[#750D15]">
                {{ app()->getLocale() === 'sw' ? 'Unahitaji msaada? Tuandikie WhatsApp' : 'Need quick assistance? Chat on WhatsApp' }}
            </span>
            <button @click="tooltip = false" class="ml-2 text-gray-400 hover:text-gray-600">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ rawurlencode(app()->getLocale() === 'sw' ? 'Habari Power Family Investment, nina maswali kuhusu viwanja, nyumba na magari.' : 'Hello Power Family Investment, I have inquiries regarding plots, houses and vehicles.') }}" target="_blank" rel="noopener noreferrer" class="w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-[#25D366] text-white flex items-center justify-center shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 relative group" aria-label="Chat on WhatsApp">
            <span class="absolute inset-0 rounded-full bg-[#25D366] animate-ping opacity-25"></span>
            <svg class="w-6 h-6 sm:w-7 sm:h-7 relative z-10 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.777.78 2.796.78 3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.518-4.482 10-10 10-1.748 0-3.385-.45-4.819-1.238l-7.181 1.884 1.918-7.009c-.878-1.493-1.385-3.23-1.385-5.084 0-5.518 4.482-10 10-10s10 4.482 10 10z"/></svg>
        </a>
    </div>

    <!-- Rich Global Footer -->
    <footer class="bg-[#1C0305] text-gray-300 pt-16 pb-24 xl:pb-8 border-t-4 border-[#D48B16] w-full">
        <div class="w-full max-w-[1600px] mx-auto px-6 sm:px-10 lg:px-16 xl:px-24">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-[#750D15]/40">
                
                <!-- Col 1 & 2: Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3.5 group">
                        <img 
                            src="{{ asset('images/logo.png') }}" 
                            alt="Power Family Investment Logo" 
                            class="w-14 h-14 object-contain rounded-full shadow-md border border-[#D48B16]/50 bg-white p-0.5"
                        >
                        <div class="flex flex-col">
                            <span class="font-extrabold text-xl tracking-tight text-white font-sans leading-none">
                                POWER FAMILY
                            </span>
                            <span class="text-xs tracking-widest text-[#FAC955] font-bold uppercase mt-1">
                                {{ __('app.tagline') }}
                            </span>
                        </div>
                    </a>
                    
                    <p class="text-gray-300 text-sm leading-relaxed max-w-sm">
                        {{ app()->getLocale() === 'sw' ? 'Power Family Investment ni kampuni inayoaminika Tanzania inayojishughulisha na uuzaji wa viwanja vya makazi na biashara, nyumba bora za kisasa na magari.' : 'Power Family Investment is a premier Tanzanian investment firm specializing in residential & commercial plots, modern homes, and premium verified vehicles.' }}
                    </p>

                    <div class="pt-2">
                        <span class="text-xs font-semibold text-[#FAC955] uppercase tracking-wider block mb-3">
                            {{ app()->getLocale() === 'sw' ? 'Mitandao ya Kijamii' : 'Follow Us' }}
                        </span>
                        <div class="flex items-center space-x-2.5">
                            @php
                                $fb = \App\Models\Setting::get('social_facebook', 'https://facebook.com/power_family_investment');
                                $ig = \App\Models\Setting::get('social_instagram', 'https://www.instagram.com/power_family_investment/');
                                $tt = \App\Models\Setting::get('social_tiktok', 'https://tiktok.com/@power_family_investment');
                                $yt = \App\Models\Setting::get('social_youtube', 'https://youtube.com/@power_family_investment');
                            @endphp
                            
                            <!-- Instagram -->
                            <a href="{{ $ig }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-[#280508] flex items-center justify-center text-slate-300 hover:text-[#FAC955] hover:bg-[#750D15] transition border border-[#750D15]/50 shadow-sm hover:scale-105" title="Instagram: @power_family_investment">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>

                            <!-- Facebook -->
                            <a href="{{ $fb }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-[#280508] flex items-center justify-center text-slate-300 hover:text-[#FAC955] hover:bg-[#750D15] transition border border-[#750D15]/50 shadow-sm hover:scale-105" title="Facebook">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.688 5H18V0h-3.808C10.592 0 9 1.582 9 4.615V8z"/></svg>
                            </a>

                            <!-- TikTok -->
                            <a href="{{ $tt }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-[#280508] flex items-center justify-center text-slate-300 hover:text-[#FAC955] hover:bg-[#750D15] transition border border-[#750D15]/50 shadow-sm hover:scale-105" title="TikTok: @power_family_investment">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                            </a>

                            <!-- YouTube -->
                            <a href="{{ $yt }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-xl bg-[#280508] flex items-center justify-center text-slate-300 hover:text-[#FAC955] hover:bg-[#750D15] transition border border-[#750D15]/50 shadow-sm hover:scale-105" title="YouTube">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Col 3: Quick Links -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm tracking-wider uppercase border-b border-[#750D15]/50 pb-2">
                        {{ __('app.footer_quick_links') }}
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-[#FAC955] transition">{{ __('app.nav_home') }}</a></li>
                        <li><a href="{{ route('plots.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.nav_plots') }}</a></li>
                        <li><a href="{{ route('houses.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.nav_houses') }}</a></li>
                        <li><a href="{{ route('vehicles.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.nav_vehicles') }}</a></li>
                        <li><a href="{{ route('locations.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.nav_locations') }}</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.nav_gallery') }}</a></li>
                        <li><a href="{{ route('pages.blog') }}" class="hover:text-[#FAC955] transition">{{ __('app.nav_blog') }}</a></li>
                        <li><a href="{{ route('pages.about') }}" class="hover:text-[#FAC955] transition">{{ __('app.nav_about') }}</a></li>
                    </ul>
                </div>

                <!-- Col 4: Services -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm tracking-wider uppercase border-b border-[#750D15]/50 pb-2">
                        {{ __('app.footer_services') }}
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('plots.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.cat_plots_res_title') }}</a></li>
                        <li><a href="{{ route('plots.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.cat_plots_com_title') }}</a></li>
                        <li><a href="{{ route('houses.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.cat_houses_title') }}</a></li>
                        <li><a href="{{ route('vehicles.index') }}" class="hover:text-[#FAC955] transition">{{ __('app.cat_vehicles_title') }}</a></li>
                        <li><a href="{{ route('pages.contact') }}" class="hover:text-[#FAC955] transition">{{ app()->getLocale() === 'sw' ? 'Ushauri wa Uwekezaji' : 'Investment Advisory' }}</a></li>
                    </ul>
                </div>

                <!-- Col 5: Contacts -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm tracking-wider uppercase border-b border-[#750D15]/50 pb-2">
                        {{ __('app.footer_contact_info') }}
                    </h3>
                    <div class="space-y-3 text-sm text-gray-300">
                        <div class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-[#FAC955] shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $address }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 text-[#FAC955] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <div class="flex flex-col space-y-1">
                                <a href="tel:{{ $phone }}" class="hover:text-[#FAC955] transition">{{ $phone }}</a>
                                @if($phone2)
                                    <a href="tel:{{ $phone2 }}" class="hover:text-[#FAC955] transition text-xs text-gray-400 hover:text-[#FAC955]">{{ $phone2 }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 text-[#FAC955] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ $email }}" class="hover:text-[#FAC955] transition">{{ $email }}</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Legal & Admin Link -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-gray-400 gap-4">
                <div class="flex items-center space-x-6">
                    <span>© {{ date('Y') }} Power Family Investment. {{ __('app.footer_rights') }}</span>
                    
                    <!-- Language Switcher (Premium Pill) -->
                    <div class="flex items-center p-1 rounded-full border border-gray-700 bg-[#280508] shadow-inner">
                        <svg class="w-3.5 h-3.5 text-[#FAC955] ml-2 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
                        <a href="{{ route('lang.switch', 'sw') }}" class="px-3 py-1.5 rounded-full text-[10px] font-bold tracking-widest transition-all {{ app()->getLocale() === 'sw' ? 'bg-[#750D15] text-white shadow-md' : 'text-gray-400 hover:text-white hover:bg-[#750D15]/50' }}">SW</a>
                        <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1.5 rounded-full text-[10px] font-bold tracking-widest transition-all {{ app()->getLocale() === 'en' ? 'bg-[#750D15] text-white shadow-md' : 'text-gray-400 hover:text-white hover:bg-[#750D15]/50' }}">EN</a>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('pages.privacy') }}" class="hover:text-[#FAC955] transition">{{ __('app.footer_privacy') }}</a>
                    <a href="{{ route('pages.terms') }}" class="hover:text-[#FAC955] transition">{{ __('app.footer_terms') }}</a>
                    <a href="{{ route('admin.login') }}" class="flex items-center space-x-1 text-[#FAC955]/90 hover:text-[#FAC955] transition">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span>{{ __('app.nav_admin') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
