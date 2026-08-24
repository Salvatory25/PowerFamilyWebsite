@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
@endphp

@section('title', ($isSw ? 'Kuhusu RELAND | Kampuni ya Kitaalamu ya Huduma za Ardhi na Upimaji' : 'About RELAND | Professional Land Services & Surveying Company') . ' &bull; Arusha, Tanzania')
@section('meta_description', $isSw ? 'Kuhusu RELAND CONSULT LTD - Kampuni ya kitaalamu ya upimaji wa ardhi, urasimishaji wa makazi, ugawaji wa viwanja na hati miliki Arusha, Tanzania.' : 'Learn about RELAND CONSULT LTD - Certified land surveying, settlement formalization, plot subdivisions, and verified land sales in Arusha, Tanzania.')

@section('content')

<!-- Header Banner -->
<div class="bg-[#0c1c34] text-white py-16 lg:py-20 border-b border-[#c89a3b]/20 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-15 bg-[radial-gradient(circle_at_top_right,rgba(200,154,59,0.25),transparent_50%)]"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#c89a3b]/15 text-[#dfb256] text-xs font-extrabold tracking-wider uppercase border border-[#c89a3b]/30">
            {{ $isSw ? 'Kuhusu Sisi & Dira Yetu' : 'About RELAND & Our Mission' }}
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
            {{ $isSw ? 'Wataalamu wa Upimaji na Urasimishaji wa Ardhi' : 'Professional Land Surveying & Formalization Solutions' }}
        </h1>
        <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
            {{ $isSw ? 'RELAND ni kampuni ya kitaalamu ya huduma za ardhi inayotoa suluhisho salama la kisheria na kiufundi kwa wananchi, wawekezaji na mashirika kuanzia Arusha na kutanuka kanda zote za Tanzania.' : 'RELAND is a professional land services firm providing institutional surveying, formalization, and plot solutions to help individuals, businesses, and property owners manage land with absolute confidence.' }}
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
    <!-- Story & Core Business Areas Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-5">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="RELAND Consult Ltd" class="h-12 w-auto object-contain">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-[#c89a3b] block">RELAND CONSULT LTD</span>
                    <span class="text-[11px] text-slate-500 font-semibold italic">"Ardhi Yako Mtaji Wako" &bull; Upimaji | Urasimishaji | Hati Miliki</span>
                </div>
            </div>
            
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#16325c] tracking-tight leading-tight">
                {{ $isSw ? 'Kuleta Usahihi, Uwazi na Usalama Katika Sekta ya Ardhi' : 'Bringing Institutional Accuracy & Transparency to Land Ownership' }}
            </h2>
            
            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                {{ $isSw ? 'Ardhi ndiyo rasilimali kuu ya kiuchumi na urithi wa vizazi. Hata hivyo, wamiliki wengi wanakabiliwa na changamoto za kutopimwa kwa maeneo, migogoro ya mipaka na majirani, kuchelewa kwa hati miliki au kutapeliwa na madalali wasio na utaalamu.' : 'Land is the fundamental pillar of generational wealth and economic development. However, property owners and buyers routinely face boundary encroachments, undocumented customary holdings, double allocations, and cumbersome title processing.' }}
            </p>

            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                {{ $isSw ? 'Tofauti na wauzaji wa kawaida wa viwanja au mawakala wa majengo, RELAND inafanya kazi kama kampuni kamili ya ushauri wa kitaalamu wa ardhi ikiongozwa na Wapimaji wa Ardhi waliosajiliwa na Wataalamu wa Mipango Mji.' : 'Unlike conventional real estate marketplaces or informal brokers, RELAND functions as a full-service land consultancy led by registered land surveyors, certified town planners, and legal property advisors.' }}
            </p>

            <div class="pt-2">
                <h3 class="text-xs font-extrabold uppercase tracking-wider text-[#16325c] mb-3">
                    {{ $isSw ? 'Maeneo Yetu Makuu ya Kazi:' : 'Core Business Areas:' }}
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-700">
                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-[#c89a3b] font-bold">1.</span>
                        <span class="font-semibold">{{ $isSw ? 'Upimaji wa Ardhi (Cadastral Surveying)' : 'Land Surveying (Upimaji wa Ardhi)' }}</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-[#c89a3b] font-bold">2.</span>
                        <span class="font-semibold">{{ $isSw ? 'Urasimishaji wa Ardhi & Makazi' : 'Land Formalization (Urasimishaji)' }}</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-[#c89a3b] font-bold">3.</span>
                        <span class="font-semibold">{{ $isSw ? 'Ugawaji wa Viwanja & Demarcation' : 'Plot Subdivision & Demarcation' }}</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 border border-slate-100">
                        <span class="text-[#c89a3b] font-bold">4.</span>
                        <span class="font-semibold">{{ $isSw ? 'Ushauri wa Kisheria & Hati Miliki' : 'Land & Plot Consultation' }}</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 border border-slate-100 col-span-1 sm:col-span-2">
                        <span class="text-[#c89a3b] font-bold">5.</span>
                        <span class="font-semibold">{{ $isSw ? 'Uuzaji wa Viwanja Vilivyohakikiwa (100% Verified)' : 'Verified Plot Sales & Listings' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 h-[480px]">
            <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80" alt="Land Surveying instruments" class="w-full h-full object-cover">
            <div class="absolute bottom-6 left-6 right-6 p-5 rounded-2xl bg-[#0c1c34]/90 backdrop-blur-md text-white border border-[#c89a3b]/30 text-xs space-y-1">
                <span class="font-extrabold text-[#dfb256] block text-sm">Arusha Regional Operations Hub</span>
                <p class="text-slate-300">Primarily operating in Arusha City, Meru, Monduli, Karatu and expanding to all strategic growth corridors across Tanzania.</p>
            </div>
        </div>
    </div>

    <!-- 3 Core Company Standards -->
    <div class="pt-8 border-t border-slate-200">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#16325c] text-center mb-12">
            {{ $isSw ? 'Misingi Yetu ya Kitaasisi' : 'Our Institutional Standards' }}
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-xs space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-[#fbf6ea] text-[#16325c] flex items-center justify-center font-black text-lg border border-[#f5e9c9]">
                    01
                </div>
                <h3 class="font-extrabold text-base text-[#16325c]">{{ $isSw ? 'Usahihi wa Kiwango cha Juu' : 'High-Precision Accuracy' }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $isSw ? 'Tunatumia vifaa vya satellite vya RTK GNSS na Electronic Total Station vinavyopima mipaka kwa usahihi wa milimita.' : 'We deploy high-grade satellite positioning systems and total stations, eliminating boundary errors and costly encroachment conflicts.' }}
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-xs space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-[#fbf6ea] text-[#16325c] flex items-center justify-center font-black text-lg border border-[#f5e9c9]">
                    02
                </div>
                <h3 class="font-extrabold text-base text-[#16325c]">{{ $isSw ? 'Ukaguzi wa Kisheria Wizarani' : 'Registry Due Diligence' }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $isSw ? 'Kila kiwanja au mradi unakaguliwa kwenye masjala ya Wizara ya Ardhi ili kuhakikisha umiliki safi bila migogoro wala madeni.' : 'Every parcel and project undergoes comprehensive official searches at the Ministry of Lands to guarantee clean title status.' }}
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-xs space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-[#fbf6ea] text-[#16325c] flex items-center justify-center font-black text-lg border border-[#f5e9c9]">
                    03
                </div>
                <h3 class="font-extrabold text-base text-[#16325c]">{{ $isSw ? 'Uaminifu & Uwazi 100%' : 'Trust & Transparency' }}</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $isSw ? 'Mikataba ya wazi na mwongozo wa hatua kwa hatua unaomwezesha mteja kuwa na amani wakati wote wa mradi wake.' : 'Clear contracts, transparent milestones, and end-to-end guidance providing property owners complete peace of mind.' }}
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
