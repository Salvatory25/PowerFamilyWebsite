@extends('layouts.app')

@section('title', $vehicle->title . ' — Power Family Investment')

@section('content')

@php
    $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '255700000000');
    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsappNumber);
    $phone = \App\Models\Setting::get('company_phone', '+255 700 000 000');

    $whatsappText = app()->getLocale() === 'en'
        ? "Hello Power Family Investment, I am interested in Vehicle [{$vehicle->vehicle_reference}] - \"{$vehicle->title}\" priced at {$vehicle->formatted_price}. Please provide more details."
        : "Habari Power Family Investment, nimevutiwa na Gari [{$vehicle->vehicle_reference}] - \"{$vehicle->title}\" lenye bei ya {$vehicle->formatted_price}. Naomba maelezo zaidi na ratiba ya kulikagua.";
    $whatsappUrl = "https://wa.me/{$cleanWhatsapp}?text=" . rawurlencode($whatsappText);
@endphp

<!-- Breadcrumbs -->
<div class="bg-white border-b border-gray-100 py-3.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs font-semibold text-gray-500 flex items-center space-x-2">
        <a href="{{ route('home') }}" class="hover:text-[#4A0E4E]">Mwanzo</a>
        <span>/</span>
        <a href="{{ route('vehicles.index') }}" class="hover:text-[#4A0E4E]">Magari</a>
        <span>/</span>
        <span class="text-gray-900 truncate max-w-xs sm:max-w-md">{{ $vehicle->title }}</span>
    </div>
</div>

<div class="py-10 bg-neutral-50" x-data="{ activeImage: '{{ $vehicle->display_image }}', lightboxOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="flex items-center space-x-3">
                    {!! $vehicle->status_badge !!}
                    <span class="px-3 py-1 rounded-md text-xs font-bold bg-[#FAF5FB] text-[#4A0E4E] border border-[#F3E8F6]">
                        Ref: {{ $vehicle->vehicle_reference }}
                    </span>
                    <span class="px-3 py-1 rounded-md text-xs font-bold bg-[#FCFAF0] text-[#9E7310] border border-[#F0E3B0]">
                        {{ $vehicle->make }}
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#320635]">
                    {{ $vehicle->title }}
                </h1>
            </div>

            <div class="md:text-right border-t md:border-t-0 pt-4 md:pt-0">
                <span class="text-xs uppercase tracking-wider font-semibold text-gray-400 block">Bei ya Gari</span>
                <span class="text-3xl sm:text-4xl font-extrabold text-[#4A0E4E] block mt-1">
                    {{ $vehicle->formatted_price }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Gallery -->
                <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border border-gray-100 space-y-4">
                    <div class="relative aspect-[16/10] rounded-xl overflow-hidden bg-gray-100 cursor-pointer" @click="lightboxOpen = true">
                        <img :src="activeImage" alt="{{ $vehicle->title }}" class="w-full h-full object-cover">
                        <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-md text-white text-xs px-3 py-1.5 rounded-lg flex items-center space-x-1 font-semibold">
                            <span>Bonyeza Kukuza Picha</span>
                        </div>
                    </div>

                    @if($vehicle->images->count() > 0)
                        <div class="flex items-center space-x-3 overflow-x-auto pb-2">
                            <button 
                                type="button"
                                @click="activeImage = '{{ $vehicle->display_image }}'"
                                class="w-20 h-16 rounded-lg overflow-hidden border-2 shrink-0 transition"
                                :class="activeImage === '{{ $vehicle->display_image }}' ? 'border-[#4A0E4E]' : 'border-transparent opacity-70'"
                            >
                                <img src="{{ $vehicle->display_image }}" class="w-full h-full object-cover">
                            </button>
                            @foreach($vehicle->images as $img)
                                <button 
                                    type="button"
                                    @click="activeImage = '{{ $img->url }}'"
                                    class="w-20 h-16 rounded-lg overflow-hidden border-2 shrink-0 transition"
                                    :class="activeImage === '{{ $img->url }}' ? 'border-[#4A0E4E]' : 'border-transparent opacity-70'"
                                >
                                    <img src="{{ $img->url }}" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Key Specs Grid -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="p-4 rounded-xl bg-[#FAF5FB] border border-[#F3E8F6]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Mwaka (Year)</span>
                        <span class="text-base font-extrabold text-[#4A0E4E] mt-0.5 block">{{ $vehicle->year }}</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FAF5FB] border border-[#F3E8F6]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Transmission</span>
                        <span class="text-base font-extrabold text-[#4A0E4E] mt-0.5 block">{{ $vehicle->transmission }}</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FAF5FB] border border-[#F3E8F6]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Aina ya Mafuta</span>
                        <span class="text-base font-extrabold text-[#4A0E4E] mt-0.5 block">{{ $vehicle->fuel_type }}</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FAF5FB] border border-[#F3E8F6]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Mileage / Rangi</span>
                        <span class="text-base font-extrabold text-[#4A0E4E] mt-0.5 block">{{ $vehicle->mileage ?? ($vehicle->color ?? 'Clean') }}</span>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 space-y-4">
                    <h2 class="text-xl font-bold text-[#320635] border-b border-gray-100 pb-3">
                        Maelezo ya Gari
                    </h2>
                    <div class="prose max-w-none text-gray-700 text-sm sm:text-base leading-relaxed">
                        {!! nl2br(e($vehicle->description)) !!}
                    </div>
                </div>

                <!-- Features List -->
                @if(!empty($vehicle->features) && count($vehicle->features) > 0)
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 space-y-4">
                    <h2 class="text-xl font-bold text-[#320635] border-b border-gray-100 pb-3">
                        Vipengele na Sifa za Gari
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                        @foreach($vehicle->features as $feature)
                            <div class="flex items-center space-x-2 text-gray-700">
                                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <!-- Sticky Contact Box -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 sticky top-28 space-y-6">
                    
                    <div class="bg-pfi-gradient text-white p-5 rounded-xl space-y-2">
                        <span class="text-xs font-semibold text-[#DFB743] uppercase tracking-wider">Mawasiliano ya Moja kwa Moja</span>
                        <h3 class="text-lg font-bold text-white">Unataka Gari Hili?</h3>
                        <p class="text-xs text-gray-200 leading-relaxed">
                            Wasiliana nasi kupitia WhatsApp au piga simu ili kupata taarifa za ukaguzi (inspection) na kukamilisha manunuzi.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <a 
                            href="{{ $whatsappUrl }}" 
                            target="_blank" 
                            class="w-full bg-[#25D366] text-white py-3.5 px-4 rounded-xl font-bold text-sm shadow-md hover:brightness-110 active:scale-95 transition flex items-center justify-center space-x-2"
                        >
                            <span>💬 WASILIANA WHATSAPP</span>
                        </a>

                        <a 
                            href="tel:{{ $phone }}" 
                            class="w-full bg-[#FAF5FB] hover:bg-[#F3E8F6] text-[#4A0E4E] border border-[#4A0E4E]/30 py-3.5 px-4 rounded-xl font-bold text-sm transition flex items-center justify-center space-x-2"
                        >
                            <span>📞 PIGA SIMU</span>
                        </a>
                    </div>

                    <div class="border-t border-gray-100 pt-6 space-y-4">
                        <h4 class="font-bold text-sm text-gray-900">Tuma Ombi / Swali:</h4>
                        <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-3">
                            @csrf
                            <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                            <input type="hidden" name="category" value="gari">
                            
                            <div>
                                <input type="text" name="name" required placeholder="Jina Lako *" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#4A0E4E] focus:outline-none">
                            </div>
                            <div>
                                <input type="tel" name="phone" required placeholder="Namba ya Simu *" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#4A0E4E] focus:outline-none">
                            </div>
                            <div>
                                <textarea name="message" rows="3" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#4A0E4E] focus:outline-none resize-none">Habari, ninahitaji taarifa zaidi kuhusu gari hili [{{ $vehicle->vehicle_reference }} - {{ $vehicle->title }}].</textarea>
                            </div>
                            <button type="submit" class="w-full bg-pfi-gradient text-white py-3 rounded-xl font-bold text-xs shadow hover:brightness-110 transition">
                                TUMA OMBI SASA
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div x-show="lightboxOpen" x-transition class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4">
        <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white text-3xl font-bold hover:text-[#DFB743] transition">✕</button>
        <img :src="activeImage" class="max-w-full max-h-[90vh] object-contain rounded-xl">
    </div>
</div>

<!-- Mobile Sticky Bottom Conversion Bar -->
<div class="lg:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-gray-200 p-3 flex items-center space-x-3 shadow-2xl">
    <a href="{{ $whatsappUrl }}" target="_blank" class="flex-1 bg-[#25D366] text-white py-3 rounded-xl font-bold text-xs flex items-center justify-center space-x-1 shadow">
        <span>💬 WHATSAPP</span>
    </a>
    <a href="tel:{{ $phone }}" class="flex-1 bg-pfi-gradient text-white py-3 rounded-xl font-bold text-xs flex items-center justify-center space-x-1 shadow">
        <span>📞 PIGA SIMU</span>
    </a>
</div>

@endsection
