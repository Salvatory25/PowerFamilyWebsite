<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationController extends Controller
{
    public function index(): View
    {
        $locations = Location::withCount(['plots' => function ($q) {
            $q->where('is_published', true);
        }])
            ->orderBy('display_order')
            ->get();

        return view('public.locations.index', compact('locations'));
    }

    public function show(string $slug): View
    {
        $location = Location::where('slug', $slug)->firstOrFail();

        $plots = Plot::with(['plotType', 'location', 'images'])
            ->published()
            ->where('location_id', $location->id)
            ->latest()
            ->paginate(9);

        return view('public.locations.show', compact('location', 'plots'));
    }
}
