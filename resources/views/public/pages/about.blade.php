@extends('layouts.app')

@section('title', __('app.nav_about') . ' — Power Family Investment')

@section('content')

<!-- Header Banner -->
<div class="bg-[#220325] text-white py-16 border-b border-[#68176E]/30 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#DFB743_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl space-y-3">
            <span class="text-xs font-bold text-[#DFB743] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'KUHUSU KAMPUNI YETU' : 'ABOUT OUR COMPANY' }}
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                Power Family Investment
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                {{ app()->getLocale() === 'sw' ? 'Tunajenga madaraja ya umiliki wa ardhi, nyumba bora na rasilimali imara kwa Watanzania wote.' : 'Empowering Tanzanians through trusted land ownership, modern residences, and asset growth.' }}
            </p>
        </div>
    </div>
</div>

<div class="py-16 bg-neutral-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Story / Overview -->
        <div class="bg-white rounded-2xl p-8 sm:p-12 shadow-sm border border-gray-100 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div class="space-y-4">
                <span class="text-xs font-extrabold text-[#C59B27] uppercase tracking-widest block">Dira Yetu & Utambulisho</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#320635]">
                    Uwekezaji Wenye Uhakika, Uwazi na Thamani ya Kweli
                </h2>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Power Family Investment ni kampuni ya Kitanzania inayolenga kurahisisha na kuweka usalama katika sekta ya uwekezaji wa ardhi, viwanja vya makazi na biashara, nyumba na magari.
                </p>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Lengo letu ni kuhakikisha kila mteja anapata fursa inayolingana na bajeti yake akiwa na uhakika kamili wa nyaraka, mipaka iliyopimwa na ushauri wa kisheria na kiutendaji katika kila hatua.
                </p>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 aspect-[4/3] bg-gray-100">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1000&q=80" alt="Power Family Investment" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Mission, Vision, Values -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm space-y-3">
                <div class="w-12 h-12 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] shadow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-[#320635]">Dira Yetu (Vision)</h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Kuwa kitovu kinachoaminika zaidi Tanzania cha uwekezaji wa ardhi, nyumba za kisasa na magari yenye ubora.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm space-y-3">
                <div class="w-12 h-12 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] shadow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-[#320635]">Dhamira Yetu (Mission)</h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Kutoa huduma safi, za haraka na zenye uwazi mkubwa zinazomwezesha kila mteja kufikia malengo yake ya umiliki wa rasilimali.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm space-y-3">
                <div class="w-12 h-12 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#DFB743] shadow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-[#320635]">Maadili Yetu (Core Values)</h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Uaminifu, Weledi, Kujali Mteja, Uwazi katika Mikataba na Utendaji wa Haki.
                </p>
            </div>
        </div>

        <!-- CTA -->
        <div class="bg-pfi-gradient text-white rounded-2xl p-10 shadow-xl text-center space-y-4">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white">Wekeza Leo. Jenga Kesho na Power Family.</h2>
            <p class="text-sm text-gray-200 max-w-xl mx-auto">Tuko tayari kukushika mkono kuanzia uchaguzi wa eneo hadi kukabidhiwa hati zako za umiliki.</p>
            <div class="pt-2">
                <a href="{{ route('pages.contact') }}" class="inline-block bg-gold-gradient text-[#220325] px-8 py-3.5 rounded-xl font-extrabold text-sm shadow hover:brightness-110 transition">
                    WASILIANA NASI LEO
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
