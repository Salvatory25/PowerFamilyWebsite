@extends('layouts.admin')

@section('title', 'Manage Blog Articles')
@section('header_title', 'Blog & Land Insights Management')

@section('content')

<div class="space-y-6">
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-white">Makala &amp; Blog Posts</h2>
            <p class="text-xs text-slate-400">Publish, edit, and manage educational articles and news on land surveying, formalization, and title deeds.</p>
        </div>

        <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#c89a3b] hover:bg-[#b5882e] text-[#0c1c34] font-extrabold text-xs shadow-lg transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
            <span>+ Andika Makala Mpya (New Article)</span>
        </a>
    </div>

    <!-- Search / Filter Box -->
    <div class="bg-[#0c1c34] p-4 rounded-2xl border border-[#16325c]">
        <form action="{{ route('admin.articles.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            <div class="flex-1 w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tafuta jina la makala, maneno muhimu (Search title or content)..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#c89a3b]">
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button type="submit" class="px-5 py-2.5 bg-[#16325c] hover:bg-[#1f437a] text-white font-bold text-xs rounded-xl transition border border-slate-700 shrink-0">
                    Search Articles
                </button>
                @if(request()->has('search'))
                    <a href="{{ route('admin.articles.index') }}" class="px-3 py-2.5 bg-slate-800 text-slate-400 hover:text-white rounded-xl text-xs font-bold shrink-0">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Articles Table -->
    <div class="bg-[#0c1c34] rounded-3xl border border-[#16325c] overflow-hidden shadow-xl">
        @if($articles->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-[#16325c]/60 text-slate-300 uppercase tracking-wider font-bold border-b border-[#16325c] text-[10px]">
                        <tr>
                            <th class="px-6 py-4">Makala / Title</th>
                            <th class="px-6 py-4">Muhtasari (Excerpt)</th>
                            <th class="px-6 py-4">Tarehe (Published)</th>
                            <th class="px-6 py-4 text-right">Vitendo (Actions)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#16325c]">
                        @foreach($articles as $article)
                            <tr class="hover:bg-[#16325c]/30 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3.5">
                                        <div class="w-16 h-12 rounded-xl bg-slate-800 overflow-hidden shrink-0 border border-slate-700">
                                            @if($article->image_url)
                                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-slate-500 font-bold text-[10px]">No Pic</div>
                                            @endif
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.articles.edit', $article) }}" class="font-bold text-white hover:text-[#dfb256] transition block line-clamp-1 max-w-xs text-sm">
                                                {{ $article->title }}
                                            </a>
                                            <span class="text-[11px] text-slate-400">/insights/{{ $article->slug }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 max-w-sm">
                                    <p class="line-clamp-2 text-slate-300">{{ $article->excerpt }}</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-slate-200 font-semibold">
                                        {{ $article->published_at ? $article->published_at->format('d M Y') : 'Draft' }}
                                    </div>
                                    <span class="text-[10px] text-emerald-400 font-medium">Published</span>
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('pages.article', $article->slug) }}" target="_blank" class="p-2 rounded-lg bg-slate-800 text-slate-300 hover:text-white hover:bg-slate-700 transition" title="Preview on Website">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="p-2 rounded-lg bg-[#16325c] text-[#dfb256] hover:bg-[#c89a3b] hover:text-[#0c1c34] transition font-bold" title="Edit Article">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Una uhakika unataka kufuta makala hii? (Are you sure you want to delete this article?)')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg bg-rose-950/50 text-rose-400 hover:bg-rose-600 hover:text-white transition" title="Delete Article">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-[#16325c]">
                {{ $articles->links() }}
            </div>
        @else
            <div class="p-12 text-center text-slate-400">
                <svg class="w-12 h-12 mx-auto mb-3 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <p class="text-base font-bold text-white mb-1">Hakuna Makala Zilizopatikana</p>
                <p class="text-xs text-slate-400 mb-4">Anza kuandika makala mpya kwa ajili ya wateja wako.</p>
                <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#c89a3b] text-[#0c1c34] font-bold text-xs">
                    <span>+ Andika Makala Mpya</span>
                </a>
            </div>
        @endif
    </div>
</div>

@endsection
