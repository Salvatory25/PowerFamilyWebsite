@extends('layouts.app')

@section('title', $plot->title . ' | RELAND Arusha Plots')
@section('meta_description', Str::limit($plot->short_description ?? $plot->description, 160))
@section('whatsapp_message', "Hello RELAND Arusha, I am inquiring about Plot Ref: {$plot->plot_reference} - {$plot->title} in " . ($plot->location?->area_name ?? 'Arusha') . ".")

@section('content')
<!-- Breadcrumbs Bar -->
<div class="bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <nav class="flex items-center gap-2 text-xs text-slate-500 overflow-x-auto">
            <a href="{{ route('home') }}" class="hover:text-emerald-700 whitespace-nowrap">{{ __('app.nav_home') }}</a>
            <span>/</span>
            <a href="{{ route('plots.index') }}" class="hover:text-emerald-700 whitespace-nowrap">{{ __('app.nav_plots') }}</a>
            <span>/</span>
            <a href="{{ route('locations.show', $plot->location?->slug ?? '') }}" class="hover:text-emerald-700 whitespace-nowrap">{{ $plot->location?->area_name }}</a>
            <span>/</span>
            <span class="text-slate-900 font-semibold truncate max-w-xs">{{ $plot->plot_reference }}</span>
        </nav>
    </div>
</div>

<!-- Main Details Layout -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <!-- Top Title & Price Header -->
    <div class="flex flex-col lg:flex-row lg:items-start justify-between gap-6 pb-8 border-b border-slate-200">
        <div class="space-y-3">
            <div class="flex flex-wrap items-center gap-2.5">
                <!-- Status Badge -->
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-bold {{ $plot->status_badge_classes }}">
                    <span class="w-2 h-2 rounded-full {{ $plot->listing_status === 'available' ? 'bg-emerald-500 animate-pulse' : ($plot->listing_status === 'reserved' ? 'bg-amber-500' : 'bg-rose-500') }}"></span>
                    {{ $plot->status_label }}
                </span>

                <!-- Type Badge -->
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-xs font-bold">
                    {{ $plot->plotType?->name }}
                </span>

                <!-- Reference Badge -->
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-slate-900 text-white font-mono text-xs font-semibold">
                    REF: {{ $plot->plot_reference }}
                </span>

                @if($plot->is_featured)
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-amber-100 text-amber-900 text-xs font-bold">
                        ★ {{ __('app.featured') }}
                    </span>
                @endif
            </div>

            <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                {{ $plot->title }}
            </h1>

            <p class="flex items-center gap-2 text-sm font-medium text-emerald-800">
                <svg class="w-4 h-4 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                <span>{{ $plot->full_location }}</span>
            </p>
        </div>

        <!-- Price Card -->
        <div class="bg-emerald-950 text-white p-5 rounded-2xl shrink-0 flex flex-col justify-center min-w-[260px] shadow-lg shadow-emerald-950/20 border border-emerald-800">
            <span class="text-xs font-semibold uppercase tracking-wider text-emerald-300">Listing Price</span>
            <div class="text-2xl sm:text-3xl font-black text-white mt-1">
                {{ $plot->formatted_price }}
            </div>
            <div class="mt-2 flex items-center justify-between text-xs text-emerald-200 border-t border-emerald-900/80 pt-2">
                <span>{{ $plot->price_negotiable ? __('app.negotiable') : __('app.fixed_price') }}</span>
                <span class="font-bold">{{ $plot->formatted_size }}</span>
            </div>
        </div>
    </div>

    <!-- 2-Column Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-8">
        <!-- Left 2 Cols: Gallery & Plot Specs -->
        <div class="lg:col-span-2 space-y-10">
            <!-- Photo Gallery with Tab Switcher -->
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden p-3 shadow-xs">
                <!-- Main Active Image -->
                <div class="relative h-80 sm:h-[450px] w-full rounded-2xl overflow-hidden bg-slate-900">
                    <img id="main-plot-image" 
                         src="{{ $plot->featured_image_url }}" 
                         alt="{{ $plot->title }}" 
                         class="w-full h-full object-cover">
                </div>

                <!-- Thumbnails Gallery -->
                @if($plot->images->count() > 0)
                    <div class="grid grid-cols-4 sm:grid-cols-6 gap-2 mt-3">
                        <!-- Featured image thumb -->
                        <button type="button" 
                                onclick="document.getElementById('main-plot-image').src='{{ $plot->featured_image_url }}'" 
                                class="h-16 rounded-xl overflow-hidden border-2 border-emerald-600 focus:outline-hidden hover:opacity-90 transition">
                            <img src="{{ $plot->featured_image_url }}" class="w-full h-full object-cover" alt="Main Thumb">
                        </button>

                        @foreach($plot->images as $img)
                            <button type="button" 
                                    onclick="document.getElementById('main-plot-image').src='{{ $img->url }}'" 
                                    class="h-16 rounded-xl overflow-hidden border-2 border-transparent hover:border-emerald-600 focus:border-emerald-600 focus:outline-hidden hover:opacity-90 transition">
                                <img src="{{ $img->url }}" class="w-full h-full object-cover" alt="Thumb">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Ownership & Documentation Highlight Box -->
            <div class="p-6 rounded-2xl bg-[#fbf6ea] border border-[#f5e9c9] flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-[#16325c] text-[#dfb256] flex items-center justify-center shrink-0 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-[#c89a3b]">Verified Documentation Status</span>
                    <h3 class="text-lg font-bold text-[#16325c] mt-0.5">{{ $plot->ownership_title_type }}</h3>
                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                        This plot has undergone preliminary cadastral due diligence. Physical beacons have been identified and land records cross-referenced against the Arusha land registry.
                    </p>
                </div>
            </div>

            <!-- Key Specifications Grid -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs">
                <h2 class="text-lg font-extrabold text-[#16325c] mb-6 pb-3 border-b border-slate-100 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    <span>{{ __('app.property_specifications') }}</span>
                </h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 text-sm">
                    <div>
                        <span class="text-xs text-slate-400 font-medium block">{{ __('app.ref_no') }}</span>
                        <span class="font-bold text-[#16325c] font-mono text-sm">{{ $plot->plot_reference }}</span>
                    </div>

                    <div>
                        <span class="text-xs text-slate-400 font-medium block">Total Area Size</span>
                        <span class="font-bold text-slate-800 text-sm">{{ $plot->formatted_size }}</span>
                    </div>

                    <div>
                        <span class="text-xs text-slate-400 font-medium block">Dimensions</span>
                        <span class="font-bold text-slate-800 text-sm">{{ $plot->dimension_details ?? 'As surveyed' }}</span>
                    </div>

                    <div>
                        <span class="text-xs text-slate-400 font-medium block">Plot Zoning / Type</span>
                        <span class="font-bold text-[#16325c] text-sm">{{ $plot->plotType?->name }}</span>
                    </div>

                    <div>
                        <span class="text-xs text-slate-400 font-medium block">Topography / Terrain</span>
                        <span class="font-bold text-slate-800 text-sm">{{ $plot->topography ?? 'Flat / Level Ground' }}</span>
                    </div>

                    <div>
                        <span class="text-xs text-slate-400 font-medium block">Road Access</span>
                        <span class="font-bold text-slate-800 text-sm">{{ $plot->road_accessibility ?? 'Murram / Paved' }}</span>
                    </div>
                </div>
            </div>

            <!-- Infrastructure & Utilities Checklist -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs">
                <h2 class="text-lg font-extrabold text-slate-900 mb-6 pb-3 border-b border-slate-100 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>{{ __('app.infrastructure_utilities') }}</span>
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Electricity -->
                    <div class="flex items-center gap-3 p-3.5 rounded-xl border {{ $plot->has_electricity ? 'bg-emerald-50/60 border-emerald-200 text-emerald-900' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-sm {{ $plot->has_electricity ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-500' }}">
                            {{ $plot->has_electricity ? '✓' : '✕' }}
                        </div>
                        <div>
                            <span class="font-bold text-xs block text-slate-900">{{ __('app.electricity_status') }}</span>
                            <span class="text-[11px] {{ $plot->has_electricity ? 'text-emerald-700' : 'text-slate-500' }}">
                                {{ $plot->has_electricity ? 'Available / On-Site' : 'Off-grid / Nearby' }}
                            </span>
                        </div>
                    </div>

                    <!-- Water -->
                    <div class="flex items-center gap-3 p-3.5 rounded-xl border {{ $plot->has_water ? 'bg-emerald-50/60 border-emerald-200 text-emerald-900' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-sm {{ $plot->has_water ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-500' }}">
                            {{ $plot->has_water ? '✓' : '✕' }}
                        </div>
                        <div>
                            <span class="font-bold text-xs block text-slate-900">{{ __('app.water_status') }}</span>
                            <span class="text-[11px] {{ $plot->has_water ? 'text-emerald-700' : 'text-slate-500' }}">
                                {{ $plot->has_water ? 'AUWSA Piped Water Connected' : 'Well / Borehole required' }}
                            </span>
                        </div>
                    </div>

                    <!-- Internet -->
                    <div class="flex items-center gap-3 p-3.5 rounded-xl border {{ $plot->has_internet ? 'bg-emerald-50/60 border-emerald-200 text-emerald-900' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-sm {{ $plot->has_internet ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-500' }}">
                            {{ $plot->has_internet ? '✓' : '✕' }}
                        </div>
                        <div>
                            <span class="font-bold text-xs block text-slate-900">{{ __('app.internet_status') }}</span>
                            <span class="text-[11px] {{ $plot->has_internet ? 'text-emerald-700' : 'text-slate-500' }}">
                                {{ $plot->has_internet ? 'Fiber & 4G/5G Coverage' : 'Standard 3G/4G coverage' }}
                            </span>
                        </div>
                    </div>

                    <!-- Fencing -->
                    <div class="flex items-center gap-3 p-3.5 rounded-xl border {{ $plot->has_fence ? 'bg-emerald-50/60 border-emerald-200 text-emerald-900' : 'bg-slate-50 border-slate-200 text-slate-400' }}">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-sm {{ $plot->has_fence ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-500' }}">
                            {{ $plot->has_fence ? '✓' : '✕' }}
                        </div>
                        <div>
                            <span class="font-bold text-xs block text-slate-900">{{ __('app.fencing_status') }}</span>
                            <span class="text-[11px] {{ $plot->has_fence ? 'text-emerald-700' : 'text-slate-500' }}">
                                {{ $plot->has_fence ? 'Fenced / Walled Perimeter' : 'Open / Beacon Markers' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full Description -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs">
                <h2 class="text-lg font-extrabold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                    <span>{{ __('app.plot_overview') }}</span>
                </h2>

                <div class="prose prose-slate max-w-none text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                    {{ $plot->description }}
                </div>

                @if($plot->nearby_landmarks)
                    <div class="mt-6 pt-6 border-t border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-1.5">{{ __('app.nearby_amenities') }}</span>
                        <p class="text-sm font-semibold text-slate-800">
                            {{ $plot->nearby_landmarks }}
                        </p>
                    </div>
                @endif
            </div>

            <!-- Location Map & Coordinates -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                    <h2 class="text-lg font-extrabold text-slate-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        <span>{{ __('app.location_map') }}</span>
                    </h2>

                    @if($plot->latitude && $plot->longitude)
                        <span class="font-mono text-xs text-slate-500 font-medium">
                            {{ $plot->latitude }}, {{ $plot->longitude }}
                        </span>
                    @endif
                </div>

                <div class="rounded-xl overflow-hidden h-72 w-full bg-slate-100 border border-slate-200">
                    @if($plot->google_maps_embed_url)
                        <iframe src="{{ $plot->google_maps_embed_url }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    @elseif($plot->latitude && $plot->longitude)
                        <iframe src="https://maps.google.com/maps?q={{ $plot->latitude }},{{ $plot->longitude }}&z=15&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    @else
                        <div class="h-full flex items-center justify-center text-slate-400 text-xs">
                            Map coordinates available during scheduled site visit.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Col: Sticky WhatsApp & Enquiry Action Card -->
        <div class="lg:col-span-1">
            <div class="sticky top-28 space-y-6">
                <!-- Direct WhatsApp CTA Box -->
                <div class="bg-gradient-to-br from-[#16325c] to-[#0c1c34] text-white rounded-3xl p-6 shadow-xl border border-[#c89a3b]/40">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-[#c89a3b]/20 text-[#dfb256] flex items-center justify-center ring-1 ring-[#c89a3b]/40">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-[#dfb256]">Instant Inquiry</span>
                            <h3 class="font-extrabold text-white text-base leading-snug">Chat with Land Desk</h3>
                        </div>
                    </div>

                    <p class="text-xs text-slate-300 leading-relaxed mb-5">
                        Get instant GPS coordinates, copy of survey plans, and schedule a field site visit for this plot.
                    </p>

                    <!-- Pre-filled WhatsApp Button -->
                    <a href="{{ $plot->whatsapp_inquiry_url }}" target="_blank" rel="noopener" class="w-full py-3.5 px-4 rounded-xl bg-[#c89a3b] hover:bg-[#dfb256] text-[#0c1c34] font-extrabold text-sm shadow-lg shadow-[#c89a3b]/20 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-[#0c1c34]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        <span>{{ __('app.enquire_about_plot') }}</span>
                    </a>

                    <!-- Direct Call Button -->
                    <a href="tel:{{ $sitePhone ?? '+255742448965' }}" class="mt-3 w-full py-2.5 px-4 rounded-xl bg-[#0c1c34]/80 hover:bg-[#0c1c34] text-white font-semibold text-xs border border-[#c89a3b]/40 transition flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Call {{ $sitePhone ?? '+255 742 448 965' }}</span>
                    </a>
                </div>

                <!-- Written Enquiry Form -->
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-xs">
                    <h3 class="font-extrabold text-base text-slate-900 mb-4 pb-2 border-b border-slate-100">
                        {{ __('app.schedule_visit') }}
                    </h3>

                    <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="plot_id" value="{{ $plot->id }}">

                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">
                                {{ __('app.form_full_name') }} *
                            </label>
                            <input type="text" name="name" required placeholder="e.g. John Lyimo" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">
                                {{ __('app.form_phone') }} *
                            </label>
                            <input type="text" name="phone" required placeholder="e.g. +255 742 000 000" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">
                                {{ __('app.form_email') }}
                            </label>
                            <input type="email" name="email" placeholder="e.g. john@example.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600">
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">
                                {{ __('app.form_preferred_contact') }}
                            </label>
                            <select name="preferred_contact_method" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600">
                                <option value="whatsapp">WhatsApp</option>
                                <option value="phone">Direct Phone Call</option>
                                <option value="email">Email</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1">
                                {{ __('app.form_message') }} *
                            </label>
                            <textarea name="message" rows="3" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600">Hello, I would like to schedule a site inspection for Plot REF: {{ $plot->plot_reference }} in {{ $plot->location?->area_name }}.</textarea>
                        </div>

                        <button type="submit" class="w-full py-3 rounded-xl bg-slate-900 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider transition shadow-sm">
                            {{ __('app.form_submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Plots in Arusha -->
    @if($relatedPlots->count() > 0)
        <div class="mt-20 pt-12 border-t border-slate-200">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Similar Opportunities</span>
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">{{ __('app.related_plots') }}</h2>
                </div>
                <a href="{{ route('plots.index') }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800">
                    View All Plots →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPlots as $relPlot)
                    <x-plot-card :plot="$relPlot" />
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
