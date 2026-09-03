@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
    $projWaText = "Hello RELAND Arusha, I saw your project: \"{$project->name}\" in {$project->location_name} and would like to discuss a similar land project.";
@endphp

@section('title', $project->name . ' | Case Study &bull; RELAND CONSULT LTD')
@section('meta_description', Str::limit(strip_tags($project->short_description ?? $project->description), 160))
@section('whatsapp_message', $projWaText)

@section('content')

<!-- Hero Section -->
<div class="relative bg-[#280508] text-white py-16 lg:py-20 border-b border-[#D48B16]/20 overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
        <img src="{{ $project->image_url }}" alt="{{ $project->name }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#280508] via-[#280508]/85 to-[#280508]/90"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl space-y-4">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-xs text-slate-400">
                <a href="{{ route('home') }}" class="hover:text-white transition">{{ __('app.nav_home') }}</a>
                <span>/</span>
                <a href="{{ route('projects.index') }}" class="hover:text-white transition">{{ __('app.nav_projects') }}</a>
                <span>/</span>
                <span class="text-[#FAC955] font-semibold truncate">{{ $project->name }}</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <span class="px-3 py-1 rounded-full bg-[#D48B16]/20 text-[#FAC955] text-xs font-bold uppercase border border-[#D48B16]/30">
                    {{ $project->project_type }}
                </span>
                <span class="px-3 py-1 rounded-full bg-emerald-600/30 text-emerald-300 text-xs font-bold uppercase border border-emerald-500/40">
                    {{ ucfirst($project->project_status) }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight leading-tight">
                {{ $project->name }}
            </h1>

            <div class="pt-2 flex flex-wrap items-center gap-6 text-xs text-slate-300">
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    <span>{{ $project->location_name }}</span>
                </div>
                @if($project->size_covered)
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                        <span>{{ $project->size_covered }}</span>
                    </div>
                @endif
                @if($project->completion_date)
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ $project->completion_date->format('F Y') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Main Case Study Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Left 2 Cols: Description, Services Performed, Gallery -->
        <div class="lg:col-span-2 space-y-10">
            <!-- Case Study Body -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs space-y-6">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-[#D48B16] block mb-1">
                        {{ $isSw ? 'Taarifa za Mradi' : 'Case Study & Execution Details' }}
                    </span>
                    <h2 class="text-2xl font-extrabold text-[#750D15]">
                        {{ $isSw ? 'Maelezo ya Kina ya Utekelezaji' : 'Project Scope & Deliverables' }}
                    </h2>
                </div>

                <div class="text-sm text-slate-700 leading-relaxed whitespace-pre-line">
                    {{ $project->description }}
                </div>

                @if($project->services_performed && count($project->services_performed) > 0)
                    <div class="pt-6 border-t border-slate-100">
                        <h3 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-3">
                            {{ $isSw ? 'Huduma Zilizotekelezwa Kwenye Mradi Hii:' : 'Services Delivered on This Project:' }}
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->services_performed as $srv)
                                <span class="px-3 py-1.5 rounded-xl bg-slate-100 text-slate-800 text-xs font-bold border border-slate-200/60">
                                    ✓ {{ $srv }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Project Gallery -->
            @if($project->images && $project->images->count() > 0)
                <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs space-y-6">
                    <h2 class="text-xl font-extrabold text-[#750D15]">
                        {{ $isSw ? 'Picha za Eneo la Mradi' : 'Field Project Gallery' }}
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($project->images as $img)
                            <div class="rounded-2xl overflow-hidden h-56 border border-slate-100 group">
                                <img src="{{ $img->image_url }}" alt="Project field photo" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Right 1 Col: Quick Specs & Consultation CTA -->
        <div class="space-y-8">
            <!-- Project Metadata Summary Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-xs space-y-4">
                <h3 class="font-extrabold text-sm text-[#750D15] uppercase tracking-wider border-b border-slate-100 pb-2">
                    {{ $isSw ? 'Muhtasari wa Mradi' : 'Project Specifications' }}
                </h3>

                <ul class="space-y-3 text-xs">
                    <li class="flex items-center justify-between pb-2 border-b border-slate-50">
                        <span class="text-slate-500 font-medium">{{ __('app.project_status') }}</span>
                        <span class="font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-md">{{ ucfirst($project->project_status) }}</span>
                    </li>
                    <li class="flex items-center justify-between pb-2 border-b border-slate-50">
                        <span class="text-slate-500 font-medium">{{ __('app.type') }}</span>
                        <span class="font-bold text-slate-800">{{ $project->project_type }}</span>
                    </li>
                    <li class="flex items-center justify-between pb-2 border-b border-slate-50">
                        <span class="text-slate-500 font-medium">{{ __('app.location') }}</span>
                        <span class="font-bold text-slate-800">{{ $project->location_name }}</span>
                    </li>
                    @if($project->size_covered)
                        <li class="flex items-center justify-between pb-2 border-b border-slate-50">
                            <span class="text-slate-500 font-medium">{{ __('app.size') }}</span>
                            <span class="font-bold text-slate-800">{{ $project->size_covered }}</span>
                        </li>
                    @endif
                    @if($project->client_type)
                        <li class="flex items-center justify-between pb-2 border-b border-slate-50">
                            <span class="text-slate-500 font-medium">{{ __('app.client_type') }}</span>
                            <span class="font-bold text-slate-800">{{ $project->client_type }}</span>
                        </li>
                    @endif
                    @if($project->completion_date)
                        <li class="flex items-center justify-between">
                            <span class="text-slate-500 font-medium">{{ __('app.completion_date') }}</span>
                            <span class="font-bold text-slate-800">{{ $project->completion_date->format('d M Y') }}</span>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Inquire About Similar Project Card -->
            <div class="bg-[#750D15] text-white rounded-3xl p-6 sm:p-8 space-y-4 shadow-xl">
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#FAC955] block">Direct Consultation</span>
                <h3 class="text-lg font-extrabold text-white">
                    {{ $isSw ? 'Je, una mradi kama huu?' : 'Have a Similar Land Project?' }}
                </h3>
                <p class="text-xs text-slate-300 leading-relaxed">
                    {{ $isSw ? 'Wasiliana na wataalamu wetu wa upimaji na urasimishaji wa ardhi kwa ajili ya kufanya tathmini ya shamba au eneo lako.' : 'Consult with our registered surveyors to plan, survey, or formalize your property in Arusha.' }}
                </p>

                <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-3 pt-2">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">

                    <div>
                        <input type="text" name="name" required class="w-full bg-white/10 border border-white/20 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-400 focus:bg-white focus:text-slate-900 transition" placeholder="{{ __('app.form_full_name') }}">
                    </div>

                    <div>
                        <input type="tel" name="phone" required class="w-full bg-white/10 border border-white/20 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-400 focus:bg-white focus:text-slate-900 transition" placeholder="{{ __('app.form_phone') }}">
                    </div>

                    <input type="hidden" name="preferred_contact_method" value="whatsapp">

                    <div>
                        <textarea name="message" rows="2" required class="w-full bg-white/10 border border-white/20 rounded-xl px-3 py-2 text-xs text-white placeholder-slate-400 focus:bg-white focus:text-slate-900 transition" placeholder="{{ $isSw ? 'Eleza eneo la ardhi yako...' : 'Briefly describe your land or project needs...' }}"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-[#D48B16] hover:bg-[#b5882e] text-[#280508] font-extrabold text-xs shadow-md transition transform hover:-translate-y-0.5">
                        {{ __('app.form_submit') }}
                    </button>
                </form>

                <div class="pt-2 text-center border-t border-white/10">
                    <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($projWaText) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#FAC955] hover:text-white transition">
                        <span>WhatsApp Quick Chat</span> &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
