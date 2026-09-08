@extends('layouts.admin')

@section('title', 'Lead Details: ' . $enquiry->name)
@section('header_title', 'Client Inquiry Details')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-1">
                <a href="{{ route('admin.enquiries.index') }}" class="hover:text-white">Leads</a>
                <span>/</span>
                <span class="text-white">Details</span>
            </nav>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Inquiry from {{ $enquiry->name }}</h1>
        </div>

        <a href="{{ route('admin.enquiries.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition">
            &larr; Back to Leads
        </a>
    </div>

    <!-- Details Card -->
    <div class="bg-[#280508] border border-[#750D15] rounded-3xl p-6 sm:p-8 space-y-6 shadow-xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-[#750D15]">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-[#D48B16] block mb-1">Client Name</span>
                <span class="text-base font-bold text-white">{{ $enquiry->name }}</span>
            </div>

            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-[#D48B16] block mb-1">Received On</span>
                <span class="text-xs text-slate-300">{{ $enquiry->created_at->format('l, F d, Y \a\t h:i A') }}</span>
            </div>

            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-[#D48B16] block mb-1">Phone / WhatsApp</span>
                <div class="flex items-center gap-3">
                    <a href="tel:{{ $enquiry->phone }}" class="text-sm font-mono font-bold text-[#FAC955] hover:underline">{{ $enquiry->phone }}</a>
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $enquiry->phone);
                    @endphp
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ rawurlencode('Hello ' . $enquiry->name . ', thank you for contacting Power Family Investment regarding our Plots, Houses & Vehicles.') }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs">
                        Open WhatsApp
                    </a>
                </div>
            </div>

            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-[#D48B16] block mb-1">Email Address</span>
                <span class="text-xs text-slate-300">{{ $enquiry->email ?? 'Not provided' }}</span>
            </div>
        </div>

        @if($enquiry->category)
            <div class="p-4 rounded-2xl bg-[#750D15]/50 border border-[#D48B16]/40">
                <span class="text-[10px] font-bold uppercase tracking-wider text-[#FAC955] block mb-1">Inquiry Category</span>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-white text-sm">{{ ucfirst($enquiry->category) }}</h2>
                        <span class="text-xs text-slate-300">Power Family Client Consultation</span>
                    </div>
                </div>
            </div>
        @endif

        @if($enquiry->house)
            <div class="p-4 rounded-2xl bg-[#750D15]/50 border border-[#750D15]">
                <span class="text-[10px] font-bold uppercase tracking-wider text-[#FAC955] block mb-1">Associated House Listing</span>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-white text-sm">{{ $enquiry->house->title }}</h2>
                        <span class="text-xs text-slate-400">{{ $enquiry->house->location?->area_name }} &bull; {{ $enquiry->house->formatted_price }}</span>
                    </div>
                    <a href="{{ route('houses.show', $enquiry->house->slug) }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-slate-800 text-slate-300 text-xs font-bold hover:bg-slate-700">
                        View House &rarr;
                    </a>
                </div>
            </div>
        @endif

        @if($enquiry->vehicle)
            <div class="p-4 rounded-2xl bg-[#750D15]/50 border border-[#750D15]">
                <span class="text-[10px] font-bold uppercase tracking-wider text-[#FAC955] block mb-1">Associated Vehicle Listing</span>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-white text-sm">{{ $enquiry->vehicle->title }}</h2>
                        <span class="text-xs text-slate-400">{{ $enquiry->vehicle->formatted_price }} &bull; {{ $enquiry->vehicle->year }}</span>
                    </div>
                    <a href="{{ route('vehicles.show', $enquiry->vehicle->slug) }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-slate-800 text-slate-300 text-xs font-bold hover:bg-slate-700">
                        View Vehicle &rarr;
                    </a>
                </div>
            </div>
        @endif

        @if($enquiry->plot)
            <div class="p-4 rounded-2xl bg-[#750D15]/50 border border-[#750D15]">
                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400 block mb-1">Associated Plot Listing</span>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-bold text-white text-sm">{{ $enquiry->plot->title }}</h2>
                        <span class="text-xs text-slate-400 font-mono">REF: {{ $enquiry->plot->plot_reference }} &bull; {{ $enquiry->plot->location?->area_name }} &bull; {{ $enquiry->plot->formatted_price }}</span>
                    </div>
                    <a href="{{ route('plots.show', $enquiry->plot->slug) }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs font-bold text-slate-300">
                        View Plot &rarr;
                    </a>
                </div>
            </div>
        @endif

        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-[#D48B16] block mb-2">Message Content</span>
            <div class="p-4 rounded-2xl bg-slate-900 border border-slate-700 text-slate-200 text-xs leading-relaxed whitespace-pre-line">
                {{ $enquiry->message }}
            </div>
        </div>

        <!-- Processing Form -->
        <form action="{{ route('admin.enquiries.update', $enquiry->id) }}" method="POST" class="pt-6 border-t border-[#750D15] space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                        Status *
                    </label>
                    <select name="status" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                        <option value="new" {{ $enquiry->status === 'new' ? 'selected' : '' }}>New (Unprocessed)</option>
                        <option value="contacted" {{ $enquiry->status === 'contacted' ? 'selected' : '' }}>Client Contacted</option>
                        <option value="site_visit_scheduled" {{ $enquiry->status === 'site_visit_scheduled' ? 'selected' : '' }}>Site Visit Scheduled</option>
                        <option value="closed" {{ $enquiry->status === 'closed' ? 'selected' : '' }}>Closed / Completed</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                    Internal Admin Notes
                </label>
                <textarea name="admin_notes" rows="3" placeholder="Add follow-up notes, site survey date, client requirements..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">{{ old('admin_notes', $enquiry->admin_notes) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#D48B16] hover:bg-[#b5882e] text-[#280508] text-xs font-extrabold shadow-md">
                    Update Lead Status
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
