@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashibodi Kuu (Dashboard Overview)')

@section('content')

<div class="space-y-8">
    
    <!-- Top Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Total Plots -->
        <div class="bg-[#220325] rounded-2xl p-6 border border-[#4A0E4E] shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Viwanja Vyote</span>
                <span class="p-2 rounded-xl bg-[#4A0E4E] text-[#DFB743]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-white">{{ $stats['total_plots'] }}</span>
                <span class="text-xs font-semibold text-emerald-400">{{ $stats['available_plots'] }} Vipo</span>
            </div>
        </div>

        <!-- Total Houses -->
        <div class="bg-[#220325] rounded-2xl p-6 border border-[#4A0E4E] shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Nyumba Zote</span>
                <span class="p-2 rounded-xl bg-[#4A0E4E] text-[#DFB743]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-white">{{ $stats['total_houses'] }}</span>
                <span class="text-xs font-semibold text-emerald-400">{{ $stats['available_houses'] }} Zipo</span>
            </div>
        </div>

        <!-- Total Vehicles -->
        <div class="bg-[#220325] rounded-2xl p-6 border border-[#4A0E4E] shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Magari Yote</span>
                <span class="p-2 rounded-xl bg-[#4A0E4E] text-[#DFB743]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h8m-8 4h8m-8 4h8M4 6h16a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-white">{{ $stats['total_vehicles'] }}</span>
                <span class="text-xs font-semibold text-emerald-400">{{ $stats['available_vehicles'] }} Yapo</span>
            </div>
        </div>

        <!-- Inquiries / Leads -->
        <div class="bg-[#220325] rounded-2xl p-6 border border-[#4A0E4E] shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Maulizo ya Wateja</span>
                <span class="p-2 rounded-xl bg-[#4A0E4E] text-[#DFB743]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-white">{{ $stats['total_enquiries'] }}</span>
                <span class="text-xs font-semibold text-amber-400">{{ $stats['new_enquiries'] }} Mpya</span>
            </div>
        </div>

    </div>

    <!-- Quick Actions Bar -->
    <div class="bg-[#220325] p-6 rounded-2xl border border-[#4A0E4E] flex flex-wrap items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-white">Vitendo vya Haraka (Quick Actions)</h3>
            <p class="text-xs text-slate-400">Ongeza mali mpya moja kwa moja kwenye orodha ya tovuti.</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('admin.plots.create') }}" class="bg-[#4A0E4E] hover:bg-[#68176E] text-white px-4 py-2 rounded-xl text-xs font-bold transition border border-[#C59B27]/40 shadow">
                + Kiwanja Kipya
            </a>
            <a href="{{ route('admin.houses.create') }}" class="bg-[#4A0E4E] hover:bg-[#68176E] text-white px-4 py-2 rounded-xl text-xs font-bold transition border border-[#C59B27]/40 shadow">
                + Nyumba Mpya
            </a>
            <a href="{{ route('admin.vehicles.create') }}" class="bg-[#4A0E4E] hover:bg-[#68176E] text-white px-4 py-2 rounded-xl text-xs font-bold transition border border-[#C59B27]/40 shadow">
                + Gari Jipya
            </a>
            <a href="{{ route('admin.gallery.create') }}" class="bg-[#4A0E4E] hover:bg-[#68176E] text-white px-4 py-2 rounded-xl text-xs font-bold transition border border-[#C59B27]/40 shadow">
                + Picha Kwenye Matunzio
            </a>
        </div>
    </div>

    <!-- Recent Inquiries Table -->
    <div class="bg-[#220325] rounded-2xl border border-[#4A0E4E] overflow-hidden">
        <div class="p-6 border-b border-[#4A0E4E] flex items-center justify-between">
            <h3 class="text-base font-bold text-white">Maulizo ya Hivi Karibuni (Recent Leads)</h3>
            <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-bold text-[#DFB743] hover:underline">Tazama Yote &rarr;</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-[#18031A] text-xs uppercase text-slate-400">
                    <tr>
                        <th class="px-6 py-3.5">Mteja</th>
                        <th class="px-6 py-3.5">Simu</th>
                        <th class="px-6 py-3.5">Aina</th>
                        <th class="px-6 py-3.5">Hali</th>
                        <th class="px-6 py-3.5">Tarehe</th>
                        <th class="px-6 py-3.5 text-right">Kitendo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#4A0E4E]">
                    @forelse($recentEnquiries as $inq)
                        <tr class="hover:bg-[#320635]/60 transition">
                            <td class="px-6 py-4 font-bold text-white">
                                {{ $inq->name }}
                                <span class="block text-[11px] font-normal text-slate-400">{{ $inq->tracking_reference }}</span>
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-200">
                                {{ $inq->phone }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-bold uppercase bg-[#4A0E4E] text-[#DFB743]">
                                    {{ $inq->category ?? 'Kiwanja' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {!! $inq->status_badge !!}
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-400">
                                {{ $inq->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.enquiries.show', $inq->id) }}" class="px-3 py-1.5 rounded-lg bg-[#4A0E4E] text-white hover:bg-[#68176E] text-xs font-semibold transition">
                                    Tazama
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                                Hakuna maulizo mapya kwa sasa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
