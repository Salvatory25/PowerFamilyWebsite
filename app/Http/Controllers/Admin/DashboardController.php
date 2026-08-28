<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Enquiry;
use App\Models\GalleryItem;
use App\Models\House;
use App\Models\Location;
use App\Models\Plot;
use App\Models\Vehicle;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_plots' => Plot::count(),
            'available_plots' => Plot::where('listing_status', 'available')->count(),
            'sold_plots' => Plot::where('listing_status', 'sold')->count(),

            'total_houses' => House::count(),
            'available_houses' => House::where('listing_status', 'available')->count(),
            'sold_houses' => House::where('listing_status', 'sold')->count(),

            'total_vehicles' => Vehicle::count(),
            'available_vehicles' => Vehicle::where('listing_status', 'available')->count(),
            'sold_vehicles' => Vehicle::where('listing_status', 'sold')->count(),

            'total_locations' => Location::count(),
            'total_articles' => Article::count(),
            'total_gallery' => GalleryItem::count(),

            'total_enquiries' => Enquiry::count(),
            'new_enquiries' => Enquiry::where('status', 'new')->count(),
        ];

        $recentEnquiries = Enquiry::latest()->take(6)->get();
        $recentPlots = Plot::with('location')->latest()->take(5)->get();
        $recentHouses = House::with('location')->latest()->take(5)->get();
        $recentVehicles = Vehicle::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentEnquiries',
            'recentPlots',
            'recentHouses',
            'recentVehicles'
        ));
    }
}
