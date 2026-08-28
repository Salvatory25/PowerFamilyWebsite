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

    <!-- Main Navigation Header (Fully Responsive Mobile & Desktop) -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
        <div class="w-full max-w-[1720px] mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-18 sm:h-20 gap-2 sm:gap-4">
                
                <!-- Brand Logo & Responsive Slogan -->
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 shrink-0 group min-w-0">
                    <img src="{{ asset('images/logo.png') }}" alt="RELAND Logo" class="h-9 sm:h-11 w-auto object-contain drop-shadow-xs group-hover:scale-105 transition transform shrink-0">
                    <div class="flex flex-col min-w-0">
                        <div class="flex items-center gap-1.5 sm:gap-2">
                            <span class="font-extrabold text-lg sm:text-2xl tracking-tight text-[#16325c] leading-none">RE<span class="text-[#c89a3b]">LAND</span></span>
                            <span class="inline-flex items-center px-1.5 sm:px-2 py-0.5 rounded-full bg-[#c89a3b]/15 text-[#c89a3b] text-[9px] sm:text-[10px] font-extrabold tracking-wide border border-[#c89a3b]/30 whitespace-nowrap">
                                Arusha, TZ
                            </span>
                        </div>
                        <!-- Desktop Slogan -->
                        <span class="hidden md:block text-[9px] sm:text-[10px] font-bold text-slate-500 mt-0.5 tracking-tight whitespace-nowrap">
                            "Ardhi Yako Mtaji Wako" &bull; Upimaji &bull; Mipango Miji &bull; Hati Miliki
                        </span>
                        <!-- Mobile Slogan -->
                        <span class="block md:hidden text-[9px] font-semibold text-slate-500 truncate max-w-[150px] xs:max-w-[200px]">
                            Upimaji &bull; Hati Miliki
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Links (Visible on LG & above) -->
                <nav class="hidden lg:flex items-center gap-1 xl:gap-2.5 2xl:gap-3 text-xs xl:text-sm font-semibold text-slate-700">
                    <a href="{{ route('home') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('home') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_home') }}
                    </a>

                    <a href="{{ route('pages.about') }}" class="px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('pages.about') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                        {{ __('app.nav_about') }}
                    </a>

                    <!-- Services Mega Menu Link -->
                    <div class="relative group py-1.5">
                        <a href="{{ route('pages.services') }}" class="flex items-center gap-1 px-2.5 py-1.5 rounded-lg whitespace-nowrap transition-colors hover:text-[#16325c] hover:bg-slate-100/60 {{ request()->routeIs('pages.services') || request()->routeIs('services.*') ? 'text-[#16325c] font-bold bg-[#fbf6ea]' : '' }}">
                            <span>{{ __('app.nav_services') }}</span>
                            <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-[#16325c] group-hover:rotate-180 transition transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                        
                        <!-- Rich Mega Menu Container -->
                        <div class="absolute -left-28 xl:-left-40 top-full pt-2.5 hidden group-hover:block w-[800px] xl:w-[920px] z-50 animate-fadeIn">
                            <div class="bg-white rounded-3xl shadow-2xl border border-slate-200/90 overflow-hidden ring-1 ring-black/5 p-6">
                                
                                <!-- Mega Menu Header Bar -->
                                <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-100">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-[#c89a3b] animate-pulse"></span>
                                        <span class="text-[11px] font-extrabold uppercase tracking-wider text-[#16325c]">
                                            {{ app()->getLocale() === 'sw' ? 'Huduma za Kitaalamu za Upimaji & Mipango Miji' : 'Cadastral Land Surveying & Planning Services' }}
                                        </span>
                                    </div>
                                    <a href="{{ route('pages.services') }}" class="text-xs font-bold text-[#c89a3b] hover:text-[#16325c] flex items-center gap-1 transition">
                                        <span>{{ app()->getLocale() === 'sw' ? 'Tazama Huduma Zote' : 'Explore All Services' }}</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>

                                <!-- 2-Column Services Grid + Side Card -->
                                <div class="grid grid-cols-12 gap-5">
                                    
                                    <!-- Left Grid: 6 Core Services in 2 Columns -->
                                    <div class="col-span-8 grid grid-cols-2 gap-3">
                                        
                                        <!-- Service 1: Upimaji wa Ardhi -->
                                        <a href="{{ route('services.show', 'land-surveying') }}" class="group/item flex items-start gap-3 p-3 rounded-2xl border border-slate-100 hover:border-[#c89a3b]/40 hover:bg-[#fbf6ea]/70 transition">
                                            <div class="w-9 h-9 rounded-xl bg-[#16325c]/10 group-hover/item:bg-[#16325c] text-[#16325c] group-hover/item:text-[#dfb256] flex items-center justify-center shrink-0 transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-1.5">
                                                    <span class="font-bold text-xs text-[#16325c] group-hover/item:text-[#0c1c34] block truncate">{{ app()->getLocale() === 'sw' ? '1. Upimaji wa Ardhi' : '1. Land Surveying' }}</span>
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-[#c89a3b]/15 text-[#c89a3b]">RTK</span>
                                                </div>
                                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-0.5 leading-tight">{{ app()->getLocale() === 'sw' ? 'Upimaji wa RTK GPS, beacons na Deed Plans za Wizara.' : 'RTK GPS surveys, concrete beacons & Deed Plans.' }}</p>
                                            </div>
                                        </a>

                                        <!-- Service 2: Urasimishaji -->
                                        <a href="{{ route('services.show', 'land-formalization') }}" class="group/item flex items-start gap-3 p-3 rounded-2xl border border-slate-100 hover:border-[#c89a3b]/40 hover:bg-[#fbf6ea]/70 transition">
                                            <div class="w-9 h-9 rounded-xl bg-[#16325c]/10 group-hover/item:bg-[#16325c] text-[#16325c] group-hover/item:text-[#dfb256] flex items-center justify-center shrink-0 transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-1.5">
                                                    <span class="font-bold text-xs text-[#16325c] group-hover/item:text-[#0c1c34] block truncate">{{ app()->getLocale() === 'sw' ? '2. Urasimishaji' : '2. Land Formalization' }}</span>
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-emerald-100 text-emerald-700">Hati</span>
                                                </div>
                                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-0.5 leading-tight">{{ app()->getLocale() === 'sw' ? 'Kubadili makazi yasiyopangwa kuwa viwanja rasmi.' : 'Regularizing unplanned settlements into official titles.' }}</p>
                                            </div>
                                        </a>

                                        <!-- Service 3: Ugawaji wa Viwanja -->
                                        <a href="{{ route('services.show', 'plot-subdivision') }}" class="group/item flex items-start gap-3 p-3 rounded-2xl border border-slate-100 hover:border-[#c89a3b]/40 hover:bg-[#fbf6ea]/70 transition">
                                            <div class="w-9 h-9 rounded-xl bg-[#16325c]/10 group-hover/item:bg-[#16325c] text-[#16325c] group-hover/item:text-[#dfb256] flex items-center justify-center shrink-0 transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-1.5">
                                                    <span class="font-bold text-xs text-[#16325c] group-hover/item:text-[#0c1c34] block truncate">{{ app()->getLocale() === 'sw' ? '3. Ugawaji wa Viwanja' : '3. Plot Subdivision' }}</span>
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-sky-100 text-sky-700">Plan</span>
                                                </div>
                                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-0.5 leading-tight">{{ app()->getLocale() === 'sw' ? 'Uchoraji ramani na kugawa mashamba kisheria.' : 'Town planning master layouts and parcel partition.' }}</p>
                                            </div>
                                        </a>

                                        <!-- Service 4: Uhakiki wa Mipaka -->
                                        <a href="{{ route('services.show', 'boundary-demarcation') }}" class="group/item flex items-start gap-3 p-3 rounded-2xl border border-slate-100 hover:border-[#c89a3b]/40 hover:bg-[#fbf6ea]/70 transition">
                                            <div class="w-9 h-9 rounded-xl bg-[#16325c]/10 group-hover/item:bg-[#16325c] text-[#16325c] group-hover/item:text-[#dfb256] flex items-center justify-center shrink-0 transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-1.5">
                                                    <span class="font-bold text-xs text-[#16325c] group-hover/item:text-[#0c1c34] block truncate">{{ app()->getLocale() === 'sw' ? '4. Uhakiki wa Mipaka' : '4. Boundary Demarcation' }}</span>
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-amber-100 text-amber-800">Amani</span>
                                                </div>
                                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-0.5 leading-tight">{{ app()->getLocale() === 'sw' ? 'Kurejesha beacons na kuzuia migogoro ya ardhi.' : 'Beacon retracement & boundary conflict prevention.' }}</p>
                                            </div>
                                        </a>

                                        <!-- Service 5: Ushauri wa Kitaalamu -->
                                        <a href="{{ route('services.show', 'land-consultation') }}" class="group/item flex items-start gap-3 p-3 rounded-2xl border border-slate-100 hover:border-[#c89a3b]/40 hover:bg-[#fbf6ea]/70 transition">
                                            <div class="w-9 h-9 rounded-xl bg-[#16325c]/10 group-hover/item:bg-[#16325c] text-[#16325c] group-hover/item:text-[#dfb256] flex items-center justify-center shrink-0 transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-1.5">
                                                    <span class="font-bold text-xs text-[#16325c] group-hover/item:text-[#0c1c34] block truncate">{{ app()->getLocale() === 'sw' ? '5. Ushauri wa Ardhi' : '5. Land Consultation' }}</span>
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-purple-100 text-purple-700">Wizara</span>
                                                </div>
                                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-0.5 leading-tight">{{ app()->getLocale() === 'sw' ? 'Ukaguzi wa hati, ardhi na ushauri wa kisheria.' : 'Official title searches & registry advisory.' }}</p>
                                            </div>
                                        </a>

                                        <!-- Service 6: Uuzaji wa Viwanja -->
                                        <a href="{{ route('services.show', 'plot-sales') }}" class="group/item flex items-start gap-3 p-3 rounded-2xl border border-slate-100 hover:border-[#c89a3b]/40 hover:bg-[#fbf6ea]/70 transition">
                                            <div class="w-9 h-9 rounded-xl bg-[#16325c]/10 group-hover/item:bg-[#16325c] text-[#16325c] group-hover/item:text-[#dfb256] flex items-center justify-center shrink-0 transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-1.5">
                                                    <span class="font-bold text-xs text-[#16325c] group-hover/item:text-[#0c1c34] block truncate">{{ app()->getLocale() === 'sw' ? '6. Uuzaji wa Viwanja' : '6. Plot Sales' }}</span>
                                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-emerald-100 text-emerald-800">Verified</span>
                                                </div>
                                                <p class="text-[11px] text-slate-500 line-clamp-2 mt-0.5 leading-tight">{{ app()->getLocale() === 'sw' ? 'Viwanja vilivyopimwa vyenye hati Arusha.' : 'Dispute-free surveyed plots with title deeds.' }}</p>
                                            </div>
                                        </a>

                                    </div>

                                    <!-- Right Sidebar Card: Featured Promo & Fast Tracking -->
                                    <div class="col-span-4 rounded-2xl bg-[#0c1c34] p-4 text-white flex flex-col justify-between border border-[#c89a3b]/40 relative overflow-hidden">
                                        <div class="space-y-2 relative z-10">
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#c89a3b]/20 text-[#dfb256] text-[10px] font-bold border border-[#c89a3b]/30">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                                                Arusha Headquarters
                                            </span>
                                            <h4 class="text-xs font-black text-white leading-snug">
                                                {{ app()->getLocale() === 'sw' ? 'Unahitaji Kupimiwa Kiwanja Chako?' : 'Need Survey or Formalization?' }}
                                            </h4>
                                            <p class="text-[10px] text-slate-300 leading-relaxed">
                                                {{ app()->getLocale() === 'sw' ? 'Wapimaji waliosajiliwa wako tayari kukuhudumia kwa vifaa vya kisasa vya RTK GNSS.' : 'Certified cadastral land surveyors equipped with high-precision RTK GNSS.' }}
                                            </p>
                                        </div>

                                        <div class="pt-3 space-y-1.5 border-t border-white/10 relative z-10">
                                            <a href="{{ route('pages.track') }}" class="flex items-center justify-between px-3 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-white text-[11px] font-bold transition">
                                                <span class="flex items-center gap-1.5">
                                                    <svg class="w-3.5 h-3.5 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    Fuatilia Mchakato
                                                </span>
                                                <span>&rarr;</span>
                                            </a>
                                            <a href="{{ route('pages.contact') }}" class="flex items-center justify-center gap-1.5 w-full py-2 rounded-xl bg-gradient-to-r from-[#c89a3b] to-[#dfb256] text-[#0c1c34] text-[11px] font-black shadow-md hover:opacity-95 transition">
                                                <span>{{ __('app.talk_to_us') }}</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
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

                <!-- Desktop Header Actions (Direct Phone + Language Switcher + CTA) -->
                <div class="hidden lg:flex items-center gap-2 xl:gap-3 shrink-0">
                    
                    <!-- Direct Phone Link -->
                    <a href="tel:{{ $sitePhone ?? '+255742448965' }}" class="inline-flex items-center gap-1.5 px-2.5 xl:px-3 py-2 rounded-xl text-xs font-bold text-[#16325c] hover:bg-slate-100 border border-slate-200 transition">
                        <svg class="w-3.5 h-3.5 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="hidden xl:inline">{{ $sitePhone ?? '+255 742 448 965' }}</span>
                        <span class="inline xl:hidden font-mono text-[11px]">+255 742...</span>
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
                    <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($headerWaMsg) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 xl:gap-2 px-3 xl:px-4 py-2.5 rounded-xl bg-[#16325c] hover:bg-[#0c1c34] text-white text-xs font-bold shadow-md shadow-[#16325c]/20 hover:shadow-lg transition transform hover:-translate-y-0.5 border border-[#c89a3b]/40 whitespace-nowrap">
                        <svg class="w-4 h-4 text-[#dfb256]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        <span>{{ __('app.talk_to_us') }}</span>
                    </a>
                </div>

                <!-- Mobile Header Right Actions (Language Switcher + Mobile Menu Button) -->
                <div class="flex items-center gap-1.5 sm:gap-2 lg:hidden shrink-0">
                    <!-- Mobile Direct Phone Tap Icon -->
                    <a href="tel:{{ $sitePhone ?? '+255742448965' }}" class="p-2 rounded-xl text-[#16325c] bg-slate-100 hover:bg-[#c89a3b]/20 border border-slate-200 transition" aria-label="Call Us">
                        <svg class="w-4 h-4 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </a>

                    <!-- Mobile Language Switcher -->
                    <div class="flex items-center gap-0.5 font-medium bg-slate-100 px-1.5 py-1 rounded-lg border border-slate-200 text-[11px]">
                        <a href="{{ route('lang.switch', 'en') }}" class="px-1.5 py-0.5 rounded font-bold {{ app()->getLocale() === 'en' ? 'bg-[#c89a3b] text-[#0c1c34]' : 'text-slate-500' }}">EN</a>
                        <span class="text-slate-300">|</span>
                        <a href="{{ route('lang.switch', 'sw') }}" class="px-1.5 py-0.5 rounded font-bold {{ app()->getLocale() === 'sw' ? 'bg-[#c89a3b] text-[#0c1c34]' : 'text-slate-500' }}">SW</a>
                    </div>

                    <!-- Hamburger Button -->
                    <button type="button" 
                            onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" 
                            class="p-2 rounded-xl text-slate-700 hover:text-[#16325c] bg-slate-100 hover:bg-slate-200/80 border border-slate-200 focus:outline-hidden transition" 
                            aria-label="Toggle navigation">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu (Slide-out Dropdown) -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white/98 backdrop-blur-lg px-4 pt-3 pb-6 space-y-1 shadow-2xl max-h-[85vh] overflow-y-auto animate-fadeIn">
            <!-- Mobile Quick Header Info -->
            <div class="pb-3 mb-2 border-b border-slate-100 flex items-center justify-between">
                <a href="tel:{{ $sitePhone ?? '+255742448965' }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#16325c] hover:text-[#c89a3b] transition">
                    <svg class="w-4 h-4 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>{{ $sitePhone ?? '+255 742 448 965' }}</span>
                </a>
                <span class="text-[10px] font-extrabold text-[#c89a3b] uppercase tracking-wide bg-[#c89a3b]/10 px-2 py-0.5 rounded-md">Arusha, Tanzania</span>
            </div>

            <!-- Navigation Links -->
            <a href="{{ route('home') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-bold {{ request()->routeIs('home') ? 'bg-[#fbf6ea] text-[#16325c]' : 'text-slate-700 hover:bg-slate-50' }}">
                <span>{{ __('app.nav_home') }}</span>
                @if(request()->routeIs('home')) <span class="w-1.5 h-1.5 rounded-full bg-[#c89a3b]"></span> @endif
            </a>
            <a href="{{ route('pages.about') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('pages.about') ? 'bg-[#fbf6ea] text-[#16325c] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                <span>{{ __('app.nav_about') }}</span>
                @if(request()->routeIs('pages.about')) <span class="w-1.5 h-1.5 rounded-full bg-[#c89a3b]"></span> @endif
            </a>
            
            <!-- Services Section in Mobile Menu -->
            <div class="py-1">
                <a href="{{ route('pages.services') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-bold text-[#16325c] bg-slate-50/80 border border-slate-100">
                    <span>{{ __('app.nav_services') }}</span>
                    <svg class="w-4 h-4 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
                <div class="pl-3 space-y-1 mt-1.5 border-l-2 border-[#c89a3b]/40 ml-3">
                    <a href="{{ route('services.show', 'land-surveying') }}" class="block px-2.5 py-1.5 text-xs text-slate-600 hover:text-[#16325c] hover:bg-slate-50 rounded-lg">{{ app()->getLocale() === 'sw' ? '1. Upimaji wa Ardhi' : '1. Land Surveying' }}</a>
                    <a href="{{ route('services.show', 'land-formalization') }}" class="block px-2.5 py-1.5 text-xs text-slate-600 hover:text-[#16325c] hover:bg-slate-50 rounded-lg">{{ app()->getLocale() === 'sw' ? '2. Urasimishaji' : '2. Land Formalization' }}</a>
                    <a href="{{ route('services.show', 'plot-subdivision') }}" class="block px-2.5 py-1.5 text-xs text-slate-600 hover:text-[#16325c] hover:bg-slate-50 rounded-lg">{{ app()->getLocale() === 'sw' ? '3. Ugawaji wa Viwanja' : '3. Plot Subdivision' }}</a>
                    <a href="{{ route('services.show', 'boundary-demarcation') }}" class="block px-2.5 py-1.5 text-xs text-slate-600 hover:text-[#16325c] hover:bg-slate-50 rounded-lg">{{ app()->getLocale() === 'sw' ? '4. Uhakiki wa Mipaka' : '4. Boundary Demarcation' }}</a>
                    <a href="{{ route('services.show', 'land-consultation') }}" class="block px-2.5 py-1.5 text-xs text-slate-600 hover:text-[#16325c] hover:bg-slate-50 rounded-lg">{{ app()->getLocale() === 'sw' ? '5. Ushauri wa Ardhi' : '5. Land Consultation' }}</a>
                    <a href="{{ route('services.show', 'plot-sales') }}" class="block px-2.5 py-1.5 text-xs text-slate-600 hover:text-[#16325c] hover:bg-slate-50 rounded-lg">{{ app()->getLocale() === 'sw' ? '6. Uuzaji wa Viwanja' : '6. Plot Sales' }}</a>
                </div>
            </div>

            <a href="{{ route('projects.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('projects.*') ? 'bg-[#fbf6ea] text-[#16325c] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                <span>{{ __('app.nav_projects') }}</span>
                @if(request()->routeIs('projects.*')) <span class="w-1.5 h-1.5 rounded-full bg-[#c89a3b]"></span> @endif
            </a>
            <a href="{{ route('plots.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('plots.*') ? 'bg-[#fbf6ea] text-[#16325c] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                <span>{{ __('app.nav_plots') }}</span>
                @if(request()->routeIs('plots.*')) <span class="w-1.5 h-1.5 rounded-full bg-[#c89a3b]"></span> @endif
            </a>
            <a href="{{ route('locations.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('locations.*') ? 'bg-[#fbf6ea] text-[#16325c] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                <span>{{ __('app.nav_locations') }}</span>
                @if(request()->routeIs('locations.*')) <span class="w-1.5 h-1.5 rounded-full bg-[#c89a3b]"></span> @endif
            </a>
            <a href="{{ route('pages.insights') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('pages.insights') ? 'bg-[#fbf6ea] text-[#16325c] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                <span>{{ __('app.nav_insights') }}</span>
                @if(request()->routeIs('pages.insights')) <span class="w-1.5 h-1.5 rounded-full bg-[#c89a3b]"></span> @endif
            </a>
            <a href="{{ route('pages.track') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('pages.track') ? 'bg-[#fbf6ea] text-[#16325c] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Mchakato
                </span>
                @if(request()->routeIs('pages.track')) <span class="w-1.5 h-1.5 rounded-full bg-[#c89a3b]"></span> @endif
            </a>
            <a href="{{ route('pages.contact') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('pages.contact') ? 'bg-[#fbf6ea] text-[#16325c] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                <span>{{ __('app.nav_contact') }}</span>
                @if(request()->routeIs('pages.contact')) <span class="w-1.5 h-1.5 rounded-full bg-[#c89a3b]"></span> @endif
            </a>

            <!-- Mobile Drawer WhatsApp Action -->
            <div class="pt-3 border-t border-slate-100 flex flex-col gap-2">
                @php
                    $drawerWaMsg = 'Hello RELAND Arusha, I would like to consult on land surveying and formalization services.';
                @endphp
                <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($drawerWaMsg) }}" target="_blank" rel="noopener" class="flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-[#16325c] hover:bg-[#0c1c34] text-white font-bold text-xs shadow-md shadow-[#16325c]/20 transition">
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
