@extends('layouts.app')

@section('title', 'Vigezo na Masharti — Power Family Investment')

@section('content')

<div class="py-16 bg-neutral-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="bg-white rounded-2xl p-8 sm:p-12 shadow-sm border border-gray-100 space-y-6">
            <h1 class="text-3xl font-extrabold text-[#280508]">Vigezo na Masharti (Terms & Conditions)</h1>
            <p class="text-xs text-gray-500">Ilisasishwa mwisho: {{ date('F Y') }}</p>

            <div class="prose max-w-none text-gray-700 text-sm leading-relaxed space-y-4">
                <h2 class="text-lg font-bold text-gray-900">1. Utangulizi</h2>
                <p>Kwa kutumia tovuti hii ya Power Family Investment, unakubaliana na vigezo na masharti haya ya matumizi. Ikiwa hukubaliani na sehemu yoyote, tafadhali usiendelee kutumia tovuti hii.</p>

                <h2 class="text-lg font-bold text-gray-900">2. Taarifa za Mali & Bei</h2>
                <p>Taarifa zote za viwanja, nyumba na magari zinazowekwa kwenye tovuti hii hutolewa kwa nia njema na huboreshwa mara kwa mara. Hata hivyo, uthibitisho rasmi wa mwisho wa bei na upatikanaji hufanyika ofisini wakati wa kufanya ukaguzi halisi.</p>

                <h2 class="text-lg font-bold text-gray-900">3. Ukaguzi wa Eneo (Site Visits)</h2>
                <p>Tunawashauri wateja wote kufanya ukaguzi wa kimwili wa kiwanja au mali kabla ya kufanya malipo yoyote ya ununuzi.</p>

                <h2 class="text-lg font-bold text-gray-900">4. Marekebisho</h2>
                <p>Power Family Investment inahifadhi haki ya kubadilisha vigezo hivi wakati wowote bila taarifa ya awali.</p>
            </div>
        </div>
    </div>
</div>

@endsection
