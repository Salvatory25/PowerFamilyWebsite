@props(['plot'])

<div class="group relative bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col luxury-card-hover hover:border-[#D48B16]/50">
    <!-- Image & Badges Container -->
    <div class="relative h-64 w-full bg-slate-100 overflow-hidden">
        <img src="{{ $plot->featured_image_url }}" 
             alt="{{ $plot->title }}" 
             class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
             loading="lazy">

        <!-- Top Badges Overlay -->
        <div class="absolute top-3 inset-x-3 flex items-center justify-between pointer-events-none">
            <!-- Availability Badge -->
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wide shadow-sm {{ $plot->status_badge_classes }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $plot->listing_status === 'available' ? 'bg-emerald-500 animate-pulse' : ($plot->listing_status === 'reserved' ? 'bg-amber-500' : 'bg-rose-500') }}"></span>
                {{ $plot->status_label }}
            </span>

            <!-- Featured Badge -->
            @if($plot->is_featured)
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#280508]/90 backdrop-blur-md text-[#FAC955] text-xs font-extrabold ring-1 ring-[#D48B16]/50 shadow-sm">
                    <svg class="w-3.5 h-3.5 fill-[#FAC955]" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    {{ __('app.featured') }}
                </span>
            @endif
        </div>

        <!-- Bottom Tag Overlay -->
        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-[#280508]/85 backdrop-blur-md text-white text-xs font-semibold">
                <svg class="w-3.5 h-3.5 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                {{ $plot->plotType?->name ?? 'Plot' }}
            </span>

            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-[#750D15]/90 backdrop-blur-md text-[#f5e9c9] text-xs font-bold ring-1 ring-[#D48B16]/40">
                <svg class="w-3.5 h-3.5 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                {{ $plot->formatted_size }}
            </span>
        </div>
    </div>

    <!-- Details Body -->
    <div class="p-5 flex-1 flex flex-col justify-between">
        <div>
            <!-- Location & Ref -->
            <div class="flex items-center justify-between text-xs text-slate-500 mb-2">
                <span class="flex items-center gap-1 font-bold text-[#750D15]">
                    <svg class="w-3.5 h-3.5 text-[#D48B16] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    {{ $plot->location?->area_name }}, {{ $plot->location?->district }}
                </span>
                <span class="font-mono text-[11px] text-slate-400 font-semibold">{{ $plot->plot_reference }}</span>
            </div>

            <!-- Title -->
            <h3 class="font-bold text-slate-900 text-base leading-snug group-hover:text-[#750D15] transition line-clamp-2">
                <a href="{{ route('plots.show', $plot->slug) }}">
                    {{ $plot->title }}
                </a>
            </h3>

            <!-- Title Deed & Documentation Badge -->
            <div class="mt-3 flex items-center gap-1.5 text-xs text-[#750D15] bg-[#fbf6ea] p-2 rounded-lg border border-[#f5e9c9]">
                <svg class="w-4 h-4 text-[#D48B16] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <span class="truncate font-bold">{{ $plot->ownership_title_type }}</span>
            </div>

            <!-- Short description -->
            @if($plot->short_description)
                <p class="mt-2 text-xs text-slate-500 line-clamp-2 leading-relaxed">
                    {{ $plot->short_description }}
                </p>
            @endif
        </div>

        <!-- Bottom Price & CTA Bar -->
        <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between gap-3">
            <div>
                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block">Price</span>
                <div class="flex items-baseline gap-1">
                    <span class="font-extrabold text-[#750D15] text-lg sm:text-xl tracking-tight">{{ $plot->formatted_price }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-2">
                <!-- WhatsApp Quick Button -->
                <a href="{{ $plot->whatsapp_inquiry_url }}" target="_blank" rel="noopener" class="p-2.5 rounded-xl bg-[#fbf6ea] text-[#750D15] hover:bg-[#D48B16] hover:text-white transition shadow-xs border border-[#f5e9c9]" title="{{ __('app.enquire_whatsapp') }}">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                </a>

                <!-- Details Button -->
                <a href="{{ route('plots.show', $plot->slug) }}" class="px-3.5 py-2.5 rounded-xl bg-[#750D15] hover:bg-[#280508] text-white text-xs font-bold transition shadow-xs border border-[#D48B16]/30">
                    {{ __('app.view_details') }}
                </a>
            </div>
        </div>
    </div>
</div>
