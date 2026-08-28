<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'RELAND | Professional Land Surveying & Formalization Solutions &bull; Arusha, Tanzania')</title>
    
    <!-- SEO & Open Graph Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Tanzania\'s leading Digital Land Services Platform. Upimaji wa ardhi, urasimishaji wa makazi, ugawaji wa viwanja na huduma za kisheria za ardhi.')">
    <meta name="keywords" content="upimaji ardhi, urasimishaji makazi, viwanja, land surveying, tanzania, arusha, hati miliki, reland consult">
    
    <meta property="og:title" content="@yield('title', 'RELAND CONSULT LTD | Digital Land Services')">
    <meta property="og:description" content="@yield('meta_description', 'Tanzania\'s leading Digital Land Services Platform. Upimaji wa ardhi, urasimishaji wa makazi, ugawaji wa viwanja na huduma za kisheria za ardhi.')">
    <meta property="og:image" content="{{ asset('images/reland-og-share.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'RELAND CONSULT LTD | Digital Land Services')">
    <meta name="twitter:description" content="@yield('meta_description', 'Tanzania\'s leading Digital Land Services Platform. Upimaji wa ardhi, urasimishaji wa makazi, ugawaji wa viwanja na huduma za kisheria za ardhi.')">
    <meta name="twitter:image" content="{{ asset('images/reland-og-share.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-slate-50 text-slate-900 font-sans antialiased selection:bg-[#c89a3b] selection:text-[#0c1c34]">

    <!-- Main Navigation Header (Clean, Premium, Integrated) -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
        <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 gap-4">
                
                <!-- Brand Logo & Integrated Slogan -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 group">
                    <img src="{{ asset('images/logo.png') }}" alt="RELAND Logo" class="h-10 sm:h-11 w-auto object-contain drop-shadow-xs group-hover:scale-105 transition transform">
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2">
                            <span class="font-extrabold text-xl sm:text-2xl tracking-tight text-[#16325c] leading-none">RE<span class="text-[#c89a3b]">LAND</span></span>
                            <span class="hidden sm:inline-flex items-center px-2 py-0.5 rounded-full bg-[#c89a3b]/15 text-[#c89a3b] text-[10px] font-extrabold tracking-wide border border-[#c89a3b]/30">
                                Arusha, Tanzania
                            </span>
                        </div>
                        <span class="text-[9px] sm:text-[10px] font-bold text-slate-500 mt-0.5 tracking-tight whitespace-nowrap">
                            "Ardhi Yako Mtaji Wako" &bull; Upimaji &bull; Mipango Miji &bull; Hati Miliki
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden xl:flex items-center gap-1 xl:gap-2 2xl:gap-3 text-[13px] font-semibold text-slate-700">
                    <a href="{{ route('home') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('home') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_home') }}
                    </a>

                    <a href="{{ route('pages.about') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('pages.about') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_about') }}
                    </a>

                    <!-- Services Mega/Dropdown Link -->
                    <div class="relative group py-1.5">
                        <a href="{{ route('pages.services') }}" class="flex items-center gap-1 px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('pages.services') || request()->routeIs('services.*') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                            <span>{{ __('app.nav_services') }}</span>
                            <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-[#16325c] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                        <div class="absolute left-0 top-full hidden group-hover:block w-72 bg-white rounded-2xl shadow-xl border border-slate-100 p-2 z-50 animate-fadeIn">
                            <a href="{{ route('services.show', 'land-surveying') }}" class="block px-3 py-2.5 rounded-xl hover:bg-[#fbf6ea] transition">
                                <span class="font-bold text-xs text-[#16325c] block">{{ app()->getLocale() === 'sw' ? '1. Upimaji wa Ardhi' : '1. Land Surveying' }}</span>
                                <span class="text-[11px] text-slate-500">Cadastral surveys & beacons</span>
                            </a>
                            <a href="{{ route('services.show', 'land-formalization') }}" class="block px-3 py-2.5 rounded-xl hover:bg-[#fbf6ea] transition">
                                <span class="font-bold text-xs text-[#16325c] block">{{ app()->getLocale() === 'sw' ? '2. Urasimishaji wa Makazi' : '2. Land Formalization' }}</span>
                                <span class="text-[11px] text-slate-500">Settlement regularization & titles</span>
                            </a>
                            <a href="{{ route('services.show', 'plot-subdivision') }}" class="block px-3 py-2.5 rounded-xl hover:bg-[#fbf6ea] transition">
                                <span class="font-bold text-xs text-[#16325c] block">{{ app()->getLocale() === 'sw' ? '3. Ugawaji wa Viwanja' : '3. Plot Subdivision' }}</span>
                                <span class="text-[11px] text-slate-500">Master planning & partition</span>
                            </a>
                            <a href="{{ route('services.show', 'boundary-demarcation') }}" class="block px-3 py-2.5 rounded-xl hover:bg-[#fbf6ea] transition">
                                <span class="font-bold text-xs text-[#16325c] block">{{ app()->getLocale() === 'sw' ? '4. Uhakiki wa Mipaka' : '4. Boundary Demarcation' }}</span>
                                <span class="text-[11px] text-slate-500">Beacon retracement & dispute fix</span>
                            </a>
                            <a href="{{ route('services.show', 'land-consultation') }}" class="block px-3 py-2.5 rounded-xl hover:bg-[#fbf6ea] transition">
                                <span class="font-bold text-xs text-[#16325c] block">{{ app()->getLocale() === 'sw' ? '5. Ushauri wa Kitaalamu' : '5. Land Consultation' }}</span>
                                <span class="text-[11px] text-slate-500">Ministry registry search & advisory</span>
                            </a>
                            <a href="{{ route('services.show', 'plot-sales') }}" class="block px-3 py-2.5 rounded-xl hover:bg-[#fbf6ea] transition">
                                <span class="font-bold text-xs text-[#16325c] block">{{ app()->getLocale() === 'sw' ? '6. Uuzaji wa Viwanja' : '6. Plot Sales & Listings' }}</span>
                                <span class="text-[11px] text-slate-500">Verified dispute-free plots</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('projects.index') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('projects.*') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_projects') }}
                    </a>

                    <a href="{{ route('plots.index') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('plots.*') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_plots') }}
                    </a>

                    <a href="{{ route('locations.index') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('locations.*') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_locations') }}
                    </a>

                    <a href="{{ route('pages.insights') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('pages.insights') || request()->routeIs('pages.blog') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_insights') }}
                    </a>

                    <a href="{{ route('pages.track') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors flex items-center gap-1 hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('pages.track', 'track.check') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Mchakato
                    </a>

                    <a href="{{ route('pages.contact') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('pages.contact') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_contact') }}
                    </a>
                </nav>

                <!-- Header Actions (Direct Phone + Language Switcher + CTA) -->
                <div class="hidden lg:flex items-center gap-3 shrink-0">
                    
                    <!-- Direct Phone Link -->
                    <a href="tel:{{ $sitePhone ?? '+255742448965' }}" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-[#16325c] hover:bg-slate-100 border border-slate-200 transition">
                        <svg class="w-3.5 h-3.5 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>{{ $sitePhone ?? '+255 742 448 965' }}</span>
                    </a>

                    <!-- Language Switcher in Header -->
                    <div class="flex items-center gap-1 font-medium bg-slate-100 px-2 py-1.5 rounded-xl border border-slate-200 text-xs">
                        <a href="{{ route('lang.switch', 'en') }}" class="px-2 py-0.5 rounded transition font-bold {{ app()->getLocale() === 'en' ? 'bg-[#c89a3b] text-[#0c1c34] shadow-xs' : 'text-slate-500 hover:text-[#16325c]' }}">EN</a>
                        <span class="text-slate-300">|</span>
                        <a href="{{ route('lang.switch', 'sw') }}" class="px-2 py-0.5 rounded transition font-bold {{ app()->getLocale() === 'sw' ? 'bg-[#c89a3b] text-[#0c1c34] shadow-xs' : 'text-slate-500 hover:text-[#16325c]' }}">SW</a>
                    </div>

                    @php
                        $headerWaMsg = 'Hello RELAND Arusha, I would like to consult on land surveying and formalization services.';
                    @endphp
                    <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($headerWaMsg) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-3.5 xl:px-4 py-2.5 rounded-xl bg-[#16325c] hover:bg-[#0c1c34] text-white text-xs font-bold shadow-md shadow-[#16325c]/20 hover:shadow-lg transition transform hover:-translate-y-0.5 border border-[#c89a3b]/40 whitespace-nowrap">
                        <svg class="w-4 h-4 text-[#dfb256]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        <span>{{ __('app.talk_to_us') }}</span>
                    </a>
                </div>

                <!-- Mobile Right Action (Language Switcher + Mobile Menu Button) -->
                <div class="flex items-center gap-2 lg:hidden">
                    <div class="flex items-center gap-1 font-medium bg-slate-100 px-2 py-1 rounded-lg border border-slate-200 text-xs">
                        <a href="{{ route('lang.switch', 'en') }}" class="px-1.5 py-0.5 rounded font-bold {{ app()->getLocale() === 'en' ? 'bg-[#c89a3b] text-[#0c1c34]' : 'text-slate-500' }}">EN</a>
                        <span class="text-slate-300">|</span>
                        <a href="{{ route('lang.switch', 'sw') }}" class="px-1.5 py-0.5 rounded font-bold {{ app()->getLocale() === 'sw' ? 'bg-[#c89a3b] text-[#0c1c34]' : 'text-slate-500' }}">SW</a>
                    </div>

                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="p-2.5 rounded-xl text-slate-700 hover:text-[#16325c] hover:bg-slate-100 focus:outline-hidden" aria-label="Toggle navigation">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-1 shadow-lg max-h-[85vh] overflow-y-auto">
            <div class="pb-2 mb-2 border-b border-slate-100 flex items-center justify-between">
                <a href="tel:{{ $sitePhone ?? '+255742448965' }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#16325c]">
                    <svg class="w-3.5 h-3.5 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>{{ $sitePhone ?? '+255 742 448 965' }}</span>
                </a>
                <span class="text-[10px] font-bold text-[#c89a3b] uppercase">Arusha, TZ</span>
            </div>

            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('home') ? 'bg-[#fbf6ea] text-[#16325c]' : 'text-slate-700 hover:bg-slate-50' }}">
                {{ __('app.nav_home') }}
            </a>
            <a href="{{ route('pages.about') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('pages.about') ? 'bg-[#fbf6ea] text-[#16325c]' : 'text-slate-700 hover:bg-slate-50' }}">
                {{ __('app.nav_about') }}
            </a>
            <div class="py-1">
                <a href="{{ route('pages.services') }}" class="block px-3 py-2 rounded-lg text-sm font-bold text-[#16325c] bg-slate-50">
                    {{ __('app.nav_services') }}
                </a>
                <div class="pl-4 space-y-1 mt-1 border-l-2 border-[#c89a3b]/40 ml-3">
                    <a href="{{ route('services.show', 'land-surveying') }}" class="block px-2 py-1.5 text-xs text-slate-600 hover:text-[#16325c]">{{ app()->getLocale() === 'sw' ? '1. Upimaji wa Ardhi' : '1. Land Surveying' }}</a>
                    <a href="{{ route('services.show', 'land-formalization') }}" class="block px-2 py-1.5 text-xs text-slate-600 hover:text-[#16325c]">{{ app()->getLocale() === 'sw' ? '2. Urasimishaji' : '2. Land Formalization' }}</a>
                    <a href="{{ route('services.show', 'plot-subdivision') }}" class="block px-2 py-1.5 text-xs text-slate-600 hover:text-[#16325c]">{{ app()->getLocale() === 'sw' ? '3. Ugawaji wa Viwanja' : '3. Plot Subdivision' }}</a>
                    <a href="{{ route('services.show', 'boundary-demarcation') }}" class="block px-2 py-1.5 text-xs text-slate-600 hover:text-[#16325c]">{{ app()->getLocale() === 'sw' ? '4. Uhakiki wa Mipaka' : '4. Boundary Demarcation' }}</a>
                    <a href="{{ route('services.show', 'land-consultation') }}" class="block px-2 py-1.5 text-xs text-slate-600 hover:text-[#16325c]">{{ app()->getLocale() === 'sw' ? '5. Ushauri wa Ardhi' : '5. Land Consultation' }}</a>
                    <a href="{{ route('services.show', 'plot-sales') }}" class="block px-2 py-1.5 text-xs text-slate-600 hover:text-[#16325c]">{{ app()->getLocale() === 'sw' ? '6. Uuzaji wa Viwanja' : '6. Plot Sales' }}</a>
                </div>
            </div>
            <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('projects.*') ? 'bg-[#fbf6ea] text-[#16325c]' : 'text-slate-700 hover:bg-slate-50' }}">
                {{ __('app.nav_projects') }}
            </a>
            <a href="{{ route('plots.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('plots.*') ? 'bg-[#fbf6ea] text-[#16325c]' : 'text-slate-700 hover:bg-slate-50' }}">
                {{ __('app.nav_plots') }}
            </a>
            <a href="{{ route('locations.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('locations.*') ? 'bg-[#fbf6ea] text-[#16325c]' : 'text-slate-700 hover:bg-slate-50' }}">
                {{ __('app.nav_locations') }}
            </a>
            <a href="{{ route('pages.insights') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('pages.insights') ? 'bg-[#fbf6ea] text-[#16325c]' : 'text-slate-700 hover:bg-slate-50' }}">
                {{ __('app.nav_insights') }}
            </a>
            <a href="{{ route('pages.contact') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('pages.contact') ? 'bg-[#fbf6ea] text-[#16325c]' : 'text-slate-700 hover:bg-slate-50' }}">
                {{ __('app.nav_contact') }}
            </a>

            <div class="pt-3 border-t border-slate-100 flex flex-col gap-2">
                <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($headerWaMsg) }}" target="_blank" rel="noopener" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl bg-[#16325c] text-white font-bold text-xs">
                    <svg class="w-4 h-4 text-[#dfb256]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                    <span>{{ __('app.talk_to_us') }}</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Flash Alert Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 flex items-center justify-between shadow-xs">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold">✓</div>
                    <p class="text-xs sm:text-sm font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Global Dynamic Context-Aware Floating WhatsApp Button -->
    @php
        $defaultMsg = 'Hello RELAND Arusha, I would like to consult on land surveying and formalization services.';
        $activeWaMsg = trim(View::yieldContent('whatsapp_message', $defaultMsg));
        if (empty($activeWaMsg)) {
            $activeWaMsg = $defaultMsg;
        }
    @endphp
    <aside aria-label="WhatsApp Support" class="fixed bottom-6 right-6 z-50 flex items-center group">
        <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($activeWaMsg) }}" 
           target="_blank" 
           rel="noopener" 
           class="relative flex items-center justify-center w-14 h-14 bg-[#25D366] hover:bg-[#1ebd5a] text-white rounded-full shadow-2xl shadow-emerald-900/40 hover:scale-110 active:scale-95 transition transform duration-200 ring-4 ring-white/60"
           title="Chat with RELAND on WhatsApp">
            <!-- Ping animation ring -->
            <span class="absolute -top-1 -right-1 flex h-4 w-4">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-300"></span>
            </span>
            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
        </a>
    </aside>

    <!-- Public Corporate Footer -->
    <footer class="bg-[#0c1c34] text-slate-400 border-t border-slate-800 pt-16 pb-12">
        <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800/80">
                <!-- Column 1: Brand & Bio -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="RELAND Logo" class="h-11 w-auto object-contain bg-white rounded-xl p-1 shadow-xs">
                        <div class="flex flex-col">
                            <span class="font-extrabold text-2xl tracking-tight text-white leading-none">RE<span class="text-[#dfb256]">LAND</span></span>
                            <span class="text-[9px] font-bold tracking-wider text-[#dfb256] uppercase mt-0.5">Consult Ltd &bull; Arusha</span>
                        </div>
                    </div>
                    <p class="text-xs leading-relaxed text-slate-300">
                        {{ __('app.footer_about') }}
                    </p>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900/80 text-xs text-[#dfb256] border border-slate-800">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        <span>Arusha, Tanzania Operations</span>
                    </div>
                </div>

                <!-- Column 2: Core Services -->
                <div>
                    <h3 class="text-white font-bold text-xs uppercase tracking-wider mb-4 border-l-2 border-[#c89a3b] pl-2">{{ __('app.our_services') }}</h3>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('services.show', 'land-surveying') }}" class="hover:text-[#dfb256] transition">{{ app()->getLocale() === 'sw' ? 'Upimaji wa Ardhi' : 'Cadastral Land Surveying' }}</a></li>
                        <li><a href="{{ route('services.show', 'land-formalization') }}" class="hover:text-[#dfb256] transition">{{ app()->getLocale() === 'sw' ? 'Urasimishaji wa Makazi' : 'Land Formalization (Urasimishaji)' }}</a></li>
                        <li><a href="{{ route('services.show', 'plot-subdivision') }}" class="hover:text-[#dfb256] transition">{{ app()->getLocale() === 'sw' ? 'Ugawaji wa Viwanja' : 'Plot Subdivision Schemes' }}</a></li>
                        <li><a href="{{ route('services.show', 'boundary-demarcation') }}" class="hover:text-[#dfb256] transition">{{ app()->getLocale() === 'sw' ? 'Uhakiki wa Mipaka & Beacons' : 'Boundary Demarcation' }}</a></li>
                        <li><a href="{{ route('services.show', 'land-consultation') }}" class="hover:text-[#dfb256] transition">{{ app()->getLocale() === 'sw' ? 'Ushauri wa Kitaalamu' : 'Land Consultation & Title Search' }}</a></li>
                        <li><a href="{{ route('services.show', 'plot-sales') }}" class="hover:text-[#dfb256] transition">{{ app()->getLocale() === 'sw' ? 'Uuzaji wa Viwanja' : 'Verified Plot Sales' }}</a></li>
                    </ul>
                </div>

                <!-- Column 3: Quick Navigation -->
                <div>
                    <h3 class="text-white font-bold text-xs uppercase tracking-wider mb-4 border-l-2 border-[#c89a3b] pl-2">{{ __('app.quick_links') }}</h3>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('pages.about') }}" class="hover:text-[#dfb256] transition">{{ __('app.nav_about') }}</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-[#dfb256] transition">{{ __('app.nav_projects') }}</a></li>
                        <li><a href="{{ route('plots.index') }}" class="hover:text-[#dfb256] transition">{{ __('app.nav_plots') }}</a></li>
                        <li><a href="{{ route('locations.index') }}" class="hover:text-[#dfb256] transition">{{ __('app.nav_locations') }}</a></li>
                        <li><a href="{{ route('pages.track') }}" class="hover:text-[#dfb256] transition flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Fuatilia Mchakato</a></li>
                        <li><a href="{{ route('pages.insights') }}" class="hover:text-[#dfb256] transition">{{ __('app.nav_insights') }}</a></li>
                        <li><a href="{{ route('pages.contact') }}" class="hover:text-[#dfb256] transition">{{ __('app.nav_contact') }}</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact & Office -->
                <div>
                    <h3 class="text-white font-bold text-xs uppercase tracking-wider mb-4 border-l-2 border-[#c89a3b] pl-2">{{ __('app.contact_us') }}</h3>
                    <ul class="space-y-3 text-xs">
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-[#dfb256] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            <span class="text-slate-300">{{ $siteAddress ?? 'Floor 3, TFA Complex, Sokoine Road, Arusha, Tanzania' }}</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-[#dfb256] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <a href="tel:{{ $sitePhone ?? '+255742448965' }}" class="text-slate-300 hover:text-white">{{ $sitePhone ?? '+255 742 448 965' }}</a>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-[#dfb256] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ $siteEmail ?? 'info@reland.co.tz' }}" class="text-slate-300 hover:text-white">{{ $siteEmail ?? 'info@reland.co.tz' }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright & Disclaimer -->
            <div class="mt-8 flex flex-col sm:flex-row justify-between items-center text-[11px] text-slate-400 gap-4">
                <p>&copy; {{ date('Y') }} RELAND CONSULT LTD. {{ __('app.rights_reserved') }}</p>
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-center sm:text-right">
                    <p class="font-medium text-slate-300">{{ __('app.disclaimer') }}</p>
                    <span class="hidden sm:inline text-slate-700">|</span>
                    <p class="text-slate-400">Arusha, Tanzania</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- 3D WebGL Engine & Micro-Interactions -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="{{ asset('js/reland-3d.js') }}"></script>

    @stack('scripts')
</body>
</html>
