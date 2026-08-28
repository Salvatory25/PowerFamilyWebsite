<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryItem::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $items = $query->orderBy('display_order', 'asc')->latest()->paginate(24);

        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:viwanja,nyumba,magari,matukio,wateja,projects',
            'image' => 'required|image|max:5120',
            'description' => 'nullable|string|max:500',
            'display_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryItem::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'image_path' => $path,
            'description' => $validated['description'] ?? null,
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Picha imeongezwa kwenye matunzio!');
    }

    public function destroy(GalleryItem $gallery)
    {
        if (!str_starts_with($gallery->image_path, 'http')) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Picha imefutwa.');
    }
}
