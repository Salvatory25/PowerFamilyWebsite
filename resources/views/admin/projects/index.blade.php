@extends('layouts.admin')

@section('title', 'Manage Land Projects')
@section('header_title', 'Land Projects Portfolio')

@section('content')

<div class="space-y-6">
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-white">Land Projects Portfolio</h2>
            <p class="text-xs text-slate-400">Manage completed and ongoing surveying, formalization, and subdivision projects.</p>
        </div>

        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#D48B16] hover:bg-[#b5882e] text-[#280508] font-extrabold text-xs shadow-lg transition">
            <span>+ Add New Project</span>
        </a>
    </div>

    <!-- Search / Filter Box -->
    <div class="bg-[#280508] p-4 rounded-2xl border border-[#750D15]">
        <form action="{{ route('admin.projects.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search project name, location, or type..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
            </div>

            <div>
                <select name="status" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                    <option value="">All Statuses</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="planning" {{ request('status') == 'planning' ? 'selected' : '' }}>Planning Phase</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <button type="submit" class="w-full py-2.5 bg-[#750D15] hover:bg-[#1f437a] text-white font-bold text-xs rounded-xl transition border border-slate-700">
                    Filter Projects
                </button>
                @if(request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.projects.index') }}" class="px-3 py-2.5 bg-slate-800 text-slate-400 hover:text-white rounded-xl text-xs font-bold">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Projects Table -->
    <div class="bg-[#280508] rounded-3xl border border-[#750D15] overflow-hidden shadow-xl">
        @if($projects->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="bg-[#750D15]/60 text-slate-300 uppercase tracking-wider font-bold border-b border-[#750D15] text-[10px]">
                        <tr>
                            <th class="px-6 py-4">Project</th>
                            <th class="px-6 py-4">Type & Location</th>
                            <th class="px-6 py-4">Size & Sector</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Featured</th>
                            <th class="px-6 py-4">Published</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#750D15]/50">
                        @foreach($projects as $project)
                            <tr class="hover:bg-[#750D15]/30 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $project->image_url }}" alt="{{ $project->name }}" class="w-12 h-12 rounded-xl object-cover border border-slate-700 shrink-0">
                                        <div>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="font-bold text-white hover:text-[#FAC955] transition block leading-snug line-clamp-1">
                                                {{ $project->name }}
                                            </a>
                                            <span class="text-[10px] text-slate-400">{{ $project->completion_date ? $project->completion_date->format('M Y') : 'Ongoing' }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="font-semibold text-white block">{{ $project->project_type }}</span>
                                    <span class="text-slate-400">{{ $project->location_name }}</span>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="font-semibold text-[#FAC955] block">{{ $project->size_covered ?? 'N/A' }}</span>
                                    <span class="text-[10px] text-slate-400">{{ $project->client_type ?? 'Private' }}</span>
                                </td>

                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase {{ $project->project_status === 'completed' ? 'bg-emerald-950 text-emerald-300 border border-emerald-800' : 'bg-amber-950 text-amber-300 border border-amber-800' }}">
                                        {{ ucfirst($project->project_status) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <form method="POST" action="{{ route('admin.projects.toggle-featured', $project) }}">
                                        @csrf
                                        <button type="submit" class="px-2 py-1 rounded-lg text-[10px] font-bold {{ $project->is_featured ? 'bg-[#D48B16]/20 text-[#FAC955] border border-[#D48B16]/40' : 'bg-slate-800 text-slate-500' }}">
                                            {{ $project->is_featured ? '★ Featured' : 'Standard' }}
                                        </button>
                                    </form>
                                </td>

                                <td class="px-6 py-4">
                                    <form method="POST" action="{{ route('admin.projects.toggle-publish', $project) }}">
                                        @csrf
                                        <button type="submit" class="px-2 py-1 rounded-lg text-[10px] font-bold {{ $project->is_published ? 'bg-emerald-950 text-emerald-300' : 'bg-rose-950 text-rose-300' }}">
                                            {{ $project->is_published ? 'Published' : 'Draft' }}
                                        </button>
                                    </form>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="p-1.5 rounded-lg bg-slate-800 hover:bg-[#750D15] text-slate-300 hover:text-white transition" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project permanently?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg bg-slate-800 hover:bg-rose-900/60 text-slate-300 hover:text-rose-300 transition" title="Delete">
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

            <!-- Pagination -->
            <div class="p-4 border-t border-[#750D15]">
                {{ $projects->links() }}
            </div>
        @else
            <div class="p-12 text-center text-slate-400 space-y-3">
                <p class="font-bold text-sm">No land projects found.</p>
                <a href="{{ route('admin.projects.create') }}" class="inline-flex px-4 py-2 bg-[#D48B16] text-[#280508] font-bold text-xs rounded-xl">
                    Create First Project
                </a>
            </div>
        @endif
    </div>
</div>

@endsection
