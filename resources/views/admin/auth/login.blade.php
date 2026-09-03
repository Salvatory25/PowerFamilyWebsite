<!DOCTYPE html>
<html lang="en" class="h-full bg-[#1C0305]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Power Family Investment</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 text-slate-100 bg-[radial-gradient(ellipse_at_top,rgba(117,13,21,0.6),#1C0305)]">
    <div class="max-w-md w-full space-y-8 bg-[#280508] border border-[#750D15]/60 p-8 sm:p-10 rounded-3xl shadow-2xl shadow-black/80">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Power Family Investment Logo" class="h-24 w-24 object-contain mx-auto bg-white rounded-full p-1 shadow-xl border-2 border-[#D48B16]">
            <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-white">
                POWER FAMILY <span class="text-[#FAC955]">ADMIN</span>
            </h2>
            <p class="mt-1 text-xs text-slate-300 font-medium">
                Wekeza Leo, Jenga Kesho &bull; Management Portal
            </p>
        </div>

        @if(session('status'))
            <div class="p-3 rounded-xl bg-[#750D15]/80 border border-[#D48B16]/50 text-[#FAC955] text-xs">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-3 rounded-xl bg-rose-950/80 border border-rose-800 text-rose-300 text-xs">
                {{ $errors->first() }}
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Email Address
                    </label>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email', 'admin@powerfamily.co.tz') }}" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:outline-hidden focus:ring-2 focus:ring-[#D48B16]">
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Password
                    </label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="••••••••" class="w-full bg-[#1C0305] border border-[#750D15] rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:outline-hidden focus:ring-2 focus:ring-[#D48B16]">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-[#D48B16] focus:ring-[#D48B16] border-[#750D15] rounded bg-[#1C0305]">
                    <label for="remember" class="ml-2 block text-xs text-slate-400">
                        Remember session
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-gold-gradient hover:brightness-110 text-[#1C0305] font-black text-xs uppercase tracking-wider shadow-lg shadow-[#D48B16]/20 transition duration-150 border border-[#FAC955]">
                    Authenticate & Enter
                </button>
            </div>
        </form>

        <div class="pt-4 border-t border-[#750D15]/40 text-center">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-[#FAC955] transition">
                ← Return to Public Website
            </a>
        </div>
    </div>
</body>
</html>
