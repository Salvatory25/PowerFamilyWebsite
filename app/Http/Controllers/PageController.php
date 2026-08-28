<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Enquiry;
use App\Models\House;
use App\Models\Plot;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('public.pages.about');
    }

    public function contact(): View
    {
        return view('public.pages.contact');
    }

    public function privacy(): View
    {
        return view('public.pages.privacy');
    }

    public function terms(): View
    {
        return view('public.pages.terms');
    }

    public function insights(): View
    {
        $articles = Article::where('is_published', true)->latest('published_at')->paginate(9);
        return view('public.pages.insights', compact('articles'));
    }

    public function showArticle($slug): View
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $recentArticles = Article::where('id', '!=', $article->id)->where('is_published', true)->take(3)->get();
        return view('public.pages.article', compact('article', 'recentArticles'));
    }

    public function submitEnquiry(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'category' => 'nullable|string|max:50',
            'plot_id' => 'nullable|exists:plots,id',
            'house_id' => 'nullable|exists:houses,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'preferred_contact_method' => 'nullable|string',
            'message' => 'required|string|max:3000',
        ]);
        
        $trackingRef = 'PFI-' . strtoupper(substr(uniqid(), -6));

        Enquiry::create([
            'tracking_reference' => $trackingRef,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'category' => $validated['category'] ?? 'kiwanja',
            'plot_id' => $validated['plot_id'] ?? null,
            'house_id' => $validated['house_id'] ?? null,
            'vehicle_id' => $validated['vehicle_id'] ?? null,
            'preferred_contact_method' => $validated['preferred_contact_method'] ?? 'whatsapp',
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        $msg = app()->getLocale() === 'en'
            ? "Thank you! Your inquiry has been received. Reference: {$trackingRef}. We will contact you shortly."
            : "Asante! Ujumbe wako umepokelewa kikamilifu. Namba ya Kumbukumbu: {$trackingRef}. Tutawasiliana nawe hivi punde.";

        return redirect()->back()->with('success', $msg);
    }
}
