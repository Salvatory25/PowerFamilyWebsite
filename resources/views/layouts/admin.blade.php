<!DOCTYPE html>
<html lang="en" class="h-full bg-[#07101f]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | RELAND Portal</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full bg-[#07101f] text-slate-100 font-sans antialiased">

    <div class="min-h-full flex">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-[#0c1c34] border-r border-[#16325c] flex flex-col shrink-0 hidden md:flex">
            <!-- Brand -->
            <div class="h-20 flex items-center gap-3 px-5 border-b border-[#16325c]">
                <img src="{{ asset('images/logo.png') }}" alt="RELAND Logo" class="h-10 w-auto object-contain bg-white rounded-lg p-0.5 shadow-xs">
                <div>
                    <span class="font-extrabold text-lg tracking-tight text-white leading-none block">RE<span class="text-[#c89a3b]">LAND</span></span>
                    <span class="text-[9px] text-[#dfb256] font-bold tracking-wider uppercase">Consult Ltd &bull; Admin</span>
                </div>
            </div>

            <!-- Links -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#16325c] text-white shadow-md border-l-4 border-[#c89a3b]' : 'text-slate-400 hover:text-white hover:bg-[#16325c]/50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-[#dfb256]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[11px] font-bold text-[#c89a3b] uppercase tracking-wider">
                    Land Projects & Portfolio
                </div>

                <a href="{{ route('admin.projects.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.projects.*') ? 'bg-[#16325c] text-white shadow-md border-l-4 border-[#c89a3b]' : 'text-slate-400 hover:text-white hover:bg-[#16325c]/50' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.projects.*') ? 'text-[#dfb256]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        <span>Land Projects</span>
                    </div>
                </a>

                <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-3 px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-400 hover:text-[#dfb256] pl-11 transition">
                    <span>+ Add New Project</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[11px] font-bold text-[#c89a3b] uppercase tracking-wider">
                    Plot Inventory
                </div>

                <a href="{{ route('admin.plots.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.plots.*') ? 'bg-[#16325c] text-white shadow-md border-l-4 border-[#c89a3b]' : 'text-slate-400 hover:text-white hover:bg-[#16325c]/50' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.plots.*') ? 'text-[#dfb256]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        <span>Manage Plots</span>
                    </div>
                </a>

                <a href="{{ route('admin.plots.create') }}" class="flex items-center gap-3 px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-400 hover:text-[#dfb256] pl-11 transition">
                    <span>+ Add New Plot</span>
                </a>

                <a href="{{ route('admin.locations.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.locations.*') ? 'bg-[#16325c] text-white shadow-md border-l-4 border-[#c89a3b]' : 'text-slate-400 hover:text-white hover:bg-[#16325c]/50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.locations.*') ? 'text-[#dfb256]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                    <span>Arusha Locations</span>
                </a>

                <a href="{{ route('admin.plot-types.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.plot-types.*') ? 'bg-[#16325c] text-white shadow-md border-l-4 border-[#c89a3b]' : 'text-slate-400 hover:text-white hover:bg-[#16325c]/50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.plot-types.*') ? 'text-[#dfb256]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <span>Plot Types</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[11px] font-bold text-[#c89a3b] uppercase tracking-wider">
                    Content &amp; Insights
                </div>

                <a href="{{ route('admin.articles.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.articles.*') ? 'bg-[#16325c] text-white shadow-md border-l-4 border-[#c89a3b]' : 'text-slate-400 hover:text-white hover:bg-[#16325c]/50' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.articles.*') ? 'text-[#dfb256]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        <span>Blog &amp; Articles</span>
                    </div>
                </a>

                <a href="{{ route('admin.articles.create') }}" class="flex items-center gap-3 px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-400 hover:text-[#dfb256] pl-11 transition">
                    <span>+ Andika Makala Mpya</span>
                </a>

                <div class="pt-4 pb-1 px-3 text-[11px] font-bold text-[#c89a3b] uppercase tracking-wider">
                    CRM & Settings
                </div>

                <a href="{{ route('admin.enquiries.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.enquiries.*') ? 'bg-[#16325c] text-white shadow-md border-l-4 border-[#c89a3b]' : 'text-slate-400 hover:text-white hover:bg-[#16325c]/50' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.enquiries.*') ? 'text-[#dfb256]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>Client Leads & CRM</span>
                    </div>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition {{ request()->routeIs('admin.settings.*') ? 'bg-[#16325c] text-white shadow-md border-l-4 border-[#c89a3b]' : 'text-slate-400 hover:text-white hover:bg-[#16325c]/50' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.settings.*') ? 'text-[#dfb256]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Website Settings</span>
                </a>

                <div class="pt-4">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold text-[#dfb256] bg-slate-900 border border-slate-800 hover:bg-slate-800 transition">
                        <span>View Live Website &rarr;</span>
                    </a>
                </div>
            </nav>

            <!-- Bottom Profile & Logout -->
            <div class="p-4 border-t border-[#16325c]">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-[#c89a3b] text-[#0c1c34] flex items-center justify-center font-black text-xs">
                            A
                        </div>
                        <div class="text-xs">
                            <p class="font-bold text-white">{{ auth()->user()->name ?? 'Administrator' }}</p>
                            <p class="text-slate-400 truncate max-w-[120px]">{{ auth()->user()->email ?? 'admin@reland.co.tz' }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 transition" title="Logout">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Top Header on Mobile & Quick Bar -->
            <header class="h-20 bg-[#0c1c34] border-b border-[#16325c] flex items-center justify-between px-4 sm:px-8 shrink-0">
                <div class="flex items-center gap-4">
                    <!-- Mobile Hamburger -->
                    <button type="button" onclick="document.getElementById('mobile-admin-sidebar').classList.toggle('hidden')" class="md:hidden p-2 rounded-xl text-slate-400 hover:text-white hover:bg-[#16325c]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>

                    <h1 class="text-base sm:text-xl font-extrabold text-white tracking-tight">
                        @yield('header_title', 'Management Portal')
                    </h1>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-[#16325c] hover:bg-[#1f437a] text-slate-200 text-xs font-semibold border border-slate-700 transition">
                        <span>Visit Site</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
            </header>

            <!-- Flash Alert Messages -->
            @if(session('success'))
                <div class="px-4 sm:px-8 pt-4">
                    <div class="p-4 rounded-2xl bg-emerald-950/80 border border-emerald-800 text-emerald-300 flex items-center justify-between text-xs font-semibold">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Content Container -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-8 bg-[#07101f]">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-admin-sidebar" class="hidden md:hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-xs flex">
        <div class="w-64 bg-[#0c1c34] h-full p-4 flex flex-col justify-between overflow-y-auto">
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b border-[#16325c] pb-3">
                    <span class="font-extrabold text-white text-lg">RE<span class="text-[#c89a3b]">LAND</span> Admin</span>
                    <button type="button" onclick="document.getElementById('mobile-admin-sidebar').classList.toggle('hidden')" class="text-slate-400 p-1">✕</button>
                </div>
                <nav class="space-y-1.5 text-xs">
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-[#16325c]">Dashboard</a>
                    <a href="{{ route('admin.projects.index') }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-[#16325c]">Land Projects</a>
                    <a href="{{ route('admin.plots.index') }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-[#16325c]">Manage Plots</a>
                    <a href="{{ route('admin.articles.index') }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-[#16325c]">Blog &amp; Articles</a>
                    <a href="{{ route('admin.locations.index') }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-[#16325c]">Locations</a>
                    <a href="{{ route('admin.plot-types.index') }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-[#16325c]">Plot Types</a>
                    <a href="{{ route('admin.enquiries.index') }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-[#16325c]">Leads & Inquiries</a>
                    <a href="{{ route('admin.settings.index') }}" class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-[#16325c]">Settings</a>
                </nav>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}" class="pt-4 border-t border-[#16325c]">
                @csrf
                <button type="submit" class="w-full py-2 bg-rose-900/40 text-rose-300 rounded-lg text-xs font-bold">Logout</button>
            </form>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
