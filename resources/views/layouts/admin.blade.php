<!DOCTYPE html>
<html lang="en" class="h-full bg-[#1C0305]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | Power Family Investment</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full bg-[#1C0305] text-slate-100 font-sans antialiased">

    <div class="min-h-full flex">
        <!-- Desktop Sidebar -->
        <aside class="w-64 bg-[#280508] border-r border-[#750D15]/50 flex flex-col shrink-0 hidden md:flex">
            <!-- Brand -->
            <div class="h-20 flex items-center gap-3 px-5 border-b border-[#750D15]/50">
                <img 
                    src="{{ asset('images/logo.png') }}" 
                    alt="Power Family Logo" 
                    class="w-11 h-11 rounded-full object-contain border border-[#D48B16]/50 bg-white p-0.5 shadow-sm"
                >
                <div>
                    <span class="font-extrabold text-base tracking-tight text-white leading-none block">POWER FAMILY</span>
                    <span class="text-[9px] text-[#FAC955] font-bold tracking-wider uppercase">INVESTMENT &bull; ADMIN</span>
                </div>
            </div>

            <!-- Links -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#750D15] text-white shadow-md border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-[#FAC955]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-[#FAC955] uppercase tracking-wider">
                    Usimamizi wa Viwanja (Plots)
                </div>
                <a href="{{ route('admin.plots.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.plots.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <span>Viwanja vyote</span>
                </a>
                <a href="{{ route('admin.plots.create') }}" class="flex items-center gap-3 px-3.5 py-1 text-xs text-slate-400 hover:text-[#FAC955] pl-10 transition">
                    <span>+ Ongeza Kiwanja Kipya</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-[#FAC955] uppercase tracking-wider">
                    Usimamizi wa Nyumba (Houses)
                </div>
                <a href="{{ route('admin.houses.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.houses.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Nyumba zote</span>
                </a>
                <a href="{{ route('admin.houses.create') }}" class="flex items-center gap-3 px-3.5 py-1 text-xs text-slate-400 hover:text-[#FAC955] pl-10 transition">
                    <span>+ Ongeza Nyumba Mpya</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-[#FAC955] uppercase tracking-wider">
                    Usimamizi wa Magari (Vehicles)
                </div>
                <a href="{{ route('admin.vehicles.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.vehicles.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h8m-8 4h8m-8 4h8M4 6h16a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>
                    <span>Magari yote</span>
                </a>
                <a href="{{ route('admin.vehicles.create') }}" class="flex items-center gap-3 px-3.5 py-1 text-xs text-slate-400 hover:text-[#FAC955] pl-10 transition">
                    <span>+ Ongeza Gari Jipya</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-[#FAC955] uppercase tracking-wider">
                    Maeneo & Kategoria
                </div>
                <a href="{{ route('admin.locations.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.locations.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    <span>Maeneo (Locations)</span>
                </a>
                <a href="{{ route('admin.plot-types.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.plot-types.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <span>Aina za Viwanja</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-[#FAC955] uppercase tracking-wider">
                    Maudhui & Matunzio
                </div>
                <a href="{{ route('admin.gallery.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.gallery.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Matunzio (Gallery)</span>
                </a>
                <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.articles.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>Makala za Blog</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-[#FAC955] uppercase tracking-wider">
                    Wateja & Mipangilio
                </div>
                <a href="{{ route('admin.enquiries.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.enquiries.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Maulizo ya Wateja (CRM)</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.settings.*') ? 'bg-[#750D15] text-white shadow border-l-4 border-[#D48B16]' : 'text-slate-400 hover:text-white hover:bg-[#3D080E]' }}">
                    <svg class="w-4 h-4 text-[#FAC955]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Mipangilio ya Tovuti</span>
                </a>

                <div class="pt-4">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold text-[#FAC955] bg-[#280508] border border-[#750D15] hover:bg-[#750D15] transition">
                        <span>Angalia Tovuti &rarr;</span>
                    </a>
                </div>
            </nav>

            <!-- Bottom User & Logout -->
            <div class="p-4 border-t border-[#750D15]/50">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-[#D48B16] text-[#1C0305] flex items-center justify-center font-black text-xs">
                            A
                        </div>
                        <div class="text-xs">
                            <p class="font-bold text-white">{{ auth()->user()->name ?? 'Administrator' }}</p>
                            <p class="text-slate-400 truncate max-w-[120px]">{{ auth()->user()->email ?? 'admin@powerfamily.co.tz' }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 transition" title="Toka (Logout)">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Header Bar -->
            <header class="h-20 bg-[#280508] border-b border-[#750D15]/50 flex items-center justify-between px-4 sm:px-8 shrink-0">
                <div class="flex items-center gap-3">
                    <span class="text-lg font-bold text-white">@yield('page_title', 'Dashboard')</span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-lg bg-white/10 text-xs font-semibold text-[#FAC955] hover:bg-white/20 transition">
                        <span>Fungua Tovuti</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </header>

            <!-- Alerts -->
            @if(session('success'))
                <div class="px-8 pt-4">
                    <div class="p-4 rounded-xl bg-emerald-900/50 border border-emerald-500/40 text-emerald-200 text-sm font-semibold">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="px-8 pt-4">
                    <div class="p-4 rounded-xl bg-rose-900/50 border border-rose-500/40 text-rose-200 text-sm font-semibold">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Content Slot -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-8 bg-[#1C0305]">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
