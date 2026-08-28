@extends('layouts.app')

@section('title', 'Viwanja na Nyumba ' . $location->area_name . ' — Power Family Investment')

@section('content')

@php
    $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '255700000000');
    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsappNumber);
    $phone = \App\Models\Setting::get('company_phone', '+255 700 000 000');
@endphp

<!-- Header Banner -->
<div class="relative bg-[#220325] text-white py-16 overflow-hidden">
    <img src="{{ $location->image_url }}" alt="{{ $location->area_name }}" class="absolute inset-0 w-full h-full object-cover opacity-30">
    <div class="absolute inset-0 bg-gradient-to-r from-[#220325] via-[#320635]/90 to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
        <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-white/10 text-[#DFB743] text-xs font-bold uppercase">
            <span>📍 {{ $location->district }}, {{ $location->region }}</span>
        </div>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white">
            {{ $location->area_name }}
        </h1>
        <p class="text-gray-200 text-sm sm:text-base max-w-2xl">
            {{ $location->description ?? 'Gundua fursa za viwanja vilivyopimwa na nyumba za kisasa zilizopo eneo la ' . $location->area_name . '.' }}
        </p>
    </div>
</div>

<div class="py-12 bg-neutral-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Plots in this location -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-extrabold text-[#320635]">
                    Viwanja Vinavyopatikana {{ $location->area_name }}
                </h2>
                <span class="text-xs font-bold text-gray-500">
                    {{ $location->availablePlots->count() }} Viwanja
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($location->availablePlots as $plot)
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                        <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                            <img src="{{ $plot->featured_image_url }}" alt="{{ $plot->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider shadow-md {{ $plot->status_badge_classes }}">
                                    {{ $plot->status_label }}
                                </span>
                            </div>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                            <div>
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
                                    <span class="text-[10px] uppercase tracking-wider font-semibold text-gray-400 block">Bei ya Mauzo</span>
                                    <span class="text-lg font-extrabold text-[#4A0E4E]">{{ $plot->formatted_price }}</span>
                                </div>
                                <a href="{{ route('plots.show', $plot->slug) }}" class="bg-[#FAF5FB] group-hover:bg-pfi-gradient text-[#4A0E4E] group-hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-1 shadow-sm">
                                    <span>{{ __('app.view_details') }}</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 bg-white rounded-2xl border border-gray-200">
                        <p class="text-gray-500 font-semibold">Hakuna viwanja vilivyopo kwa sasa eneo hili.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Contact CTA Bar for this location -->
        <div class="bg-pfi-gradient text-white rounded-2xl p-8 shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="space-y-1">
                <h3 class="text-xl font-bold">Unahitaji Kiwanja au Nyumba {{ $location->area_name }}?</h3>
                <p class="text-xs text-gray-200">Wasiliana na timu yetu ya wataalamu upate ushauri wa kitaalamu na maelekezo ya kufika site.</p>
            </div>
            <div class="flex items-center space-x-3 shrink-0">
                <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ rawurlencode('Habari Power Family Investment, ninaulizia fursa za viwanja vilivyopo eneo la ' . $location->area_name) }}" target="_blank" class="bg-[#25D366] text-white px-6 py-3 rounded-xl font-bold text-xs shadow hover:brightness-110 transition flex items-center space-x-2">
                    <span>💬 WHATSAPP</span>
                </a>
                <a href="tel:{{ $phone }}" class="bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-xl font-bold text-xs border border-white/30 transition">
                    <span>📞 PIGA SIMU</span>
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
