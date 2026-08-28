@extends('layouts.app')

@section('title', __('app.blog_title') . ' — Power Family Investment')

@section('content')

<!-- Header Banner -->
<div class="bg-[#220325] text-white py-12 border-b border-[#68176E]/30 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#DFB743_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-bold text-[#DFB743] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'MAKALA & MIONGOZO YA KITAALAMU' : 'INVESTMENT GUIDES' }}
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ __('app.blog_title') }}
            </h1>
            <p class="text-gray-300 text-sm">
                {{ __('app.blog_subtitle') }}
            </p>
        </div>
    </div>
</div>

<div class="py-12 bg-neutral-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $art)
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group card-hover-lift">
                    <div class="relative h-52 overflow-hidden bg-gray-100">
                        <img 
                            src="{{ $art->featured_image_url ?? 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80' }}" 
                            alt="{{ $art->title }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                            loading="lazy"
                        >
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <span class="text-[11px] font-bold text-[#C59B27] uppercase tracking-wider block mb-1">
                                {{ $art->category ?? 'Uwekezaji' }}
                            </span>
                            <h3 class="text-lg font-bold text-gray-900 line-clamp-2 group-hover:text-[#4A0E4E] transition">
                                {{ $art->title }}
                            </h3>
                            <p class="text-xs text-gray-600 line-clamp-3 mt-2 leading-relaxed">
                                {{ $art->summary ?? Str::limit(strip_tags($art->content), 120) }}
                            </p>
                        </div>
                        <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-[11px] text-gray-400 font-medium">
                                {{ $art->published_at ? \Carbon\Carbon::parse($art->published_at)->format('d M Y') : '' }}
                            </span>
                            <a href="{{ route('pages.article', $art->slug) }}" class="inline-flex items-center text-xs font-bold text-[#4A0E4E] hover:text-[#C59B27] transition">
                                <span>{{ __('app.read_article') }}</span>
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-2xl border border-gray-200">
                    <p class="text-gray-500 font-semibold">Hakuna makala zilizochapishwa kwa sasa.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $articles->links() }}
        </div>

    </div>
</div>

@endsection
