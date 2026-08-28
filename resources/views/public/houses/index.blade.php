@extends('layouts.app')

@section('title', __('app.catalogue_houses_title') . ' — Power Family Investment')

@section('content')

<!-- Header Banner -->
<div class="bg-[#220325] text-white py-12 border-b border-[#68176E]/30 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#DFB743_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-bold text-[#DFB743] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'NYUMBA ZA KISASA' : 'MODERN HOMES' }}
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ __('app.catalogue_houses_title') }}
            </h1>
            <p class="text-gray-300 text-sm">
                {{ app()->getLocale() === 'sw' ? 'Gundua nyumba bora za kisasa zilizojengwa kwa ubora wa juu kwenye mazingira salama na tulivu.' : 'Browse contemporary family residences built to superior craftsmanship standards.' }}
            </p>
        </div>
    </div>
</div>

<!-- Main Catalogue -->
<div class="py-12 bg-neutral-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filters Bar -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8">
            <form action="{{ route('houses.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Tafuta Nyumba</label>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Neno kuu..." 
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#4A0E4E] focus:outline-none"
                    >
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Eneo</label>
                    <select name="location" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#4A0E4E] focus:outline-none">
                        <option value="">{{ __('app.search_all_locations') }}</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc->id }}" {{ request('location') == $loc->id ? 'selected' : '' }}>
                                {{ $loc->area_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Vyumba vya Kulala</label>
                    <select name="bedrooms" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#4A0E4E] focus:outline-none">
                        <option value="">Vyumba Vyote</option>
                        <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>Vyumba 2+</option>
                        <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>Vyumba 3+</option>
                        <option value="4" {{ request('bedrooms') == '4' ? 'selected' : '' }}>Vyumba 4+</option>
                        <option value="5" {{ request('bedrooms') == '5' ? 'selected' : '' }}>Vyumba 5+</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Hali</label>
                    <select name="status" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#4A0E4E] focus:outline-none">
                        <option value="">{{ __('app.filter_all') }}</option>
                        <option value="available" {{ request('status') === 'available' ? 'selected' : '' }}>Inapatikana</option>
                        <option value="reserved" {{ request('status') === 'reserved' ? 'selected' : '' }}>Imeshikiliwa</option>
                        <option value="sold" {{ request('status') === 'sold' ? 'selected' : '' }}>Imeuzwa</option>
                    </select>
                </div>

                <div class="flex items-center space-x-2">
                    <button type="submit" class="w-full bg-pfi-gradient text-white py-2.5 rounded-xl text-sm font-bold shadow hover:brightness-110 transition">
                        Chuja (Filter)
                    </button>
                    @if(request()->hasAny(['search', 'location', 'bedrooms', 'status', 'sort']))
                        <a href="{{ route('houses.index') }}" class="p-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-semibold" title="Ondoa Filter">
                            ✕
                        </a>
                    @endif
                </div>

            </form>
        </div>

        <!-- Result count & Sorting -->
        <div class="flex items-center justify-between mb-6 text-sm text-gray-600">
            <div>
                Inaonyesha <span class="font-bold text-[#4A0E4E]">{{ $houses->total() }}</span> nyumba zilizopo
            </div>
            <form method="GET" action="{{ route('houses.index') }}" class="flex items-center space-x-2">
                @foreach(request()->except('sort') as $k => $v)
                    <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                @endforeach
                <label class="text-xs font-semibold hidden sm:inline">Panga kwa:</label>
                <select name="sort" onchange="this.form.submit()" class="bg-white border border-gray-200 rounded-lg px-3 py-1.5 text-xs font-medium text-gray-700">
                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Vipya Zaidi</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Bei: Ndogo &rarr; Kubwa</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Bei: Kubwa &rarr; Ndogo</option>
                </select>
            </form>
        </div>

        <!-- Houses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($houses as $house)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                    <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                        <img 
                            src="{{ $house->display_image }}" 
                            alt="{{ $house->title }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                            loading="lazy"
                        >
                        <div class="absolute top-3 left-3 flex items-center space-x-2">
                            {!! $house->status_badge !!}
                            @if($house->is_featured)
                                <span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-pfi-gradient text-[#DFB743] border border-[#C59B27]/40 shadow-md">
                                    Featured
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center text-xs font-semibold text-gray-500 mb-1.5 space-x-1">
                                <svg class="w-3.5 h-3.5 text-[#4A0E4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>{{ $house->location?->area_name ?? 'Tanzania' }}</span>
                            </div>
                            <h3 class="text-base font-bold text-gray-900 line-clamp-1 group-hover:text-[#4A0E4E] transition">
                                {{ $house->title }}
                            </h3>
                            <div class="grid grid-cols-3 gap-2 text-xs text-gray-600 mt-3 pt-3 border-t border-gray-100">
                                <span>🛏️ {{ $house->bedrooms }} Vyumba</span>
                                <span>🚿 {{ $house->bathrooms }} Bafu</span>
                                <span>📐 {{ $house->plot_size ?? $house->house_size ?? 'Mkubwa' }}</span>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] uppercase tracking-wider font-semibold text-gray-400 block">Bei ya Nyumba</span>
                                <span class="text-lg font-extrabold text-[#4A0E4E]">{{ $house->formatted_price }}</span>
                            </div>
                            <a href="{{ route('houses.show', $house->slug) }}" class="bg-[#FAF5FB] group-hover:bg-pfi-gradient text-[#4A0E4E] group-hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-1 shadow-sm border border-[#F3E8F6] group-hover:border-transparent">
                                <span>{{ __('app.view_house') }}</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-2xl border border-gray-200 space-y-4">
                    <h3 class="text-lg font-bold text-gray-800">Hakuna nyumba zilizopatikana</h3>
                    <p class="text-sm text-gray-500 max-w-sm mx-auto">Jaribu kubadilisha vigezo vya utafutaji.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $houses->links() }}
        </div>

    </div>
</div>

@endsection
