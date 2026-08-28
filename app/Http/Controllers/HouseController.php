<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Location;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $query = House::query()->where('is_published', true);

        if ($request->filled('location')) {
            $query->where('location_id', $request->location);
        }

        if ($request->filled('status')) {
            $query->where('listing_status', $request->status);
        }

        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', (int)$request->bedrooms);
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
                  ->orWhere('description', 'like', "%{$s}%");
            });
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            default => $query->orderBy('created_at', 'desc'),
        };

        $houses = $query->with(['location', 'images'])->paginate(9)->withQueryString();
        $locations = Location::orderBy('area_name')->get();

        return view('public.houses.index', compact('houses', 'locations'));
    }

    public function show($slug)
    {
        $house = House::where('slug', $slug)
            ->where('is_published', true)
            ->with(['location', 'images'])
            ->firstOrFail();

        $house->increment('views_count');

        $relatedHouses = House::where('id', '!=', $house->id)
            ->where('is_published', true)
            ->where('listing_status', 'available')
            ->take(3)
            ->get();

        return view('public.houses.show', compact('house', 'relatedHouses'));
    }
}
