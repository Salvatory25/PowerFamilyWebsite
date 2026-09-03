@extends('layouts.app')

@section('title', $house->title . ' — Power Family Investment')

@section('content')

@php
    $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '255759423626');
    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsappNumber);
    $phone = \App\Models\Setting::get('company_phone', '+255 759 423 626');

    $whatsappText = app()->getLocale() === 'en'
        ? "Hello Power Family Investment, I am interested in House [{$house->house_reference}] - \"{$house->title}\" priced at {$house->formatted_price}. Please provide more information."
        : "Habari Power Family Investment, nimevutiwa na Nyumba [{$house->house_reference}] - \"{$house->title}\" yenye bei ya {$house->formatted_price}. Naomba maelezo zaidi na ratiba ya kuitembelea.";
    $whatsappUrl = "https://wa.me/{$cleanWhatsapp}?text=" . rawurlencode($whatsappText);
@endphp

<!-- Breadcrumbs -->
<div class="bg-white border-b border-gray-100 py-3.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs font-semibold text-gray-500 flex items-center space-x-2">
        <a href="{{ route('home') }}" class="hover:text-[#750D15]">Mwanzo</a>
        <span>/</span>
        <a href="{{ route('houses.index') }}" class="hover:text-[#750D15]">Nyumba</a>
        <span>/</span>
        <span class="text-gray-900 truncate max-w-xs sm:max-w-md">{{ $house->title }}</span>
    </div>
</div>

<div class="py-10 bg-neutral-50" x-data="{ activeImage: '{{ $house->display_image }}', lightboxOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="flex items-center space-x-3">
                    {!! $house->status_badge !!}
                    <span class="px-3 py-1 rounded-md text-xs font-bold bg-[#FDF5F6] text-[#750D15] border border-[#F9E4E7]">
                        Ref: {{ $house->house_reference }}
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#280508]">
                    {{ $house->title }}
                </h1>
                <div class="flex items-center text-xs sm:text-sm font-semibold text-gray-600 space-x-2">
                    <svg class="w-4 h-4 text-[#750D15]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>{{ $house->location?->area_name ?? 'Tanzania' }}</span>
                </div>
            </div>

            <div class="md:text-right border-t md:border-t-0 pt-4 md:pt-0">
                <span class="text-xs uppercase tracking-wider font-semibold text-gray-400 block">Bei ya Nyumba</span>
                <span class="text-3xl sm:text-4xl font-extrabold text-[#750D15] block mt-1">
                    {{ $house->formatted_price }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Gallery -->
                <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border border-gray-100 space-y-4">
                    <div class="relative aspect-[16/10] rounded-xl overflow-hidden bg-gray-100 cursor-pointer" @click="lightboxOpen = true">
                        <img :src="activeImage" alt="{{ $house->title }}" class="w-full h-full object-cover">
                        <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-md text-white text-xs px-3 py-1.5 rounded-lg flex items-center space-x-1 font-semibold">
                            <span>Bonyeza Kukuza Picha</span>
                        </div>
                    </div>

                    @if($house->images->count() > 0)
                        <div class="flex items-center space-x-3 overflow-x-auto pb-2">
                            <button 
                                type="button"
                                @click="activeImage = '{{ $house->display_image }}'"
                                class="w-20 h-16 rounded-lg overflow-hidden border-2 shrink-0 transition"
                                :class="activeImage === '{{ $house->display_image }}' ? 'border-[#750D15]' : 'border-transparent opacity-70'"
                            >
                                <img src="{{ $house->display_image }}" class="w-full h-full object-cover">
                            </button>
                            @foreach($house->images as $img)
                                <button 
                                    type="button"
                                    @click="activeImage = '{{ $img->url }}'"
                                    class="w-20 h-16 rounded-lg overflow-hidden border-2 shrink-0 transition"
                                    :class="activeImage === '{{ $img->url }}' ? 'border-[#750D15]' : 'border-transparent opacity-70'"
                                >
                                    <img src="{{ $img->url }}" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Key Specs Grid -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="p-4 rounded-xl bg-[#FDF5F6] border border-[#F9E4E7]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Vyumba vya Kulala</span>
                        <span class="text-base font-extrabold text-[#750D15] mt-0.5 block">{{ $house->bedrooms }} Vyumba</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FDF5F6] border border-[#F9E4E7]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Vyoo & Bafu</span>
                        <span class="text-base font-extrabold text-[#750D15] mt-0.5 block">{{ $house->bathrooms }} Bafu</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FDF5F6] border border-[#F9E4E7]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Ukubwa wa Kiwanja</span>
                        <span class="text-base font-extrabold text-[#750D15] mt-0.5 block">{{ $house->plot_size ?? '30m × 30m' }}</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FDF5F6] border border-[#F9E4E7]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Ukubwa wa Nyumba</span>
                        <span class="text-base font-extrabold text-[#750D15] mt-0.5 block">{{ $house->house_size ?? '200 SQM' }}</span>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 space-y-4">
                    <h2 class="text-xl font-bold text-[#280508] border-b border-gray-100 pb-3">
                        Maelezo ya Nyumba
                    </h2>
                    <div class="prose max-w-none text-gray-700 text-sm sm:text-base leading-relaxed">
                        {!! nl2br(e($house->description)) !!}
                    </div>
                </div>

                <!-- Features List -->
                @if(!empty($house->features) && count($house->features) > 0)
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 space-y-4">
                    <h2 class="text-xl font-bold text-[#280508] border-b border-gray-100 pb-3">
                        Sifa na Vifaa vya Nyumba
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                        @foreach($house->features as $feature)
                            <div class="flex items-center space-x-2 text-gray-700">
                                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <!-- Sticky Right Contact Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 sticky top-28 space-y-6">
                    
                    <div class="bg-pfi-gradient text-white p-5 rounded-xl space-y-2">
                        <span class="text-xs font-semibold text-[#FAC955] uppercase tracking-wider">Mawasiliano ya Moja kwa Moja</span>
                        <h3 class="text-lg font-bold text-white">Unataka Nyumba Hii?</h3>
                        <p class="text-xs text-gray-200 leading-relaxed">
                            Wasiliana nasi kwa WhatsApp au simu ili kupanga ratiba ya kuitembelea na kukamilisha taratibu.
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
                            class="w-full bg-[#FDF5F6] hover:bg-[#F9E4E7] text-[#750D15] border border-[#750D15]/30 py-3.5 px-4 rounded-xl font-bold text-sm transition flex items-center justify-center space-x-2"
                        >
                            <span>📞 PIGA SIMU</span>
                        </a>
                    </div>

                    <!-- Direct Inquiry Form -->
                    <div class="border-t border-gray-100 pt-6 space-y-4">
                        <h4 class="font-bold text-sm text-gray-900">Tuma Ombi / Swali:</h4>
                        <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-3">
                            @csrf
                            <input type="hidden" name="house_id" value="{{ $house->id }}">
                            <input type="hidden" name="category" value="nyumba">
                            
                            <div>
                                <input type="text" name="name" required placeholder="Jina Lako *" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#750D15] focus:outline-none">
                            </div>
                            <div>
                                <input type="tel" name="phone" required placeholder="Namba ya Simu *" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#750D15] focus:outline-none">
                            </div>
                            <div>
                                <textarea name="message" rows="3" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#750D15] focus:outline-none resize-none">Habari, ninahitaji taarifa zaidi na kuona nyumba hii [{{ $house->house_reference }} - {{ $house->title }}].</textarea>
                            </div>
                            <button type="submit" class="w-full bg-pfi-gradient text-white py-3 rounded-xl font-bold text-xs shadow hover:brightness-110 transition">
                                TUMA OMBI LA UKAGUZI
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div x-show="lightboxOpen" x-transition class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4">
        <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white text-3xl font-bold hover:text-[#FAC955] transition">✕</button>
        <img :src="activeImage" class="max-w-full max-h-[90vh] object-contain rounded-xl">
    </div>
</div>

<!-- Mobile Sticky Bottom Bar -->
<div class="lg:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-gray-200 p-3 flex items-center space-x-3 shadow-2xl">
    <a href="{{ $whatsappUrl }}" target="_blank" class="flex-1 bg-[#25D366] text-white py-3 rounded-xl font-bold text-xs flex items-center justify-center space-x-1 shadow">
        <span>💬 WHATSAPP</span>
    </a>
    <a href="tel:{{ $phone }}" class="flex-1 bg-pfi-gradient text-white py-3 rounded-xl font-bold text-xs flex items-center justify-center space-x-1 shadow">
        <span>📞 PIGA SIMU</span>
    </a>
</div>

@endsection
