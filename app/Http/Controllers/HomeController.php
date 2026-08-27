<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Plot;
use App\Models\PlotType;
use App\Models\Project;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // 6 Core Land Services
        $services = ServiceController::getServicesList();

        $featuredProjects = collect();
        $featuredPlots = collect();
        $latestPlots = collect();
        $popularLocations = collect();
        $plotTypes = collect();
        $locations = collect();

        try {
            // Featured Land Projects (Surveying, Formalization, Subdivisions)
            $featuredProjects = Project::with(['images'])
                ->published()
                ->featured()
                ->latest('completion_date')
                ->take(4)
                ->get();

            // Verified Plots for Sale
            $featuredPlots = Plot::with(['plotType', 'location', 'images'])
                ->published()
                ->featured()
                ->latest()
                ->take(6)
                ->get();

            $latestPlots = Plot::with(['plotType', 'location', 'images'])
                ->published()
                ->latest()
                ->take(6)
                ->get();

            $popularLocations = Location::withCount(['plots' => function ($q) {
                $q->where('is_published', true);
            }])
                ->orderBy('display_order')
                ->take(6)
                ->get();

            $plotTypes = PlotType::where('is_active', true)
                ->withCount(['plots' => function ($q) {
                    $q->where('is_published', true);
                }])
                ->orderBy('display_order')
                ->get();

            $locations = Location::orderBy('area_name')->get();
        } catch (\Throwable $e) {
            // DB is offline or not configured yet on Vercel
        }

        // High-level company statistics
        $stats = [
            'surveyed_plots' => '1,450+',
            'formalized_acres' => '850+',
            'clean_titles' => '100%',
            'years_experience' => '10+'
        ];

        return view('public.home', compact(
            'services',
            'featuredProjects',
            'featuredPlots',
            'latestPlots',
            'popularLocations',
            'plotTypes',
            'locations',
            'stats'
        ));
    }
}
