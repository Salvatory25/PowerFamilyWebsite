@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
@endphp

@section('title', ($isSw ? 'Miradi ya Upimaji na Urasimishaji wa Ardhi' : 'Land Surveying & Formalization Projects Portfolio') . ' | RELAND')
@section('meta_description', $isSw ? 'Tazama miradi ya upimaji wa ardhi, urasimishaji wa makazi, na ugawaji wa viwanja iliyokamilika na inayoendelea Arusha.' : 'Explore completed and ongoing cadastral land surveying, settlement regularizations, and subdivision projects across Arusha, Tanzania.')

@section('content')

<!-- Header Banner -->
<div class="bg-[#0c1c34] text-white py-16 lg:py-20 border-b border-[#c89a3b]/20 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-15 bg-[radial-gradient(circle_at_top_right,rgba(200,154,59,0.25),transparent_50%)]"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#c89a3b]/15 text-[#dfb256] text-xs font-extrabold tracking-wider uppercase border border-[#c89a3b]/30">
            Portfolio & Case Studies
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
            {{ __('app.featured_projects_title') }}
        </h1>
        <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto">
            {{ __('app.featured_projects_subtitle') }}
        </p>
    </div>
</div>

<!-- Projects Filtering & Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Filter Tabs / Search -->
    <div class="mb-12 flex flex-col md:flex-row items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-slate-200 shadow-xs">
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('projects.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ !request('type') ? 'bg-[#16325c] text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                {{ $isSw ? 'Miradi Yote' : 'All Projects' }}
            </a>
            @foreach($projectTypes as $type)
                <a href="{{ route('projects.index', ['type' => $type]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ request('type') == $type ? 'bg-[#16325c] text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                    {{ $type }}
                </a>
            @endforeach
        </div>

        <form action="{{ route('projects.index') }}" method="GET" class="flex items-center gap-2 w-full md:w-auto">
            <input type="text" name="location" value="{{ request('location') }}" placeholder="{{ $isSw ? 'Tafuta kwa eneo (mf. Kisongo)...' : 'Search by area (e.g. Njiro)...' }}" class="bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white w-full md:w-60">
            <button type="submit" class="px-4 py-2 rounded-xl bg-[#c89a3b] text-[#0c1c34] font-bold text-xs hover:bg-[#b5882e] transition">
                {{ $isSw ? 'Tafuta' : 'Filter' }}
            </button>
        </form>
    </div>

    <!-- Projects Grid -->
    @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $project->image_url }}" alt="{{ $project->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 left-3 flex flex-col gap-1.5">
                            <span class="px-2.5 py-1 rounded-lg bg-[#0c1c34]/90 text-[#dfb256] text-[10px] font-extrabold uppercase backdrop-blur-md">
                                {{ $project->project_type }}
                            </span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-600 text-white text-[10px] font-bold uppercase shadow-sm">
                                {{ ucfirst($project->project_status) }}
                            </span>
                        </div>
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs text-white bg-black/65 backdrop-blur-md px-3 py-1.5 rounded-xl">
                            <span class="font-medium truncate">{{ $project->location_name }}</span>
                            <span class="font-bold text-[#dfb256] shrink-0">{{ $project->size_covered }}</span>
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                        <div>
                            <h3 class="font-extrabold text-base text-[#16325c] line-clamp-2 group-hover:text-[#c89a3b] transition">
                                {{ $project->name }}
                            </h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3 leading-relaxed">
                                {{ $project->short_description }}
                            </p>

                            @if($project->services_performed && count($project->services_performed) > 0)
                                <div class="mt-3 flex flex-wrap gap-1.5">
                                    @foreach(array_slice($project->services_performed, 0, 3) as $tag)
                                        <span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-600 text-[10px] font-semibold">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 font-medium">
                                {{ $project->completion_date ? $project->completion_date->format('M Y') : 'Completed' }}
                            </span>
                            <a href="{{ route('projects.show', $project->slug) }}" class="font-bold text-[#16325c] hover:text-[#c89a3b] transition inline-flex items-center gap-1">
                                <span>{{ $isSw ? 'Tazama Mradi' : 'Read Case Study' }}</span> &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $projects->links() }}
        </div>
    @else
        <div class="p-12 bg-white rounded-3xl border border-slate-200 text-center space-y-3">
            <h3 class="text-lg font-bold text-slate-700">{{ $isSw ? 'Hakuna miradi iliyopatikana' : 'No Projects Found' }}</h3>
            <p class="text-xs text-slate-500">{{ $isSw ? 'Tafadhali badilisha vichungi au jaribu tena.' : 'Please adjust your filter parameters or clear filters.' }}</p>
            <a href="{{ route('projects.index') }}" class="inline-flex px-4 py-2 rounded-xl bg-[#16325c] text-white text-xs font-bold">
                {{ $isSw ? 'Orodha Kamili' : 'Reset Filters' }}
            </a>
        </div>
    @endif
</div>

@endsection
