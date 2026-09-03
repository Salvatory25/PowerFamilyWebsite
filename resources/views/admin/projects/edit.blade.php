@extends('layouts.admin')

@section('title', 'Edit Project: ' . $project->name)
@section('header_title', 'Edit Land Project')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-white">Edit Land Project</h2>
            <p class="text-xs text-slate-400">Update case study details, images, and completion milestones.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 text-slate-300 hover:text-white text-xs font-bold transition">
            &larr; Back to Projects
        </a>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="bg-[#280508] p-6 sm:p-8 rounded-3xl border border-[#750D15] space-y-6 shadow-xl">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <h3 class="text-xs font-extrabold uppercase tracking-wider text-[#D48B16] border-b border-[#750D15] pb-2">
                1. Project Identity & Location
            </h3>

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1">Project Name *</label>
                <input type="text" name="name" value="{{ old('name', $project->name) }}" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
                @error('name') <p class="text-rose-400 text-[11px] mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">Location / Area Name *</label>
                    <input type="text" name="location_name" value="{{ old('location_name', $project->location_name) }}" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
                    @error('location_name') <p class="text-rose-400 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">Project Type *</label>
                    <input type="text" name="project_type" value="{{ old('project_type', $project->project_type) }}" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
                    @error('project_type') <p class="text-rose-400 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="text-xs font-extrabold uppercase tracking-wider text-[#D48B16] border-b border-[#750D15] pb-2">
                2. Scope & Technical Overview
            </h3>

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1">Short Summary</label>
                <input type="text" name="short_description" value="{{ old('short_description', $project->short_description) }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1">Detailed Case Study Description *</label>
                <textarea name="description" rows="5" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">{{ old('description', $project->description) }}</textarea>
                @error('description') <p class="text-rose-400 text-[11px] mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1">Services Performed (Comma separated)</label>
                @php
                    $servicesStr = is_array($project->services_performed) ? implode(', ', $project->services_performed) : '';
                @endphp
                <input type="text" name="services_performed" value="{{ old('services_performed', $servicesStr) }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="text-xs font-extrabold uppercase tracking-wider text-[#D48B16] border-b border-[#750D15] pb-2">
                3. Specifications & Timeline
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">Project Status *</label>
                    <select name="project_status" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                        <option value="completed" {{ old('project_status', $project->project_status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="in_progress" {{ old('project_status', $project->project_status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="planning" {{ old('project_status', $project->project_status) == 'planning' ? 'selected' : '' }}>Planning Phase</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">Size Covered</label>
                    <input type="text" name="size_covered" value="{{ old('size_covered', $project->size_covered) }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">Completion Date</label>
                    <input type="date" name="completion_date" value="{{ old('completion_date', $project->completion_date ? $project->completion_date->format('Y-m-d') : '') }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">Client Sector / Association</label>
                    <input type="text" name="client_type" value="{{ old('client_type', $project->client_type) }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#D48B16]">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Latitude</label>
                        <input type="text" name="latitude" value="{{ old('latitude', $project->latitude) }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">Longitude</label>
                        <input type="text" name="longitude" value="{{ old('longitude', $project->longitude) }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500">
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="text-xs font-extrabold uppercase tracking-wider text-[#D48B16] border-b border-[#750D15] pb-2">
                4. Images & Publishing
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">Replace Cover Image</label>
                    @if($project->featured_image)
                        <div class="mb-2 w-24 h-16 rounded-lg overflow-hidden border border-slate-700">
                            <img src="{{ $project->image_url }}" alt="Cover" class="w-full h-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="featured_image" accept="image/*" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3 py-2 text-xs text-slate-400 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#750D15] file:text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">Add More Gallery Photos</label>
                    <input type="file" name="images[]" multiple accept="image/*" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3 py-2 text-xs text-slate-400 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#750D15] file:text-white">
                </div>
            </div>

            <!-- Existing Gallery List -->
            @if($project->images->count() > 0)
                <div class="pt-2">
                    <span class="block text-xs font-bold text-slate-400 mb-2">Existing Gallery Photos</span>
                    <div class="grid grid-cols-3 sm:grid-cols-6 gap-3">
                        @foreach($project->images as $galImg)
                            <div class="relative group rounded-xl overflow-hidden h-20 border border-slate-700">
                                <img src="{{ $galImg->image_url }}" alt="Gallery" class="w-full h-full object-cover">
                                <form method="POST" action="{{ route('admin.projects.images.destroy', $galImg) }}" onsubmit="return confirm('Delete this image?')" class="absolute top-1 right-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 bg-rose-900 text-white rounded-md text-[10px]" title="Delete Image">✕</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex items-center gap-6 pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-[#D48B16] focus:ring-0">
                    <span class="text-xs font-bold text-slate-300">Feature on Homepage</span>
                </label>

                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $project->is_published) ? 'checked' : '' }} class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-emerald-500 focus:ring-0">
                    <span class="text-xs font-bold text-slate-300">Published</span>
                </label>
            </div>
        </div>

        <div class="pt-4 border-t border-[#750D15] flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-800 text-slate-400 hover:text-white text-xs font-bold">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#D48B16] hover:bg-[#b5882e] text-[#280508] font-extrabold text-xs shadow-lg transition">
                Update Project
            </button>
        </div>
    </form>
</div>

@endsection
