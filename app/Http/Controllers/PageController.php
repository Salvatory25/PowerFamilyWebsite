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
        $projectsCount = Project::published()->count();
        $plotsCount = Plot::published()->count();

        return view('public.pages.about', compact('services', 'projectsCount', 'plotsCount'));
    }

    public function contact(): View
    {
        $services = ServiceController::getServicesList();
        return view('public.pages.contact', compact('services'));
    }

    public function insights(): View
    {
        return view('public.pages.insights');
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

        Enquiry::create([
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

        return redirect()->back()->with('success', __('app.form_success'));
    }
}
