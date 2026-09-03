@extends('layouts.admin')

@section('title', 'ACF Dynamic Content & Settings')
@section('page_title', 'Advanced Dynamic Content & Settings (ACF)')

@section('content')
<div class="max-w-6xl mx-auto space-y-6" x-data="{ activeTab: 'hero' }">
    
    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-[#280508] p-6 rounded-3xl border border-[#750D15]/50 shadow-xl">
        <div>
            <span class="text-xs font-bold text-[#FAC955] uppercase tracking-wider block">ACF Dynamic Content Manager</span>
            <h1 class="text-2xl font-black text-white tracking-tight">Website Custom Fields & Content</h1>
            <p class="text-xs text-slate-300 mt-1">Manage headlines, banners, trust pillars, categories, contact channels, and SEO dynamically in real-time.</p>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-white/10 text-xs font-bold text-[#FAC955] hover:bg-white/20 transition border border-white/20">
            <span>Live Website Preview</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </a>
    </div>

    <!-- ACF Tab Bar -->
    <div class="flex overflow-x-auto gap-2 p-1.5 rounded-2xl bg-[#280508] border border-[#750D15]/50 shadow-md">
        <button 
            type="button" 
            @click="activeTab = 'hero'" 
            :class="activeTab === 'hero' ? 'bg-[#750D15] text-[#FAC955] font-extrabold shadow-md border border-[#FAC955]/30' : 'text-slate-400 hover:text-white'"
            class="px-4 py-2.5 rounded-xl text-xs whitespace-nowrap transition flex items-center space-x-2"
        >
            <span>🏠 1. Hero & Search Banner</span>
        </button>
        
        <button 
            type="button" 
            @click="activeTab = 'pillars'" 
            :class="activeTab === 'pillars' ? 'bg-[#750D15] text-[#FAC955] font-extrabold shadow-md border border-[#FAC955]/30' : 'text-slate-400 hover:text-white'"
            class="px-4 py-2.5 rounded-xl text-xs whitespace-nowrap transition flex items-center space-x-2"
        >
            <span>🔍 2. Category Pillars</span>
        </button>

        <button 
            type="button" 
            @click="activeTab = 'trust'" 
            :class="activeTab === 'trust' ? 'bg-[#750D15] text-[#FAC955] font-extrabold shadow-md border border-[#FAC955]/30' : 'text-slate-400 hover:text-white'"
            class="px-4 py-2.5 rounded-xl text-xs whitespace-nowrap transition flex items-center space-x-2"
        >
            <span>🛡️ 3. Trust & Why Choose Us</span>
        </button>

        <button 
            type="button" 
            @click="activeTab = 'cta'" 
            :class="activeTab === 'cta' ? 'bg-[#750D15] text-[#FAC955] font-extrabold shadow-md border border-[#FAC955]/30' : 'text-slate-400 hover:text-white'"
            class="px-4 py-2.5 rounded-xl text-xs whitespace-nowrap transition flex items-center space-x-2"
        >
            <span>📣 4. CTA Consultation Banner</span>
        </button>

        <button 
            type="button" 
            @click="activeTab = 'contact'" 
            :class="activeTab === 'contact' ? 'bg-[#750D15] text-[#FAC955] font-extrabold shadow-md border border-[#FAC955]/30' : 'text-slate-400 hover:text-white'"
            class="px-4 py-2.5 rounded-xl text-xs whitespace-nowrap transition flex items-center space-x-2"
        >
            <span>📞 5. Contact & Socials</span>
        </button>

        <button 
            type="button" 
            @click="activeTab = 'seo'" 
            :class="activeTab === 'seo' ? 'bg-[#750D15] text-[#FAC955] font-extrabold shadow-md border border-[#FAC955]/30' : 'text-slate-400 hover:text-white'"
            class="px-4 py-2.5 rounded-xl text-xs whitespace-nowrap transition flex items-center space-x-2"
        >
            <span>🏷️ 6. Brand & SEO Meta</span>
        </button>
    </div>

    <!-- Form Container -->
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- ===================================================================
             TAB 1: HERO & SEARCH BANNER
             =================================================================== -->
        <div x-show="activeTab === 'hero'" class="bg-[#280508] border border-[#750D15]/50 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="border-b border-[#750D15]/50 pb-4">
                <h2 class="text-base font-bold text-[#FAC955] flex items-center gap-2">
                    <span>🏠 Field Group: Hero Section & Tagline</span>
                </h2>
                <p class="text-xs text-slate-400 mt-1">Configures the primary hero title, subtitle, backdrop imagery, and upper credibility badges.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Headline (Kiswahili) *
                    </label>
                    <input type="text" name="hero_headline_sw" value="{{ $settings['hero_headline_sw'] ?? 'WEKEZA LEO. JENGA KESHO.' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16] font-bold">
                    <span class="text-[11px] text-slate-400 mt-1 block">Large bold headline displayed at the top of the homepage</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Headline (English) *
                    </label>
                    <input type="text" name="hero_headline_en" value="{{ $settings['hero_headline_en'] ?? 'INVEST TODAY. BUILD TOMORROW.' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16] font-bold">
                    <span class="text-[11px] text-slate-400 mt-1 block">English translation of the hero headline</span>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Subtitle Description (Kiswahili) *
                    </label>
                    <textarea name="hero_subtitle_sw" rows="3" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">{{ $settings['hero_subtitle_sw'] ?? 'Gundua na miliki viwanja vilivyopimwa vyenye hati safi, nyumba za kisasa za familia na magari yenye ubora wa juu Tanzania nzima.' }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Subtitle Description (English) *
                    </label>
                    <textarea name="hero_subtitle_en" rows="3" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">{{ $settings['hero_subtitle_en'] ?? 'Discover and own surveyed plots with verified title deeds, modern family houses and top quality vehicles across Tanzania.' }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Background High-Res Image URL *
                    </label>
                    <input type="text" name="hero_bg_image" value="{{ $settings['hero_bg_image'] ?? 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2400&q=85' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16] font-mono">
                    <span class="text-[11px] text-slate-400 mt-1 block">Full-width photography with real-estate luxury atmosphere</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Upper Trust Badge (Kiswahili)
                    </label>
                    <input type="text" name="hero_badge_sw" value="{{ $settings['hero_badge_sw'] ?? 'Huduma ya Uhakika & Nyaraka Rasmi za Kisheria' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Hero Upper Trust Badge (English)
                    </label>
                    <input type="text" name="hero_badge_en" value="{{ $settings['hero_badge_en'] ?? 'Trusted Property & Verified Legal Documentation' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                </div>
            </div>
        </div>

        <!-- ===================================================================
             TAB 2: "WHAT ARE YOU LOOKING FOR?" 4 CATEGORY PILLARS
             =================================================================== -->
        <div x-show="activeTab === 'pillars'" class="bg-[#280508] border border-[#750D15]/50 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xl" style="display: none;">
            <div class="border-b border-[#750D15]/50 pb-4">
                <h2 class="text-base font-bold text-[#FAC955] flex items-center gap-2">
                    <span>🔍 Field Group: "What Are You Looking For?" 4 Category Cards</span>
                </h2>
                <p class="text-xs text-slate-400 mt-1">Configures the 4 interactive white pillar cards matching the reference UI.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Section Title *
                    </label>
                    <input type="text" name="what_looking_title_sw" value="{{ $settings['what_looking_title_sw'] ?? 'What are you looking for?' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16] font-bold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Section Subtitle Description *
                    </label>
                    <input type="text" name="what_looking_subtitle_sw" value="{{ $settings['what_looking_subtitle_sw'] ?? 'Chagua huduma au fursa unayohitaji kuanza nayo leo kwa urahisi na uhakika.' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white focus:ring-2 focus:ring-[#D48B16]">
                </div>

                <!-- Pillar 1 -->
                <div class="p-4 rounded-2xl bg-[#1C0305] border border-[#750D15] space-y-3">
                    <span class="text-xs font-extrabold text-[#FAC955] block">Pillar 1: Viwanja vya Makazi</span>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Title</label>
                        <input type="text" name="pillar_1_title_sw" value="{{ $settings['pillar_1_title_sw'] ?? 'Viwanja vya Makazi' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Subtitle / English</label>
                        <input type="text" name="pillar_1_desc_sw" value="{{ $settings['pillar_1_desc_sw'] ?? 'Residential Plots' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white">
                    </div>
                </div>

                <!-- Pillar 2 -->
                <div class="p-4 rounded-2xl bg-[#1C0305] border border-[#750D15] space-y-3">
                    <span class="text-xs font-extrabold text-[#FAC955] block">Pillar 2: Viwanja vya Biashara</span>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Title</label>
                        <input type="text" name="pillar_2_title_sw" value="{{ $settings['pillar_2_title_sw'] ?? 'Viwanja vya Biashara' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Subtitle / English</label>
                        <input type="text" name="pillar_2_desc_sw" value="{{ $settings['pillar_2_desc_sw'] ?? 'Commercial Plots' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white">
                    </div>
                </div>

                <!-- Pillar 3 -->
                <div class="p-4 rounded-2xl bg-[#1C0305] border border-[#750D15] space-y-3">
                    <span class="text-xs font-extrabold text-[#FAC955] block">Pillar 3: Nyumba za Kisasa</span>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Title</label>
                        <input type="text" name="pillar_3_title_sw" value="{{ $settings['pillar_3_title_sw'] ?? 'Nyumba za Kisasa' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Subtitle / English</label>
                        <input type="text" name="pillar_3_desc_sw" value="{{ $settings['pillar_3_desc_sw'] ?? 'Modern Family Houses' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white">
                    </div>
                </div>

                <!-- Pillar 4 -->
                <div class="p-4 rounded-2xl bg-[#1C0305] border border-[#750D15] space-y-3">
                    <span class="text-xs font-extrabold text-[#FAC955] block">Pillar 4: Magari ya Uhakika</span>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Title</label>
                        <input type="text" name="pillar_4_title_sw" value="{{ $settings['pillar_4_title_sw'] ?? 'Magari ya Uhakika' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-400 mb-1">Subtitle / English</label>
                        <input type="text" name="pillar_4_desc_sw" value="{{ $settings['pillar_4_desc_sw'] ?? 'Premium Vehicles' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white">
                    </div>
                </div>
            </div>
        </div>

        <!-- ===================================================================
             TAB 3: TRUST & WHY CHOOSE US
             =================================================================== -->
        <div x-show="activeTab === 'trust'" class="bg-[#280508] border border-[#750D15]/50 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xl" style="display: none;">
            <div class="border-b border-[#750D15]/50 pb-4">
                <h2 class="text-base font-bold text-[#FAC955] flex items-center gap-2">
                    <span>🛡️ Field Group: Trust & Why Choose Us Section</span>
                </h2>
                <p class="text-xs text-slate-400 mt-1">Configures trust guarantees, title deeds credentials, installment benefits, and diaspora desk.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Section Upper Badge
                    </label>
                    <input type="text" name="why_us_badge" value="{{ $settings['why_us_badge'] ?? '★ KWA NINI POWER FAMILY?' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Section Headline *
                    </label>
                    <input type="text" name="why_us_title" value="{{ $settings['why_us_title'] ?? 'Tunakupa Uhakika, Usalama na Mikataba Safi ya Kisheria.' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-bold">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Section Paragraph Description *
                    </label>
                    <textarea name="why_us_description" rows="3" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">{{ $settings['why_us_description'] ?? 'Tangu kuanzishwa kwetu, Power Family Investment imewasaidia mamia ya Watanzania ndani na nje ya nchi (Diaspora) kumiliki ardhi, nyumba na magari bila hofu yoyote ya migogoro au utapeli.' }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Showcase Site Visit Image URL
                    </label>
                    <input type="text" name="why_us_image" value="{{ $settings['why_us_image'] ?? 'https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=1200&q=80' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-mono">
                </div>

                <!-- Feature 1 -->
                <div class="p-4 rounded-2xl bg-[#1C0305] border border-[#750D15] space-y-2">
                    <label class="block text-xs font-bold text-[#FAC955]">Feature 1: Title & Description</label>
                    <input type="text" name="why_feat_1_title" value="{{ $settings['why_feat_1_title'] ?? 'Viwanja Vilivyopimwa' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white font-semibold">
                    <input type="text" name="why_feat_1_desc" value="{{ $settings['why_feat_1_desc'] ?? 'Vigingi vya kisasa vimewekwa na ramani zimesajiliwa.' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-slate-300">
                </div>

                <!-- Feature 2 -->
                <div class="p-4 rounded-2xl bg-[#1C0305] border border-[#750D15] space-y-2">
                    <label class="block text-xs font-bold text-[#FAC955]">Feature 2: Title & Description</label>
                    <input type="text" name="why_feat_2_title" value="{{ $settings['why_feat_2_title'] ?? 'Hati Miliki za Uhakika' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white font-semibold">
                    <input type="text" name="why_feat_2_desc" value="{{ $settings['why_feat_2_desc'] ?? 'Taratibu zote za uhamisho wa umiliki zinasimamiwa.' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-slate-300">
                </div>

                <!-- Feature 3 -->
                <div class="p-4 rounded-2xl bg-[#1C0305] border border-[#750D15] space-y-2">
                    <label class="block text-xs font-bold text-[#FAC955]">Feature 3: Title & Description</label>
                    <input type="text" name="why_feat_3_title" value="{{ $settings['why_feat_3_title'] ?? 'Malipo kwa Awamu' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white font-semibold">
                    <input type="text" name="why_feat_3_desc" value="{{ $settings['why_feat_3_desc'] ?? 'Mpango rahisi wa kulipa kidogo kidogo unaoendana na bajeti yako.' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-slate-300">
                </div>

                <!-- Feature 4 -->
                <div class="p-4 rounded-2xl bg-[#1C0305] border border-[#750D15] space-y-2">
                    <label class="block text-xs font-bold text-[#FAC955]">Feature 4: Title & Description</label>
                    <input type="text" name="why_feat_4_title" value="{{ $settings['why_feat_4_title'] ?? 'Huduma za Diaspora' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-white font-semibold">
                    <input type="text" name="why_feat_4_desc" value="{{ $settings['why_feat_4_desc'] ?? 'Ukaguzi wa video mubashara na mikataba salama ya kidijitali.' }}" class="w-full bg-[#280508] border border-[#750D15] rounded-lg px-3 py-2 text-xs text-slate-300">
                </div>
            </div>
        </div>

        <!-- ===================================================================
             TAB 4: CTA CONSULTATION BANNER
             =================================================================== -->
        <div x-show="activeTab === 'cta'" class="bg-[#280508] border border-[#750D15]/50 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xl" style="display: none;">
            <div class="border-b border-[#750D15]/50 pb-4">
                <h2 class="text-base font-bold text-[#FAC955] flex items-center gap-2">
                    <span>📣 Field Group: Bottom Golden Call-To-Action Banner</span>
                </h2>
                <p class="text-xs text-slate-400 mt-1">Configures the site visit invitation banner at the bottom of pages.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Banner Headline *
                    </label>
                    <input type="text" name="cta_banner_title" value="{{ $settings['cta_banner_title'] ?? 'Je, uko tayari kuanza safari yako ya umiliki leo?' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-bold">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Banner Subtitle / Description *
                    </label>
                    <textarea name="cta_banner_subtitle" rows="3" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">{{ $settings['cta_banner_subtitle'] ?? 'Wasiliana na timu yetu ya wataalamu upate ushauri wa bure na kuratibu ziara ya bure ya kutembelea miradi yetu (Site Visit).' }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Button 1 Text (Contact)
                    </label>
                    <input type="text" name="cta_banner_btn1_text" value="{{ $settings['cta_banner_btn1_text'] ?? 'Wasiliana Nasi Sasa →' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Button 2 Text (Call Hotline)
                    </label>
                    <input type="text" name="cta_banner_btn2_text" value="{{ $settings['cta_banner_btn2_text'] ?? 'Piga Simu Moja kwa Moja' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>
            </div>
        </div>

        <!-- ===================================================================
             TAB 5: CONTACT & SOCIAL MEDIA CHANNELS
             =================================================================== -->
        <div x-show="activeTab === 'contact'" class="bg-[#280508] border border-[#750D15]/50 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xl" style="display: none;">
            <div class="border-b border-[#750D15]/50 pb-4">
                <h2 class="text-base font-bold text-[#FAC955] flex items-center gap-2">
                    <span>📞 Field Group: Direct Contact & Official Social Handles</span>
                </h2>
                <p class="text-xs text-slate-400 mt-1">Configures phone hotlines, WhatsApp numbers, email, physical office location, and social media URLs.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Official Direct Phone (Primary) *
                    </label>
                    <input type="text" name="company_phone" value="{{ $settings['company_phone'] ?? '+255 759 423 626' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Official Direct Phone (Secondary)
                    </label>
                    <input type="text" name="company_phone_2" value="{{ $settings['company_phone_2'] ?? '+255 658 003 626' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Official WhatsApp Number (International) *
                    </label>
                    <input type="text" name="whatsapp_number" value="{{ $settings['whatsapp_number'] ?? '255759423626' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Official Company Email *
                    </label>
                    <input type="email" name="company_email" value="{{ $settings['company_email'] ?? 'info@powerfamilyinvestment.co.tz' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Physical Office Address *
                    </label>
                    <input type="text" name="company_address" value="{{ $settings['company_address'] ?? 'Tanzania' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Working Hours / Operating Schedule
                    </label>
                    <input type="text" name="working_hours" value="{{ $settings['working_hours'] ?? 'Jumatatu - Jumamosi: 2:00 Asubuhi - 11:30 Jioni' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>

                <!-- Social Channels -->
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Instagram Profile URL *
                    </label>
                    <input type="text" name="social_instagram" value="{{ $settings['social_instagram'] ?? 'https://www.instagram.com/power_family_investment/' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-mono">
                    <span class="text-[11px] text-[#FAC955] mt-1 block">Account: @power_family_investment</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Facebook Page URL
                    </label>
                    <input type="text" name="social_facebook" value="{{ $settings['social_facebook'] ?? 'https://facebook.com/power_family_investment' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        TikTok Channel URL
                    </label>
                    <input type="text" name="social_tiktok" value="{{ $settings['social_tiktok'] ?? 'https://tiktok.com/@power_family_investment' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        YouTube Channel URL
                    </label>
                    <input type="text" name="social_youtube" value="{{ $settings['social_youtube'] ?? 'https://youtube.com/@power_family_investment' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-mono">
                </div>
            </div>
        </div>

        <!-- ===================================================================
             TAB 6: BRAND IDENTITY & SEO META
             =================================================================== -->
        <div x-show="activeTab === 'seo'" class="bg-[#280508] border border-[#750D15]/50 rounded-3xl p-6 sm:p-8 space-y-6 shadow-xl" style="display: none;">
            <div class="border-b border-[#750D15]/50 pb-4">
                <h2 class="text-base font-bold text-[#FAC955] flex items-center gap-2">
                    <span>🏷️ Field Group: Brand Identity, Taglines & SEO Meta</span>
                </h2>
                <p class="text-xs text-slate-400 mt-1">Configures browser titles, search engine metadata, and top bar taglines.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Company Name *
                    </label>
                    <input type="text" name="company_name" value="{{ $settings['company_name'] ?? 'Power Family Investment' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-bold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Official Tagline / Motto *
                    </label>
                    <input type="text" name="tagline" value="{{ $settings['tagline'] ?? 'Wekeza Leo. Jenga Kesho.' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-bold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Top Bar Tagline (Kiswahili)
                    </label>
                    <input type="text" name="top_bar_tagline_sw" value="{{ $settings['top_bar_tagline_sw'] ?? 'Suluhisho la Uhakika la Viwanja, Nyumba za Kisasa na Magari' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Top Bar Tagline (English)
                    </label>
                    <input type="text" name="top_bar_tagline_en" value="{{ $settings['top_bar_tagline_en'] ?? 'Reliable Solutions for Plots, Modern Houses & Quality Vehicles' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        SEO Meta Title *
                    </label>
                    <input type="text" name="site_title" value="{{ $settings['site_title'] ?? 'Power Family Investment — Viwanja, Nyumba na Magari Tanzania' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white font-bold">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        SEO Meta Description *
                    </label>
                    <textarea name="meta_description" rows="3" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">{{ $settings['meta_description'] ?? 'Nunua viwanja vya makazi na biashara, nyumba za kisasa na magari yenye ubora Tanzania kupitia Power Family Investment.' }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        SEO Search Keywords
                    </label>
                    <input type="text" name="meta_keywords" value="{{ $settings['meta_keywords'] ?? 'viwanja, nyumba, magari, uwekezaji, tanzania, dar es salaam, dodoma, hati miliki, power family' }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white">
                </div>
            </div>
        </div>

        <!-- Sticky Save Button Bar -->
        <div class="sticky bottom-6 z-20 bg-[#1C0305]/95 backdrop-blur-md p-4 rounded-2xl border border-[#750D15] flex items-center justify-between shadow-2xl">
            <span class="text-xs text-slate-300">
                All custom fields are cached & updated instantly upon saving.
            </span>
            <button 
                type="submit" 
                class="px-8 py-3 rounded-xl bg-gold-gradient text-[#1C0305] font-black text-xs uppercase tracking-wider shadow-lg shadow-[#D48B16]/20 hover:brightness-110 active:scale-95 transition flex items-center space-x-2 border border-[#FAC955]"
            >
                <svg class="w-4 h-4 text-[#1C0305]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Save All ACF Fields</span>
            </button>
        </div>

    </form>
</div>
@endsection
