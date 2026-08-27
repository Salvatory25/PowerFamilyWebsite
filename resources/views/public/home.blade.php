@extends('layouts.app')

@section('title', 'RELAND | Professional Land Surveying & Formalization Solutions &bull; Arusha, Tanzania')
@section('meta_description', 'Reliable land surveying, formalization, subdivision, beacon demarcation, and verified plots in Arusha, Tanzania. Trusted cadastral land professionals.')

@section('content')

<!-- 1. PREMIUM CORPORATE HERO SECTION -->
<section class="relative bg-[#0c1c34] text-white overflow-hidden pt-12 pb-20 lg:pt-20 lg:pb-28 border-b border-[#c89a3b]/20">
    <!-- Hero 3D Particle Constellation Canvas -->
    <canvas id="reland-hero-canvas" class="absolute inset-0 z-0 pointer-events-none w-full h-full"></canvas>

    <!-- Animated Cadastral Boundary Line SVG Background Drawing -->
    <svg class="absolute inset-0 w-full h-full pointer-events-none z-0 opacity-20" xmlns="http://www.w3.org/2000/svg">
        <path d="M 50 150 L 450 100 L 800 250 L 1200 120 L 1600 300 L 1400 650 L 700 550 L 200 600 Z" 
              fill="none" 
              stroke="#dfb256" 
              stroke-width="1.5" 
              stroke-dasharray="10 5" 
              class="cadastral-path-draw" />
        <circle cx="450" cy="100" r="4" fill="#dfb256" />
        <circle cx="800" cy="250" r="4" fill="#dfb256" />
        <circle cx="1200" cy="120" r="4" fill="#dfb256" />
        <circle cx="1400" cy="650" r="4" fill="#dfb256" />
    </svg>

    <!-- Ambient Background Lighting & Cadastral Grid Layer -->
    <div class="absolute inset-0 z-0 cadastral-grid opacity-25 pointer-events-none"></div>
    
    <!-- Ambient Glow Mesh -->
    <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-[#c89a3b]/15 blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-[#20457c]/40 blur-[140px] pointer-events-none"></div>

    <div class="relative z-10 w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Corporate Value Proposition -->
            <div class="lg:col-span-7 space-y-6 text-left">
                
                <!-- Trust Badge with Radar Pulse -->
                <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-[#16325c]/95 border border-[#c89a3b]/50 text-[#dfb256] text-xs font-extrabold tracking-wide backdrop-blur-md shadow-xl shadow-black/30">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-400"></span>
                    </span>
                    <span>Wapimaji &amp; Wataalamu Waliosajiliwa wa Ardhi &bull; Arusha, Tanzania</span>
                </div>

                <!-- Main Headline with Shimmer & Dynamic Word Flipper -->
                <div class="space-y-2">
                    <h1 class="text-3xl sm:text-5xl lg:text-[50px] font-black tracking-tight text-white leading-[1.12]">
                        <span class="shimmer-gold-text block">{{ $siteHeroTitle ?: __('app.hero_title') }}</span>
                        
                        <!-- Word Flipper Subline -->
                        <div class="word-flipper-container text-xl sm:text-3xl lg:text-[34px] font-extrabold text-[#dfb256] mt-2">
                            <div id="hero-flipper-track" class="word-flipper-track">
                                <div class="word-flipper-item">Upimaji wa Kisasa kwa RTK GNSS</div>
                                <div class="word-flipper-item">Urasimishaji &amp; Leseni za Makazi</div>
                                <div class="word-flipper-item">Ugawaji wa Viwanja &amp; Mipango Miji</div>
                                <div class="word-flipper-item">Hati Miliki Salama Bila Migogoro</div>
                            </div>
                        </div>
                    </h1>
                </div>

                <!-- Supporting Text -->
                <p class="text-base sm:text-lg text-slate-300 font-normal leading-relaxed max-w-3xl">
                    {{ $siteHeroSubtitle ?: __('app.hero_subtitle') }}
                </p>

                <!-- Value Highlights Pills -->
                <div class="flex flex-wrap items-center gap-2.5 pt-1">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-white/5 border border-white/10 text-slate-200 text-xs font-semibold">
                        <svg class="w-3.5 h-3.5 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        RTK GNSS GPS &bull; &plusmn;2cm Precision
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-white/5 border border-white/10 text-slate-200 text-xs font-semibold">
                        <svg class="w-3.5 h-3.5 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        Ministry Approved Deed Plans
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-emerald-950/50 border border-emerald-500/40 text-emerald-300 text-xs font-bold shadow-xs">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        100% Wizara ya Ardhi Certified
                    </span>
                </div>

                <!-- Call to Actions with Golden Light Sweep -->
                <div class="pt-3 flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5">
                    <a href="{{ route('pages.services') }}" class="shimmer-gold-btn inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl bg-gradient-to-r from-[#c89a3b] to-[#dfb256] hover:from-[#b5882e] hover:to-[#c89a3b] text-[#0c1c34] font-black text-sm shadow-xl shadow-[#c89a3b]/25 hover:shadow-2xl transition transform hover:-translate-y-0.5">
                        <span>{{ __('app.hero_cta_primary') }}</span>
                        <svg class="w-4 h-4 text-[#0c1c34]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>

                    <a href="{{ route('pages.contact') }}" class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-2xl bg-[#16325c]/80 hover:bg-[#16325c] text-white font-bold text-sm border border-[#c89a3b]/30 shadow-lg hover:shadow-xl backdrop-blur-md transition transform hover:-translate-y-0.5">
                        <span>{{ __('app.hero_cta_secondary') }}</span>
                    </a>

                    @php
                        $heroWaMsg = 'Hello RELAND, I would like to consult on land surveying and formalization services.';
                    @endphp
                    <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($heroWaMsg) }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 px-5 py-4 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-lg shadow-emerald-900/30 hover:shadow-xl transition transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Visual Showcase with 3D Depth Card & Floating Elements -->
            <div class="lg:col-span-5 relative mt-6 lg:mt-0 perspective-1000">
                
                <!-- Main Showcase Image Card with 3D Tilt Frame -->
                <div data-tilt data-tilt-max="12" data-tilt-scale="1.03" class="relative rounded-3xl overflow-hidden border-2 border-[#c89a3b]/40 shadow-2xl shadow-black/60 bg-[#16325c] group preserve-3d">
                    <img src="{{ asset('images/hero-survey.jpg') }}" 
                         alt="Professional Land Surveyors in Arusha with Mount Meru and RTK GNSS GPS" 
                         class="w-full h-[380px] sm:h-[420px] object-cover group-hover:scale-105 transition-transform duration-700">
                    
                    <!-- Gradient Vignette -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0c1c34]/95 via-[#0c1c34]/25 to-transparent"></div>
                    
                    <!-- Live RTK Spatial HUD Overlay (Top Center) -->
                    <div class="absolute top-4 inset-x-4 flex items-center justify-between p-2.5 rounded-2xl bg-black/60 backdrop-blur-md border border-white/10 translate-z-20 text-[10px]">
                        <div class="flex items-center gap-2 text-emerald-400 font-mono font-bold">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span id="hero-live-coords">LAT: 03°22'18.4"S  LON: 36°41'05.2"E</span>
                        </div>
                        <span class="px-2 py-0.5 rounded-md bg-[#c89a3b]/20 border border-[#c89a3b]/40 text-[#dfb256] font-bold">
                            RTK FIXED &plusmn;0.015m
                        </span>
                    </div>

                    <!-- Bottom Overlay Caption with 3D Depth -->
                    <div class="absolute bottom-0 inset-x-0 p-5 backdrop-blur-xs bg-[#0c1c34]/70 border-t border-white/10 flex items-center justify-between translate-z-20">
                        <div>
                            <span class="text-[11px] font-bold text-[#dfb256] uppercase tracking-wider block">Cadastral &amp; RTK GNSS Field Operations</span>
                            <p class="text-xs font-semibold text-white">{{ $siteCoverageRegions ?: 'Arusha City • Meru • Monduli • Northern Zone' }}</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-md bg-[#c89a3b]/20 border border-[#c89a3b]/40 text-[#dfb256] font-bold text-[10px]">
                            ACTIVE
                        </span>
                    </div>
                </div>

                <!-- Floating Dynamic Badge 1 (Top Left) with 3D Depth & Sine Wave Motion -->
                <div data-tilt data-tilt-max="15" class="animate-float-sine1 absolute -top-4 left-2 sm:-top-5 sm:-left-8 luxury-glass-dark p-3 sm:p-3.5 rounded-2xl shadow-2xl z-20 flex items-center gap-2.5 sm:gap-3 border border-[#c89a3b]/40 max-w-[200px] sm:max-w-[220px]">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-[#c89a3b]/20 border border-[#c89a3b]/50 text-[#dfb256] flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <span class="text-[9px] sm:text-[10px] font-extrabold text-slate-300 uppercase tracking-wider block">Beacon Pegging</span>
                        <span class="text-[11px] sm:text-xs font-bold text-white block leading-tight">&plusmn;2cm Precision</span>
                    </div>
                </div>

                <!-- Floating Dynamic Badge 2 (Bottom Right) with 3D Depth & Sine Wave Motion -->
                <div data-tilt data-tilt-max="15" class="animate-float-sine2 absolute -bottom-4 right-2 sm:-bottom-5 sm:-right-6 luxury-glass-dark p-3 sm:p-3.5 rounded-2xl shadow-2xl z-20 flex items-center gap-2.5 sm:gap-3 border border-emerald-500/40 max-w-[210px] sm:max-w-[240px]">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-emerald-500/20 border border-emerald-400/50 text-emerald-300 flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <span class="text-[9px] sm:text-[10px] font-extrabold text-emerald-400 uppercase tracking-wider block">Deed Plans</span>
                        <span class="text-[11px] sm:text-xs font-bold text-white block leading-tight">Ministry Registered 100%</span>
                    </div>
                </div>

            </div>

        </div>

        <!-- Corporate Trust Indicators / Counters Banner with 3D Tilt -->
        <div class="mt-16 pt-12 border-t border-white/10 grid grid-cols-2 lg:grid-cols-4 gap-4 w-full max-w-[1720px] mx-auto">
            <div data-tilt data-tilt-max="8" class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:border-[#c89a3b]/40 transition duration-300">
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#dfb256]">{{ $stats['surveyed_plots'] ?? '1,450+' }}</span>
                <span class="text-xs sm:text-sm text-slate-300 font-semibold mt-1 block">{{ __('app.stat_1_label') }}</span>
            </div>
            <div data-tilt data-tilt-max="8" class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:border-[#c89a3b]/40 transition duration-300">
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#dfb256]">{{ $stats['formalized_acres'] ?? '850+' }}</span>
                <span class="text-xs sm:text-sm text-slate-300 font-semibold mt-1 block">{{ __('app.stat_2_label') }}</span>
            </div>
            <div data-tilt data-tilt-max="8" class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:border-[#c89a3b]/40 transition duration-300">
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#dfb256]">{{ $stats['clean_titles'] ?? '100%' }}</span>
                <span class="text-xs sm:text-sm text-slate-300 font-semibold mt-1 block">{{ __('app.stat_3_label') }}</span>
            </div>
            <div data-tilt data-tilt-max="8" class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:border-[#c89a3b]/40 transition duration-300">
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#dfb256]">{{ $stats['years_experience'] ?? '10+' }}</span>
                <span class="text-xs sm:text-sm text-slate-300 font-semibold mt-1 block">{{ __('app.stat_4_label') }}</span>
            </div>
        </div>
    </div>
</section>



<!-- 2. CORE SERVICES OVERVIEW (6 PRIMARY SERVICES) -->
<section class="py-20 bg-slate-50 relative">
    <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center space-y-3 mb-16">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#fbf6ea] text-[#16325c] text-xs font-extrabold tracking-wider uppercase border border-[#f5e9c9]">
                Professional Expertise
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#16325c] tracking-tight">
                {{ __('app.services_heading') }}
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                {{ __('app.services_subheading') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $isSw = app()->getLocale() === 'sw';
            @endphp

            @foreach($services as $slug => $service)
                <div data-tilt data-tilt-max="10" data-tilt-glare="true" class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs hover:shadow-2xl transition-all duration-300 flex flex-col justify-between hover:border-[#c89a3b]/60 group preserve-3d">
                    <div class="space-y-4 translate-z-10">
                        <div class="w-14 h-14 rounded-2xl bg-[#fbf6ea] group-hover:bg-[#16325c] text-[#16325c] group-hover:text-[#dfb256] flex items-center justify-center transition duration-300 border border-[#f5e9c9] shadow-xs">
                            @if($service['icon'] === 'surveying')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            @elseif($service['icon'] === 'formalization')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            @elseif($service['icon'] === 'subdivision')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                            @elseif($service['icon'] === 'demarcation')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            @elseif($service['icon'] === 'consultation')
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            @else
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            @endif
                        </div>

                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-[#c89a3b] block mb-1">
                                {{ $isSw ? $service['badge_sw'] : $service['badge_en'] }}
                            </span>
                            <h3 class="text-xl font-extrabold text-[#16325c] group-hover:text-[#c89a3b] transition">
                                {{ $isSw ? $service['title_sw'] : $service['title_en'] }}
                            </h3>
                        </div>

                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ $isSw ? $service['subtitle_sw'] : $service['subtitle_en'] }}
                        </p>
                    </div>

                    <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between translate-z-10">
                        <a href="{{ route('services.show', $service['slug']) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#16325c] group-hover:text-[#c89a3b] transition">
                            <span>{{ __('app.view_details') }}</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>

                        <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND, I would like to inquire about: ' . ($isSw ? $service['title_sw'] : $service['title_en'])) }}" target="_blank" rel="noopener" class="p-2 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white transition" title="Consult on WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- 2.5 INTERACTIVE 3D WEBGL CADASTRAL & ARCHITECTURAL VISUALIZER -->
<section class="py-20 bg-[#0c1c34] text-white relative overflow-hidden border-y border-[#c89a3b]/20">
    <!-- Ambient Lighting Glows -->
    <div class="absolute -top-32 left-1/4 w-96 h-96 rounded-full bg-[#c89a3b]/10 blur-[130px] pointer-events-none"></div>
    <div class="absolute -bottom-32 right-1/4 w-96 h-96 rounded-full bg-[#20457c]/30 blur-[130px] pointer-events-none"></div>

    <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Header -->
        <div class="max-w-3xl mx-auto text-center space-y-3 mb-12">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#16325c] text-[#dfb256] text-xs font-extrabold tracking-wider uppercase border border-[#c89a3b]/40">
                <span class="w-2 h-2 rounded-full bg-[#dfb256] animate-ping"></span>
                Next-Gen 3D Interactive Spatial Engine
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                {{ app()->getLocale() === 'sw' ? 'Tazama Upimaji & Mchoro wa Kiwanja kwa 3D' : 'Interactive 3D Land & Cadastral Plot Model' }}
            </h2>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto">
                {{ app()->getLocale() === 'sw' ? 'Zungusha na ukague kiwanja, mkondo wa maji, miti, mawe na alama za beacons (RTK GNSS) na mchoro wa ugawaji (Subdivision) kwa mtazamo wa 360°.' : 'Explore raw surveyed land parcels, natural stream channels, topography, subdivision lines, and precision GPS beacon pins in real-time 360°.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Left 3D Viewport Canvas Container -->
            <div class="lg:col-span-8 relative">
                <div class="relative rounded-3xl overflow-hidden bg-gradient-to-b from-[#16325c]/80 to-[#07101f] border-2 border-[#c89a3b]/30 shadow-2xl reland-3d-glow">
                    
                    <!-- 3D WebGL Canvas Viewport -->
                    <div id="reland-3d-viewport" class="w-full h-[420px] sm:h-[500px] reland-3d-canvas-container">
                        <!-- Loading Indicator Fallback -->
                        <div class="w-full h-full flex items-center justify-center text-slate-400 text-sm">
                            <div class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5 text-[#dfb256]" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                                <span>Loading 3D Engine...</span>
                            </div>
                        </div>
                    </div>

                    <!-- 3D Viewport Controls HUD Overlay (Top Right) -->
                    <div class="absolute top-4 right-4 flex items-center gap-1.5 z-20 flex-wrap">
                        <button id="btn-3d-rotate" class="px-2.5 py-1.5 rounded-xl bg-[#c89a3b] text-[#0c1c34] text-xs font-bold shadow-md hover:opacity-90 transition flex items-center gap-1" title="Toggle Auto-Rotation">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            <span>360&deg;</span>
                        </button>
                        <button id="btn-3d-drone" class="px-2.5 py-1.5 rounded-xl bg-[#c89a3b] text-[#0c1c34] text-xs font-bold shadow-md hover:opacity-90 transition flex items-center gap-1" title="Toggle Survey Drone & LiDAR Scanner">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            <span>LiDAR Drone</span>
                        </button>
                        <button id="btn-3d-beacons" class="px-2.5 py-1.5 rounded-xl bg-[#c89a3b] text-[#0c1c34] text-xs font-bold shadow-md hover:opacity-90 transition flex items-center gap-1" title="Toggle Cadastral Beacons">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            <span>GPS Beacons</span>
                        </button>
                        <button id="btn-3d-grid" class="px-2.5 py-1.5 rounded-xl bg-[#c89a3b] text-[#0c1c34] text-xs font-bold shadow-md hover:opacity-90 transition flex items-center gap-1" title="Toggle Cadastral Grid">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            <span>Grid</span>
                        </button>
                        <button id="btn-3d-simulate" class="px-3 py-1.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 text-[#0c1c34] text-xs font-black shadow-md hover:opacity-90 transition flex items-center gap-1" title="Simulate Survey Process">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/></svg>
                            <span>Simulate</span>
                        </button>
                        <button id="btn-3d-reset" class="p-1.5 rounded-xl bg-slate-800/80 text-slate-300 hover:text-white border border-slate-700 text-xs font-bold transition" title="Reset View">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                        </button>
                    </div>

                    <!-- Bottom Instruction Hint -->
                    <div class="absolute bottom-4 left-4 pointer-events-none z-20 flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-950/70 border border-slate-800 text-[11px] text-slate-300 backdrop-blur-md">
                        <svg class="w-4 h-4 text-[#dfb256] animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                        <span>{{ app()->getLocale() === 'sw' ? 'Bonyeza na vuta (Drag) ili kuzungusha kwa 360°' : 'Click & drag mouse to orbit 360° • Scroll to zoom' }}</span>
                    </div>
                </div>
            </div>

            <!-- Right Telemetry & Features Panel -->
            <div class="lg:col-span-4 space-y-4">
                <div data-tilt data-tilt-max="8" class="p-6 rounded-3xl bg-[#16325c]/70 border border-[#c89a3b]/40 backdrop-blur-md space-y-4 preserve-3d">
                    <div class="flex items-center justify-between border-b border-white/10 pb-3">
                        <span class="text-xs font-bold text-[#dfb256] uppercase tracking-wider">Spatial Cadastral Telemetry</span>
                        <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 font-bold text-[10px]">SURVEY READY</span>
                    </div>

                    <div class="space-y-3 text-xs">
                        <div class="flex items-center justify-between p-2.5 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-slate-400">Total Parcel Area:</span>
                            <span class="text-white font-bold">2,400 SQM (0.59 Acres)</span>
                        </div>
                        <div class="flex items-center justify-between p-2.5 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-slate-400">Subdivision Scheme:</span>
                            <span class="text-[#dfb256] font-bold">2 Plots (Plot A &amp; Plot B)</span>
                        </div>
                        <div class="flex items-center justify-between p-2.5 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-slate-400">GNSS Survey Precision:</span>
                            <span class="text-[#dfb256] font-bold">&plusmn;2cm RTK GNSS</span>
                        </div>
                        <div class="flex items-center justify-between p-2.5 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-slate-400">Cadastral Beacons:</span>
                            <span class="text-emerald-400 font-bold">6 Verified Pins (B1 - B6)</span>
                        </div>
                        <div class="flex items-center justify-between p-2.5 rounded-xl bg-white/5 border border-white/5">
                            <span class="text-slate-400">Road Corridor &amp; Buffer:</span>
                            <span class="text-white font-bold">9.0m Access Road + Drainage</span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-white/10 flex flex-col gap-2.5">
                        <a href="{{ route('pages.contact') }}" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-[#c89a3b] to-[#dfb256] text-[#0c1c34] font-extrabold text-xs text-center shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
                            {{ app()->getLocale() === 'sw' ? 'Omba Upimaji wa Kiwanja Chako' : 'Request 3D Cadastral Survey' }}
                        </a>
                        <a href="{{ route('plots.index') }}" class="w-full py-2.5 px-4 rounded-xl bg-white/10 hover:bg-white/15 text-white font-bold text-xs text-center border border-white/10 transition">
                            {{ app()->getLocale() === 'sw' ? 'Angalia Viwanja Vilivyopimwa' : 'Explore Available 3D Plots' }}
                        </a>
                    </div>
                </div>

                <!-- Mini Micro Feature Box -->
                <div data-tilt data-tilt-max="8" class="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#c89a3b]/20 border border-[#c89a3b]/40 text-[#dfb256] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-white block">{{ app()->getLocale() === 'sw' ? 'Uhakiki wa Hati Miliki 100%' : '100% Guaranteed Title Deed' }}</span>
                        <span class="text-[11px] text-slate-400 block">{{ app()->getLocale() === 'sw' ? 'Hakuna migogoro wala mwingiliano wa mipaka.' : 'Zero land overlap or boundary conflicts.' }}</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>




<!-- 3. AVAILABLE VERIFIED PLOTS (PUBLISHED PLOTS INTEGRATION) -->
@if(isset($featuredPlots) && $featuredPlots->count() > 0)
<section class="py-20 bg-slate-50">
    <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 text-xs font-extrabold tracking-wider uppercase border border-emerald-200">
                    Pre-Surveyed & Beaconed
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#16325c] tracking-tight mt-2">
                    {{ __('app.featured_plots_title') }}
                </h2>
                <p class="text-sm text-slate-600 mt-1 max-w-2xl">
                    {{ __('app.featured_plots_subtitle') }}
                </p>
            </div>
            <a href="{{ route('plots.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#16325c] hover:bg-[#0c1c34] text-white font-bold text-xs transition shadow-md">
                <span>{{ __('app.view_all_plots') }}</span>
                <svg class="w-4 h-4 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredPlots as $plot)
                <div data-tilt data-tilt-max="10" data-tilt-glare="true" class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-xs hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group preserve-3d">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $plot->featured_image_url }}" alt="{{ $plot->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 left-3 flex flex-col gap-1.5 translate-z-10">
                            <span class="px-2.5 py-1 rounded-lg bg-[#0c1c34]/90 text-[#dfb256] text-[11px] font-extrabold tracking-wide uppercase backdrop-blur-md shadow-md">
                                {{ $plot->plot_reference }}
                            </span>
                        </div>
                        <div class="absolute top-3 right-3 translate-z-10">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-600 text-white text-[11px] font-bold tracking-wide uppercase shadow-md">
                                {{ ucfirst($plot->listing_status) }}
                            </span>
                        </div>
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs text-white bg-black/65 backdrop-blur-md px-3 py-1.5 rounded-xl translate-z-10">
                            <span class="font-bold text-[#dfb256] text-sm">{{ $plot->formatted_price }}</span>
                            <span class="text-slate-200 font-medium">{{ $plot->formatted_size }}</span>
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col justify-between space-y-4 translate-z-10">
                        <div>
                            <div class="flex items-center gap-2 text-xs text-slate-500 mb-1">
                                <svg class="w-3.5 h-3.5 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                <span class="font-semibold text-slate-700">{{ $plot->location->area_name ?? 'Arusha' }}, {{ $plot->location->district ?? 'Arusha' }}</span>
                            </div>
                            <h3 class="font-extrabold text-base text-[#16325c] line-clamp-2 group-hover:text-[#c89a3b] transition">
                                {{ $plot->title }}
                            </h3>
                            <div class="mt-3 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-medium">
                                <span class="text-[#c89a3b] font-bold">✓</span> {{ $plot->ownership_title_type }}
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-2">
                            <a href="{{ route('plots.show', $plot->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-[#16325c] hover:text-[#c89a3b] transition">
                                <span>{{ __('app.view_details') }}</span> &rarr;
                            </a>

                            @php
                                $plotWaText = "Hello RELAND, I am inquiring about Plot Ref: {$plot->plot_reference} - {$plot->title} in {$plot->location->area_name}.";
                            @endphp
                            <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($plotWaText) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-xs">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif


<!-- 5. WHY CHOOSE RELAND (INSTITUTIONAL VALUE PILLARS) -->
<section class="py-20 bg-white">
    <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center space-y-3 mb-16">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#fbf6ea] text-[#16325c] text-xs font-extrabold tracking-wider uppercase border border-[#f5e9c9]">
                Trust & Authority
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#16325c] tracking-tight">
                {{ __('app.why_choose_title') }}
            </h2>
            <p class="text-sm sm:text-base text-slate-600">
                {{ __('app.why_choose_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div data-tilt data-tilt-max="8" data-tilt-glare="true" class="p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-[#c89a3b] shadow-xs hover:shadow-xl transition duration-300 space-y-4 preserve-3d">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center font-bold text-lg translate-z-10 shadow-xs">
                    01
                </div>
                <h3 class="text-lg font-extrabold text-[#16325c] translate-z-10">{{ __('app.why_1_title') }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed translate-z-10">{{ __('app.why_1_desc') }}</p>
            </div>

            <div data-tilt data-tilt-max="8" data-tilt-glare="true" class="p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-[#c89a3b] shadow-xs hover:shadow-xl transition duration-300 space-y-4 preserve-3d">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center font-bold text-lg translate-z-10 shadow-xs">
                    02
                </div>
                <h3 class="text-lg font-extrabold text-[#16325c] translate-z-10">{{ __('app.why_2_title') }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed translate-z-10">{{ __('app.why_2_desc') }}</p>
            </div>

            <div data-tilt data-tilt-max="8" data-tilt-glare="true" class="p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-[#c89a3b] shadow-xs hover:shadow-xl transition duration-300 space-y-4 preserve-3d">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center font-bold text-lg translate-z-10 shadow-xs">
                    03
                </div>
                <h3 class="text-lg font-extrabold text-[#16325c] translate-z-10">{{ __('app.why_3_title') }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed translate-z-10">{{ __('app.why_3_desc') }}</p>
            </div>

            <div data-tilt data-tilt-max="8" data-tilt-glare="true" class="p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-[#c89a3b] shadow-xs hover:shadow-xl transition duration-300 space-y-4 preserve-3d">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center font-bold text-lg translate-z-10 shadow-xs">
                    04
                </div>
                <h3 class="text-lg font-extrabold text-[#16325c] translate-z-10">{{ __('app.why_4_title') }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed translate-z-10">{{ __('app.why_4_desc') }}</p>
            </div>
        </div>
    </div>
</section>


<!-- 6. PROFESSIONAL PROCESS ROADMAP (4-STEP WORKFLOW) -->
<section class="py-20 bg-[#0c1c34] text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_bottom_left,rgba(200,154,59,0.3),transparent_50%)]"></div>
    <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center space-y-3 mb-16">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#16325c] text-[#dfb256] text-xs font-extrabold tracking-wider uppercase border border-[#c89a3b]/40">
                Rigorous Execution
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ __('app.process_title') }}
            </h2>
            <p class="text-sm sm:text-base text-slate-300">
                {{ __('app.process_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md relative">
                <span class="text-3xl font-black text-[#dfb256] block mb-3">{{ __('app.step_1_num') }}</span>
                <h3 class="text-base font-extrabold text-white mb-2">{{ __('app.step_1_title') }}</h3>
                <p class="text-xs text-slate-300 leading-relaxed">{{ __('app.step_1_desc') }}</p>
            </div>

            <div class="p-6 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md relative">
                <span class="text-3xl font-black text-[#dfb256] block mb-3">{{ __('app.step_2_num') }}</span>
                <h3 class="text-base font-extrabold text-white mb-2">{{ __('app.step_2_title') }}</h3>
                <p class="text-xs text-slate-300 leading-relaxed">{{ __('app.step_2_desc') }}</p>
            </div>

            <div class="p-6 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md relative">
                <span class="text-3xl font-black text-[#dfb256] block mb-3">{{ __('app.step_3_num') }}</span>
                <h3 class="text-base font-extrabold text-white mb-2">{{ __('app.step_3_title') }}</h3>
                <p class="text-xs text-slate-300 leading-relaxed">{{ __('app.step_3_desc') }}</p>
            </div>

            <div class="p-6 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-md relative">
                <span class="text-3xl font-black text-[#dfb256] block mb-3">{{ __('app.step_4_num') }}</span>
                <h3 class="text-base font-extrabold text-white mb-2">{{ __('app.step_4_title') }}</h3>
                <p class="text-xs text-slate-300 leading-relaxed">{{ __('app.step_4_desc') }}</p>
            </div>
        </div>
    </div>
</section>


<!-- 7. FREQUENTLY ASKED QUESTIONS (FAQ) -->
<section class="py-20 bg-slate-50">
    <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-3 mb-12">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#fbf6ea] text-[#16325c] text-xs font-extrabold tracking-wider uppercase border border-[#f5e9c9]">
                Knowledge Base
            </span>
            <h2 class="text-3xl font-extrabold text-[#16325c] tracking-tight">
                {{ __('app.faq_title') }}
            </h2>
            <p class="text-sm text-slate-600">
                {{ __('app.faq_subtitle') }}
            </p>
        </div>

        <div class="max-w-4xl mx-auto space-y-4">
            <details class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs group cursor-pointer">
                <summary class="font-extrabold text-sm sm:text-base text-[#16325c] flex items-center justify-between list-none">
                    <span>{{ app()->getLocale() === 'sw' ? 'Upimaji wa ardhi unachukua muda gani na unahitaji nyaraka gani?' : 'How long does a cadastral survey take and what documents are required?' }}</span>
                    <span class="text-[#c89a3b] font-bold text-lg group-open:rotate-45 transition transform">+</span>
                </summary>
                <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    {{ app()->getLocale() === 'sw' ? 'Upimaji wa shamba unachukua siku 1 hadi 3 kwa ajili ya field survey. Unahitaji mkataba wa mauziano au barua ya ofa, kitambulisho cha mmiliki, na majina ya majirani wanaopakana na eneo hilo.' : 'Field surveying typically takes 1 to 3 days depending on acreage. Documents needed include your sale agreement/letter of offer, national ID, and boundary neighbor consent contacts.' }}
                </p>
            </details>

            <details class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs group cursor-pointer">
                <summary class="font-extrabold text-sm sm:text-base text-[#16325c] flex items-center justify-between list-none">
                    <span>{{ app()->getLocale() === 'sw' ? 'Kuna tofauti gani kati ya Urasimishaji na Upimaji wa kawaida?' : 'What is the difference between Land Formalization and Standard Surveying?' }}</span>
                    <span class="text-[#c89a3b] font-bold text-lg group-open:rotate-45 transition transform">+</span>
                </summary>
                <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    {{ app()->getLocale() === 'sw' ? 'Upimaji wa kawaida unafanyika kwenye eneo lililopangwa tayari kwa mujibu wa mchoro wa mipango miji. Urasimishaji unahusisha kupanga na kutambua makazi yasiyopangwa ili yaweze kuingizwa rasmi katika mfumo wa kisheria na kupata Hati.' : 'Standard surveying applies to already planned master layouts. Formalization (Urasimishaji) regularizes unplanned settlements, establishing roads and community amenities before issuing title deeds.' }}
                </p>
            </details>

            <details class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs group cursor-pointer">
                <summary class="font-extrabold text-sm sm:text-base text-[#16325c] flex items-center justify-between list-none">
                    <span>{{ app()->getLocale() === 'sw' ? 'Je, ninaweza kugawa shamba langu na kuuza viwanja kabla ya kupata hati mpya?' : 'Can I subdivide my land parcel and sell plots before separate titles are issued?' }}</span>
                    <span class="text-[#c89a3b] font-bold text-lg group-open:rotate-45 transition transform">+</span>
                </summary>
                <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    {{ app()->getLocale() === 'sw' ? 'Ili kulinda wanunuzi na kuzuia migogoro, unapaswa kwanza kuandaa mchoro wa ugawaji (Subdivision Scheme) uliopitishwa na Mipango Mji, na kupanda beacons. RELAND inasaidia mchakato mzima mpaka Deed Plans zote zinatoka.' : 'To protect buyers and ensure legality, a formal Subdivision Scheme must first be endorsed by urban planning authorities with beacons planted. RELAND manages this full lifecycle.' }}
                </p>
            </details>
        </div>
    </div>
</section>


<!-- 8. FINAL HIGH-IMPACT CORPORATE CTA -->
<section class="py-16 bg-[#16325c] text-white text-center relative overflow-hidden">
    <div class="w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6">
        <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-white">
            {{ __('app.final_cta_title') }}
        </h2>
        <p class="text-sm sm:text-base text-slate-200 max-w-2xl mx-auto">
            {{ __('app.final_cta_subtitle') }}
        </p>
        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('pages.contact') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-[#c89a3b] hover:bg-[#b5882e] text-[#0c1c34] font-extrabold text-sm shadow-xl transition transform hover:-translate-y-0.5">
                {{ __('app.talk_to_us') }}
            </a>
            <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND Arusha, I would like to book a consultation session with a certified surveyor.') }}" target="_blank" rel="noopener" class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-xl transition transform hover:-translate-y-0.5 inline-flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                <span>Direct WhatsApp Hotline</span>
            </a>
        </div>
    </div>
</section>

@endsection
