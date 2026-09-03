@extends('layouts.admin')

@section('title', 'Manage Plots')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Plots & Land Inventory</h1>
            <p class="text-xs text-slate-400 mt-1">Manage, publish, mark featured and update plot statuses</p>
        </div>

        <a href="{{ route('admin.plots.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#D48B16] hover:bg-[#FAC955] text-[#280508] font-black text-xs shadow-md shadow-[#D48B16]/20 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add New Plot</span>
        </a>
    </div>

    <!-- Filters Bar -->
    <div class="bg-[#280508] border border-[#750D15] rounded-2xl p-4">
        <form method="GET" action="{{ route('admin.plots.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title, REF, street..." class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-3 py-2 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
            </div>

            <div>
                <select name="location_id" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-3 py-2 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                    <option value="">All Locations</option>
                    @foreach($locations as $loc)
                        <option value="{{ $loc->id }}" {{ request('location_id') == $loc->id ? 'selected' : '' }}>{{ $loc->area_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <select name="plot_type_id" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-3 py-2 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                    <option value="">All Types</option>
                    @foreach($plotTypes as $pt)
                        <option value="{{ $pt->id }}" {{ request('plot_type_id') == $pt->id ? 'selected' : '' }}>{{ $pt->name_en }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <select name="status" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-3 py-2 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                    <option value="">All Statuses</option>
                    <option value="available" {{ request('status') === 'available' ? 'selected' : '' }}>Available</option>
                    <option value="reserved" {{ request('status') === 'reserved' ? 'selected' : '' }}>Reserved</option>
                    <option value="sold" {{ request('status') === 'sold' ? 'selected' : '' }}>Sold</option>
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 py-2 px-3 rounded-xl bg-[#750D15] hover:bg-[#280508] text-[#FAC955] border border-[#D48B16]/40 font-bold text-xs transition">
                    Filter
                </button>
                @if(request()->anyFilled(['search', 'location_id', 'plot_type_id', 'status']))
                    <a href="{{ route('admin.plots.index') }}" class="py-2 px-3 rounded-xl bg-[#1C0305] hover:bg-[#750D15] text-slate-300 font-bold text-xs transition border border-[#750D15]">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-[#280508] border border-[#750D15] rounded-2xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="bg-[#1C0305] text-[11px] uppercase font-bold text-[#FAC955] border-b border-[#750D15]">
                    <tr>
                        <th class="py-3.5 px-4">Plot Info & Ref</th>
                        <th class="py-3.5 px-4">Location</th>
                        <th class="py-3.5 px-4">Type & Size</th>
                        <th class="py-3.5 px-4">Price (TZS)</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-center">Visibility</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#750D15] font-medium">
                    @forelse($plots as $plot)
                        <tr class="hover:bg-[#750D15]/30 transition">
                            <!-- Title & Ref -->
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-white max-w-xs truncate">{{ $plot->title }}</div>
                                <div class="flex items-center gap-2 mt-0.5 text-[11px] text-slate-400">
                                    <span class="font-mono text-[#FAC955] font-bold">{{ $plot->plot_reference }}</span>
                                    <span>&bull;</span>
                                    <span>{{ $plot->ownership_title_type }}</span>
                                </div>
                            </td>

                            <!-- Location -->
                            <td class="py-3.5 px-4">
                                <div class="text-white">{{ $plot->location?->area_name }}</div>
                                <div class="text-[11px] text-slate-400">{{ $plot->location?->district }}</div>
                            </td>

                            <!-- Type & Size -->
                            <td class="py-3.5 px-4">
                                <div class="text-white">{{ $plot->plotType?->name_en }}</div>
                                <div class="text-[11px] text-[#FAC955] font-bold">{{ $plot->formatted_size }}</div>
                            </td>

                            <!-- Price -->
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-white">{{ $plot->formatted_price }}</div>
                                <div class="text-[11px] text-slate-400">{{ $plot->price_negotiable ? 'Negotiable' : 'Fixed' }}</div>
                            </td>

                            <!-- Status Dropdown Form -->
                            <td class="py-3.5 px-4">
                                <form action="{{ route('admin.plots.status', $plot->id) }}" method="POST">
                                    @csrf
                                    <select name="listing_status" onchange="this.form.submit()" class="bg-[#1C0305] border border-[#750D15] rounded-lg px-2.5 py-1 text-[11px] font-bold cursor-pointer {{ $plot->listing_status === 'available' ? 'text-[#FAC955]' : ($plot->listing_status === 'reserved' ? 'text-amber-400' : 'text-rose-400') }}">
                                        <option value="available" {{ $plot->listing_status === 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="reserved" {{ $plot->listing_status === 'reserved' ? 'selected' : '' }}>Reserved</option>
                                        <option value="sold" {{ $plot->listing_status === 'sold' ? 'selected' : '' }}>Sold</option>
                                    </select>
                                </form>
                            </td>

                            <!-- Toggle Badges -->
                            <td class="py-3.5 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Publish toggle -->
                                    <form action="{{ route('admin.plots.toggle-publish', $plot->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-2 py-0.5 rounded text-[10px] font-bold {{ $plot->is_published ? 'bg-[#750D15] text-[#FAC955] border border-[#D48B16]/50' : 'bg-[#1C0305] text-slate-500 border border-[#750D15]' }}" title="Toggle Publish">
                                            {{ $plot->is_published ? 'Published' : 'Draft' }}
                                        </button>
                                    </form>

                                    <!-- Featured toggle -->
                                    <form action="{{ route('admin.plots.toggle-featured', $plot->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-2 py-0.5 rounded text-[10px] font-bold {{ $plot->is_featured ? 'bg-[#D48B16] text-[#280508]' : 'bg-[#1C0305] text-slate-500 border border-[#750D15]' }}" title="Toggle Featured">
                                            {{ $plot->is_featured ? '★ Featured' : 'Normal' }}
                                        </button>
                                    </form>
                                </div>
                            </td>

                            <!-- Actions -->
                            <td class="py-3.5 px-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('plots.show', $plot->slug) }}" target="_blank" class="p-1.5 rounded-lg bg-[#1C0305] hover:bg-[#750D15] text-slate-300 transition border border-[#750D15]" title="Preview Public Page">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <a href="{{ route('admin.plots.edit', $plot->id) }}" class="p-1.5 rounded-lg bg-[#750D15] hover:bg-[#280508] text-[#FAC955] hover:text-white transition border border-[#D48B16]/40" title="Edit Plot">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <form action="{{ route('admin.plots.destroy', $plot->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this plot listing?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg bg-rose-950/40 hover:bg-rose-600 text-rose-400 hover:text-white transition border border-rose-800/60" title="Delete Plot">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-500">
                                No plot listings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-[#750D15]">
            {{ $plots->links() }}
        </div>
    </div>
</div>
@endsection
