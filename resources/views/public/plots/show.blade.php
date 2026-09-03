@extends('layouts.app')

@section('title', $plot->title . ' — Power Family Investment')

@section('content')

@php
    $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '255759423626');
    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsappNumber);
    $phone = \App\Models\Setting::get('company_phone', '+255 759 423 626');
@endphp

<!-- Breadcrumbs Bar -->
<div class="bg-white border-b border-gray-100 py-3.5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-xs font-semibold text-gray-500 flex items-center space-x-2">
        <a href="{{ route('home') }}" class="hover:text-[#750D15]">Mwanzo</a>
        <span>/</span>
        <a href="{{ route('plots.index') }}" class="hover:text-[#750D15]">Viwanja</a>
        <span>/</span>
        <span class="text-gray-900 truncate max-w-xs sm:max-w-md">{{ $plot->title }}</span>
    </div>
</div>

<div class="py-10 bg-neutral-50" x-data="{ activeImage: '{{ $plot->featured_image_url }}', lightboxOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Top Title & Price Header -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2">
                <div class="flex items-center space-x-3">
                    <span class="px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider shadow-sm {{ $plot->status_badge_classes }}">
                        {{ $plot->status_label }}
                    </span>
                    <span class="px-3 py-1 rounded-md text-xs font-bold bg-[#FDF5F6] text-[#750D15] border border-[#F9E4E7]">
                        Ref: {{ $plot->plot_reference }}
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#280508]">
                    {{ $plot->title }}
                </h1>
                <div class="flex items-center text-xs sm:text-sm font-semibold text-gray-600 space-x-2">
                    <svg class="w-4 h-4 text-[#750D15]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>{{ $plot->full_location }}</span>
                </div>
            </div>

            <div class="md:text-right border-t md:border-t-0 pt-4 md:pt-0">
                <span class="text-xs uppercase tracking-wider font-semibold text-gray-400 block">Bei ya Mauzo</span>
                <span class="text-3xl sm:text-4xl font-extrabold text-[#750D15] block mt-1">
                    {{ $plot->formatted_price }}
                </span>
                <span class="text-xs text-gray-500 font-medium">Inalipika kwa Makubaliano</span>
            </div>
        </div>

        <!-- Main Content Layout (Left Details + Right Sticky Contact) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left 2 Cols: Gallery & Information -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Image Gallery -->
                <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-sm border border-gray-100 space-y-4">
                    <!-- Main Big Image -->
                    <div class="relative aspect-[16/10] rounded-xl overflow-hidden bg-gray-100 cursor-pointer" @click="lightboxOpen = true">
                        <img :src="activeImage" alt="{{ $plot->title }}" class="w-full h-full object-cover">
                        <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-md text-white text-xs px-3 py-1.5 rounded-lg flex items-center space-x-1 font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                            <span>Bonyeza Kukuza Picha</span>
                        </div>
                    </div>

                    <!-- Thumbnails -->
                    @if($plot->images->count() > 0)
                        <div class="flex items-center space-x-3 overflow-x-auto pb-2">
                            <button 
                                type="button"
                                @click="activeImage = '{{ $plot->featured_image_url }}'"
                                class="w-20 h-16 rounded-lg overflow-hidden border-2 shrink-0 transition"
                                :class="activeImage === '{{ $plot->featured_image_url }}' ? 'border-[#750D15] ring-2 ring-[#750D15]/30' : 'border-transparent opacity-70 hover:opacity-100'"
                            >
                                <img src="{{ $plot->featured_image_url }}" class="w-full h-full object-cover">
                            </button>
                            @foreach($plot->images as $img)
                                <button 
                                    type="button"
                                    @click="activeImage = '{{ $img->url }}'"
                                    class="w-20 h-16 rounded-lg overflow-hidden border-2 shrink-0 transition"
                                    :class="activeImage === '{{ $img->url }}' ? 'border-[#750D15] ring-2 ring-[#750D15]/30' : 'border-transparent opacity-70 hover:opacity-100'"
                                >
                                    <img src="{{ $img->url }}" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Key Attributes Bar -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="p-4 rounded-xl bg-[#FDF5F6] border border-[#F9E4E7]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Ukubwa</span>
                        <span class="text-base font-extrabold text-[#750D15] mt-0.5 block">{{ $plot->formatted_size }}</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FDF5F6] border border-[#F9E4E7]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Matumizi</span>
                        <span class="text-base font-extrabold text-[#750D15] mt-0.5 block">{{ $plot->plotType?->name_sw ?? 'Makazi' }}</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FDF5F6] border border-[#F9E4E7]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Hali ya Nyaraka</span>
                        <span class="text-base font-extrabold text-[#750D15] mt-0.5 block">{{ $plot->ownership_title_type ?? 'Kimepimwa' }}</span>
                    </div>
                    <div class="p-4 rounded-xl bg-[#FDF5F6] border border-[#F9E4E7]">
                        <span class="text-[11px] font-semibold text-gray-500 uppercase block">Upatikanaji</span>
                        <span class="text-base font-extrabold text-emerald-600 mt-0.5 block">{{ $plot->status_label }}</span>
                    </div>
                </div>

                <!-- Detailed Description -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 space-y-4">
                    <h2 class="text-xl font-bold text-[#280508] border-b border-gray-100 pb-3">
                        Maelezo ya Kina ya Kiwanja
                    </h2>
                    <div class="prose max-w-none text-gray-700 text-sm sm:text-base leading-relaxed">
                        {!! nl2br(e($plot->description)) !!}
                    </div>
                </div>

                <!-- Features & Amenities Checklist -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 space-y-4">
                    <h2 class="text-xl font-bold text-[#280508] border-b border-gray-100 pb-3">
                        Sifa Kuu za Eneo
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                        <div class="flex items-center space-x-2 text-gray-700">
                            <svg class="w-5 h-5 {{ $plot->has_electricity ? 'text-emerald-500' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            <span>Huduma ya Umeme: <strong>{{ $plot->has_electricity ? 'Ipo Karibu / Tayari' : 'Inakuja' }}</strong></span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-700">
                            <svg class="w-5 h-5 {{ $plot->has_water ? 'text-emerald-500' : 'text-gray-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                            <span>Huduma ya Maji: <strong>{{ $plot->has_water ? 'Ipo / Inafika' : 'Mradi unakaribia' }}</strong></span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-700">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Barabara: <strong>{{ $plot->road_accessibility ?? 'Inafikika vizuri kwa gari' }}</strong></span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-700">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Hali ya Ardhi: <strong>{{ $plot->topography ?? 'Tambarare' }}</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Interactive Map / Location Coordinates Area -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-100 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <div>
                            <h2 class="text-xl font-bold text-[#280508]">
                                Ramani ya Eneo (Location Map)
                            </h2>
                            <p class="text-xs text-gray-500 mt-0.5">
                                📍 {{ $plot->full_location }}
                            </p>
                        </div>
                        <a 
                            href="https://maps.google.com/maps?q={{ urlencode($plot->full_location) }}" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-lg bg-[#FDF5F6] text-[#750D15] hover:bg-[#750D15] hover:text-white transition text-xs font-bold border border-[#750D15]/20"
                        >
                            <span>Fungua Google Maps</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>

                    <div class="aspect-[16/9] w-full rounded-2xl overflow-hidden bg-gray-100 relative border border-gray-200 shadow-inner">
                        <iframe 
                            src="{{ $plot->map_embed_url }}" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Ramani ya {{ $plot->title }}"
                        ></iframe>
                    </div>

                    <div class="flex items-center justify-between text-xs text-gray-500 pt-1">
                        <span class="flex items-center space-x-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span>Eneo limethibitishwa na wataalamu wa Power Family Investment</span>
                        </span>
                        <span class="text-[11px] font-semibold text-[#D48B16]">
                            Site Visit inapatikana kila wiki
                        </span>
                    </div>
                </div>

            </div>

            <!-- Right 1 Col: Sticky Desktop Contact Box -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100 sticky top-28 space-y-6">
                    
                    <div class="bg-pfi-gradient text-white p-5 rounded-xl space-y-2">
                        <span class="text-xs font-semibold text-[#FAC955] uppercase tracking-wider">Mawasiliano ya Moja kwa Moja</span>
                        <h3 class="text-lg font-bold text-white">Unahitaji Kiwanja Hiki?</h3>
                        <p class="text-xs text-gray-200 leading-relaxed">
                            Wasiliana na msimamizi wetu kupitia WhatsApp au simu ili kupata taarifa zote na kupanga ratiba ya kutembelea.
                        </p>
                    </div>

                    <!-- Direct Actions -->
                    <div class="space-y-3">
                        <a 
                            href="{{ $plot->whatsapp_inquiry_url }}" 
                            target="_blank" 
                            class="w-full bg-[#25D366] text-white py-3.5 px-4 rounded-xl font-bold text-sm shadow-md hover:brightness-110 active:scale-95 transition flex items-center justify-center space-x-2"
                        >
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.777.78 2.796.78 3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.518-4.482 10-10 10-1.748 0-3.385-.45-4.819-1.238l-7.181 1.884 1.918-7.009c-.878-1.493-1.385-3.23-1.385-5.084 0-5.518 4.482-10 10-10s10 4.482 10 10z"/></svg>
                            <span>💬 WASILIANA WHATSAPP</span>
                        </a>

                        <a 
                            href="tel:{{ $phone }}" 
                            class="w-full bg-[#FDF5F6] hover:bg-[#F9E4E7] text-[#750D15] border border-[#750D15]/30 py-3.5 px-4 rounded-xl font-bold text-sm transition flex items-center justify-center space-x-2"
                        >
                            <svg class="w-5 h-5 text-[#750D15]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>📞 PIGA SIMU</span>
                        </a>
                    </div>

                    <!-- Direct Inquiry Form -->
                    <div class="border-t border-gray-100 pt-6 space-y-4">
                        <h4 class="font-bold text-sm text-gray-900">Au Tuma Ombi Hapa:</h4>
                        <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-3">
                            @csrf
                            <input type="hidden" name="plot_id" value="{{ $plot->id }}">
                            <input type="hidden" name="category" value="kiwanja">
                            
                            <div>
                                <input type="text" name="name" required placeholder="Jina Lako *" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#750D15] focus:outline-none">
                            </div>
                            <div>
                                <input type="tel" name="phone" required placeholder="Namba ya Simu *" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#750D15] focus:outline-none">
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Barua Pepe (Email)" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#750D15] focus:outline-none">
                            </div>
                            <div>
                                <textarea name="message" rows="3" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2.5 text-xs focus:ring-2 focus:ring-[#750D15] focus:outline-none resize-none">Habari, ninahitaji taarifa zaidi na kupanga ratiba ya kuona kiwanja hiki [{{ $plot->plot_reference }} - {{ $plot->title }}].</textarea>
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

    <!-- Fullscreen Lightbox Modal -->
    <div x-show="lightboxOpen" x-transition class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4">
        <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white text-3xl font-bold hover:text-[#FAC955] transition">✕</button>
        <img :src="activeImage" class="max-w-full max-h-[90vh] object-contain rounded-xl">
    </div>
</div>

<!-- Mobile Sticky Bottom Conversion Bar -->
<div class="lg:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-gray-200 p-3 flex items-center space-x-3 shadow-2xl">
    <a 
        href="{{ $plot->whatsapp_inquiry_url }}" 
        target="_blank" 
        class="flex-1 bg-[#25D366] text-white py-3 rounded-xl font-bold text-xs flex items-center justify-center space-x-1 shadow"
    >
        <span>💬 WHATSAPP</span>
    </a>
    <a 
        href="tel:{{ $phone }}" 
        class="flex-1 bg-pfi-gradient text-white py-3 rounded-xl font-bold text-xs flex items-center justify-center space-x-1 shadow"
    >
        <span>📞 PIGA SIMU</span>
    </a>
</div>

@endsection
