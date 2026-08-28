<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $siteTitle = \App\Models\Setting::get('site_title', 'Power Family Investment — Viwanja, Nyumba na Magari Tanzania');
        $siteDesc = \App\Models\Setting::get('meta_description', 'Wekeza Leo, Jenga Kesho. Pata viwanja vya makazi na biashara, nyumba za kisasa na magari bora Tanzania kupitia Power Family Investment.');
        $phone = \App\Models\Setting::get('company_phone', '+255 700 000 000');
        $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '255700000000');
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
<body class="flex flex-col min-h-screen bg-neutral-50 text-gray-900 font-sans antialiased selection:bg-[#C59B27] selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- Top Announcement Bar -->
    <div class="bg-[#220325] text-[#DFB743] text-xs py-2 px-4 border-b border-[#68176E]/30">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="font-medium tracking-wide">
                    {{ app()->getLocale() === 'sw' ? 'Mali & Fursa za Uhakika Tanzania' : 'Verified Investment Opportunities in Tanzania' }}
                </span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="tel:{{ $phone }}" class="flex items-center space-x-1.5 hover:text-white transition-colors">
                    <svg class="w-3.5 h-3.5 text-[#C59B27]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>{{ $phone }}</span>
                </a>
                <div class="flex items-center space-x-2 border-l border-[#4A0E4E] pl-4">
                    <a href="{{ route('lang.switch', 'sw') }}" class="px-1.5 py-0.5 rounded text-xs transition {{ app()->getLocale() === 'sw' ? 'bg-[#4A0E4E] text-white font-bold' : 'text-gray-400 hover:text-white' }}">
                        SW
                    </a>
                    <span class="text-gray-600">|</span>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-1.5 py-0.5 rounded text-xs transition {{ app()->getLocale() === 'en' ? 'bg-[#4A0E4E] text-white font-bold' : 'text-gray-400 hover:text-white' }}">
                        EN
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group shrink-0">
                    <div class="w-11 h-11 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] font-bold text-xl shadow-md border border-[#C59B27]/40 group-hover:scale-105 transition transform">
                        P
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-lg sm:text-xl tracking-tight text-[#4A0E4E] font-sans leading-none">
                            POWER FAMILY
                        </span>
                        <span class="text-[11px] tracking-widest text-[#C59B27] font-bold uppercase mt-1">
                            INVESTMENT
                        </span>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden xl:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('home') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_home') }}
                    </a>
                    <a href="{{ route('plots.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('plots.*') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_plots') }}
                    </a>
                    <a href="{{ route('houses.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('houses.*') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_houses') }}
                    </a>
                    <a href="{{ route('vehicles.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('vehicles.*') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_vehicles') }}
                    </a>
                    <a href="{{ route('locations.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('locations.*') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_locations') }}
                    </a>
                    <a href="{{ route('gallery.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('gallery.*') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_gallery') }}
                    </a>
                    <a href="{{ route('pages.blog') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('pages.blog') || request()->routeIs('pages.article') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_blog') }}
                    </a>
                    <a href="{{ route('pages.about') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('pages.about') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_about') }}
                    </a>
                    <a href="{{ route('pages.contact') }}" class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('pages.contact') ? 'text-[#4A0E4E] font-bold bg-[#FAF5FB]' : 'text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-50' }}">
                        {{ __('app.nav_contact') }}
                    </a>
                </nav>

                <!-- Desktop CTA Button -->
                <div class="hidden lg:flex items-center space-x-3">
                    <a href="{{ route('pages.contact') }}" class="bg-pfi-gradient text-white px-5 py-2.5 rounded-xl font-semibold text-sm shadow-md hover:shadow-lg hover:brightness-110 active:scale-95 transition border border-[#68176E] flex items-center space-x-2">
                        <span>{{ __('app.nav_cta') }}</span>
                        <svg class="w-4 h-4 text-[#DFB743]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>

                <!-- Mobile Menu Hamburger Button -->
                <div class="flex items-center space-x-2 xl:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-xl text-gray-700 hover:text-[#4A0E4E] hover:bg-gray-100 transition focus:outline-none" aria-label="Toggle Navigation">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" x-transition class="xl:hidden bg-white border-b border-gray-200 shadow-2xl px-4 pt-3 pb-6 space-y-2">
            <div class="grid grid-cols-1 gap-1">
                <a href="{{ route('home') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('home') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_home') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('plots.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('plots.*') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_plots') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('houses.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('houses.*') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_houses') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('vehicles.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('vehicles.*') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_vehicles') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('locations.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('locations.*') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_locations') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('gallery.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('gallery.*') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_gallery') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('pages.blog') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('pages.blog') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_blog') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('pages.about') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('pages.about') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_about') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('pages.contact') }}" class="flex items-center justify-between px-4 py-3 rounded-xl text-base font-medium {{ request()->routeIs('pages.contact') ? 'bg-[#FAF5FB] text-[#4A0E4E] font-bold' : 'text-gray-800 hover:bg-gray-50' }}">
                    <span>{{ __('app.nav_contact') }}</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="pt-4 border-t border-gray-100 space-y-3">
                <a href="{{ route('pages.contact') }}" class="w-full bg-pfi-gradient text-white flex items-center justify-center space-x-2 py-3 rounded-xl font-bold shadow-md">
                    <span>{{ __('app.nav_cta') }}</span>
                    <svg class="w-4 h-4 text-[#DFB743]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Flash Alerts -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="p-4 rounded-2xl bg-emerald-50 text-emerald-800 border border-emerald-200 flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="p-4 rounded-2xl bg-rose-50 text-rose-800 border border-rose-200 flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-semibold">{{ session('error') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- Page Main Content Slot -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating WhatsApp Action -->
    <div class="fixed bottom-6 right-6 z-50 flex items-center space-x-3" x-data="{ tooltip: true }">
        <div x-show="tooltip" class="hidden sm:flex items-center bg-white text-gray-800 text-xs px-4 py-2 rounded-2xl shadow-xl border border-gray-100 animate-fadeIn">
            <span class="font-semibold text-[#4A0E4E]">
                {{ app()->getLocale() === 'sw' ? 'Unahitaji msaada? Tuandikie WhatsApp' : 'Need quick assistance? Chat on WhatsApp' }}
            </span>
            <button @click="tooltip = false" class="ml-2 text-gray-400 hover:text-gray-600">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ rawurlencode(app()->getLocale() === 'sw' ? 'Habari Power Family Investment, nina maswali kuhusu viwanja, nyumba na magari.' : 'Hello Power Family Investment, I have inquiries regarding plots, houses and vehicles.') }}" target="_blank" rel="noopener noreferrer" class="w-14 h-14 rounded-full bg-[#25D366] text-white flex items-center justify-center shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 relative group" aria-label="Chat on WhatsApp">
            <span class="absolute inset-0 rounded-full bg-[#25D366] animate-ping opacity-25"></span>
            <svg class="w-7 h-7 relative z-10 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.777.78 2.796.78 3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.518-4.482 10-10 10-1.748 0-3.385-.45-4.819-1.238l-7.181 1.884 1.918-7.009c-.878-1.493-1.385-3.23-1.385-5.084 0-5.518 4.482-10 10-10s10 4.482 10 10z"/></svg>
        </a>
    </div>

    <!-- Rich Global Footer -->
    <footer class="bg-[#220325] text-gray-300 pt-16 pb-8 border-t-4 border-[#C59B27]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-[#68176E]/30">
                
                <!-- Col 1 & 2: Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] font-bold text-lg shadow-inner border border-[#C59B27]/40">
                            P
                        </div>
                        <div class="flex flex-col">
                            <span class="font-extrabold text-xl tracking-tight text-white font-sans leading-none">
                                POWER FAMILY
                            </span>
                            <span class="text-xs tracking-widest text-[#DFB743] font-bold uppercase mt-1">
                                {{ __('app.tagline') }}
                            </span>
                        </div>
                    </a>
                    
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        {{ app()->getLocale() === 'sw' ? 'Power Family Investment ni kampuni inayoaminika Tanzania inayojishughulisha na uuzaji wa viwanja vya makazi na biashara, nyumba bora za kisasa na magari.' : 'Power Family Investment is a premier Tanzanian investment firm specializing in residential & commercial plots, modern homes, and premium verified vehicles.' }}
                    </p>

                    <div class="pt-2">
                        <span class="text-xs font-semibold text-[#DFB743] uppercase tracking-wider block mb-3">
                            {{ app()->getLocale() === 'sw' ? 'Mitandao ya Kijamii' : 'Follow Us' }}
                        </span>
                        <div class="flex items-center space-x-3">
                            @php
                                $fb = \App\Models\Setting::get('social_facebook', '');
                                $ig = \App\Models\Setting::get('social_instagram', '');
                                $tt = \App\Models\Setting::get('social_tiktok', '');
                                $yt = \App\Models\Setting::get('social_youtube', '');
                            @endphp
                            @if($ig)
                                <a href="{{ $ig }}" target="_blank" class="w-9 h-9 rounded-lg bg-[#320635] flex items-center justify-center text-gray-300 hover:text-[#DFB743] hover:bg-[#4A0E4E] transition font-bold text-xs">IG</a>
                            @endif
                            @if($fb)
                                <a href="{{ $fb }}" target="_blank" class="w-9 h-9 rounded-lg bg-[#320635] flex items-center justify-center text-gray-300 hover:text-[#DFB743] hover:bg-[#4A0E4E] transition font-bold text-xs">FB</a>
                            @endif
                            @if($tt)
                                <a href="{{ $tt }}" target="_blank" class="w-9 h-9 rounded-lg bg-[#320635] flex items-center justify-center text-gray-300 hover:text-[#DFB743] hover:bg-[#4A0E4E] transition font-bold text-xs">TT</a>
                            @endif
                            @if($yt)
                                <a href="{{ $yt }}" target="_blank" class="w-9 h-9 rounded-lg bg-[#320635] flex items-center justify-center text-gray-300 hover:text-[#DFB743] hover:bg-[#4A0E4E] transition font-bold text-xs">YT</a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Col 3: Quick Links -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm tracking-wider uppercase border-b border-[#68176E]/40 pb-2">
                        {{ __('app.footer_quick_links') }}
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-[#DFB743] transition">{{ __('app.nav_home') }}</a></li>
                        <li><a href="{{ route('plots.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.nav_plots') }}</a></li>
                        <li><a href="{{ route('houses.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.nav_houses') }}</a></li>
                        <li><a href="{{ route('vehicles.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.nav_vehicles') }}</a></li>
                        <li><a href="{{ route('locations.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.nav_locations') }}</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.nav_gallery') }}</a></li>
                        <li><a href="{{ route('pages.blog') }}" class="hover:text-[#DFB743] transition">{{ __('app.nav_blog') }}</a></li>
                        <li><a href="{{ route('pages.about') }}" class="hover:text-[#DFB743] transition">{{ __('app.nav_about') }}</a></li>
                    </ul>
                </div>

                <!-- Col 4: Services -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm tracking-wider uppercase border-b border-[#68176E]/40 pb-2">
                        {{ __('app.footer_services') }}
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('plots.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.cat_plots_res_title') }}</a></li>
                        <li><a href="{{ route('plots.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.cat_plots_com_title') }}</a></li>
                        <li><a href="{{ route('houses.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.cat_houses_title') }}</a></li>
                        <li><a href="{{ route('vehicles.index') }}" class="hover:text-[#DFB743] transition">{{ __('app.cat_vehicles_title') }}</a></li>
                        <li><a href="{{ route('pages.contact') }}" class="hover:text-[#DFB743] transition">{{ app()->getLocale() === 'sw' ? 'Ushauri wa Uwekezaji' : 'Investment Advisory' }}</a></li>
                    </ul>
                </div>

                <!-- Col 5: Contacts -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm tracking-wider uppercase border-b border-[#68176E]/40 pb-2">
                        {{ __('app.footer_contact_info') }}
                    </h3>
                    <div class="space-y-3 text-sm text-gray-300">
                        <div class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-[#DFB743] shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $address }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 text-[#DFB743] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:{{ $phone }}" class="hover:text-[#DFB743] transition">{{ $phone }}</a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 text-[#DFB743] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ $email }}" class="hover:text-[#DFB743] transition">{{ $email }}</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Legal & Admin Link -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-gray-400 gap-4">
                <div>
                    © {{ date('Y') }} Power Family Investment. {{ __('app.footer_rights') }}
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('pages.privacy') }}" class="hover:text-[#DFB743] transition">{{ __('app.footer_privacy') }}</a>
                    <a href="{{ route('pages.terms') }}" class="hover:text-[#DFB743] transition">{{ __('app.footer_terms') }}</a>
                    <a href="{{ route('admin.login') }}" class="flex items-center space-x-1 text-[#DFB743]/80 hover:text-[#DFB743] transition">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <span>{{ __('app.nav_admin') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
