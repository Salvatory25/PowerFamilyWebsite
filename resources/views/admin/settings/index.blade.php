@extends('layouts.admin')

@section('title', 'Website Settings')
@section('header_title', 'Brand & Website Settings')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <h1 class="text-xl font-extrabold text-white tracking-tight">Website & Brand Settings</h1>
        <p class="text-xs text-slate-400 mt-1">Configure company tagline, top bar badges, WhatsApp hotline, Arusha office details, and hero copy.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- 1. Top Announcement Bar & Brand Motto -->
        <div class="bg-[#0c1c34] border border-[#16325c] rounded-3xl p-6 sm:p-8 space-y-5 shadow-xl">
            <h2 class="text-sm font-bold text-[#dfb256] pb-3 border-b border-[#16325c] flex items-center gap-2">
                <svg class="w-4 h-4 text-[#dfb256]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                <span>1. Top Header Announcement & Brand Tagline</span>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Top Bar City / Location Badge
                    </label>
                    <input type="text" name="top_bar_location_badge" value="{{ $settings['top_bar_location_badge'] ?? 'Arusha & Northern Tanzania' }}" placeholder="e.g. Arusha & Northern Tanzania" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b] font-bold">
                    <span class="text-[11px] text-slate-400 mt-1 block">Appears in the glowing badge at the top of the website</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Top Bar Tagline (Kiswahili) *
                    </label>
                    <input type="text" name="top_bar_tagline_sw" value="{{ $settings['top_bar_tagline_sw'] ?? 'Suluhisho la Kitaalamu la Upimaji, Urasimishaji na Viwanja' }}" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b] font-semibold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Top Bar Tagline (English) *
                    </label>
                    <input type="text" name="top_bar_tagline_en" value="{{ $settings['top_bar_tagline_en'] ?? 'Professional Land Surveying, Formalization & Plot Solutions' }}" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b] font-semibold">
                </div>
            </div>
        </div>

        <!-- 2. WhatsApp & Phone Settings -->
        <div class="bg-[#0c1c34] border border-[#16325c] rounded-3xl p-6 sm:p-8 space-y-5 shadow-xl">
            <h2 class="text-sm font-bold text-white pb-3 border-b border-[#16325c]">2. WhatsApp & Direct Hotline</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        WhatsApp Official Number (International Format) *
                    </label>
                    <input type="text" name="whatsapp_number" value="{{ $settings['whatsapp_number'] ?? '+255742448965' }}" required placeholder="e.g. +255742448965" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b] font-mono">
                    <span class="text-[11px] text-slate-400 mt-1 block">Used for all floating and service/plot WhatsApp triggers</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Display Hotline Phone
                    </label>
                    <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '+255 742 448 965' }}" placeholder="e.g. +255 742 448 965" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b] font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Primary Contact Email
                    </label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'info@reland.co.tz' }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Land Survey & Operations Email
                    </label>
                    <input type="email" name="sales_email" value="{{ $settings['sales_email'] ?? 'survey@reland.co.tz' }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b]">
                </div>
            </div>
        </div>

        <!-- 3. Office & Location -->
        <div class="bg-[#0c1c34] border border-[#16325c] rounded-3xl p-6 sm:p-8 space-y-5 shadow-xl">
            <h2 class="text-sm font-bold text-white pb-3 border-b border-[#16325c]">3. Physical Office Location & Hours</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Arusha Office Physical Address
                    </label>
                    <input type="text" name="office_address" value="{{ $settings['office_address'] ?? 'Floor 3, TFA Complex, Sokoine Road, Arusha, Tanzania' }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Working Hours
                    </label>
                    <input type="text" name="working_hours" value="{{ $settings['working_hours'] ?? 'Mon - Sat: 8:00 AM - 6:00 PM' }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b]">
                </div>
            </div>
        </div>

        <!-- 4. Hero Texts -->
        <div class="bg-[#0c1c34] border border-[#16325c] rounded-3xl p-6 sm:p-8 space-y-5 shadow-xl">
            <h2 class="text-sm font-bold text-white pb-3 border-b border-[#16325c]">4. Corporate Hero Headlines (Bilingual)</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Headline (English)
                    </label>
                    <input type="text" name="hero_title_en" value="{{ $settings['hero_title_en'] ?? 'Professional Land Surveying & Formalization Solutions' }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b] font-semibold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Headline (Kiswahili)
                    </label>
                    <input type="text" name="hero_title_sw" value="{{ $settings['hero_title_sw'] ?? 'Suluhisho la Kitaalamu la Upimaji na Urasimishaji wa Ardhi' }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b] font-semibold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Subtitle (English)
                    </label>
                    <textarea name="hero_subtitle_en" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b]">{{ $settings['hero_subtitle_en'] ?? 'Reliable land surveying, formalization and plot solutions designed to help individuals, businesses and property owners manage their land with confidence.' }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Subtitle (Kiswahili)
                    </label>
                    <textarea name="hero_subtitle_sw" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b]">{{ $settings['hero_subtitle_sw'] ?? 'Huduma za kuaminika za upimaji, urasimishaji na viwanja zilizoundwa kusaidia wananchi, wafanyabiashara na wamiliki wa ardhi kusimamia mali zao kwa uhakika na amani.' }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit" class="px-8 py-3.5 rounded-xl bg-[#c89a3b] hover:bg-[#b5882e] text-[#0c1c34] text-xs font-black uppercase tracking-wider shadow-lg transition">
                Save Website Settings
            </button>
        </div>
    </form>
</div>
@endsection
