<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\HouseImage;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $query = House::with(['location', 'images']);

        if ($request->filled('status')) {
            $query->where('listing_status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('house_reference', 'like', "%{$s}%");
            });
        }

        $houses = $query->latest()->paginate(15)->withQueryString();

        return view('admin.houses.index', compact('houses'));
    }

    public function create()
    {
        $locations = Location::orderBy('area_name')->get();
        return view('admin.houses.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'location_id' => 'nullable|exists:locations,id',
            'price' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'plot_size' => 'nullable|string|max:100',
            'house_size' => 'nullable|string|max:100',
            'listing_status' => 'required|in:available,reserved,sold',
            'ownership_title_type' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        if (!empty($validated['features'])) {
            $featuresArray = array_filter(array_map('trim', explode("\n", $validated['features'])));
            $validated['features'] = array_values($featuresArray);
        } else {
            $validated['features'] = [];
        }

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('houses', 'public');
            $validated['featured_image'] = $path;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');
        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        $house = House::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $idx => $file) {
                $path = $file->store('houses/gallery', 'public');
                HouseImage::create([
                    'house_id' => $house->id,
                    'image_path' => $path,
                    'is_primary' => $idx === 0 && empty($house->featured_image),
                    'display_order' => $idx,
                ]);
            }
        }

        return redirect()->route('admin.houses.index')->with('success', 'Nyumba imeongezwa kikamilifu!');
    }

    public function edit(House $house)
    {
        $locations = Location::orderBy('area_name')->get();
        return view('admin.houses.edit', compact('house', 'locations'));
    }

    public function update(Request $request, House $house)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'location_id' => 'nullable|exists:locations,id',
            'price' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'plot_size' => 'nullable|string|max:100',
            'house_size' => 'nullable|string|max:100',
            'listing_status' => 'required|in:available,reserved,sold',
            'ownership_title_type' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'images.*' => 'nullable|image|max:5120',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        if (!empty($validated['features'])) {
            $featuresArray = array_filter(array_map('trim', explode("\n", $validated['features'])));
            $validated['features'] = array_values($featuresArray);
        } else {
            $validated['features'] = [];
        }

        if ($request->hasFile('featured_image')) {
            if ($house->featured_image && !str_starts_with($house->featured_image, 'http')) {
                Storage::disk('public')->delete($house->featured_image);
            }
            $path = $request->file('featured_image')->store('houses', 'public');
            $validated['featured_image'] = $path;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        $house->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $idx => $file) {
                $path = $file->store('houses/gallery', 'public');
                HouseImage::create([
                    'house_id' => $house->id,
                    'image_path' => $path,
                    'display_order' => $house->images()->count() + $idx,
                ]);
            }
        }

        return redirect()->route('admin.houses.index')->with('success', 'Taarifa za nyumba zimesasishwa!');
    }

    public function destroy(House $house)
    {
        if ($house->featured_image && !str_starts_with($house->featured_image, 'http')) {
            Storage::disk('public')->delete($house->featured_image);
        }
        foreach ($house->images as $img) {
            if (!str_starts_with($img->image_path, 'http')) {
                Storage::disk('public')->delete($img->image_path);
            }
        }
        $house->delete();

        return redirect()->route('admin.houses.index')->with('success', 'Nyumba imefutwa kikamilifu.');
    }

    public function deleteImage(HouseImage $image)
    {
        if (!str_starts_with($image->image_path, 'http')) {
            Storage::disk('public')->delete($image->image_path);
        }
        $image->delete();

        return response()->json(['success' => true]);
    }
}
