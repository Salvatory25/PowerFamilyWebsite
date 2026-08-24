@extends('layouts.app')

@section('title', 'Browse Verified Plots & Land for Sale in Arusha | RELAND')
@section('meta_description', 'Explore prime residential, commercial, mixed use and agricultural plots for sale in Arusha, Tanzania. Verified title deeds, instant WhatsApp enquiry.')

@section('content')
<!-- Page Header -->
<div class="bg-slate-900 text-white py-12 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <nav class="flex items-center gap-2 text-xs text-slate-400 mb-2">
                    <a href="{{ route('home') }}" class="hover:text-emerald-400">{{ __('app.nav_home') }}</a>
                    <span>/</span>
                    <span class="text-white">{{ __('app.nav_plots') }}</span>
                </nav>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Plots for Sale in Arusha, Tanzania
                </h1>
                <p class="text-sm text-slate-300 mt-1">
                    {{ __('app.showing_results', ['count' => $plots->total()]) }}
                </p>
            </div>

            <!-- Quick Status Filters -->
            <div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0">
                <a href="{{ route('plots.index') }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition whitespace-nowrap {{ !request('status') ? 'bg-emerald-600 text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }}">
                    All Listings ({{ $plots->total() }})
                </a>
                <a href="{{ route('plots.index', array_merge(request()->query(), ['status' => 'available'])) }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition whitespace-nowrap {{ request('status') === 'available' ? 'bg-emerald-600 text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }}">
                    {{ __('app.available') }}
                </a>
                <a href="{{ route('plots.index', array_merge(request()->query(), ['status' => 'reserved'])) }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition whitespace-nowrap {{ request('status') === 'reserved' ? 'bg-emerald-600 text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }}">
                    {{ __('app.reserved') }}
                </a>
                <a href="{{ route('plots.index', array_merge(request()->query(), ['status' => 'sold'])) }}" class="px-3.5 py-1.5 rounded-full text-xs font-bold transition whitespace-nowrap {{ request('status') === 'sold' ? 'bg-emerald-600 text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' }}">
                    {{ __('app.sold') }}
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Catalog Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Filter Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-xs sticky top-28">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-6">
                    <h2 class="font-bold text-base text-slate-900 flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                        <span>{{ __('app.filter_title') }}</span>
                    </h2>

                    @if(request()->anyFilled(['keyword', 'location', 'type', 'status', 'min_price', 'max_price', 'min_size', 'featured', 'sort']))
                        <a href="{{ route('plots.index') }}" class="text-xs text-rose-600 hover:text-rose-700 font-semibold">
                            {{ __('app.reset_filters') }}
                        </a>
                    @endif
                </div>

                <form action="{{ route('plots.index') }}" method="GET" class="space-y-5">
                    <!-- Keyword Search -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">
                            {{ __('app.keyword_search') }}
                        </label>
                        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="e.g. Njiro, REL-ARU, Highway..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600 focus:bg-white transition">
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">
                            Arusha Location
                        </label>
                        <select name="location" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600 focus:bg-white transition">
                            <option value="">{{ __('app.select_location') }}</option>
                            @foreach($locations as $loc)
                                <option value="{{ $loc->id }}" {{ request('location') == $loc->id ? 'selected' : '' }}>
                                    {{ $loc->area_name }} ({{ $loc->plots_count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Plot Type -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">
                            Plot Type
                        </label>
                        <select name="type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600 focus:bg-white transition">
                            <option value="">{{ __('app.select_plot_type') }}</option>
                            @foreach($plotTypes as $pt)
                                <option value="{{ $pt->id }}" {{ request('type') == $pt->id ? 'selected' : '' }}>
                                    {{ $pt->name }} ({{ $pt->plots_count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price Min / Max -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">
                            {{ __('app.price_range') }} (TZS)
                        </label>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min TZS" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600">
                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max TZS" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600">
                        </div>
                    </div>

                    <!-- Min Plot Size -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">
                            {{ __('app.min_size') }}
                        </label>
                        <input type="number" step="any" name="min_size" value="{{ request('min_size') }}" placeholder="e.g. 500 SQM or 2 Acres" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-emerald-600">
                    </div>

                    <!-- Featured Only Checkbox -->
                    <div class="flex items-center gap-2 pt-1">
                        <input type="checkbox" name="featured" id="featured_chk" value="1" {{ request('featured') == '1' ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                        <label for="featured_chk" class="text-xs font-semibold text-slate-700 cursor-pointer">
                            Featured plots only
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider shadow-md shadow-emerald-600/20 transition">
                        Apply Filters
                    </button>
                </form>
            </div>
        </div>

        <!-- Plots Grid Area -->
        <div class="lg:col-span-3">
            <!-- Sort & Control Bar -->
            <div class="bg-white rounded-2xl border border-slate-200/90 p-4 mb-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                <span class="text-xs font-semibold text-slate-600">
                    Showing <strong class="text-slate-900">{{ $plots->firstItem() ?? 0 }}-{{ $plots->lastItem() ?? 0 }}</strong> of <strong class="text-slate-900">{{ $plots->total() }}</strong> plots
                </span>

                <!-- Sort Dropdown -->
                <form method="GET" action="{{ route('plots.index') }}" class="flex items-center gap-2">
                    <!-- Preserve existing query params -->
                    @foreach(request()->except(['sort', 'page']) as $k => $v)
                        <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                    @endforeach

                    <label class="text-xs text-slate-500 font-medium whitespace-nowrap">{{ __('app.sort_by') }}:</label>
                    <select name="sort" onchange="this.form.submit()" class="bg-slate-50 border border-slate-200 rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-emerald-600 cursor-pointer">
                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>{{ __('app.sort_newest') }}</option>
                        <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>{{ __('app.sort_price_low') }}</option>
                        <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>{{ __('app.sort_price_high') }}</option>
                        <option value="size_desc" {{ request('sort') === 'size_desc' ? 'selected' : '' }}>{{ __('app.sort_size_high') }}</option>
                    </select>
                </form>
            </div>

            <!-- Plots Cards Grid -->
            @if($plots->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($plots as $plot)
                        <x-plot-card :plot="$plot" />
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $plots->links() }}
                </div>
            @else
                <!-- No Results State -->
                <div class="bg-white rounded-3xl border border-slate-200 p-12 text-center space-y-4">
                    <div class="w-16 h-16 rounded-full bg-amber-50 text-amber-600 mx-auto flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">No plots match your criteria</h3>
                    <p class="text-sm text-slate-500 max-w-md mx-auto">
                        {{ __('app.no_plots_found') }}
                    </p>
                    <div class="pt-2 flex justify-center gap-3">
                        <a href="{{ route('plots.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-emerald-700 transition">
                            {{ __('app.reset_filters') }}
                        </a>
                        <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND, I have a specific plot requirement in Arusha.') }}" target="_blank" class="px-5 py-2.5 rounded-xl bg-emerald-600 text-white text-xs font-bold hover:bg-emerald-700 transition">
                            Request Custom Plot Search
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
