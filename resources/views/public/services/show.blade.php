@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
    $serviceTitle = $isSw ? $selectedService['title_sw'] : $selectedService['title_en'];
    $serviceSubtitle = $isSw ? $selectedService['subtitle_sw'] : $selectedService['subtitle_en'];
    $serviceOverview = $isSw ? $selectedService['overview_sw'] : $selectedService['overview_en'];
    $deliverables = $isSw ? $selectedService['deliverables_sw'] : $selectedService['deliverables_en'];
    $processes = $isSw ? $selectedService['process_sw'] : $selectedService['process_en'];
    $badge = $isSw ? $selectedService['badge_sw'] : $selectedService['badge_en'];
    
    // Dynamic WhatsApp message for this service
    $waMsg = "Hello RELAND Arusha, I would like to inquire about your {$serviceTitle} service.";
@endphp

@section('title', $serviceTitle . ' | RELAND CONSULT LTD &bull; Arusha, Tanzania')
@section('meta_description', Str::limit(strip_tags($serviceOverview), 160))
@section('whatsapp_message', $waMsg)

@section('content')

<!-- 1. SERVICE HERO SECTION -->
<div class="relative bg-[#0c1c34] text-white py-16 lg:py-24 border-b border-[#c89a3b]/20 overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
        <img src="{{ $selectedService['hero_image'] }}" alt="{{ $serviceTitle }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0c1c34] via-[#0c1c34]/85 to-[#0c1c34]/90"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-xs text-slate-400">
                <a href="{{ route('home') }}" class="hover:text-white transition">{{ __('app.nav_home') }}</a>
                <span>/</span>
                <a href="{{ route('pages.services') }}" class="hover:text-white transition">{{ __('app.nav_services') }}</a>
                <span>/</span>
                <span class="text-[#dfb256] font-semibold">{{ $serviceTitle }}</span>
            </div>

            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#c89a3b]/20 text-[#dfb256] text-xs font-bold uppercase tracking-wider border border-[#c89a3b]/30">
                {{ $badge }}
            </div>

            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
                {{ $serviceTitle }}
            </h1>

            <p class="text-base sm:text-lg text-slate-300 font-normal leading-relaxed">
                {{ $serviceSubtitle }}
            </p>

            <div class="pt-4 flex flex-wrap items-center gap-3">
                <a href="#enquiry-section" class="px-6 py-3.5 rounded-xl bg-[#c89a3b] hover:bg-[#b5882e] text-[#0c1c34] font-extrabold text-xs shadow-lg transition transform hover:-translate-y-0.5">
                    {{ $isSw ? 'Tuma Maombi ya Huduma Hii' : 'Request This Service' }}
                </a>

                <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($waMsg) }}" target="_blank" rel="noopener" class="px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-lg transition inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                    <span>{{ $isSw ? 'Ushauri wa Haraka WhatsApp' : 'WhatsApp Consultation' }}</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- 2. MAIN CONTENT: OVERVIEW, DELIVERABLES & WORKFLOW -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Left 2 Cols: Technical Explanation, Process, FAQs -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Professional Explanation -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs space-y-6">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-[#c89a3b] block mb-1">
                        {{ $isSw ? 'Maelezo ya Kitaalamu' : 'Professional Scope & Authority' }}
                    </span>
                    <h2 class="text-2xl font-extrabold text-[#16325c]">
                        {{ $isSw ? 'Kuhusu Huduma Hii' : 'About This Service' }}
                    </h2>
                </div>
                <p class="text-sm text-slate-700 leading-relaxed">
                    {{ $serviceOverview }}
                </p>

                <!-- Key Deliverables / Benefits -->
                <div class="pt-4 border-t border-slate-100">
                    <h3 class="text-sm font-extrabold text-[#16325c] mb-3">
                        {{ $isSw ? 'Mambo Muhimu Yanayotekelezwa (Deliverables):' : 'Key Deliverables & Specifications:' }}
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($deliverables as $deliv)
                            <div class="flex items-start gap-2.5 p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs text-slate-700">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <span class="font-medium">{{ $deliv }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Execution Process / Workflow (4 Steps) -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs space-y-6">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-[#c89a3b] block mb-1">
                        {{ $isSw ? 'Hatua za Utekelezaji' : 'Operational Workflow' }}
                    </span>
                    <h2 class="text-2xl font-extrabold text-[#16325c]">
                        {{ $isSw ? 'Mchakato wa Kazi Hatua kwa Hatua' : 'Step-by-Step Execution Roadmap' }}
                    </h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($processes as $proc)
                        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                            <span class="text-2xl font-black text-[#c89a3b] block">{{ $proc['step'] }}</span>
                            <h3 class="font-extrabold text-sm text-[#16325c]">{{ $proc['title'] }}</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">{{ $proc['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Service FAQs -->
            @if(isset($selectedService['faqs']) && count($selectedService['faqs']) > 0)
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xs space-y-4">
                <h2 class="text-xl font-extrabold text-[#16325c]">
                    {{ $isSw ? 'Maswali ya Kawaida Kuhusu ' . $serviceTitle : 'Frequently Asked Questions' }}
                </h2>
                <div class="space-y-3">
                    @foreach($selectedService['faqs'] as $faq)
                        <details class="bg-slate-50 p-4 rounded-xl border border-slate-200/80 group cursor-pointer">
                            <summary class="font-bold text-xs sm:text-sm text-[#16325c] flex items-center justify-between list-none">
                                <span>{{ $isSw ? $faq['q_sw'] : $faq['q_en'] }}</span>
                                <span class="text-[#c89a3b] font-bold group-open:rotate-45 transition transform">+</span>
                            </summary>
                            <p class="mt-2 text-xs text-slate-600 border-t border-slate-200/60 pt-2 leading-relaxed">
                                {{ $isSw ? $faq['a_sw'] : $faq['a_en'] }}
                            </p>
                        </details>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Right 1 Col: In-Page Inquiry Form & Other Services -->
        <div class="space-y-8" id="enquiry-section">
            <!-- Fast Lead Capture Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-[#c89a3b]/40 shadow-xl shadow-slate-200/50 space-y-5">
                <div class="border-b border-slate-100 pb-4">
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#c89a3b] block">Direct Consultation</span>
                    <h3 class="text-lg font-extrabold text-[#16325c]">
                        {{ $isSw ? 'Wasilisha Mahitaji Yako' : 'Consult a Land Specialist' }}
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">
                        {{ $isSw ? 'Wataalamu wetu waliosajiliwa watawasiliana nawe.' : 'Our registered surveyors will respond promptly.' }}
                    </p>
                </div>

                <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-3.5">
                    @csrf
                    <input type="hidden" name="service_type" value="{{ $selectedService['slug'] }}">

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_full_name') }} *</label>
                        <input type="text" name="name" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition" placeholder="e.g. John Mrema">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_phone') }} *</label>
                        <input type="tel" name="phone" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition" placeholder="+255 7XX XXX XXX">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_email') }}</label>
                        <input type="email" name="email" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition" placeholder="john@example.com">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_preferred_contact') }}</label>
                        <select name="preferred_contact_method" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition">
                            <option value="whatsapp">WhatsApp</option>
                            <option value="phone">Phone Call</option>
                            <option value="email">Email</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_message') }} *</label>
                        <textarea name="message" rows="3" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition" placeholder="{{ $isSw ? 'Eleza eneo lilipo na unachohitaji kufanyiwa...' : 'Specify parcel location, acreage, or requirements...' }}"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-[#16325c] hover:bg-[#0c1c34] text-white font-extrabold text-xs shadow-md transition transform hover:-translate-y-0.5 border border-[#c89a3b]/40">
                        {{ __('app.form_submit') }}
                    </button>
                </form>

                <div class="pt-3 border-t border-slate-100 text-center">
                    <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode($waMsg) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-800 transition">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        <span>{{ $isSw ? 'Au Tuma Ujumbe wa Haraka WhatsApp' : 'Or Send Instant Message via WhatsApp' }} &rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Other Services Navigation -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-xs space-y-3">
                <h4 class="font-extrabold text-xs text-[#16325c] uppercase tracking-wider border-b border-slate-100 pb-2">
                    {{ __('app.our_services') }}
                </h4>
                <div class="space-y-1 text-xs">
                    @foreach($services as $sSlug => $sItem)
                        <a href="{{ route('services.show', $sItem['slug']) }}" class="flex items-center justify-between p-2 rounded-xl transition {{ $sItem['slug'] === $selectedService['slug'] ? 'bg-[#fbf6ea] text-[#16325c] font-bold' : 'text-slate-600 hover:bg-slate-50' }}">
                            <span>{{ $isSw ? $sItem['title_sw'] : $sItem['title_en'] }}</span>
                            <span class="text-[#c89a3b]">&rarr;</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
