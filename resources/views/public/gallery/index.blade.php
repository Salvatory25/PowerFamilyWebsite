@extends('layouts.app')

@section('title', __('app.nav_gallery') . ' — Power Family Investment')

@section('content')

<!-- Header Banner -->
<div class="bg-[#220325] text-white py-12 border-b border-[#68176E]/30 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#DFB743_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-bold text-[#DFB743] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'PICHA & MATUKIO' : 'PHOTO GALLERY' }}
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ __('app.nav_gallery') }}
            </h1>
            <p class="text-gray-300 text-sm">
                {{ app()->getLocale() === 'sw' ? 'Tazama picha za miradi ya viwanja, nyumba, magari na matukio ya ukaguzi wa wateja.' : 'Explore site visits, projects, properties, and customer moments.' }}
            </p>
        </div>
    </div>
</div>

<div class="py-12 bg-neutral-50 min-h-screen" x-data="{ activeImage: '', lightboxOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center gap-2 pb-2">
            @php $currentCat = request('category', 'all'); @endphp
            <a href="{{ route('gallery.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $currentCat === 'all' ? 'bg-[#4A0E4E] text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Picha Zote
            </a>
            <a href="{{ route('gallery.index', ['category' => 'viwanja']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $currentCat === 'viwanja' ? 'bg-[#4A0E4E] text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Viwanja
            </a>
            <a href="{{ route('gallery.index', ['category' => 'nyumba']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $currentCat === 'nyumba' ? 'bg-[#4A0E4E] text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Nyumba
            </a>
            <a href="{{ route('gallery.index', ['category' => 'magari']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $currentCat === 'magari' ? 'bg-[#4A0E4E] text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Magari
            </a>
            <a href="{{ route('gallery.index', ['category' => 'matukio']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $currentCat === 'matukio' ? 'bg-[#4A0E4E] text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Matukio & Ziara
            </a>
            <a href="{{ route('gallery.index', ['category' => 'wateja']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $currentCat === 'wateja' ? 'bg-[#4A0E4E] text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                Wateja Wetu
            </a>
        </div>

        <!-- Masonry / Grid Gallery -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($items as $item)
                <div 
                    class="relative rounded-2xl overflow-hidden group aspect-square bg-gray-200 shadow-sm cursor-pointer border border-gray-100"
                    @click="activeImage = '{{ $item->url }}'; lightboxOpen = true"
                >
                    <img 
                        src="{{ $item->url }}" 
                        alt="{{ $item->title }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#220325]/90 via-[#220325]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                        <span class="text-[10px] font-bold text-[#DFB743] uppercase tracking-wider">{{ $item->category }}</span>
                        <h4 class="text-xs font-bold text-white truncate">{{ $item->title }}</h4>
                        @if($item->description)
                            <p class="text-[11px] text-gray-300 line-clamp-1 mt-0.5">{{ $item->description }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-16 bg-white rounded-2xl border border-gray-200 space-y-2">
                    <p class="text-gray-500 font-semibold">Hakuna picha zilizopatikana kwenye kundi hili.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $items->links() }}
        </div>

    </div>

    <!-- Lightbox Modal -->
    <div x-show="lightboxOpen" x-transition class="fixed inset-0 z-50 bg-black/95 flex items-center justify-center p-4">
        <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white text-3xl font-bold hover:text-[#DFB743] transition">✕</button>
        <img :src="activeImage" class="max-w-full max-h-[90vh] object-contain rounded-xl shadow-2xl">
    </div>
</div>

@endsection
