@extends('layouts.admin')

@section('title', 'Edit Location: ' . $location->area_name)

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-1">
                <a href="{{ route('admin.locations.index') }}" class="hover:text-white">Locations</a>
                <span>/</span>
                <span class="text-white">Edit</span>
            </nav>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Edit {{ $location->area_name }}</h1>
        </div>
        <a href="{{ route('admin.locations.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition">
            Cancel
        </a>
    </div>

    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-950/80 border border-rose-800 text-rose-300 text-xs">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.locations.update', $location->id) }}" method="POST" enctype="multipart/form-data" class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Area / Neighborhood Name *
                </label>
                <input type="text" name="area_name" value="{{ old('area_name', $location->area_name) }}" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    District *
                </label>
                <input type="text" name="district" value="{{ old('district', $location->district) }}" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Region *
                </label>
                <input type="text" name="region" value="{{ old('region', $location->region) }}" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Ward (Kata)
                </label>
                <input type="text" name="ward" value="{{ old('ward', $location->ward) }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Area Description & Highlights
                </label>
                <textarea name="description" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">{{ old('description', $location->description) }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Cover Photo
                </label>
                @if($location->featured_image)
                    <div class="mb-2">
                        <img src="{{ $location->featured_image }}" class="w-24 h-16 object-cover rounded-lg border border-slate-700">
                    </div>
                @endif
                <input type="file" name="featured_image" accept="image/*" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2 text-xs text-slate-300 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-600 file:text-white cursor-pointer">
            </div>

            <div class="sm:col-span-2 pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_popular" value="1" {{ old('is_popular', $location->is_popular) ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded bg-slate-900 border-slate-700">
                    <span class="text-xs font-semibold text-slate-200">Show in Popular Arusha Locations on Homepage</span>
                </label>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-700 flex justify-end gap-3">
            <a href="{{ route('admin.locations.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 text-slate-300 text-xs font-bold">Cancel</a>
            <button type="submit" class="px-6 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold">Update Location</button>
        </div>
    </form>
</div>
@endsection
