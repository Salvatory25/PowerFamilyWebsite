<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Location;
use App\Models\Plot;
use App\Models\PlotType;
use App\Models\Project;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_projects' => Project::count(),
            'completed_projects' => Project::where('project_status', 'completed')->count(),
            'total_plots' => Plot::count(),
            'available_plots' => Plot::where('listing_status', 'available')->count(),
            'reserved_plots' => Plot::where('listing_status', 'reserved')->count(),
            'sold_plots' => Plot::where('listing_status', 'sold')->count(),
            'featured_plots' => Plot::where('is_featured', true)->count(),
            'total_enquiries' => Enquiry::count(),
            'new_enquiries' => Enquiry::where('status', 'new')->count(),
            'total_locations' => Location::count(),
        ];

        $recentProjects = Project::latest()
            ->take(4)
            ->get();

        $recentPlots = Plot::with(['plotType', 'location'])
            ->latest()
            ->take(4)
            ->get();

        $recentEnquiries = Enquiry::with(['plot', 'project'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentPlots', 'recentEnquiries'));
    }
}
