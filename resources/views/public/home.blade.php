@extends('layouts.app')

@section('title', 'RELAND | Professional Land Surveying & Formalization Solutions &bull; Arusha, Tanzania')
@section('meta_description', 'Reliable land surveying, formalization, subdivision, beacon demarcation, and verified plots in Arusha, Tanzania. Trusted cadastral land professionals.')

@section('content')

<!-- 1. PREMIUM CORPORATE HERO SECTION -->
<section class="relative bg-[#0c1c34] text-white overflow-hidden pt-12 pb-20 lg:pt-20 lg:pb-28 border-b border-[#c89a3b]/20">
    <!-- Ambient Background Lighting & Cadastral Grid Layer -->
    <div class="absolute inset-0 z-0 cadastral-grid opacity-30 pointer-events-none"></div>
    
    <!-- Ambient Glow Mesh -->
    <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-[#c89a3b]/15 blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-[#20457c]/40 blur-[140px] pointer-events-none"></div>

    <div class="relative z-10 w-full max-w-[1720px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Corporate Value Proposition -->
            <div class="lg:col-span-7 space-y-6 text-left">
                
                <!-- Trust Badge with Radar Pulse -->
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-[#16325c]/90 border border-[#c89a3b]/40 text-[#dfb256] text-xs font-extrabold tracking-wide backdrop-blur-md shadow-lg shadow-black/20">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-radar absolute inline-flex h-full w-full rounded-full bg-[#dfb256] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-[#dfb256]"></span>
                    </span>
                    <span>{{ $siteHeroBadge ?: __('app.hero_badge') }}</span>
                </div>

                <!-- Main Headline -->
                <h1 class="text-3xl sm:text-5xl lg:text-[52px] font-black tracking-tight text-white leading-[1.12]">
                    {{ $siteHeroTitle ?: __('app.hero_title') }}
                </h1>

                <!-- Supporting Text -->
                <p class="text-base sm:text-lg text-slate-300 font-normal leading-relaxed max-w-3xl">
                    {{ $siteHeroSubtitle ?: __('app.hero_subtitle') }}
                </p>

                <!-- Value Highlights Pills -->
                <div class="flex flex-wrap gap-2.5 pt-1">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-slate-200 text-xs font-semibold">
                        <svg class="w-3.5 h-3.5 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        RTK GNSS GPS &bull; &plusmn;2cm Precision
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-slate-200 text-xs font-semibold">
                        <svg class="w-3.5 h-3.5 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        Ministry Approved Deed Plans
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-slate-200 text-xs font-semibold">
                        <svg class="w-3.5 h-3.5 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        100% Dispute-Free Title Deeds
                    </span>
                </div>

                <!-- Call to Actions -->
                <div class="pt-3 flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5">
                    <a href="{{ route('pages.services') }}" class="inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl bg-gradient-to-r from-[#c89a3b] to-[#dfb256] hover:from-[#b5882e] hover:to-[#c89a3b] text-[#0c1c34] font-extrabold text-sm shadow-xl shadow-[#c89a3b]/25 hover:shadow-2xl transition transform hover:-translate-y-0.5">
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

            <!-- Right Column: Visual Showcase with Live Animated Floating Elements -->
            <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                
                <!-- Main Showcase Image Card with Frame -->
                <div class="relative rounded-3xl overflow-hidden border-2 border-[#c89a3b]/40 shadow-2xl shadow-black/60 bg-[#16325c] group">
                    <img src="{{ asset('images/hero-survey.jpg') }}" 
                         alt="Professional Land Surveyors in Arusha with Mount Meru and RTK GNSS GPS" 
                         class="w-full h-[380px] sm:h-[420px] object-cover group-hover:scale-105 transition-transform duration-700">
                    
                    <!-- Gradient Vignette -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0c1c34]/90 via-[#0c1c34]/20 to-transparent"></div>
                    
                    <!-- Bottom Overlay Caption -->
                    <div class="absolute bottom-0 inset-x-0 p-5 backdrop-blur-xs bg-[#0c1c34]/60 border-t border-white/10 flex items-center justify-between">
                        <div>
                            <span class="text-[11px] font-bold text-[#dfb256] uppercase tracking-wider block">Cadastral &amp; RTK GNSS Field Operations</span>
                            <p class="text-xs font-semibold text-white">{{ $siteCoverageRegions ?: 'Arusha City • Meru • Monduli • Northern Zone' }}</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-md bg-[#c89a3b]/20 border border-[#c89a3b]/40 text-[#dfb256] font-bold text-[10px]">
                            ACTIVE
                        </span>
                    </div>
                </div>

                <!-- Floating Dynamic Badge 1 (Top Left) -->
                <div class="animate-float-slow absolute -top-5 -left-5 sm:-left-8 luxury-glass-dark p-3.5 rounded-2xl shadow-xl z-20 flex items-center gap-3 border border-[#c89a3b]/40 max-w-[220px]">
                    <div class="w-10 h-10 rounded-xl bg-[#c89a3b]/20 border border-[#c89a3b]/50 text-[#dfb256] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold text-slate-300 uppercase tracking-wider block">Beacon Pegging</span>
                        <span class="text-xs font-bold text-white block leading-tight">&plusmn;2cm High Precision</span>
                    </div>
                </div>

                <!-- Floating Dynamic Badge 2 (Bottom Right) -->
                <div class="animate-float-delayed absolute -bottom-5 -right-4 sm:-right-6 luxury-glass-dark p-3.5 rounded-2xl shadow-xl z-20 flex items-center gap-3 border border-emerald-500/40 max-w-[240px]">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 border border-emerald-400/50 text-emerald-300 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold text-emerald-400 uppercase tracking-wider block">Official Deed Plans</span>
                        <span class="text-xs font-bold text-white block leading-tight">Ministry Registered &bull; 100%</span>
                    </div>
                </div>

            </div>

        </div>

        <!-- Corporate Trust Indicators / Counters Banner -->
        <div class="mt-16 pt-12 border-t border-white/10 grid grid-cols-2 lg:grid-cols-4 gap-4 w-full max-w-[1720px] mx-auto">
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:border-[#c89a3b]/40 transition duration-300">
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#dfb256]">{{ $stats['surveyed_plots'] ?? '1,450+' }}</span>
                <span class="text-xs sm:text-sm text-slate-300 font-semibold mt-1 block">{{ __('app.stat_1_label') }}</span>
            </div>
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:border-[#c89a3b]/40 transition duration-300">
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#dfb256]">{{ $stats['formalized_acres'] ?? '850+' }}</span>
                <span class="text-xs sm:text-sm text-slate-300 font-semibold mt-1 block">{{ __('app.stat_2_label') }}</span>
            </div>
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:border-[#c89a3b]/40 transition duration-300">
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#dfb256]">{{ $stats['clean_titles'] ?? '100%' }}</span>
                <span class="text-xs sm:text-sm text-slate-300 font-semibold mt-1 block">{{ __('app.stat_3_label') }}</span>
            </div>
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md text-center hover:border-[#c89a3b]/40 transition duration-300">
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
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between hover:border-[#c89a3b]/50 group">
                    <div class="space-y-4">
                        <div class="w-14 h-14 rounded-2xl bg-[#fbf6ea] group-hover:bg-[#16325c] text-[#16325c] group-hover:text-[#dfb256] flex items-center justify-center transition duration-300 border border-[#f5e9c9]">
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

                    <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between">
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
                <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $plot->featured_image_url }}" alt="{{ $plot->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                            <span class="px-2.5 py-1 rounded-lg bg-[#0c1c34]/90 text-[#dfb256] text-[11px] font-extrabold tracking-wide uppercase backdrop-blur-md">
                                {{ $plot->plot_reference }}
                            </span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-600 text-white text-[11px] font-bold tracking-wide uppercase shadow-sm">
                                {{ ucfirst($plot->listing_status) }}
                            </span>
                        </div>
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs text-white bg-black/65 backdrop-blur-md px-3 py-1.5 rounded-xl">
                            <span class="font-bold text-[#dfb256] text-sm">{{ $plot->formatted_price }}</span>
                            <span class="text-slate-200 font-medium">{{ $plot->formatted_size }}</span>
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
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
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-[#c89a3b] transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center font-bold text-lg">
                    01
                </div>
                <h3 class="text-lg font-extrabold text-[#16325c]">{{ __('app.why_1_title') }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">{{ __('app.why_1_desc') }}</p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-[#c89a3b] transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center font-bold text-lg">
                    02
                </div>
                <h3 class="text-lg font-extrabold text-[#16325c]">{{ __('app.why_2_title') }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">{{ __('app.why_2_desc') }}</p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-[#c89a3b] transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center font-bold text-lg">
                    03
                </div>
                <h3 class="text-lg font-extrabold text-[#16325c]">{{ __('app.why_3_title') }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">{{ __('app.why_3_desc') }}</p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 hover:border-[#c89a3b] transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center font-bold text-lg">
                    04
                </div>
                <h3 class="text-lg font-extrabold text-[#16325c]">{{ __('app.why_4_title') }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">{{ __('app.why_4_desc') }}</p>
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
