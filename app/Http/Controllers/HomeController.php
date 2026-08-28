<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\GalleryItem;
use App\Models\House;
use App\Models\Location;
use App\Models\Plot;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Featured Plots
        $featuredPlots = Plot::where('is_published', true)
            ->where('listing_status', 'available')
            ->orderBy('is_featured', 'desc')
            ->latest()
            ->take(6)
            ->with(['location', 'plotType', 'images'])
            ->get();

        // 2. Featured Houses
        $featuredHouses = House::where('is_published', true)
            ->where('listing_status', 'available')
            ->orderBy('is_featured', 'desc')
            ->latest()
            ->take(4)
            ->with(['location', 'images'])
            ->get();

        // 3. Featured Vehicles
        $featuredVehicles = Vehicle::where('is_published', true)
            ->where('listing_status', 'available')
            ->orderBy('is_featured', 'desc')
            ->latest()
            ->take(4)
            ->with('images')
            ->get();

        // 4. Locations
        $locations = Location::orderBy('display_order', 'asc')
            ->withCount(['availablePlots', 'availableHouses'])
            ->take(6)
            ->get();

        // 5. Recent Blog Articles
        $articles = Article::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        // 6. Gallery Highlights
        $galleryHighlights = GalleryItem::where('is_active', true)
            ->orderBy('display_order', 'asc')
            ->take(8)
            ->get();

        // Counts for discovery stats
        $counts = [
            'plots' => Plot::where('is_published', true)->where('listing_status', 'available')->count(),
            'houses' => House::where('is_published', true)->where('listing_status', 'available')->count(),
            'vehicles' => Vehicle::where('is_published', true)->where('listing_status', 'available')->count(),
            'locations' => Location::count(),
        ];

        return view('public.home', compact(
            'featuredPlots',
            'featuredHouses',
            'featuredVehicles',
            'locations',
            'articles',
            'galleryHighlights',
            'counts'
        ));
    }
}
