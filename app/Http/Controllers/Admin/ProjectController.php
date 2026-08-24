<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $query = Project::with(['images']);

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('location_name', 'like', "%{$s}%")
                  ->orWhere('project_type', 'like', "%{$s}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('project_status', $request->status);
        }

        $projects = $query->latest()->paginate(15)->withQueryString();

        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('admin.projects.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'services_performed' => 'nullable|string', // Comma separated or textarea lines
            'project_status' => 'required|in:completed,in_progress,planning',
            'client_type' => 'nullable|string|max:255',
            'size_covered' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'featured_image' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
        ]);

        $servicesArray = [];
        if (!empty($validated['services_performed'])) {
            $servicesArray = array_map('trim', explode(',', $validated['services_performed']));
        }

        $project = new Project();
        $project->name = $validated['name'];
        $project->slug = Str::slug($validated['name']);
        $project->location_name = $validated['location_name'];
        $project->project_type = $validated['project_type'];
        $project->short_description = $validated['short_description'] ?? null;
        $project->description = $validated['description'];
        $project->services_performed = $servicesArray;
        $project->project_status = $validated['project_status'];
        $project->client_type = $validated['client_type'] ?? null;
        $project->size_covered = $validated['size_covered'] ?? null;
        $project->completion_date = $validated['completion_date'] ?? null;
        $project->latitude = $validated['latitude'] ?? null;
        $project->longitude = $validated['longitude'] ?? null;
        $project->is_featured = $request->boolean('is_featured');
        $project->is_published = $request->boolean('is_published', true);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('projects', 'public');
            $project->featured_image = $path;
        }

        $project->save();

        if ($request->hasFile('images')) {
            $order = 1;
            foreach ($request->file('images') as $file) {
                $path = $file->store('projects/gallery', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'display_order' => $order++,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location_name' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'services_performed' => 'nullable|string',
            'project_status' => 'required|in:completed,in_progress,planning',
            'client_type' => 'nullable|string|max:255',
            'size_covered' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'featured_image' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
        ]);

        $servicesArray = [];
        if (!empty($validated['services_performed'])) {
            $servicesArray = array_map('trim', explode(',', $validated['services_performed']));
        }

        $project->name = $validated['name'];
        $project->location_name = $validated['location_name'];
        $project->project_type = $validated['project_type'];
        $project->short_description = $validated['short_description'] ?? null;
        $project->description = $validated['description'];
        $project->services_performed = $servicesArray;
        $project->project_status = $validated['project_status'];
        $project->client_type = $validated['client_type'] ?? null;
        $project->size_covered = $validated['size_covered'] ?? null;
        $project->completion_date = $validated['completion_date'] ?? null;
        $project->latitude = $validated['latitude'] ?? null;
        $project->longitude = $validated['longitude'] ?? null;
        $project->is_featured = $request->boolean('is_featured');
        $project->is_published = $request->boolean('is_published');

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image && !str_starts_with($project->featured_image, 'http')) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $path = $request->file('featured_image')->store('projects', 'public');
            $project->featured_image = $path;
        }

        $project->save();

        if ($request->hasFile('images')) {
            $maxOrder = $project->images()->max('display_order') ?? 0;
            foreach ($request->file('images') as $file) {
                $path = $file->store('projects/gallery', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'display_order' => ++$maxOrder,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function toggleFeatured(Project $project): RedirectResponse
    {
        $project->is_featured = !$project->is_featured;
        $project->save();

        return redirect()->back()->with('success', 'Project featured status updated.');
    }

    public function togglePublish(Project $project): RedirectResponse
    {
        $project->is_published = !$project->is_published;
        $project->save();

        return redirect()->back()->with('success', 'Project publication status updated.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($project->featured_image && !str_starts_with($project->featured_image, 'http')) {
            Storage::disk('public')->delete($project->featured_image);
        }

        foreach ($project->images as $img) {
            if (!str_starts_with($img->image_path, 'http')) {
                Storage::disk('public')->delete($img->image_path);
            }
            $img->delete();
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    public function deleteImage(ProjectImage $image): RedirectResponse
    {
        if (!str_starts_with($image->image_path, 'http')) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Gallery image deleted.');
    }
}
