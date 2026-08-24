<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Plot;
use App\Models\PlotType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlotController extends Controller
{
    public function index(Request $request): View
    {
        $query = Plot::with(['plotType', 'location', 'images'])
            ->published();

        // Keyword Search (title, reference, street, description)
        if ($request->filled('keyword')) {
            $keyword = trim($request->keyword);
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('plot_reference', 'like', "%{$keyword}%")
                  ->orWhere('street_address', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%")
                  ->orWhere('nearby_landmarks', 'like', "%{$keyword}%");
            });
        }

        // Location Filter
        if ($request->filled('location')) {
            $query->where('location_id', $request->location);
        }

        // Plot Type Filter
        if ($request->filled('type')) {
            $query->where('plot_type_id', $request->type);
        }

        // Status Filter
        if ($request->filled('status') && in_array($request->status, ['available', 'reserved', 'sold'])) {
            $query->where('listing_status', $request->status);
        }

        // Min Price
        if ($request->filled('min_price') && is_numeric($request->min_price)) {
            $query->where('price', '>=', (float) $request->min_price);
        }

        // Max Price
        if ($request->filled('max_price') && is_numeric($request->max_price)) {
            $query->where('price', '<=', (float) $request->max_price);
        }

        // Min Size
        if ($request->filled('min_size') && is_numeric($request->min_size)) {
            $query->where('plot_size', '>=', (float) $request->min_size);
        }

        // Featured Filter
        if ($request->filled('featured') && $request->featured == '1') {
            $query->where('is_featured', true);
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'size_desc':
                $query->orderBy('plot_size', 'desc');
                break;
            case 'oldest':
                $query->oldest();
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $plots = $query->paginate(9)->withQueryString();

        $locations = Location::withCount(['plots' => function ($q) {
            $q->where('is_published', true);
        }])->orderBy('area_name')->get();

        $plotTypes = PlotType::where('is_active', true)
            ->withCount(['plots' => function ($q) {
                $q->where('is_published', true);
            }])
            ->orderBy('display_order')
            ->get();

        return view('public.plots.index', compact('plots', 'locations', 'plotTypes'));
    }

    public function show(string $slug): View
    {
        $plot = Plot::with(['plotType', 'location', 'images'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment views count safely
        $plot->increment('views_count');

        // Related Plots in same location or same plot type
        $relatedPlots = Plot::with(['plotType', 'location', 'images'])
            ->published()
            ->where('id', '!=', $plot->id)
            ->where(function ($q) use ($plot) {
                $q->where('location_id', $plot->location_id)
                  ->orWhere('plot_type_id', $plot->plot_type_id);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('public.plots.show', compact('plot', 'relatedPlots'));
    }
}
