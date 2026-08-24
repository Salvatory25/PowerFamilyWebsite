<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Plot;
use App\Models\PlotImage;
use App\Models\PlotType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PlotController extends Controller
{
    public function index(Request $request): View
    {
        $query = Plot::with(['plotType', 'location']);

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('plot_reference', 'like', "%{$search}%")
                  ->orWhere('street_address', 'like', "%{$search}%");
            });
        }

        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }

        if ($request->filled('plot_type_id')) {
            $query->where('plot_type_id', $request->plot_type_id);
        }

        if ($request->filled('status')) {
            $query->where('listing_status', $request->status);
        }

        $plots = $query->latest()->paginate(15)->withQueryString();
        $locations = Location::orderBy('area_name')->get();
        $plotTypes = PlotType::orderBy('display_order')->get();

        return view('admin.plots.index', compact('plots', 'locations', 'plotTypes'));
    }

    public function create(): View
    {
        $locations = Location::orderBy('area_name')->get();
        $plotTypes = PlotType::where('is_active', true)->orderBy('display_order')->get();

        return view('admin.plots.create', compact('locations', 'plotTypes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'plot_reference' => 'nullable|string|max:50|unique:plots,plot_reference',
            'plot_type_id' => 'required|exists:plot_types,id',
            'location_id' => 'required|exists:locations,id',
            'street_address' => 'nullable|string|max:255',
            'listing_status' => 'required|in:available,reserved,sold',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:100',
            'price_negotiable' => 'boolean',
            'plot_size' => 'required|numeric|min:0.01',
            'size_unit' => 'required|in:SQM,Acres,Hectares,SQFT',
            'dimension_details' => 'nullable|string|max:255',
            'ownership_title_type' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'nearby_landmarks' => 'nullable|string|max:500',
            'road_accessibility' => 'nullable|string|max:255',
            'has_electricity' => 'boolean',
            'has_water' => 'boolean',
            'has_internet' => 'boolean',
            'has_fence' => 'boolean',
            'topography' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'google_maps_embed_url' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'gallery_images.*' => 'nullable|image|max:5120',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        $validated['price_negotiable'] = $request->boolean('price_negotiable');
        $validated['has_electricity'] = $request->boolean('has_electricity');
        $validated['has_water'] = $request->boolean('has_water');
        $validated['has_internet'] = $request->boolean('has_internet');
        $validated['has_fence'] = $request->boolean('has_fence');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_published'] = $request->boolean('is_published');

        if (empty($validated['plot_reference'])) {
            $validated['plot_reference'] = 'REL-ARU-' . strtoupper(Str::random(5));
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . strtolower(Str::random(4));

        // Handle Main Image
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('plots/featured', 'public');
            $validated['featured_image'] = $path;
        }

        $plot = Plot::create($validated);

        // Handle Multiple Gallery Images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $file) {
                $path = $file->store('plots/gallery', 'public');
                PlotImage::create([
                    'plot_id' => $plot->id,
                    'image_path' => $path,
                    'caption' => $plot->title . ' - Image ' . ($index + 1),
                    'display_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.plots.index')->with('success', 'Plot created successfully.');
    }

    public function edit(Plot $plot): View
    {
        $plot->load(['images']);
        $locations = Location::orderBy('area_name')->get();
        $plotTypes = PlotType::where('is_active', true)->orderBy('display_order')->get();

        return view('admin.plots.edit', compact('plot', 'locations', 'plotTypes'));
    }

    public function update(Request $request, Plot $plot): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'plot_reference' => 'required|string|max:50|unique:plots,plot_reference,' . $plot->id,
            'plot_type_id' => 'required|exists:plot_types,id',
            'location_id' => 'required|exists:locations,id',
            'street_address' => 'nullable|string|max:255',
            'listing_status' => 'required|in:available,reserved,sold',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:100',
            'price_negotiable' => 'boolean',
            'plot_size' => 'required|numeric|min:0.01',
            'size_unit' => 'required|in:SQM,Acres,Hectares,SQFT',
            'dimension_details' => 'nullable|string|max:255',
            'ownership_title_type' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'nearby_landmarks' => 'nullable|string|max:500',
            'road_accessibility' => 'nullable|string|max:255',
            'has_electricity' => 'boolean',
            'has_water' => 'boolean',
            'has_internet' => 'boolean',
            'has_fence' => 'boolean',
            'topography' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'google_maps_embed_url' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'gallery_images.*' => 'nullable|image|max:5120',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        $validated['price_negotiable'] = $request->boolean('price_negotiable');
        $validated['has_electricity'] = $request->boolean('has_electricity');
        $validated['has_water'] = $request->boolean('has_water');
        $validated['has_internet'] = $request->boolean('has_internet');
        $validated['has_fence'] = $request->boolean('has_fence');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('featured_image')) {
            if ($plot->featured_image && Storage::disk('public')->exists($plot->featured_image)) {
                Storage::disk('public')->delete($plot->featured_image);
            }
            $path = $request->file('featured_image')->store('plots/featured', 'public');
            $validated['featured_image'] = $path;
        }

        $plot->update($validated);

        if ($request->hasFile('gallery_images')) {
            $lastOrder = $plot->images()->max('display_order') ?? 0;
            foreach ($request->file('gallery_images') as $file) {
                $lastOrder++;
                $path = $file->store('plots/gallery', 'public');
                PlotImage::create([
                    'plot_id' => $plot->id,
                    'image_path' => $path,
                    'caption' => $plot->title,
                    'display_order' => $lastOrder,
                ]);
            }
        }

        return redirect()->route('admin.plots.index')->with('success', 'Plot updated successfully.');
    }

    public function destroy(Plot $plot): RedirectResponse
    {
        if ($plot->featured_image && Storage::disk('public')->exists($plot->featured_image)) {
            Storage::disk('public')->delete($plot->featured_image);
        }

        foreach ($plot->images as $img) {
            if (Storage::disk('public')->exists($img->image_path)) {
                Storage::disk('public')->delete($img->image_path);
            }
        }

        $plot->delete();

        return redirect()->route('admin.plots.index')->with('success', 'Plot deleted successfully.');
    }

    public function deleteImage(PlotImage $image): RedirectResponse
    {
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }
        $image->delete();

        return back()->with('success', 'Image removed.');
    }

    public function togglePublish(Plot $plot): RedirectResponse
    {
        $plot->update(['is_published' => !$plot->is_published]);
        $status = $plot->is_published ? 'published' : 'unpublished';
        return back()->with('success', "Plot is now {$status}.");
    }

    public function toggleFeatured(Plot $plot): RedirectResponse
    {
        $plot->update(['is_featured' => !$plot->is_featured]);
        $status = $plot->is_featured ? 'marked as featured' : 'removed from featured';
        return back()->with('success', "Plot {$status}.");
    }

    public function updateStatus(Request $request, Plot $plot): RedirectResponse
    {
        $validated = $request->validate([
            'listing_status' => 'required|in:available,reserved,sold',
        ]);

        $plot->update($validated);
        return back()->with('success', "Plot status updated to {$validated['listing_status']}.");
    }
}
