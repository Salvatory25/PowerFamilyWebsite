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

<!-- Document Requirements Section -->
<div class="bg-slate-50 py-16 sm:py-24 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-4xl font-black text-[#16325c] tracking-tight mb-4">
                {{ $isSw ? 'Unahitaji Nini Kuanza?' : 'What Do You Need to Start?' }}
            </h2>
            <p class="text-sm sm:text-base text-slate-600 font-medium leading-relaxed">
                {{ $isSw ? 'Ili kuharakisha mchakato wa upimaji au urasimishaji wa ardhi yako, tafadhali andaa baadhi ya nyaraka zifuatazo kulingana na aina ya huduma unayohitaji.' : 'To expedite the surveying or formalization process, please prepare the following documents depending on the service you require.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Doc 1 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-lg shadow-slate-200/50 hover:-translate-y-1 transition transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                </div>
                <h3 class="text-base font-bold text-slate-800 mb-2">{{ $isSw ? 'Utambulisho (ID)' : 'Identification' }}</h3>
                <p class="text-xs text-slate-500 leading-relaxed">{{ $isSw ? 'Nakala ya Kitambulisho cha NIDA, Mpiga Kura au Hati ya Kusafiria ya mmiliki.' : 'Copy of NIDA ID, Voter ID, or Passport of the property owner.' }}</p>
            </div>
            
            <!-- Doc 2 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-lg shadow-slate-200/50 hover:-translate-y-1 transition transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-base font-bold text-slate-800 mb-2">{{ $isSw ? 'Mkataba wa Mauziano' : 'Sales Agreement' }}</h3>
                <p class="text-xs text-slate-500 leading-relaxed">{{ $isSw ? 'Kama umenunua hivi karibuni, mkataba wa mauziano unaothibitisha umiliki.' : 'If recently purchased, a sales agreement proving ownership transfer.' }}</p>
            </div>

            <!-- Doc 3 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-lg shadow-slate-200/50 hover:-translate-y-1 transition transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-[#fbf6ea] text-[#c89a3b] flex items-center justify-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </div>
                <h3 class="text-base font-bold text-slate-800 mb-2">{{ $isSw ? 'Ramani ya Zamani' : 'Old Survey Plan' }}</h3>
                <p class="text-xs text-slate-500 leading-relaxed">{{ $isSw ? 'Kama eneo lilipimwa zamani, ramani ya mchoro (Deed Plan) ya awali inahitajika.' : 'If previously surveyed, an old sketch or Deed Plan is highly useful.' }}</p>
            </div>

            <!-- Doc 4 -->
            <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-lg shadow-slate-200/50 hover:-translate-y-1 transition transform duration-300">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="text-base font-bold text-slate-800 mb-2">{{ $isSw ? 'Barua ya Serikali Mtaa' : 'Local Govt Letter' }}</h3>
                <p class="text-xs text-slate-500 leading-relaxed">{{ $isSw ? 'Barua ya utambulisho kutoka ofisi ya serikali ya mtaa kwa ajili ya urasimishaji.' : 'Introduction letter from local authorities for formalization cases.' }}</p>
            </div>
        </div>

        <div class="mt-10 max-w-3xl mx-auto bg-amber-50 rounded-xl p-4 sm:p-5 border border-amber-200/60 flex items-start gap-3 sm:gap-4">
            <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <div>
                <h4 class="text-sm font-bold text-amber-800">{{ $isSw ? 'Angalizo Muhimu:' : 'Important Note:' }}</h4>
                <p class="text-xs sm:text-sm text-amber-700/80 mt-1">
                    {{ $isSw ? 'Mahitaji ya nyaraka yanaweza kutofautiana kulingana na aina ya huduma, eneo na taratibu za mamlaka husika (Wizara ya Ardhi).' : 'Document requirements may vary depending on the specific service, location, and the current procedures of the Ministry of Lands.' }}
                </p>
            </div>
        </div>
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
