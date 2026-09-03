@extends('layouts.app')

@section('title', __('app.catalogue_vehicles_title') . ' — Power Family Investment')

@section('content')

<!-- Header Banner -->
<div class="bg-[#1C0305] text-white py-12 border-b border-[#961620]/30 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#FAC955_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-bold text-[#FAC955] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'MAGARI YA UHAKIKA' : 'VERIFIED VEHICLES' }}
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ __('app.catalogue_vehicles_title') }}
            </h1>
            <p class="text-gray-300 text-sm">
                {{ app()->getLocale() === 'sw' ? 'Magari safi yaliyothibitishwa kwa matumizi binafsi, biashara na kazi za kifamilia.' : 'Browse dependable and luxury vehicles certified for personal and business use.' }}
            </p>
        </div>
    </div>
</div>

<!-- Main Catalogue -->
<div class="py-12 bg-neutral-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filters Bar -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8">
            <form action="{{ route('vehicles.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Tafuta Gari</label>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Make / Model..." 
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#750D15] focus:outline-none"
                    >
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Kampuni (Make)</label>
                    <select name="make" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#750D15] focus:outline-none">
                        <option value="">Aina Zote</option>
                        @foreach($makes as $m)
                            <option value="{{ $m }}" {{ request('make') == $m ? 'selected' : '' }}>{{ $m }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Transmission</label>
                    <select name="transmission" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#750D15] focus:outline-none">
                        <option value="">Zote</option>
                        <option value="Automatic" {{ request('transmission') === 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        <option value="Manual" {{ request('transmission') === 'Manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Hali</label>
                    <select name="status" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#750D15] focus:outline-none">
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
                    @if(request()->hasAny(['search', 'make', 'transmission', 'status', 'sort']))
                        <a href="{{ route('vehicles.index') }}" class="p-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-semibold" title="Ondoa Filter">
                            ✕
                        </a>
                    @endif
                </div>

            </form>
        </div>

        <!-- Result count & Sorting -->
        <div class="flex items-center justify-between mb-6 text-sm text-gray-600">
            <div>
                Inaonyesha <span class="font-bold text-[#750D15]">{{ $vehicles->total() }}</span> magari yaliyopo
            </div>
            <form method="GET" action="{{ route('vehicles.index') }}" class="flex items-center space-x-2">
                @foreach(request()->except('sort') as $k => $v)
                    <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                @endforeach
                <label class="text-xs font-semibold hidden sm:inline">Panga kwa:</label>
                <select name="sort" onchange="this.form.submit()" class="bg-white border border-gray-200 rounded-lg px-3 py-1.5 text-xs font-medium text-gray-700">
                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Vipya Zaidi</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Bei: Ndogo &rarr; Kubwa</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Bei: Kubwa &rarr; Ndogo</option>
                    <option value="year_desc" {{ request('sort') === 'year_desc' ? 'selected' : '' }}>Mwaka: Mpya zaidi</option>
                </select>
            </form>
        </div>

        <!-- Vehicles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($vehicles as $vehicle)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                    <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                        <img 
                            src="{{ $vehicle->display_image }}" 
                            alt="{{ $vehicle->title }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                            loading="lazy"
                        >
                        <div class="absolute top-3 left-3 flex items-center space-x-2">
                            {!! $vehicle->status_badge !!}
                            @if($vehicle->is_featured)
                                <span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-pfi-gradient text-[#FAC955] border border-[#D48B16]/40 shadow-md">
                                    Featured
                                </span>
                            @endif
                        </div>
                        <div class="absolute bottom-3 left-3">
                            <span class="px-3 py-1 rounded-lg text-xs font-semibold bg-[#1C0305]/85 backdrop-blur-md text-[#FAC955] border border-[#D48B16]/30">
                                {{ $vehicle->make }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center text-xs font-semibold text-[#D48B16] mb-1.5 space-x-2">
                                <span>Mwaka {{ $vehicle->year }}</span>
                                <span>&bull;</span>
                                <span>{{ $vehicle->transmission }}</span>
                                @if($vehicle->mileage)
                                    <span>&bull;</span>
                                    <span>{{ $vehicle->mileage }}</span>
                                @endif
                            </div>
                            <h3 class="text-base font-bold text-gray-900 line-clamp-1 group-hover:text-[#750D15] transition">
                                {{ $vehicle->title }}
                            </h3>
                            <div class="grid grid-cols-3 gap-2 text-xs text-gray-600 mt-3 pt-3 border-t border-gray-100">
                                <span>📅 {{ $vehicle->year }}</span>
                                <span>⚙️ {{ $vehicle->transmission }}</span>
                                <span>⛽ {{ $vehicle->fuel_type }}</span>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] uppercase tracking-wider font-semibold text-gray-400 block">Bei ya Gari</span>
                                <span class="text-lg font-extrabold text-[#750D15]">{{ $vehicle->formatted_price }}</span>
                            </div>
                            <a href="{{ route('vehicles.show', $vehicle->slug) }}" class="bg-[#FDF5F6] group-hover:bg-pfi-gradient text-[#750D15] group-hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-1 shadow-sm border border-[#F9E4E7] group-hover:border-transparent">
                                <span>{{ __('app.view_vehicle') }}</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-2xl border border-gray-200 space-y-4">
                    <h3 class="text-lg font-bold text-gray-800">Hakuna magari yaliyopatikana</h3>
                    <p class="text-sm text-gray-500 max-w-sm mx-auto">Jaribu kubadilisha vigezo vya utafutaji.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $vehicles->links() }}
        </div>

    </div>
</div>

@endsection
