@extends('layouts.app')

@section('title', __('app.company_name') . ' — ' . __('app.tagline'))

@section('content')

<!-- =========================================================================
     1. HERO SECTION
     ========================================================================= -->
<section class="relative bg-[#220325] text-white min-h-[580px] lg:min-h-[660px] flex items-center overflow-hidden">
    <!-- Hero Background Image with Rich Royal Purple / Gold Overlay -->
    <div class="absolute inset-0 z-0">
        <img 
            src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=2000&q=85" 
            alt="Power Family Investment Land & Properties" 
            class="w-full h-full object-cover object-center opacity-30 scale-105 transition-transform duration-1000"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#220325] via-[#320635]/90 to-[#4A0E4E]/75"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(197,155,39,0.15),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 w-full">
        <div class="max-w-3xl space-y-6">
            
            <!-- Location & Credibility Badge -->
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-[#C59B27]/40 text-[#DFB743] text-xs font-semibold uppercase tracking-wider">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>📍 Tanzania &bull; {{ __('app.hero_badge') }}</span>
            </div>

            <!-- Headline -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1]">
                WEKEZA LEO. <br class="hidden sm:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F3E5AB] via-[#DFB743] to-[#C59B27]">
                    JENGA KESHO.
                </span>
            </h1>

            <!-- Supporting Text -->
            <p class="text-lg sm:text-xl text-gray-200 font-normal leading-relaxed max-w-2xl">
                {{ __('app.hero_subtitle') }}
            </p>

            <!-- Hero CTAs -->
            <div class="flex flex-wrap items-center gap-4 pt-4">
                <a 
                    href="{{ route('plots.index') }}" 
                    class="bg-gold-gradient text-[#220325] font-extrabold px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 active:scale-95 transition transform duration-200 text-sm sm:text-base flex items-center space-x-2 border border-[#DFB743]"
                >
                    <span>{{ __('app.hero_cta_plots') }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>

                <a 
                    href="{{ route('pages.contact') }}" 
                    class="bg-white/10 hover:bg-white/20 text-white font-bold px-8 py-4 rounded-xl border border-white/30 backdrop-blur-md hover:border-white transition text-sm sm:text-base"
                >
                    {{ __('app.hero_cta_contact') }}
                </a>
            </div>

            <!-- Discovery Stats Ticker -->
            <div class="pt-8 grid grid-cols-3 gap-4 max-w-lg border-t border-white/10">
                <div>
                    <span class="text-2xl sm:text-3xl font-extrabold text-white">{{ $counts['plots'] ?? 0 }}+</span>
                    <p class="text-xs text-gray-300 font-medium mt-0.5">{{ __('app.search_plots') }}</p>
                </div>
                <div>
                    <span class="text-2xl sm:text-3xl font-extrabold text-white">{{ $counts['houses'] ?? 0 }}+</span>
                    <p class="text-xs text-gray-300 font-medium mt-0.5">{{ __('app.search_houses') }}</p>
                </div>
                <div>
                    <span class="text-2xl sm:text-3xl font-extrabold text-white">{{ $counts['vehicles'] ?? 0 }}+</span>
                    <p class="text-xs text-gray-300 font-medium mt-0.5">{{ __('app.search_vehicles') }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- =========================================================================
     2. HERO SEARCH / DISCOVERY COMPONENT
     ========================================================================= -->
<section class="relative z-20 -mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 p-6 sm:p-8">
        <form action="{{ route('plots.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
            
            <!-- 1. Natafuta (Category) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    {{ __('app.search_looking_for') }}
                </label>
                <select name="type_group" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A0E4E] transition" onchange="if(this.value==='houses') window.location='{{ route('houses.index') }}'; if(this.value==='vehicles') window.location='{{ route('vehicles.index') }}';">
                    <option value="plots" selected>{{ __('app.search_plots') }}</option>
                    <option value="houses">{{ __('app.search_houses') }}</option>
                    <option value="vehicles">{{ __('app.search_vehicles') }}</option>
                </select>
            </div>

            <!-- 2. Aina (Makazi / Biashara) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    {{ __('app.search_type') }}
                </label>
                <select name="category" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A0E4E] transition">
                    <option value="">{{ __('app.search_all_types') }}</option>
                    <option value="residential">{{ __('app.search_residential') }}</option>
                    <option value="commercial">{{ __('app.search_commercial') }}</option>
                </select>
            </div>

            <!-- 3. Eneo (Location) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    {{ __('app.search_location') }}
                </label>
                <select name="location" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A0E4E] transition">
                    <option value="">{{ __('app.search_all_locations') }}</option>
                    @foreach($locations as $loc)
                        <option value="{{ $loc->id }}">{{ $loc->area_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- 4. Bajeti (Budget) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    {{ __('app.search_budget') }}
                </label>
                <input 
                    type="number" 
                    name="max_price" 
                    placeholder="Kiwango cha juu..." 
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-semibold text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4A0E4E] transition"
                >
            </div>

            <!-- 5. Submit Button -->
            <div>
                <button 
                    type="submit" 
                    class="w-full bg-pfi-gradient text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-xl hover:brightness-110 active:scale-95 transition flex items-center justify-center space-x-2 text-sm border border-[#68176E]"
                >
                    <svg class="w-4 h-4 text-[#DFB743]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span>{{ __('app.search_btn') }}</span>
                </button>
            </div>

        </form>
    </div>
</section>

<!-- =========================================================================
     3. SERVICES / CATEGORIES SECTION (4 PILLARS)
     ========================================================================= -->
<section class="py-20 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
            <span class="text-xs font-extrabold text-[#C59B27] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'HUDUMA ZETU KUU' : 'OUR CORE SERVICES' }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#320635] tracking-tight">
                {{ __('app.categories_title') }}
            </h2>
            <p class="text-gray-600 text-sm sm:text-base">
                {{ __('app.categories_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Viwanja vya Makazi -->
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                <div class="relative h-48 overflow-hidden bg-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80" 
                        alt="{{ __('app.cat_plots_res_title') }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#220325]/80 via-transparent to-transparent"></div>
                    <span class="absolute bottom-3 left-3 text-xs font-bold text-[#DFB743] uppercase tracking-wider bg-[#220325]/70 px-2.5 py-1 rounded-md backdrop-blur-sm">
                        Makazi &bull; Homes
                    </span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="text-lg font-bold text-[#320635] group-hover:text-[#68176E] transition">
                            {{ __('app.cat_plots_res_title') }}
                        </h3>
                        <p class="text-gray-600 text-xs mt-2 leading-relaxed">
                            {{ __('app.cat_plots_res_desc') }}
                        </p>
                    </div>
                    <a href="{{ route('plots.index', ['category' => 'residential']) }}" class="inline-flex items-center text-xs font-bold text-[#4A0E4E] hover:text-[#C59B27] transition group-hover:translate-x-1 duration-200">
                        <span>{{ __('app.cat_plots_res_cta') }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Card 2: Viwanja vya Biashara -->
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                <div class="relative h-48 overflow-hidden bg-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1448630360428-65456885c650?auto=format&fit=crop&w=800&q=80" 
                        alt="{{ __('app.cat_plots_com_title') }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#220325]/80 via-transparent to-transparent"></div>
                    <span class="absolute bottom-3 left-3 text-xs font-bold text-[#DFB743] uppercase tracking-wider bg-[#220325]/70 px-2.5 py-1 rounded-md backdrop-blur-sm">
                        Biashara &bull; Commercial
                    </span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="text-lg font-bold text-[#320635] group-hover:text-[#68176E] transition">
                            {{ __('app.cat_plots_com_title') }}
                        </h3>
                        <p class="text-gray-600 text-xs mt-2 leading-relaxed">
                            {{ __('app.cat_plots_com_desc') }}
                        </p>
                    </div>
                    <a href="{{ route('plots.index', ['category' => 'commercial']) }}" class="inline-flex items-center text-xs font-bold text-[#4A0E4E] hover:text-[#C59B27] transition group-hover:translate-x-1 duration-200">
                        <span>{{ __('app.cat_plots_com_cta') }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Card 3: Nyumba (Houses) -->
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                <div class="relative h-48 overflow-hidden bg-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" 
                        alt="{{ __('app.cat_houses_title') }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#220325]/80 via-transparent to-transparent"></div>
                    <span class="absolute bottom-3 left-3 text-xs font-bold text-[#DFB743] uppercase tracking-wider bg-[#220325]/70 px-2.5 py-1 rounded-md backdrop-blur-sm">
                        Nyumba &bull; Houses
                    </span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="text-lg font-bold text-[#320635] group-hover:text-[#68176E] transition">
                            {{ __('app.cat_houses_title') }}
                        </h3>
                        <p class="text-gray-600 text-xs mt-2 leading-relaxed">
                            {{ __('app.cat_houses_desc') }}
                        </p>
                    </div>
                    <a href="{{ route('houses.index') }}" class="inline-flex items-center text-xs font-bold text-[#4A0E4E] hover:text-[#C59B27] transition group-hover:translate-x-1 duration-200">
                        <span>{{ __('app.cat_houses_cta') }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Card 4: Magari (Vehicles) -->
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                <div class="relative h-48 overflow-hidden bg-gray-100">
                    <img 
                        src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=800&q=80" 
                        alt="{{ __('app.cat_vehicles_title') }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#220325]/80 via-transparent to-transparent"></div>
                    <span class="absolute bottom-3 left-3 text-xs font-bold text-[#DFB743] uppercase tracking-wider bg-[#220325]/70 px-2.5 py-1 rounded-md backdrop-blur-sm">
                        Magari &bull; Vehicles
                    </span>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="text-lg font-bold text-[#320635] group-hover:text-[#68176E] transition">
                            {{ __('app.cat_vehicles_title') }}
                        </h3>
                        <p class="text-gray-600 text-xs mt-2 leading-relaxed">
                            {{ __('app.cat_vehicles_desc') }}
                        </p>
                    </div>
                    <a href="{{ route('vehicles.index') }}" class="inline-flex items-center text-xs font-bold text-[#4A0E4E] hover:text-[#C59B27] transition group-hover:translate-x-1 duration-200">
                        <span>{{ __('app.cat_vehicles_cta') }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- =========================================================================
     4. FEATURED OPPORTUNITIES (FURSA ZILIZOPO)
     ========================================================================= -->
<section class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-2">
                <span class="text-xs font-extrabold text-[#C59B27] uppercase tracking-widest block">
                    {{ __('app.featured_title') }}
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#320635] tracking-tight">
                    {{ app()->getLocale() === 'sw' ? 'Mali Zilizopo Sokoni Sasa' : 'Prime Listings On The Market' }}
                </h2>
            </div>
            <a href="{{ route('plots.index') }}" class="mt-4 md:mt-0 inline-flex items-center space-x-2 text-sm font-bold text-[#4A0E4E] hover:text-[#C59B27] transition">
                <span>{{ __('app.view_all_plots') }}</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <!-- Plots Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredPlots as $plot)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                    <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                        <img 
                            src="{{ $plot->featured_image_url }}" 
                            alt="{{ $plot->title }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                            loading="lazy"
                        >
                        <div class="absolute top-3 left-3 flex items-center space-x-2">
                            <span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider shadow-md {{ $plot->status_badge_classes }}">
                                {{ $plot->status_label }}
                            </span>
                            @if($plot->is_featured)
                                <span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-pfi-gradient text-[#DFB743] border border-[#C59B27]/40 shadow-md">
                                    Featured
                                </span>
                            @endif
                        </div>
                        <div class="absolute bottom-3 left-3">
                            <span class="px-3 py-1 rounded-lg text-xs font-semibold bg-[#220325]/85 backdrop-blur-md text-[#DFB743] border border-[#C59B27]/30">
                                {{ $plot->plotType?->name_sw ?? 'Kiwanja' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center text-xs font-semibold text-gray-500 mb-1.5 space-x-1">
                                <svg class="w-3.5 h-3.5 text-[#4A0E4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>{{ $plot->full_location }}</span>
                            </div>
                            <h3 class="text-base font-bold text-gray-900 line-clamp-1 group-hover:text-[#4A0E4E] transition">
                                {{ $plot->title }}
                            </h3>
                            <div class="flex items-center justify-between text-xs text-gray-600 mt-3 pt-3 border-t border-gray-100">
                                <span class="font-semibold">{{ $plot->formatted_size }}</span>
                                <span class="text-emerald-600 font-semibold">{{ $plot->ownership_title_type ?? 'Kimepimwa' }}</span>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] uppercase tracking-wider font-semibold text-gray-400 block">{{ app()->getLocale() === 'sw' ? 'Bei ya Mauzo' : 'Price' }}</span>
                                <span class="text-lg font-extrabold text-[#4A0E4E]">{{ $plot->formatted_price }}</span>
                            </div>
                            <a href="{{ route('plots.show', $plot->slug) }}" class="bg-[#FAF5FB] group-hover:bg-pfi-gradient text-[#4A0E4E] group-hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-1 shadow-sm border border-[#F3E8F6] group-hover:border-transparent">
                                <span>{{ __('app.view_details') }}</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 bg-gray-50 rounded-2xl border border-gray-200">
                    <p class="text-gray-500 font-semibold">{{ __('app.empty_plots') }}</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- =========================================================================
     5. WHY POWER FAMILY INVESTMENT (TRUST PILLARS)
     ========================================================================= -->
<section class="py-20 bg-[#220325] text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#DFB743_1px,transparent_1px)] [background-size:20px_20px]"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-extrabold text-[#DFB743] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'MSINGI WA UTENDAJI WETU' : 'OUR FOUNDATION' }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ __('app.why_title') }}
            </h2>
            <p class="text-gray-300 text-sm sm:text-base">
                {{ __('app.why_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Pillar 1 -->
            <div class="bg-white/5 border border-white/10 p-8 rounded-2xl backdrop-blur-md hover:bg-white/10 transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] shadow-md border border-[#C59B27]/40">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-white">{{ __('app.why_trust_title') }}</h3>
                <p class="text-xs text-gray-300 leading-relaxed">{{ __('app.why_trust_desc') }}</p>
            </div>

            <!-- Pillar 2 -->
            <div class="bg-white/5 border border-white/10 p-8 rounded-2xl backdrop-blur-md hover:bg-white/10 transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] shadow-md border border-[#C59B27]/40">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-lg font-bold text-white">{{ __('app.why_variety_title') }}</h3>
                <p class="text-xs text-gray-300 leading-relaxed">{{ __('app.why_variety_desc') }}</p>
            </div>

            <!-- Pillar 3 -->
            <div class="bg-white/5 border border-white/10 p-8 rounded-2xl backdrop-blur-md hover:bg-white/10 transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] shadow-md border border-[#C59B27]/40">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-white">{{ __('app.why_support_title') }}</h3>
                <p class="text-xs text-gray-300 leading-relaxed">{{ __('app.why_support_desc') }}</p>
            </div>

            <!-- Pillar 4 -->
            <div class="bg-white/5 border border-white/10 p-8 rounded-2xl backdrop-blur-md hover:bg-white/10 transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] shadow-md border border-[#C59B27]/40">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <h3 class="text-lg font-bold text-white">{{ __('app.why_confidence_title') }}</h3>
                <p class="text-xs text-gray-300 leading-relaxed">{{ __('app.why_confidence_desc') }}</p>
            </div>

        </div>

    </div>
</section>

<!-- =========================================================================
     6. LOCATIONS WE SERVE (MAENEO TUNAYOHUDUMIA)
     ========================================================================= -->
<section class="py-20 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-2">
                <span class="text-xs font-extrabold text-[#C59B27] uppercase tracking-widest block">
                    {{ __('app.locations_title') }}
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#320635] tracking-tight">
                    {{ __('app.locations_subtitle') }}
                </h2>
            </div>
            <a href="{{ route('locations.index') }}" class="mt-4 md:mt-0 inline-flex items-center space-x-2 text-sm font-bold text-[#4A0E4E] hover:text-[#C59B27] transition">
                <span>{{ app()->getLocale() === 'sw' ? 'Tazama Maeneo Yote' : 'Explore All Locations' }}</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($locations as $loc)
                <div class="group relative rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 bg-[#220325] aspect-[4/3] flex flex-col justify-end p-6 border border-[#68176E]/30">
                    <img 
                        src="{{ $loc->image_url }}" 
                        alt="{{ $loc->area_name }}" 
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-60 group-hover:opacity-40" 
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#220325] via-[#220325]/40 to-transparent"></div>

                    <div class="relative z-10 space-y-2">
                        <span class="inline-block px-2.5 py-0.5 rounded-full bg-pfi-gradient text-[#DFB743] text-[11px] font-bold tracking-wide uppercase border border-[#C59B27]/30">
                            {{ $loc->available_plots_count + $loc->available_houses_count }} {{ app()->getLocale() === 'sw' ? 'Mali Zinazopatikana' : 'Listings Available' }}
                        </span>
                        <h3 class="text-xl font-bold text-white group-hover:text-[#DFB743] transition">
                            📍 {{ $loc->area_name }}
                        </h3>
                        <p class="text-xs text-gray-300 line-clamp-2 leading-relaxed">
                            {{ $loc->description ?? ($loc->area_name . ' ni eneo zuri linalofaa kwa makazi na uwekezaji.') }}
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('plots.index', ['location' => $loc->id]) }}" class="inline-flex items-center space-x-2 text-xs font-bold text-[#DFB743] group-hover:text-white uppercase tracking-wider transition">
                                <span>{{ __('app.view_plots_in_loc') }}</span>
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- =========================================================================
     7. HOW TO BUY (JINSI YA KUNUNUA KIWANJA - 5 STEPS)
     ========================================================================= -->
<section class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="text-xs font-extrabold text-[#C59B27] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'HATUA ZA UNUNUZI' : 'PURCHASE PROCESS' }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#320635] tracking-tight">
                {{ __('app.how_title') }}
            </h2>
            <p class="text-gray-600 text-sm sm:text-base">
                {{ __('app.how_subtitle') }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 relative">
            
            <!-- Step 1 -->
            <div class="bg-[#FAF5FB] rounded-2xl p-6 border border-[#F3E8F6] text-center space-y-3 relative group hover:bg-[#4A0E4E] hover:text-white transition duration-300">
                <span class="w-10 h-10 rounded-full bg-white text-[#4A0E4E] font-extrabold text-sm flex items-center justify-center mx-auto shadow-md border border-[#C59B27]/30">01</span>
                <h3 class="font-bold text-sm text-[#320635] group-hover:text-[#DFB743] transition">{{ __('app.how_step1_title') }}</h3>
                <p class="text-xs text-gray-600 group-hover:text-gray-200 leading-relaxed">{{ __('app.how_step1_desc') }}</p>
            </div>

            <!-- Step 2 -->
            <div class="bg-[#FAF5FB] rounded-2xl p-6 border border-[#F3E8F6] text-center space-y-3 relative group hover:bg-[#4A0E4E] hover:text-white transition duration-300">
                <span class="w-10 h-10 rounded-full bg-white text-[#4A0E4E] font-extrabold text-sm flex items-center justify-center mx-auto shadow-md border border-[#C59B27]/30">02</span>
                <h3 class="font-bold text-sm text-[#320635] group-hover:text-[#DFB743] transition">{{ __('app.how_step2_title') }}</h3>
                <p class="text-xs text-gray-600 group-hover:text-gray-200 leading-relaxed">{{ __('app.how_step2_desc') }}</p>
            </div>

            <!-- Step 3 -->
            <div class="bg-[#FAF5FB] rounded-2xl p-6 border border-[#F3E8F6] text-center space-y-3 relative group hover:bg-[#4A0E4E] hover:text-white transition duration-300">
                <span class="w-10 h-10 rounded-full bg-white text-[#4A0E4E] font-extrabold text-sm flex items-center justify-center mx-auto shadow-md border border-[#C59B27]/30">03</span>
                <h3 class="font-bold text-sm text-[#320635] group-hover:text-[#DFB743] transition">{{ __('app.how_step3_title') }}</h3>
                <p class="text-xs text-gray-600 group-hover:text-gray-200 leading-relaxed">{{ __('app.how_step3_desc') }}</p>
            </div>

            <!-- Step 4 -->
            <div class="bg-[#FAF5FB] rounded-2xl p-6 border border-[#F3E8F6] text-center space-y-3 relative group hover:bg-[#4A0E4E] hover:text-white transition duration-300">
                <span class="w-10 h-10 rounded-full bg-white text-[#4A0E4E] font-extrabold text-sm flex items-center justify-center mx-auto shadow-md border border-[#C59B27]/30">04</span>
                <h3 class="font-bold text-sm text-[#320635] group-hover:text-[#DFB743] transition">{{ __('app.how_step4_title') }}</h3>
                <p class="text-xs text-gray-600 group-hover:text-gray-200 leading-relaxed">{{ __('app.how_step4_desc') }}</p>
            </div>

            <!-- Step 5 -->
            <div class="bg-[#FAF5FB] rounded-2xl p-6 border border-[#F3E8F6] text-center space-y-3 relative group hover:bg-[#4A0E4E] hover:text-white transition duration-300">
                <span class="w-10 h-10 rounded-full bg-white text-[#4A0E4E] font-extrabold text-sm flex items-center justify-center mx-auto shadow-md border border-[#C59B27]/30">05</span>
                <h3 class="font-bold text-sm text-[#320635] group-hover:text-[#DFB743] transition">{{ __('app.how_step5_title') }}</h3>
                <p class="text-xs text-gray-600 group-hover:text-gray-200 leading-relaxed">{{ __('app.how_step5_desc') }}</p>
            </div>

        </div>

    </div>
</section>

<!-- =========================================================================
     8. GALLERY & PROJECT HIGHLIGHTS PREVIEW
     ========================================================================= -->
@if(count($galleryHighlights) > 0)
<section class="py-20 bg-neutral-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-2">
                <span class="text-xs font-extrabold text-[#C59B27] uppercase tracking-widest block">
                    {{ __('app.nav_gallery') }}
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#320635] tracking-tight">
                    {{ app()->getLocale() === 'sw' ? 'Matunzio ya Miradi & Shughuli Zetu' : 'Project & Site Highlights' }}
                </h2>
            </div>
            <a href="{{ route('gallery.index') }}" class="mt-4 md:mt-0 inline-flex items-center space-x-2 text-sm font-bold text-[#4A0E4E] hover:text-[#C59B27] transition">
                <span>{{ app()->getLocale() === 'sw' ? 'Tazama Picha Zote' : 'Explore Full Gallery' }}</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($galleryHighlights as $item)
                <div class="relative rounded-2xl overflow-hidden group aspect-square bg-gray-200 shadow-sm">
                    <img 
                        src="{{ $item->url }}" 
                        alt="{{ $item->title }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#220325]/90 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <span class="text-xs font-bold text-[#DFB743] uppercase tracking-wider">{{ $item->category }}</span>
                        <p class="text-xs font-semibold text-white truncate">{{ $item->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif

<!-- =========================================================================
     9. INVESTMENT EDUCATION / BLOG
     ========================================================================= -->
@if(count($articles) > 0)
<section class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-2">
                <span class="text-xs font-extrabold text-[#C59B27] uppercase tracking-widest block">
                    {{ __('app.blog_title') }}
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#320635] tracking-tight">
                    {{ __('app.blog_subtitle') }}
                </h2>
            </div>
            <a href="{{ route('pages.blog') }}" class="mt-4 md:mt-0 inline-flex items-center space-x-2 text-sm font-bold text-[#4A0E4E] hover:text-[#C59B27] transition">
                <span>{{ app()->getLocale() === 'sw' ? 'Soma Makala Zote' : 'View All Articles' }}</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($articles as $art)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                    <div class="relative h-48 overflow-hidden bg-gray-100">
                        <img 
                            src="{{ $art->featured_image_url ?? 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80' }}" 
                            alt="{{ $art->title }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                            loading="lazy"
                        >
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <span class="text-[11px] font-bold text-[#C59B27] uppercase tracking-wider block mb-1">
                                {{ $art->category ?? 'Uwekezaji' }}
                            </span>
                            <h3 class="text-base font-bold text-gray-900 line-clamp-2 group-hover:text-[#4A0E4E] transition">
                                {{ $art->title }}
                            </h3>
                            <p class="text-xs text-gray-600 line-clamp-2 mt-2">
                                {{ $art->summary ?? Str::limit(strip_tags($art->content), 100) }}
                            </p>
                        </div>
                        <a href="{{ route('pages.article', $art->slug) }}" class="inline-flex items-center text-xs font-bold text-[#4A0E4E] hover:text-[#C59B27] transition">
                            <span>{{ __('app.read_article') }}</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif

<!-- =========================================================================
     10. STRONG FINAL CALL TO ACTION (CTA)
     ========================================================================= -->
<section class="py-20 bg-pfi-gradient text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(212,175,55,0.2),transparent_70%)]"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
            {{ __('app.cta_title') }}
        </h2>
        <p class="text-base sm:text-lg text-gray-200 max-w-2xl mx-auto leading-relaxed">
            {{ __('app.cta_subtitle') }}
        </p>

        <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
            @php
                $whatsapp = \App\Models\Setting::get('whatsapp_number', '255700000000');
                $phoneNum = \App\Models\Setting::get('company_phone', '+255 700 000 000');
                $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsapp);
            @endphp
            <a 
                href="https://wa.me/{{ $cleanWhatsapp }}?text={{ rawurlencode(app()->getLocale() === 'sw' ? 'Habari Power Family Investment, ninaomba ushauri na maelezo zaidi kuhusu fursa za viwanja, nyumba na magari.' : 'Hello Power Family Investment, I would like more information and consultation regarding available plots, houses and vehicles.') }}" 
                target="_blank" 
                class="bg-[#25D366] text-white font-extrabold px-8 py-4 rounded-xl shadow-xl hover:brightness-110 active:scale-95 transition text-sm sm:text-base flex items-center space-x-2"
            >
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.777.78 2.796.78 3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.518-4.482 10-10 10-1.748 0-3.385-.45-4.819-1.238l-7.181 1.884 1.918-7.009c-.878-1.493-1.385-3.23-1.385-5.084 0-5.518 4.482-10 10-10s10 4.482 10 10z"/></svg>
                <span>{{ __('app.cta_whatsapp') }}</span>
            </a>

            <a 
                href="tel:{{ $phoneNum }}" 
                class="bg-gold-gradient text-[#220325] font-extrabold px-8 py-4 rounded-xl shadow-xl hover:brightness-110 active:scale-95 transition text-sm sm:text-base flex items-center space-x-2 border border-[#DFB743]"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>{{ __('app.cta_call') }}</span>
            </a>
        </div>
    </div>
</section>

@endsection
