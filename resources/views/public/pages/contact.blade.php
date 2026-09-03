@extends('layouts.app')

@section('title', __('app.nav_contact') . ' — Power Family Investment')

@section('content')

@php
    $phone = \App\Models\Setting::get('company_phone', '+255 759 423 626');
    $phone2 = \App\Models\Setting::get('company_phone_2', '+255 658 003 626');
    $whatsapp = \App\Models\Setting::get('whatsapp_number', '255759423626');
    $email = \App\Models\Setting::get('company_email', 'info@powerfamilyinvestment.co.tz');
    $address = \App\Models\Setting::get('company_address', 'Tanzania');
    $hours = \App\Models\Setting::get('working_hours', 'Jumatatu - Jumamosi: 2:00 Asubuhi - 11:30 Jioni');
    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsapp);
    $cleanPhone2 = preg_replace('/[^0-9]/', '', $phone2);
@endphp

<!-- Header Banner -->
<div class="bg-[#1C0305] text-white py-16 border-b border-[#961620]/30 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#FAC955_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl space-y-3">
            <span class="text-xs font-bold text-[#FAC955] uppercase tracking-widest block">
                {{ app()->getLocale() === 'sw' ? 'HUDUMA KWA WATEJA' : 'CUSTOMER SUPPORT' }}
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                {{ __('app.contact_us_title') }}
            </h1>
            <p class="text-gray-300 text-sm sm:text-base leading-relaxed">
                {{ __('app.contact_us_subtitle') }}
            </p>
        </div>
    </div>
</div>

<div class="py-16 bg-neutral-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left 5 cols: Contact Cards -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 space-y-6">
                    <h2 class="text-xl font-bold text-[#280508] border-b border-gray-100 pb-4">
                        Taarifa za Ofisi & Mawasiliano
                    </h2>

                    <div class="space-y-4 text-sm">
                        <!-- Phones -->
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#FAC955] shrink-0 shadow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div class="space-y-1">
                                <span class="text-xs font-semibold text-gray-400 uppercase block">Simu za Ofisi (Call)</span>
                                <div class="flex flex-col space-y-0.5">
                                    <a href="tel:{{ $phone }}" class="text-base font-bold text-gray-900 hover:text-[#750D15] transition">{{ $phone }}</a>
                                    @if($phone2)
                                        <a href="tel:{{ $phone2 }}" class="text-sm font-bold text-gray-700 hover:text-[#750D15] transition">{{ $phone2 }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-[#25D366] flex items-center justify-center text-white shrink-0 shadow">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.699c.971.53 1.777.78 2.796.78 3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.587-5.766-5.768-5.766zm9.969 5.766c0 5.518-4.482 10-10 10-1.748 0-3.385-.45-4.819-1.238l-7.181 1.884 1.918-7.009c-.878-1.493-1.385-3.23-1.385-5.084 0-5.518 4.482-10 10-10s10 4.482 10 10z"/></svg>
                            </div>
                            <div class="space-y-1">
                                <span class="text-xs font-semibold text-gray-400 uppercase block">WhatsApp Chat</span>
                                <div class="flex flex-col space-y-0.5">
                                    <a href="https://wa.me/{{ $cleanWhatsapp }}" target="_blank" class="text-base font-bold text-gray-900 hover:text-[#25D366] transition">{{ $phone }}</a>
                                    @if($phone2)
                                        <a href="https://wa.me/{{ $cleanPhone2 }}" target="_blank" class="text-sm font-bold text-gray-700 hover:text-[#25D366] transition">{{ $phone2 }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#FAC955] shrink-0 shadow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-gray-400 uppercase block">Barua Pepe (Email)</span>
                                <a href="mailto:{{ $email }}" class="text-base font-bold text-gray-900 hover:text-[#750D15] transition">{{ $email }}</a>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#FAC955] shrink-0 shadow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-gray-400 uppercase block">Mahali Ofisi Ilipo</span>
                                <span class="text-sm font-semibold text-gray-800">{{ $address }}</span>
                            </div>
                        </div>

                        <!-- Instagram -->
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] flex items-center justify-center text-white shrink-0 shadow">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-gray-400 uppercase block">Instagram Official</span>
                                <a href="https://www.instagram.com/power_family_investment/" target="_blank" rel="noopener noreferrer" class="text-base font-bold text-gray-900 hover:text-[#dc2743] transition">@power_family_investment</a>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-pfi-gradient flex items-center justify-center text-[#FAC955] shrink-0 shadow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-gray-400 uppercase block">Muda wa Kazi</span>
                                <span class="text-sm font-semibold text-gray-800">{{ $hours }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right 7 cols: Contact Form -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-2xl p-8 sm:p-10 shadow-sm border border-gray-100 space-y-6">
                    <h2 class="text-2xl font-extrabold text-[#280508]">
                        Tuma Ujumbe au Ombi Lako
                    </h2>
                    <p class="text-xs text-gray-500">
                        Jaza fomu hii kwa umakini na timu yetu itawasiliana nawe ndani ya muda mfupi.
                    </p>

                    <form action="{{ route('enquiry.submit') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">
                                {{ __('app.form_name') }} *
                            </label>
                            <input 
                                type="text" 
                                name="name" 
                                required 
                                placeholder="Mfano: Juma Hassan" 
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#750D15] focus:outline-none"
                            >
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">
                                    {{ __('app.form_phone') }} *
                                </label>
                                <input 
                                    type="tel" 
                                    name="phone" 
                                    required 
                                    placeholder="+255 7..." 
                                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#750D15] focus:outline-none"
                                >
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-1">
                                    {{ __('app.form_email') }}
                                </label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    placeholder="jina@example.com" 
                                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#750D15] focus:outline-none"
                                >
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">
                                {{ __('app.form_interest') }}
                            </label>
                            <select name="category" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-[#750D15] focus:outline-none">
                                <option value="kiwanja">{{ __('app.form_interest_plot') }}</option>
                                <option value="nyumba">{{ __('app.form_interest_house') }}</option>
                                <option value="gari">{{ __('app.form_interest_vehicle') }}</option>
                                <option value="ushauri">{{ __('app.form_interest_advice') }}</option>
                                <option value="other">{{ __('app.form_interest_other') }}</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">
                                {{ __('app.form_message') }} *
                            </label>
                            <textarea 
                                name="message" 
                                rows="4" 
                                required 
                                placeholder="Andika maelezo ya ombi au swali lako hapa..." 
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#750D15] focus:outline-none resize-none"
                            ></textarea>
                        </div>

                        <button 
                            type="submit" 
                            class="w-full bg-pfi-gradient text-white py-4 rounded-xl font-bold text-sm shadow-lg hover:shadow-xl hover:brightness-110 active:scale-95 transition"
                        >
                            {{ __('app.form_submit') }}
                        </button>

                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
