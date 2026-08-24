@extends('layouts.admin')

@section('title', 'Add Plot Type')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-1">
                <a href="{{ route('admin.plot-types.index') }}" class="hover:text-white">Plot Types</a>
                <span>/</span>
                <span class="text-white">Create</span>
            </nav>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Add Plot Type</h1>
        </div>
        <a href="{{ route('admin.plot-types.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition">
            Cancel
        </a>
    </div>

    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-950/80 border border-rose-800 text-rose-300 text-xs">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.plot-types.store') }}" method="POST" class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-5">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    English Name *
                </label>
                <input type="text" name="name_en" value="{{ old('name_en') }}" required placeholder="e.g. Residential" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Kiswahili Name *
                </label>
                <input type="text" name="name_sw" value="{{ old('name_sw') }}" required placeholder="e.g. Makazi" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
            </div>

            <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Description
                </label>
                <textarea name="description" rows="3" placeholder="Zoning requirements and permitted construction uses..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">{{ old('description') }}</textarea>
            </div>

            <div class="sm:col-span-2 pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded bg-slate-900 border-slate-700">
                    <span class="text-xs font-semibold text-slate-200">Active (Visible in public search filters)</span>
                </label>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-700 flex justify-end gap-3">
            <a href="{{ route('admin.plot-types.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 text-slate-300 text-xs font-bold">Cancel</a>
            <button type="submit" class="px-6 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold">Create Type</button>
        </div>
    </form>
</div>
@endsection
