<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlotType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PlotTypeController extends Controller
{
    public function index(): View
    {
        $types = PlotType::withCount('plots')->orderBy('display_order')->get();
        return view('admin.plot_types.index', compact('types'));
    }

    public function create(): View
    {
        return view('admin.plot_types.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:100',
            'name_sw' => 'required|string|max:100',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['slug'] = Str::slug($validated['name_en']);

        PlotType::create($validated);

        return redirect()->route('admin.plot-types.index')->with('success', 'Plot type created successfully.');
    }

    public function edit(PlotType $plotType): View
    {
        return view('admin.plot_types.edit', compact('plotType'));
    }

    public function update(Request $request, PlotType $plotType): RedirectResponse
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:100',
            'name_sw' => 'required|string|max:100',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['slug'] = Str::slug($validated['name_en']);

        $plotType->update($validated);

        return redirect()->route('admin.plot-types.index')->with('success', 'Plot type updated successfully.');
    }

    public function destroy(PlotType $plotType): RedirectResponse
    {
        if ($plotType->plots()->exists()) {
            return back()->with('error', 'Cannot delete plot type because plots are associated with it.');
        }

        $plotType->delete();

        return redirect()->route('admin.plot-types.index')->with('success', 'Plot type deleted.');
    }
}
