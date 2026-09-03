@extends('layouts.admin')

@section('title', 'Client Leads & Service Inquiries')
@section('header_title', 'Client CRM & Inquiries')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-extrabold text-white tracking-tight">Client Leads & Service Requests</h1>
            <p class="text-xs text-slate-400 mt-1">Track and manage land surveying inquiries, formalization requests, and plot leads.</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-[#280508] border border-[#750D15] rounded-2xl p-4">
        <form method="GET" action="{{ route('admin.enquiries.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-3">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search client name, phone, message..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
            </div>

            <div>
                <select name="category" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                    <option value="">All Categories</option>
                    <option value="service" {{ request('category') === 'service' ? 'selected' : '' }}>Land Services</option>
                    <option value="project" {{ request('category') === 'project' ? 'selected' : '' }}>Project Case Studies</option>
                    <option value="plot" {{ request('category') === 'plot' ? 'selected' : '' }}>Plot Listings</option>
                </select>
            </div>

            <div>
                <select name="status" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                    <option value="">All Statuses</option>
                    <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
                    <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="site_visit_scheduled" {{ request('status') === 'site_visit_scheduled' ? 'selected' : '' }}>Site Visit Scheduled</option>
                    <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed / Completed</option>
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 py-2 px-3 rounded-xl bg-[#750D15] hover:bg-[#1e4277] text-white font-bold text-xs transition border border-slate-700">
                    Filter Leads
                </button>
                @if(request()->anyFilled(['search', 'category', 'status']))
                    <a href="{{ route('admin.enquiries.index') }}" class="py-2 px-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-xs transition">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Leads Table -->
    <div class="bg-[#280508] border border-[#750D15] rounded-3xl overflow-hidden shadow-xl">
        <table class="w-full text-left text-xs text-slate-300">
            <thead class="bg-[#750D15]/60 text-[10px] uppercase font-bold text-slate-400 border-b border-[#750D15]">
                <tr>
                    <th class="py-4 px-5">Client Info</th>
                    <th class="py-4 px-5">Service / Subject</th>
                    <th class="py-4 px-5">Channel</th>
                    <th class="py-4 px-5">Received</th>
                    <th class="py-4 px-5 text-center">Status</th>
                    <th class="py-4 px-5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#750D15]/50 font-medium">
                @forelse($enquiries as $lead)
                    <tr class="hover:bg-[#750D15]/30 transition">
                        <td class="py-4 px-5">
                            <div class="font-bold text-white">{{ $lead->name }}</div>
                            <div class="text-[11px] text-slate-400 flex items-center gap-2 mt-0.5">
                                <a href="tel:{{ $lead->phone }}" class="hover:text-[#FAC955] font-mono">{{ $lead->phone }}</a>
                                @if($lead->email)
                                    <span>&bull;</span>
                                    <span class="truncate max-w-[140px]">{{ $lead->email }}</span>
                                @endif
                            </div>
                        </td>

                        <td class="py-4 px-5">
                            @if($lead->service_type)
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg bg-[#D48B16]/20 text-[#FAC955] font-bold text-[11px] border border-[#D48B16]/30">
                                    {{ ucfirst(str_replace('-', ' ', $lead->service_type)) }}
                                </span>
                            @elseif($lead->project)
                                <a href="{{ route('projects.show', $lead->project->slug) }}" target="_blank" class="font-bold text-slate-200 hover:text-[#FAC955] block">
                                    {{ $lead->project->name }}
                                </a>
                                <span class="text-[10px] text-slate-400">Project Case Study</span>
                            @elseif($lead->plot)
                                <a href="{{ route('plots.show', $lead->plot->slug) }}" target="_blank" class="font-mono text-[#FAC955] hover:underline font-bold">
                                    {{ $lead->plot->plot_reference }}
                                </a>
                                <div class="text-[11px] text-slate-400 truncate max-w-xs">{{ $lead->plot->title }}</div>
                            @else
                                <span class="text-slate-500 italic">General Consultation</span>
                            @endif
                        </td>

                        <td class="py-4 px-5">
                            <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $lead->preferred_contact_method === 'whatsapp' ? 'bg-emerald-950 text-emerald-300 border border-emerald-800' : 'bg-slate-900 text-slate-300 border border-slate-700' }}">
                                {{ $lead->preferred_contact_method }}
                            </span>
                        </td>

                        <td class="py-4 px-5 text-slate-400 text-[11px]">
                            {{ $lead->created_at->format('M d, Y H:i') }}
                        </td>

                        <td class="py-4 px-5 text-center">
                            <span class="inline-flex px-2.5 py-1 rounded-full text-[10px] font-bold uppercase {{ $lead->status === 'new' ? 'bg-[#D48B16] text-[#280508]' : ($lead->status === 'site_visit_scheduled' ? 'bg-emerald-950 text-emerald-300 border border-emerald-800' : 'bg-slate-900 text-slate-300 border border-slate-700') }}">
                                {{ str_replace('_', ' ', $lead->status) }}
                            </span>
                        </td>

                        <td class="py-4 px-5 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.enquiries.show', $lead->id) }}" class="px-3 py-1.5 rounded-lg bg-[#750D15] hover:bg-[#1f437a] text-white transition font-semibold text-xs border border-slate-700" title="View & Process">
                                    Process
                                </a>

                                <form action="{{ route('admin.enquiries.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Delete this inquiry?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 rounded-lg bg-rose-950/60 hover:bg-rose-900 text-rose-300 transition" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-500">
                            No inquiries found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4 border-t border-[#750D15]">
            {{ $enquiries->links() }}
        </div>
    </div>
</div>
@endsection
