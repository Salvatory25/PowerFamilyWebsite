@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
@endphp

@section('title', ($isSw ? 'Makala & Elimu ya Ardhi' : 'Land Knowledge Center') . ' | RELAND CONSULT LTD')
@section('meta_description', $isSw ? 'Jifunze kuhusu upimaji ardhi, hati miliki, na jinsi ya kununua viwanja salama.' : 'Learn about land surveying, title deeds, and safe plot purchasing in Tanzania.')

@section('content')
<!-- Header Banner -->
<div class="bg-[#0c1c34] text-white py-16 lg:py-24 border-b border-[#c89a3b]/20 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-15 bg-[radial-gradient(circle_at_top_right,rgba(200,154,59,0.25),transparent_50%)]"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#c89a3b]/15 text-[#dfb256] text-xs font-extrabold tracking-wider uppercase border border-[#c89a3b]/30">
            {{ $isSw ? 'Kituo cha Maarifa' : 'Knowledge Center' }}
        </span>
        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight">
            {{ $isSw ? 'Blog: Makala & Elimu ya Ardhi' : 'Blog & Land Insights' }}
        </h1>
        <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto font-medium">
            {{ $isSw ? 'Gundua miongozo, ushauri, na taarifa muhimu zinazokusaidia kufanya maamuzi sahihi kuhusu umiliki na uwekezaji wa ardhi Tanzania.' : 'Discover expert guides, advice, and essential information to help you make informed decisions about land ownership and investment in Tanzania.' }}
        </p>
    </div>
</div>

<div class="bg-slate-50 py-16 lg:py-24">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $article)
                <a href="{{ route('pages.article', $article->slug) }}" class="group bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-2xl hover:border-[#c89a3b]/30 transition duration-300 flex flex-col h-full">
                    <div class="aspect-[16/10] bg-slate-200 relative overflow-hidden">
                        @if($article->image_url)
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                        @else
                            <div class="w-full h-full bg-[#16325c] flex items-center justify-center">
                                <svg class="w-12 h-12 text-[#16325c]/30" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur text-[#16325c] text-xs font-bold rounded-lg shadow-sm">
                                {{ $article->published_at ? $article->published_at->format('M d, Y') : 'Recent' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6 sm:p-8 flex flex-col flex-1">
                        <h2 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-[#c89a3b] transition line-clamp-2">
                            {{ $article->title }}
                        </h2>
                        <p class="text-sm text-slate-500 mb-6 flex-1 line-clamp-3 leading-relaxed">
                            {{ $article->excerpt }}
                        </p>
                        
                        <div class="pt-4 border-t border-slate-100 flex items-center text-[#16325c] font-bold text-sm group-hover:text-[#c89a3b] transition mt-auto">
                            <span>{{ $isSw ? 'Soma Zaidi' : 'Read Article' }}</span>
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-700">{{ $isSw ? 'Hakuna Makala Zilizopatikana' : 'No Articles Found' }}</h3>
                    <p class="text-slate-500 mt-2">{{ $isSw ? 'Tafadhali rudi tena baadae kwa makala mpya.' : 'Please check back later for new insights.' }}</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $articles->links() }}
        </div>

    </div>
</div>
@endsection
