<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::with('images');

        if ($request->filled('status')) {
            $query->where('listing_status', $request->status);
        }

        if ($request->filled('make')) {
            $query->where('make', $request->make);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('vehicle_reference', 'like', "%{$s}%")
                  ->orWhere('make', 'like', "%{$s}%")
                  ->orWhere('model', 'like', "%{$s}%");
            });
        }

        $vehicles = $query->latest()->paginate(15)->withQueryString();

        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('admin.vehicles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'make' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'transmission' => 'required|string|max:50',
            'fuel_type' => 'required|string|max:50',
            'mileage' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'body_type' => 'nullable|string|max:50',
            'listing_status' => 'required|in:available,reserved,sold',
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
            $path = $request->file('featured_image')->store('vehicles', 'public');
            $validated['featured_image'] = $path;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');
        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        $vehicle = Vehicle::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $idx => $file) {
                $path = $file->store('vehicles/gallery', 'public');
                VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'image_path' => $path,
                    'is_primary' => $idx === 0 && empty($vehicle->featured_image),
                    'display_order' => $idx,
                ]);
            }
        }

        return redirect()->route('admin.vehicles.index')->with('success', 'Gari limeongezwa kikamilifu!');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'make' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'transmission' => 'required|string|max:50',
            'fuel_type' => 'required|string|max:50',
            'mileage' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'body_type' => 'nullable|string|max:50',
            'listing_status' => 'required|in:available,reserved,sold',
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
            if ($vehicle->featured_image && !str_starts_with($vehicle->featured_image, 'http')) {
                Storage::disk('public')->delete($vehicle->featured_image);
            }
            $path = $request->file('featured_image')->store('vehicles', 'public');
            $validated['featured_image'] = $path;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        $vehicle->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $idx => $file) {
                $path = $file->store('vehicles/gallery', 'public');
                VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'image_path' => $path,
                    'display_order' => $vehicle->images()->count() + $idx,
                ]);
            }
        }

        return redirect()->route('admin.vehicles.index')->with('success', 'Taarifa za gari zimesasishwa!');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->featured_image && !str_starts_with($vehicle->featured_image, 'http')) {
            Storage::disk('public')->delete($vehicle->featured_image);
        }
        foreach ($vehicle->images as $img) {
            if (!str_starts_with($img->image_path, 'http')) {
                Storage::disk('public')->delete($img->image_path);
            }
        }
        $vehicle->delete();

        return redirect()->route('admin.vehicles.index')->with('success', 'Gari limefutwa kikamilifu.');
    }

    public function deleteImage(VehicleImage $image)
    {
        if (!str_starts_with($image->image_path, 'http')) {
            Storage::disk('public')->delete($image->image_path);
        }
        $image->delete();

        return response()->json(['success' => true]);
    }
}
