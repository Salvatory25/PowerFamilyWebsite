@extends('layouts.app')

@php
    $isSw = app()->getLocale() === 'sw';
@endphp

@section('title', ($isSw ? 'Wasiliana na RELAND | Ofisi ya Upimaji na Huduma za Ardhi Arusha' : 'Contact RELAND | Land Surveying & Formalization Office') . ' &bull; Arusha, Tanzania')
@section('meta_description', $isSw ? 'Wasiliana na wataalamu wa ardhi RELAND Arusha kwa simu, WhatsApp au kufika ofisini TFA Complex, Sokoine Road, Arusha.' : 'Get in touch with certified land surveyors and formalization experts at RELAND. Office at TFA Complex, Sokoine Road, Arusha, Tanzania.')

@section('content')

<!-- Header Banner -->
<div class="bg-[#0c1c34] text-white py-16 lg:py-20 border-b border-[#c89a3b]/20 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-15 bg-[radial-gradient(circle_at_top_right,rgba(200,154,59,0.25),transparent_50%)]"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#c89a3b]/15 text-[#dfb256] text-xs font-extrabold tracking-wider uppercase border border-[#c89a3b]/30">
            {{ $isSw ? 'Mawasiliano & Ofisi' : 'Office & Inquiries' }}
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
            {{ __('app.talk_to_us') }}
        </h1>
        <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto">
            {{ $isSw ? 'Wasiliana na timu yetu ya wataalamu wa ardhi kwa ajili ya kupanga miadi, kufanya ukaguzi wa shamba au kuanza mradi wako.' : 'Connect directly with our land surveyors and property planners to schedule a site inspection, consult on boundary retracement, or discuss your development project.' }}
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Left 1 Col: Office Info & WhatsApp Hotlines -->
        <div class="space-y-6">
            <!-- Office Address Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs space-y-5">
                <h3 class="font-extrabold text-base text-[#16325c] uppercase tracking-wider border-b border-slate-100 pb-3">
                    {{ $isSw ? 'Ofisi Kuu ya Arusha' : 'Arusha Headquarters' }}
                </h3>

                <ul class="space-y-4 text-xs">
                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-xl bg-[#fbf6ea] text-[#16325c] flex items-center justify-center shrink-0 border border-[#f5e9c9]">
                            <svg class="w-4 h-4 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        </div>
                        <div>
                            <span class="font-bold text-slate-900 block">{{ $isSw ? 'Mahali Tulipo' : 'Physical Location' }}</span>
                            <span class="text-slate-600 leading-relaxed">{{ $siteAddress ?? 'Floor 3, TFA Complex, Sokoine Road, Arusha, Tanzania' }}</span>
                        </div>
                    </li>

                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-xl bg-[#fbf6ea] text-[#16325c] flex items-center justify-center shrink-0 border border-[#f5e9c9]">
                            <svg class="w-4 h-4 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <span class="font-bold text-slate-900 block">{{ $isSw ? 'Simu ya Ofisi' : 'Telephone Desk' }}</span>
                            <a href="tel:{{ $sitePhone ?? '+255742448965' }}" class="text-slate-600 hover:text-[#16325c]">{{ $sitePhone ?? '+255 742 448 965' }}</a>
                        </div>
                    </li>

                    <li class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-xl bg-[#fbf6ea] text-[#16325c] flex items-center justify-center shrink-0 border border-[#f5e9c9]">
                            <svg class="w-4 h-4 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="font-bold text-slate-900 block">{{ $isSw ? 'Barua Pepe' : 'Official Email' }}</span>
                            <a href="mailto:{{ $siteEmail ?? 'info@reland.co.tz' }}" class="text-slate-600 hover:text-[#16325c]">{{ $siteEmail ?? 'info@reland.co.tz' }}</a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- WhatsApp Direct Consultation Card -->
            <div class="bg-[#16325c] text-white rounded-3xl p-6 sm:p-8 space-y-4 shadow-xl">
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#dfb256] block">Instant Chat</span>
                <h3 class="text-lg font-extrabold text-white">
                    {{ $isSw ? 'Ushauri wa Haraka WhatsApp' : 'Direct WhatsApp Desk' }}
                </h3>
                <p class="text-xs text-slate-300 leading-relaxed">
                    {{ $isSw ? 'Tuma ujumbe sasa kupata majibu ya haraka kutoka kwa wataalamu wetu wa upimaji wa ardhi.' : 'Chat directly with our land specialists for fast technical feedback and appointment booking.' }}
                </p>

                <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text={{ rawurlencode('Hello RELAND Arusha, I would like to consult on Land Surveying and Formalization services.') }}" target="_blank" rel="noopener" class="w-full py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition inline-flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                    <span>{{ __('app.whatsapp_us') }}</span>
                </a>
            </div>
        </div>

        <!-- Right 2 Cols: Main Contact & Inquiry Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-xs space-y-6">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-[#c89a3b] block mb-1">
                        {{ $isSw ? 'Fomu ya Mawasiliano' : 'Official Request Form' }}
                    </span>
                    <h2 class="text-2xl font-extrabold text-[#16325c]">
                        {{ $isSw ? 'Tuma Ujumbe au Omba Huduma' : 'Send an Inquiry or Service Request' }}
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">
                        {{ $isSw ? 'Tafadhali jaza taarifa zako hapa chini na mtaalamu wetu wa ardhi atawasiliana nawe haraka.' : 'Please fill in your details below and a certified land officer will reach out promptly.' }}
                    </p>
                </div>

                <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_full_name') }} *</label>
                            <input type="text" name="name" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-3 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition" placeholder="e.g. Salim Rashid">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_phone') }} *</label>
                            <input type="tel" name="phone" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-3 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition" placeholder="+255 7XX XXX XXX">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_email') }}</label>
                            <input type="email" name="email" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-3 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition" placeholder="salim@example.com">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_service_type') }}</label>
                            <select name="service_type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-3 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition">
                                <option value="">{{ $isSw ? '-- Chagua Huduma --' : '-- Select Service of Interest --' }}</option>
                                <option value="land-surveying">{{ $isSw ? '1. Upimaji wa Ardhi (Cadastral Survey)' : '1. Land Surveying (Cadastral Survey)' }}</option>
                                <option value="land-formalization">{{ $isSw ? '2. Urasimishaji wa Makazi' : '2. Land Formalization (Settlement Regularization)' }}</option>
                                <option value="plot-subdivision">{{ $isSw ? '3. Ugawaji wa Viwanja & Mashamba' : '3. Plot & Land Subdivision' }}</option>
                                <option value="boundary-demarcation">{{ $isSw ? '4. Uhakiki na Uwekaji wa Mipaka' : '4. Boundary Demarcation & Beacon Retracement' }}</option>
                                <option value="land-consultation">{{ $isSw ? '5. Ushauri wa Kitaalamu & Hati' : '5. Land Consultation & Title Due Diligence' }}</option>
                                <option value="plot-sales">{{ $isSw ? '6. Uuzaji wa Viwanja Vilivyohakikiwa' : '6. Verified Plot & Land Sales' }}</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_preferred_contact') }}</label>
                        <select name="preferred_contact_method" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-3 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition">
                            <option value="whatsapp">WhatsApp</option>
                            <option value="phone">Phone Call</option>
                            <option value="email">Email</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">{{ __('app.form_message') }} *</label>
                        <textarea name="message" rows="4" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-3 text-xs text-slate-800 focus:ring-2 focus:ring-[#16325c] focus:bg-white transition" placeholder="{{ $isSw ? 'Eleza eneo la shamba au kiwanja chako na mahitaji yako kwa kina...' : 'Specify parcel location, acreage, boundary issues, or your specific requirements...' }}"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-[#16325c] hover:bg-[#0c1c34] text-white font-extrabold text-xs shadow-lg transition transform hover:-translate-y-0.5 border border-[#c89a3b]/40">
                        {{ __('app.form_submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
