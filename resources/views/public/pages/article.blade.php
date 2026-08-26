@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
@endphp

@section('title', $article->title . ' | RELAND CONSULT LTD')
@section('meta_description', Str::limit(strip_tags($article->excerpt), 150))

@section('content')
<div class="bg-slate-50 pt-16 lg:pt-24 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Article Header -->
        <div class="mb-10 text-center">
            <a href="{{ route('pages.insights') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#c89a3b] hover:text-[#16325c] transition mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>{{ $isSw ? 'Rudi Kwenye Makala' : 'Back to Insights' }}</span>
            </a>
            
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#16325c] tracking-tight mb-6 leading-tight">
                {{ $article->title }}
            </h1>
            
            <div class="flex items-center justify-center gap-6 text-sm text-slate-500 font-medium">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>{{ $article->published_at ? $article->published_at->format('M d, Y') : 'Recent' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>RELAND Experts</span>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        @if($article->image_url)
            <div class="w-full aspect-[16/9] sm:aspect-[2/1] rounded-3xl overflow-hidden shadow-2xl shadow-slate-200/50 mb-12">
                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Article Content -->
        <div class="prose prose-lg prose-slate max-w-none prose-headings:text-[#16325c] prose-headings:font-bold prose-a:text-[#c89a3b] prose-img:rounded-2xl bg-white p-8 sm:p-12 rounded-3xl shadow-sm border border-slate-100">
            {!! $article->content !!}
        </div>

        <!-- Share & CTA Footer -->
        <div class="mt-12 bg-[#16325c] rounded-3xl p-8 sm:p-10 text-center text-white shadow-xl flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="text-left max-w-lg">
                <h3 class="text-xl font-bold mb-2">{{ $isSw ? 'Je, una swali kuhusu ardhi yako?' : 'Have a question about your land?' }}</h3>
                <p class="text-sm text-slate-300">{{ $isSw ? 'Wasiliana na wataalamu wetu kwa ushauri wa bure wa kisheria na kiufundi.' : 'Contact our experts for free legal and technical advice.' }}</p>
            </div>
            <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND, nimesoma makala yenu kuhusu "' . $article->title . '" na nina swali.') }}" target="_blank" rel="noopener" class="shrink-0 px-6 py-3.5 rounded-xl bg-[#c89a3b] text-[#16325c] font-black text-sm shadow-lg hover:bg-[#b5882e] transition inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                <span>WhatsApp Us</span>
            </a>
        </div>

    </div>
</div>
@endsection
