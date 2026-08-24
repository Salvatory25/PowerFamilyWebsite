<!DOCTYPE html>
<html lang="en" class="h-full bg-[#07101f]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | RELAND Portal</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 text-slate-100 bg-[radial-gradient(ellipse_at_top,rgba(22,50,92,0.6),#07101f)]">
    <div class="max-w-md w-full space-y-8 bg-[#0c1c34] border border-[#16325c] p-8 sm:p-10 rounded-3xl shadow-2xl shadow-black/80">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="RELAND Logo" class="h-20 w-auto object-contain mx-auto bg-white rounded-2xl p-2 shadow-lg">
            <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-white">
                RE<span class="text-[#c89a3b]">LAND</span> Admin Portal
            </h2>
            <p class="mt-1 text-xs text-slate-300 font-medium">
                "Ardhi Yako Mtaji Wako" &bull; Plot & Leads Control Desk
            </p>
        </div>

        @if(session('status'))
            <div class="p-3 rounded-xl bg-[#16325c]/80 border border-[#c89a3b]/50 text-[#dfb256] text-xs">
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
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email', 'admin@reland.co.tz') }}" class="w-full bg-[#07101f] border border-[#16325c] rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:outline-hidden focus:ring-2 focus:ring-[#c89a3b]">
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Password
                    </label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required value="Admin@Reland2026" class="w-full bg-[#07101f] border border-[#16325c] rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:outline-hidden focus:ring-2 focus:ring-[#c89a3b]">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-[#c89a3b] focus:ring-[#c89a3b] border-[#16325c] rounded bg-[#07101f]">
                    <label for="remember" class="ml-2 block text-xs text-slate-400">
                        Remember session
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-[#c89a3b] hover:bg-[#dfb256] text-[#0c1c34] font-black text-xs uppercase tracking-wider shadow-lg shadow-[#c89a3b]/20 transition duration-150">
                    Authenticate & Enter
                </button>
            </div>
        </form>

        <div class="pt-4 border-t border-[#16325c] text-center">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-[#dfb256] transition">
                ← Return to Public Website
            </a>
        </div>
    </div>
</body>
</html>
