@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('header_title', 'Management Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Corporate Dashboard</h1>
            <p class="text-xs text-slate-400 mt-1">Overview of land services, project portfolio, plot inventory, and client leads.</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#c89a3b] hover:bg-[#dfb256] text-[#0c1c34] font-black text-xs shadow-md transition">
                <span>+ Add Land Project</span>
            </a>
            <a href="{{ route('admin.plots.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#16325c] hover:bg-[#1e4277] text-white font-bold text-xs shadow-md border border-slate-700 transition">
                <span>+ Add Plot</span>
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="p-6 rounded-2xl bg-[#0c1c34] border border-[#16325c] space-y-2">
            <div class="text-slate-400 text-xs font-semibold uppercase tracking-wider">Land Projects</div>
            <div class="text-3xl font-black text-white">{{ $stats['total_projects'] }}</div>
            <div class="text-[11px] text-[#dfb256] font-medium">{{ $stats['completed_projects'] }} Completed &bull; Case Studies</div>
        </div>

        <div class="p-6 rounded-2xl bg-[#0c1c34] border border-[#16325c] space-y-2">
            <div class="text-slate-400 text-xs font-semibold uppercase tracking-wider">Total Plots</div>
            <div class="text-3xl font-black text-white">{{ $stats['total_plots'] }}</div>
            <div class="text-[11px] text-[#dfb256] font-medium">{{ $stats['available_plots'] }} Available for sale</div>
        </div>

        <div class="p-6 rounded-2xl bg-[#0c1c34] border border-[#16325c] space-y-2">
            <div class="text-slate-400 text-xs font-semibold uppercase tracking-wider">Reserved / Sold</div>
            <div class="text-3xl font-black text-amber-400">{{ $stats['reserved_plots'] + $stats['sold_plots'] }}</div>
            <div class="text-[11px] text-slate-400 font-medium">{{ $stats['reserved_plots'] }} Reserved &bull; {{ $stats['sold_plots'] }} Sold</div>
        </div>

        <div class="p-6 rounded-2xl bg-[#0c1c34] border border-[#16325c] space-y-2">
            <div class="text-slate-400 text-xs font-semibold uppercase tracking-wider">Client Inquiries & CRM</div>
            <div class="text-3xl font-black text-white">{{ $stats['total_enquiries'] }}</div>
            <div class="text-[11px] text-[#dfb256] font-medium">{{ $stats['new_enquiries'] }} New pending response</div>
        </div>
    </div>

    <!-- 3 Columns: Recent Projects, Recent Plots & Recent Inquiries -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Land Projects -->
        <div class="bg-[#0c1c34] border border-[#16325c] rounded-2xl p-5 space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-bold text-white">Recent Land Projects</h2>
                <a href="{{ route('admin.projects.index') }}" class="text-xs text-[#dfb256] hover:text-white font-semibold">View All &rarr;</a>
            </div>

            <div class="divide-y divide-[#16325c]">
                @forelse($recentProjects as $proj)
                    <div class="py-3 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <h3 class="text-xs font-bold text-white truncate">{{ $proj->name }}</h3>
                            <div class="flex items-center gap-1.5 mt-0.5 text-[10px] text-slate-400">
                                <span>{{ $proj->project_type }}</span>
                                <span>&bull;</span>
                                <span>{{ $proj->location_name }}</span>
                            </div>
                        </div>

                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $proj->project_status === 'completed' ? 'bg-emerald-950 text-emerald-300' : 'bg-amber-950 text-amber-300' }}">
                            {{ $proj->project_status }}
                        </span>
                    </div>
                @empty
                    <p class="text-xs text-slate-500 py-4">No projects registered yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Plots -->
        <div class="bg-[#0c1c34] border border-[#16325c] rounded-2xl p-5 space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-bold text-white">Recent Plot Listings</h2>
                <a href="{{ route('admin.plots.index') }}" class="text-xs text-[#dfb256] hover:text-white font-semibold">View All &rarr;</a>
            </div>

            <div class="divide-y divide-[#16325c]">
                @forelse($recentPlots as $plot)
                    <div class="py-3 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <h3 class="text-xs font-bold text-white truncate">{{ $plot->title }}</h3>
                            <div class="flex items-center gap-1.5 mt-0.5 text-[10px] text-slate-400">
                                <span>{{ $plot->plot_reference }}</span>
                                <span>&bull;</span>
                                <span class="font-bold text-[#dfb256]">{{ $plot->formatted_price }}</span>
                            </div>
                        </div>

                        <span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $plot->listing_status === 'available' ? 'bg-[#16325c] text-[#dfb256]' : 'bg-amber-950 text-amber-300' }}">
                            {{ $plot->listing_status }}
                        </span>
                    </div>
                @empty
                    <p class="text-xs text-slate-500 py-4">No plots registered yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Inquiries -->
        <div class="bg-[#0c1c34] border border-[#16325c] rounded-2xl p-5 space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-bold text-white">Client Leads</h2>
                <a href="{{ route('admin.enquiries.index') }}" class="text-xs text-[#dfb256] hover:text-white font-semibold">View All &rarr;</a>
            </div>

            <div class="divide-y divide-[#16325c]">
                @forelse($recentEnquiries as $enquiry)
                    <div class="py-3 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <h3 class="text-xs font-bold text-white truncate">{{ $enquiry->name }}</h3>
                            <div class="flex items-center gap-1.5 mt-0.5 text-[10px] text-slate-400">
                                <span class="text-[#dfb256] font-mono">{{ $enquiry->phone }}</span>
                                <span>&bull;</span>
                                <span class="truncate">{{ $enquiry->service_type ? ucfirst(str_replace('-', ' ', $enquiry->service_type)) : ($enquiry->plot?->plot_reference ?? ($enquiry->project?->name ?? 'General')) }}</span>
                            </div>
                        </div>

                        <span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $enquiry->status === 'new' ? 'bg-[#c89a3b] text-[#0c1c34]' : 'bg-[#16325c] text-slate-300' }}">
                            {{ str_replace('_', ' ', $enquiry->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-xs text-slate-500 py-4">No inquiries received yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
