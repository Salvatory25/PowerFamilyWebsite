@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
@endphp

@section('title', ($isSw ? 'Makala & Mwongozo wa Elimu ya Ardhi' : 'Land Insights & Advisory Articles') . ' | RELAND')
@section('meta_description', $isSw ? 'Pata elimu ya kisheria na kiufundi kuhusu upimaji wa ardhi, urasimishaji wa makazi, hati miliki na uwekezaji salama Tanzania.' : 'Authoritative guides on land surveying, formalization, title deeds due diligence, and secure property investment in Tanzania.')

@section('content')

<!-- Header Banner -->
<div class="bg-[#0c1c34] text-white py-16 lg:py-20 border-b border-[#c89a3b]/20 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-15 bg-[radial-gradient(circle_at_top_right,rgba(200,154,59,0.25),transparent_50%)]"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#c89a3b]/15 text-[#dfb256] text-xs font-extrabold tracking-wider uppercase border border-[#c89a3b]/30">
            Land Advisory & Knowledge
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
            {{ $isSw ? 'Makala & Elimu ya Ardhi' : 'Land Insights & Advisory' }}
        </h1>
        <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto">
            {{ $isSw ? 'Miongozo ya kitaalamu ya kisheria na kiufundi ili kukuwezesha kumiliki na kuendeleza ardhi yako kwa amani na usalama.' : 'Expert legal and technical guides designed to help property owners, developers, and diaspora navigate land ownership with confidence.' }}
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Article 1 -->
        <article class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-xs hover:shadow-xl transition flex flex-col justify-between group">
            <div class="p-6 sm:p-8 space-y-4">
                <span class="px-2.5 py-1 rounded-lg bg-[#fbf6ea] text-[#16325c] text-[10px] font-extrabold uppercase border border-[#f5e9c9]">
                    {{ $isSw ? 'Upimaji wa Ardhi' : 'Cadastral Surveying' }}
                </span>
                <h2 class="text-lg font-extrabold text-[#16325c] group-hover:text-[#c89a3b] transition leading-snug">
                    {{ $isSw ? 'Kwanini ni Hatari Kujenga au Kununua Eneo Kabla ya Kupima Beacons Rasmi?' : 'Why Building or Purchasing Without Cadastral Beacons Verification Puts Your Investment at Risk' }}
                </h2>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $isSw ? 'Kujenga kwa kukadiria mipaka kunasababisha uvunjaji wa kuta, kesi za kisheria na majirani na hasara ya mamilioni ya fedha. Jifunze jinsi upimaji wa RTK GPS unavyolinda uwekezaji wako.' : 'Boundary encroachment and missing corner beacons are leading causes of property demolition and litigation. Learn how geodetic surveys protect property boundaries.' }}
                </p>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between mt-4">
                <span class="text-[11px] text-slate-400 font-medium">5 Min Read</span>
                <a href="{{ route('services.show', 'land-surveying') }}" class="text-xs font-bold text-[#16325c] hover:text-[#c89a3b] transition">
                    {{ $isSw ? 'Soma Huduma Husika' : 'Related Service' }} &rarr;
                </a>
            </div>
        </article>

        <!-- Article 2 -->
        <article class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-xs hover:shadow-xl transition flex flex-col justify-between group">
            <div class="p-6 sm:p-8 space-y-4">
                <span class="px-2.5 py-1 rounded-lg bg-[#fbf6ea] text-[#16325c] text-[10px] font-extrabold uppercase border border-[#f5e9c9]">
                    {{ $isSw ? 'Urasimishaji' : 'Formalization' }}
                </span>
                <h2 class="text-lg font-extrabold text-[#16325c] group-hover:text-[#c89a3b] transition leading-snug">
                    {{ $isSw ? 'Mchakato Kamili wa Kurasimisha Makazi Yasiyopangwa Tanzania' : 'Complete Step-by-Step Guide to Settlement Formalization (Urasimishaji) in Tanzania' }}
                </h2>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $isSw ? 'Kuanzia utambuzi wa mtaa, uchoraji wa ramani ya Mipango Mji, kupitishwa na Baraza la Madiwani hadi kupokea Hati Miliki ya miaka 99.' : 'Understanding the multi-stage roadmap from community boundary mobilization and layout schemes to official Commissioner approvals and title deed issuance.' }}
                </p>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between mt-4">
                <span class="text-[11px] text-slate-400 font-medium">7 Min Read</span>
                <a href="{{ route('services.show', 'land-formalization') }}" class="text-xs font-bold text-[#16325c] hover:text-[#c89a3b] transition">
                    {{ $isSw ? 'Soma Huduma Husika' : 'Related Service' }} &rarr;
                </a>
            </div>
        </article>

        <!-- Article 3 -->
        <article class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-xs hover:shadow-xl transition flex flex-col justify-between group">
            <div class="p-6 sm:p-8 space-y-4">
                <span class="px-2.5 py-1 rounded-lg bg-[#fbf6ea] text-[#16325c] text-[10px] font-extrabold uppercase border border-[#f5e9c9]">
                    {{ $isSw ? 'Ushauri wa Kisheria' : 'Legal Due Diligence' }}
                </span>
                <h2 class="text-lg font-extrabold text-[#16325c] group-hover:text-[#c89a3b] transition leading-snug">
                    {{ $isSw ? 'Mambo 5 ya Kukagua Wizara ya Ardhi Kabla ya Kulipia Kiwanja Arusha' : '5 Essential Registry Checks at the Ministry of Lands Before Paying for a Plot in Arusha' }}
                </h2>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $isSw ? 'Jinsi ya kufanya Official Search, kukagua ramani ya upimaji (Deed Plan), uhakiki wa mikataba ya mauziano na kuzuia utapeli wa kuuziwa kiwanja hewa.' : 'How to conduct official encumbrance searches, verify town planning zoning, examine deed plans, and ensure you are buying directly from the legitimate owner.' }}
                </p>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between mt-4">
                <span class="text-[11px] text-slate-400 font-medium">6 Min Read</span>
                <a href="{{ route('services.show', 'land-consultation') }}" class="text-xs font-bold text-[#16325c] hover:text-[#c89a3b] transition">
                    {{ $isSw ? 'Soma Huduma Husika' : 'Related Service' }} &rarr;
                </a>
            </div>
        </article>
    </div>
</div>

@endsection
