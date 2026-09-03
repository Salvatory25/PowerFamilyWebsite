@extends('layouts.app')

@section('title', 'Sera ya Faragha — Power Family Investment')

@section('content')

<div class="py-16 bg-neutral-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="bg-white rounded-2xl p-8 sm:p-12 shadow-sm border border-gray-100 space-y-6">
            <h1 class="text-3xl font-extrabold text-[#280508]">Sera ya Faragha (Privacy Policy)</h1>
            <p class="text-xs text-gray-500">Ilisasishwa mwisho: {{ date('F Y') }}</p>

            <div class="prose max-w-none text-gray-700 text-sm leading-relaxed space-y-4">
                <h2 class="text-lg font-bold text-gray-900">1. Ukusanyaji wa Taarifa</h2>
                <p>Power Family Investment inakusanya taarifa unazotoa kwa hiari unapojaza fomu za maulizo au kuwasiliana nasi kupitia WhatsApp au simu (kama vile jina lako, namba ya simu na barua pepe).</p>

                <h2 class="text-lg font-bold text-gray-900">2. Matumizi ya Taarifa</h2>
                <p>Taarifa zako hutumika pekee kwa ajili ya kujibu maulizo yako, kupanga ratiba za ukaguzi wa viwanja au nyumba, na kukupa huduma stahiki unazozihitaji.</p>

                <h2 class="text-lg font-bold text-gray-900">3. Usalama wa Taarifa</h2>
                <p>Tunazingatia viwango vya juu vya usalama kulinda taarifa zako binafsi na hatuuzi au kugawa taarifa zako kwa wahusika wengine wasiohusika na huduma zetu.</p>

                <h2 class="text-lg font-bold text-gray-900">4. Mawasiliano</h2>
                <p>Ikiwa una maswali yoyote kuhusu sera hii, tafadhali wasiliana nasi kupitia ukurasa wetu wa mawasiliano.</p>
            </div>
        </div>
    </div>
</div>

@endsection
