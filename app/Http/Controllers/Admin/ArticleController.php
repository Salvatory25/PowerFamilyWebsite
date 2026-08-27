<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
        }

        $articles = $query->orderBy('published_at', 'desc')
                          ->orderBy('created_at', 'desc')
                          ->paginate(10)
                          ->withQueryString();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'excerpt' => 'required|string|max:1000',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'image_url' => 'nullable|string|max:500',
            'published_at' => 'nullable|date',
        ]);

        $slug = (!empty($validated['slug']) ? $validated['slug'] : null) ?: Str::slug($validated['title']);
        // Ensure slug uniqueness
        $originalSlug = $slug;
        $count = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        $imageUrl = $validated['image_url'] ?? null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $imageUrl = '/storage/' . $path;
        }

        Article::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'image_url' => $imageUrl,
            'published_at' => $validated['published_at'] ?? now(),
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Makala imechapishwa kikamilifu! (Article published successfully)');
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug,' . $article->id,
            'excerpt' => 'required|string|max:1000',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'image_url' => 'nullable|string|max:500',
            'published_at' => 'nullable|date',
        ]);

        $rawSlug = !empty($validated['slug']) ? $validated['slug'] : Str::slug($validated['title']);
        $slug = $rawSlug ?: $article->slug;

        if ($slug !== $article->slug) {
            $originalSlug = $slug;
            $count = 1;
            while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
        }

        $imageUrl = $article->image_url;

        if ($request->filled('image_url')) {
            $imageUrl = $request->input('image_url');
        }

        if ($request->hasFile('image')) {
            // Delete old uploaded image if in storage
            if ($article->image_url && Str::startsWith($article->image_url, '/storage/')) {
                $oldPath = Str::replaceFirst('/storage/', '', $article->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('blogs', 'public');
            $imageUrl = '/storage/' . $path;
        }

        $article->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'image_url' => $imageUrl,
            'published_at' => $validated['published_at'] ?? $article->published_at,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Makala imesasishwa kikamilifu! (Article updated successfully)');
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image_url && Str::startsWith($article->image_url, '/storage/')) {
            $oldPath = Str::replaceFirst('/storage/', '', $article->image_url);
            Storage::disk('public')->delete($oldPath);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Makala imefutwa kikamilifu! (Article deleted successfully)');
    }
}
