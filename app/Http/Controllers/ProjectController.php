<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $query = Project::with(['images'])->published();

        if ($request->filled('type')) {
            $query->where('project_type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('project_status', $request->status);
        }

        if ($request->filled('location')) {
            $query->where('location_name', 'like', '%' . $request->location . '%');
        }

        $projects = $query->latest('completion_date')->latest()->paginate(9)->withQueryString();

        $projectTypes = Project::published()
            ->select('project_type')
            ->distinct()
            ->pluck('project_type');

        return view('public.projects.index', compact('projects', 'projectTypes'));
    }

    public function show(string $slug): View
    {
        $project = Project::with(['images'])->where('slug', $slug)->published()->firstOrFail();

        $project->increment('views_count');

        $relatedProjects = Project::published()
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        $featuredPlots = Plot::with(['plotType', 'location', 'images'])
            ->published()
            ->featured()
            ->latest()
            ->take(3)
            ->get();

        return view('public.projects.show', compact('project', 'relatedProjects', 'featuredPlots'));
    }
}
