@extends('layouts.app')

@section('title', 'Plots for Sale in ' . $location->area_name . ', Arusha | RELAND')
@section('meta_description', 'View verified land and plots for sale in ' . $location->area_name . ', ' . $location->district . ', Arusha. Clean title deeds and direct WhatsApp support.')

@section('content')
<div class="relative bg-slate-900 text-white py-16 border-b border-slate-800 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="{{ $location->featured_image ?? 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1600&q=80' }}" class="w-full h-full object-cover">
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs text-slate-400 mb-4">
            <a href="{{ route('home') }}" class="hover:text-emerald-400">{{ __('app.nav_home') }}</a>
            <span>/</span>
            <a href="{{ route('locations.index') }}" class="hover:text-emerald-400">{{ __('app.nav_locations') }}</a>
            <span>/</span>
            <span class="text-white">{{ $location->area_name }}</span>
        </nav>

        <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
            Plots for Sale in {{ $location->area_name }}, Arusha
        </h1>
        <p class="text-emerald-300 font-semibold text-sm mt-1">
            District: {{ $location->district }} &bull; Ward: {{ $location->ward ?? 'Arusha Zone' }}
        </p>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mt-3">
            {{ $location->description }}
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl font-bold text-slate-900">
            Available Plots in {{ $location->area_name }} ({{ $plots->total() }})
        </h2>

        <a href="{{ route('plots.index') }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800">
            ← View All Arusha Plots
        </a>
    </div>

    @if($plots->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($plots as $plot)
                <x-plot-card :plot="$plot" />
            @endforeach
        </div>

        <div class="mt-10">
            {{ $plots->links() }}
        </div>
    @else
        <div class="bg-white rounded-3xl border border-slate-200 p-12 text-center space-y-4">
            <p class="text-slate-500 text-sm">No plots currently listed in {{ $location->area_name }}. Contact us to request unlisted private parcels.</p>
            <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND, please notify me when new plots are listed in ' . $location->area_name . ' Arusha.') }}" target="_blank" class="inline-flex px-5 py-2.5 rounded-xl bg-emerald-600 text-white font-bold text-xs">
                Request {{ $location->area_name }} Plot Alert
            </a>
        </div>
    @endif
</div>
@endsection
