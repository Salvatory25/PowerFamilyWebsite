@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
@endphp

@section('title', ($isSw ? 'Huduma za Kitaalamu za Upimaji na Urasimishaji wa Ardhi' : 'Professional Land Surveying & Formalization Services') . ' | RELAND CONSULT LTD')
@section('meta_description', $isSw ? 'Upimaji wa ardhi, urasimishaji wa makazi, ugawaji wa viwanja, uhakiki wa mipaka na hati miliki Arusha na kanda ya kaskazini.' : 'Cadastral land surveying, settlement formalization, plot subdivisions, beacon demarcation, and title deed due diligence in Arusha, Tanzania.')

@section('content')
<!-- Header Banner -->
<div class="bg-[#0c1c34] text-white py-16 lg:py-20 border-b border-[#c89a3b]/20 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-15 bg-[radial-gradient(circle_at_top_right,rgba(200,154,59,0.25),transparent_50%)]"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#c89a3b]/15 text-[#dfb256] text-xs font-extrabold tracking-wider uppercase border border-[#c89a3b]/30">
            RELAND CONSULT LTD &bull; Professional Solutions
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
            {{ __('app.services_heading') }}
        </h1>
        <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto">
            {{ __('app.services_subheading') }}
        </p>
    </div>
</div>

<!-- 6 Core Services Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($services as $slug => $service)
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs hover:shadow-2xl transition-all duration-300 flex flex-col justify-between hover:border-[#c89a3b]/50 group">
                <div class="space-y-4">
                    <div class="w-14 h-14 rounded-2xl bg-[#fbf6ea] text-[#16325c] group-hover:bg-[#16325c] group-hover:text-[#dfb256] flex items-center justify-center font-bold transition duration-300 border border-[#f5e9c9]">
                        @if($service['icon'] === 'surveying')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        @elseif($service['icon'] === 'formalization')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        @elseif($service['icon'] === 'subdivision')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                        @elseif($service['icon'] === 'demarcation')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        @elseif($service['icon'] === 'consultation')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        @else
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        @endif
                    </div>

                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#c89a3b] block mb-1">
                            {{ $isSw ? $service['badge_sw'] : $service['badge_en'] }}
                        </span>
                        <h2 class="text-xl font-extrabold text-[#16325c] group-hover:text-[#c89a3b] transition">
                            {{ $isSw ? $service['title_sw'] : $service['title_en'] }}
                        </h2>
                    </div>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        {{ $isSw ? $service['subtitle_sw'] : $service['subtitle_en'] }}
                    </p>

                    <div class="pt-2">
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block mb-2">{{ $isSw ? 'Huduma Zinazojumuishwa:' : 'Key Deliverables:' }}</span>
                        <ul class="text-xs text-slate-600 space-y-1.5">
                            @foreach(array_slice($isSw ? $service['deliverables_sw'] : $service['deliverables_en'], 0, 3) as $deliv)
                                <li class="flex items-start gap-1.5">
                                    <span class="text-[#c89a3b] font-bold">✓</span>
                                    <span>{{ $deliv }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('services.show', $service['slug']) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#16325c] group-hover:text-[#c89a3b] transition">
                        <span>{{ $isSw ? 'Soma Zaidi & Mchakato' : 'Full Process & Details' }}</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND, I would like to consult regarding: ' . ($isSw ? $service['title_sw'] : $service['title_en'])) }}" target="_blank" rel="noopener" class="p-2.5 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white transition" title="Consult on WhatsApp">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Consultation Direct CTA Banner -->
<div class="bg-[#16325c] text-white py-16 border-t border-slate-800">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
            {{ $isSw ? 'Je, Unahitaji Ushauri wa Moja kwa Moja Kuhusu Eneo Lako?' : 'Need Authoritative Guidance on Your Land in Arusha?' }}
        </h2>
        <p class="text-xs sm:text-sm text-slate-300 max-w-2xl mx-auto">
            {{ $isSw ? 'Wapimaji wetu waliosajiliwa wapo tayari kukagua nyaraka zako na kukupa mwongozo sahihi wa kisheria na kiufundi.' : 'Our licensed surveyors and urban planning team are available to review your parcel records and provide definitive legal and technical guidance.' }}
        </p>
        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('pages.contact') }}" class="px-6 py-3 rounded-xl bg-[#c89a3b] text-[#0c1c34] font-extrabold text-xs shadow-lg transition hover:bg-[#b5882e]">
                {{ __('app.talk_to_us') }}
            </a>
            <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND Arusha, I would like to book a land services consultation.') }}" target="_blank" rel="noopener" class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-lg transition inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                <span>WhatsApp Hotline</span>
            </a>
        </div>
    </div>
</div>
@endsection
