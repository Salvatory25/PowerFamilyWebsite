@extends('layouts.app')

@section('title', $article->title . ' — Power Family Investment')

@section('content')

<!-- Breadcrumbs -->
<div class="bg-white border-b border-gray-100 py-3.5">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-xs font-semibold text-gray-500 flex items-center space-x-2">
        <a href="{{ route('home') }}" class="hover:text-[#750D15]">Mwanzo</a>
        <span>/</span>
        <a href="{{ route('pages.blog') }}" class="hover:text-[#750D15]">Elimu ya Uwekezaji</a>
        <span>/</span>
        <span class="text-gray-900 truncate">{{ $article->title }}</span>
    </div>
</div>

<article class="py-12 bg-neutral-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header Container -->
        <div class="bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-gray-100 space-y-4">
            <span class="px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-pfi-gradient text-[#FAC955] border border-[#D48B16]/40 inline-block">
                {{ $article->category ?? 'Mwongozo wa Uwekezaji' }}
            </span>
            <h1 class="text-2xl sm:text-4xl font-extrabold text-[#280508] leading-tight">
                {{ $article->title }}
            </h1>
            <div class="flex items-center space-x-4 text-xs text-gray-500 pt-2 border-t border-gray-100">
                <span>Imechapishwa: {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : '' }}</span>
                <span>&bull;</span>
                <span>Power Family Editorial</span>
            </div>
        </div>

        <!-- Featured Image -->
        @if($article->featured_image_url)
            <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100 aspect-[16/9] bg-gray-100">
                <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Article Content -->
        <div class="bg-white rounded-2xl p-6 sm:p-10 shadow-sm border border-gray-100">
            <div class="prose max-w-none text-gray-800 text-sm sm:text-base leading-relaxed space-y-4">
                {!! nl2br(e($article->content)) !!}
            </div>
        </div>

        <!-- Share / CTA -->
        <div class="bg-pfi-gradient text-white rounded-2xl p-8 shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="space-y-1 text-center md:text-left">
                <h3 class="text-xl font-bold">Unahitaji Ushauri Zaidi wa Kitaalamu?</h3>
                <p class="text-xs text-gray-200">Wasiliana na wataalamu wetu wa Power Family Investment kwa ushauri bila malipo.</p>
            </div>
            <a href="{{ route('pages.contact') }}" class="bg-gold-gradient text-[#1C0305] px-6 py-3 rounded-xl font-bold text-xs shadow hover:brightness-110 transition shrink-0">
                WASILIANA NASI LEO
            </a>
        </div>

    </div>
</article>

@endsection
