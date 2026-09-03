@extends('layouts.admin')

@section('title', 'Matunzio ya Picha')
@section('page_title', 'Usimamizi wa Matunzio (Gallery Management)')

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#1C0305] p-6 rounded-2xl border border-[#750D15]">
        <div>
            <h2 class="text-lg font-bold text-white">Matunzio ya Picha</h2>
            <p class="text-xs text-slate-400">Ongeza au futa picha za miradi na matukio kwenye tovuti.</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="bg-[#750D15] hover:bg-[#961620] text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow border border-[#D48B16]/40 flex items-center space-x-2 transition">
            <span>+ Ongeza Picha Mpya</span>
        </a>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($items as $item)
            <div class="bg-[#1C0305] rounded-2xl border border-[#750D15] overflow-hidden group shadow-sm flex flex-col justify-between">
                <div class="relative aspect-square overflow-hidden bg-black/40">
                    <img src="{{ $item->url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2 left-2 px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-[#750D15]/90 text-[#FAC955]">
                        {{ $item->category }}
                    </span>
                </div>
                <div class="p-3.5 flex items-center justify-between">
                    <span class="text-xs font-semibold text-white truncate max-w-[120px]">{{ $item->title }}</span>
                    <form method="POST" action="{{ route('admin.gallery.destroy', $item->id) }}" onsubmit="return confirm('Una uhakika unataka kufuta picha hii?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 rounded-lg bg-rose-900/60 text-rose-300 hover:bg-rose-900 text-xs">
                            ✕ Futa
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-4 text-center py-16 bg-[#1C0305] rounded-2xl border border-[#750D15] text-slate-500">
                Hakuna picha zilizoongezwa bado.
            </div>
        @endforelse
    </div>

    <div>{{ $items->links() }}</div>
</div>

@endsection
