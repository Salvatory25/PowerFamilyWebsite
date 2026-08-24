@extends('layouts.app')

@section('title', 'Arusha Land & Plots Locations Directory | RELAND')
@section('meta_description', 'Explore prime residential and commercial zones in Arusha, Tanzania: Njiro, Sakina, Kisongo, USA River, Moshono, Karatu.')

@section('content')
<div class="bg-slate-900 text-white py-14 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <nav class="flex justify-center items-center gap-2 text-xs text-slate-400 mb-3">
            <a href="{{ route('home') }}" class="hover:text-emerald-400">{{ __('app.nav_home') }}</a>
            <span>/</span>
            <span class="text-white">{{ __('app.nav_locations') }}</span>
        </nav>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white mb-3">
            Prime Land Locations in Arusha
        </h1>
        <p class="text-sm sm:text-base text-slate-300">
            Discover verified plots and market trends across Arusha's premier residential enclaves, commercial growth corridors, and agricultural estates.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($locations as $loc)
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col luxury-card-hover">
                <div class="relative h-64 w-full bg-slate-900 overflow-hidden">
                    <img src="{{ $loc->featured_image ?? 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $loc->area_name }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 rounded-full bg-emerald-600 text-white text-xs font-bold shadow-sm">
                            {{ $loc->plots_count }} {{ __('app.plots_count') }}
                        </span>
                    </div>

                    <div class="absolute bottom-4 left-4 right-4">
                        <h2 class="text-2xl font-bold text-white tracking-tight">
                            {{ $loc->area_name }}
                        </h2>
                        <span class="text-xs text-emerald-300 font-semibold">
                            {{ $loc->district }}, Arusha
                        </span>
                    </div>
                </div>

                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <p class="text-xs text-slate-600 leading-relaxed">
                        {{ $loc->description ?? 'Fast-growing Arusha area offering verified freehold and leasehold plots with great development potential.' }}
                    </p>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <a href="{{ route('locations.show', $loc->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-800">
                            <span>Explore {{ $loc->area_name }} Plots</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>

                        <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND, I am interested in plots available in ' . $loc->area_name . ' Arusha.') }}" target="_blank" class="p-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
