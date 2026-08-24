<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LocationController extends Controller
{
    public function index(): View
    {
        $locations = Location::withCount('plots')->orderBy('display_order')->get();
        return view('admin.locations.index', compact('locations'));
    }

    public function create(): View
    {
        return view('admin.locations.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'region' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'ward' => 'nullable|string|max:100',
            'area_name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'is_popular' => 'boolean',
            'display_order' => 'nullable|integer',
        ]);

        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['slug'] = Str::slug($validated['area_name'] . '-' . $validated['district']);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('locations', 'public');
        }

        Location::create($validated);

        return redirect()->route('admin.locations.index')->with('success', 'Location created successfully.');
    }

    public function edit(Location $location): View
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location): RedirectResponse
    {
        $validated = $request->validate([
            'region' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'ward' => 'nullable|string|max:100',
            'area_name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'is_popular' => 'boolean',
            'display_order' => 'nullable|integer',
        ]);

        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['slug'] = Str::slug($validated['area_name'] . '-' . $validated['district']);

        if ($request->hasFile('featured_image')) {
            if ($location->featured_image && Storage::disk('public')->exists($location->featured_image)) {
                Storage::disk('public')->delete($location->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('locations', 'public');
        }

        $location->update($validated);

        return redirect()->route('admin.locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location): RedirectResponse
    {
        if ($location->plots()->exists()) {
            return back()->with('error', 'Cannot delete location because plots are associated with it.');
        }

        $location->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Location deleted.');
    }
}
