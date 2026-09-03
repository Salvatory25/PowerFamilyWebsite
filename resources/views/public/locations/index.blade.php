@extends('layouts.app')

@section('title', __('app.locations_title') . ' — Power Family Investment')

@section('content')

<!-- Header Banner -->
<div class="bg-[#1C0305] text-white py-12 border-b border-[#961620]/30 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#FAC955_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-bold text-[#FAC955] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'MAENEO YA KIMKAKATI' : 'STRATEGIC LOCATIONS' }}
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ __('app.locations_title') }}
            </h1>
            <p class="text-gray-300 text-sm">
                {{ app()->getLocale() === 'sw' ? 'Gundua maeneo mbalimbali yenye fursa za viwanja vya makazi na biashara.' : 'Discover growth corridors with prime residential and commercial land opportunities.' }}
            </p>
        </div>
    </div>
</div>

<div class="py-12 bg-neutral-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($locations as $loc)
                <div class="group relative rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 bg-[#1C0305] aspect-[4/3] flex flex-col justify-end p-6 border border-[#961620]/30">
                    <img 
                        src="{{ $loc->image_url }}" 
                        alt="{{ $loc->area_name }}" 
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-60 group-hover:opacity-40" 
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1C0305] via-[#1C0305]/40 to-transparent"></div>

                    <div class="relative z-10 space-y-2">
                        <span class="inline-block px-2.5 py-0.5 rounded-full bg-pfi-gradient text-[#FAC955] text-[11px] font-bold tracking-wide uppercase border border-[#D48B16]/30">
                            {{ $loc->plots_count ?? $loc->plots()->count() }} {{ app()->getLocale() === 'sw' ? 'Viwanja Vinavyopatikana' : 'Available Plots' }}
                        </span>
                        <h3 class="text-xl font-bold text-white group-hover:text-[#FAC955] transition">
                            📍 {{ $loc->area_name }}, {{ $loc->district }}
                        </h3>
                        <p class="text-xs text-gray-300 line-clamp-2 leading-relaxed">
                            {{ $loc->description ?? ($loc->area_name . ' ni eneo lenye ukuaji wa haraka linalofaa kwa makazi na biashara.') }}
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('locations.show', $loc->slug) }}" class="inline-flex items-center space-x-2 text-xs font-bold text-[#FAC955] group-hover:text-white uppercase tracking-wider transition">
                                <span>{{ __('app.view_plots_in_loc') }}</span>
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
