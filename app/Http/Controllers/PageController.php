<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Plot;
use App\Models\Project;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $services = ServiceController::getServicesList();
        $projectsCount = 120;
        $plotsCount = 450;

        try {
            $projectsCount = Project::published()->count();
            $plotsCount = Plot::published()->count();
        } catch (\Throwable $e) {
            // DB offline fallback
        }

        return view('public.pages.about', compact('services', 'projectsCount', 'plotsCount'));
    }

    public function contact(): View
    {
        $services = ServiceController::getServicesList();
        return view('public.pages.contact', compact('services'));
    }

    public function insights(): View
    {
        $articles = collect();

        try {
            $articles = \App\Models\Article::latest('published_at')->paginate(9);
        } catch (\Throwable $e) {
            // DB offline fallback
        }

        return view('public.pages.insights', compact('articles'));
    }

    public function showArticle($slug): View
    {
        try {
            $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
            return view('public.pages.article', compact('article'));
        } catch (\Throwable $e) {
            abort(404);
        }
    }

    public function trackStatus(): View
    {
        return view('public.pages.track');
    }

    public function checkStatus(Request $request)
    {
        $validated = $request->validate([
            'tracking_reference' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
        ]);

        $enquiry = Enquiry::where('tracking_reference', $validated['tracking_reference'])
            ->where('phone', $validated['phone'])
            ->first();

        if (!$enquiry) {
            return back()->with('error', 'Hakuna taarifa zilizopatikana. Tafadhali hakiki namba yako ya kumbukumbu na namba ya simu. / No record found. Please verify your tracking reference and phone number.');
        }

        return view('public.pages.track', compact('enquiry'));
    }

    public function submitEnquiry(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'plot_id' => 'nullable|exists:plots,id',
            'project_id' => 'nullable|exists:projects,id',
            'service_type' => 'nullable|string|max:255',
            'preferred_contact_method' => 'required|in:whatsapp,phone,email',
            'message' => 'required|string|max:3000',
        ]);
        
        $trackingRef = 'REQ-' . strtoupper(substr(uniqid(), -6));

        Enquiry::create([
            'tracking_reference' => $trackingRef,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'plot_id' => $validated['plot_id'] ?? null,
            'project_id' => $validated['project_id'] ?? null,
            'service_type' => $validated['service_type'] ?? null,
            'preferred_contact_method' => $validated['preferred_contact_method'],
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        return redirect()->back()->with('success', __('app.form_success') . ' Namba yako ya kumbukumbu ni / Your tracking reference is: ' . $trackingRef);
    }
}
