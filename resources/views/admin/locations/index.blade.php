@extends('layouts.admin')

@section('title', 'Manage Arusha Locations')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Arusha Locations & Zones</h1>
            <p class="text-xs text-slate-400 mt-1">Manage target neighborhoods, districts, and coverage areas</p>
        </div>

        <a href="{{ route('admin.locations.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs shadow-md shadow-emerald-600/20 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add Location</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl overflow-hidden shadow-xs">
        <table class="w-full text-left text-xs text-slate-300">
            <thead class="bg-slate-900/80 text-[11px] uppercase font-bold text-slate-400 border-b border-slate-700">
                <tr>
                    <th class="py-3.5 px-4">Area / Neighborhood</th>
                    <th class="py-3.5 px-4">District & Region</th>
                    <th class="py-3.5 px-4">Ward</th>
                    <th class="py-3.5 px-4 text-center">Plots Count</th>
                    <th class="py-3.5 px-4 text-center">Popular Zone</th>
                    <th class="py-3.5 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/60 font-medium">
                @forelse($locations as $loc)
                    <tr class="hover:bg-slate-700/30 transition">
                        <td class="py-3.5 px-4">
                            <div class="font-bold text-white">{{ $loc->area_name }}</div>
                            <div class="text-[11px] text-slate-400 font-mono">{{ $loc->slug }}</div>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="text-white">{{ $loc->district }}</div>
                            <div class="text-[11px] text-slate-400">{{ $loc->region }}</div>
                        </td>
                        <td class="py-3.5 px-4">
                            {{ $loc->ward ?? '—' }}
                        </td>
                        <td class="py-3.5 px-4 text-center">
                            <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-900 text-emerald-400 border border-slate-700">
                                {{ $loc->plots_count }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4 text-center">
                            @if($loc->is_popular)
                                <span class="text-emerald-400 font-bold text-xs">✓ Yes</span>
                            @else
                                <span class="text-slate-500 text-xs">No</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('locations.show', $loc->slug) }}" target="_blank" class="p-1.5 rounded-lg bg-slate-700 hover:bg-slate-600 text-slate-300 transition" title="Preview Public Page">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>

                                <a href="{{ route('admin.locations.edit', $loc->id) }}" class="p-1.5 rounded-lg bg-emerald-600/20 hover:bg-emerald-600 text-emerald-400 hover:text-white transition" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>

                                <form action="{{ route('admin.locations.destroy', $loc->id) }}" method="POST" onsubmit="return confirm('Delete this location?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 rounded-lg bg-rose-600/20 hover:bg-rose-600 text-rose-400 hover:text-white transition" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-500">
                            No locations configured yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
