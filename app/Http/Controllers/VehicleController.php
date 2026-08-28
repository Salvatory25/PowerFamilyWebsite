<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::query()->where('is_published', true);

        if ($request->filled('make')) {
            $query->where('make', $request->make);
        }

        if ($request->filled('transmission')) {
            $query->where('transmission', $request->transmission);
        }

        if ($request->filled('fuel')) {
            $query->where('fuel_type', $request->fuel);
        }

        if ($request->filled('status')) {
            $query->where('listing_status', $request->status);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('make', 'like', "%{$s}%")
                  ->orWhere('model', 'like', "%{$s}%")
                  ->orWhere('description', 'like', "%{$s}%");
            });
        }

        $sort = $request->get('sort', 'newest');
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'year_desc' => $query->orderBy('year', 'desc'),
            default => $query->orderBy('created_at', 'desc'),
        };

        $vehicles = $query->with('images')->paginate(9)->withQueryString();
        $makes = Vehicle::distinct()->pluck('make');

        return view('public.vehicles.index', compact('vehicles', 'makes'));
    }

    public function show($slug)
    {
        $vehicle = Vehicle::where('slug', $slug)
            ->where('is_published', true)
            ->with('images')
            ->firstOrFail();

        $vehicle->increment('views_count');

        $relatedVehicles = Vehicle::where('id', '!=', $vehicle->id)
            ->where('is_published', true)
            ->where('listing_status', 'available')
            ->take(3)
            ->get();

        return view('public.vehicles.show', compact('vehicle', 'relatedVehicles'));
    }
}
