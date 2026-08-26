@extends('layouts.app')

@section('title', 'Fuatilia Mchakato | Track Project • RELAND')

@section('content')
<!-- Minimal Page Header -->
<div class="relative bg-[#0c1c34] pt-24 pb-16 overflow-hidden border-b border-[#16325c]">
    <div class="absolute inset-0 bg-[url('/public/images/pattern.svg')] opacity-5"></div>
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight mb-4">
            Fuatilia <span class="text-[#c89a3b]">Mchakato Wako</span>
        </h1>
        <p class="text-slate-300 max-w-2xl mx-auto font-medium">
            Ingiza namba yako ya kumbukumbu (Tracking Reference) na namba yako ya simu ili kuona hatua iliyofikiwa katika kazi yako ya upimaji au urasimishaji.
        </p>
    </div>
</div>

<div class="bg-slate-50 py-16">
    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Tracking Form -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-2xl shadow-slate-200/50 border border-slate-100 mb-12">
            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-600 font-medium text-sm border border-red-100 flex items-start gap-3">
                    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('track.check') }}" method="POST" class="grid grid-cols-1 md:grid-cols-12 gap-6">
                @csrf
                <div class="md:col-span-5">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tracking Reference *</label>
                    <input type="text" name="tracking_reference" required placeholder="e.g. REQ-A8F9B2" value="{{ old('tracking_reference') }}" class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-[#c89a3b] focus:border-[#c89a3b] font-mono font-bold uppercase transition placeholder:text-slate-400 placeholder:font-normal">
                </div>
                <div class="md:col-span-4">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Phone Number *</label>
                    <input type="text" name="phone" required placeholder="e.g. 0742448965" value="{{ old('phone') }}" class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-[#c89a3b] focus:border-[#c89a3b] font-semibold transition placeholder:text-slate-400 placeholder:font-normal">
                </div>
                <div class="md:col-span-3 flex items-end">
                    <button type="submit" class="w-full bg-[#0c1c34] hover:bg-[#16325c] text-white font-bold px-6 py-3.5 rounded-xl shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Tafuta</span>
                        <svg class="w-4 h-4 text-[#c89a3b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Tracking Results (Timeline) -->
        @if(isset($enquiry))
            @php
                $stages = [
                    'new' => ['label' => 'Request Received', 'desc' => 'Your request has been received by our desk.', 'sw' => 'Ombi Limepokelewa'],
                    'assessment' => ['label' => 'Site Assessment', 'desc' => 'Our team is reviewing the location and requirements.', 'sw' => 'Tathmini ya Eneo'],
                    'surveying' => ['label' => 'Survey in Progress', 'desc' => 'Field operations and measurements are ongoing.', 'sw' => 'Upimaji Unaendelea'],
                    'documentation' => ['label' => 'Documentation', 'desc' => 'Maps, deed plans, and documents are being prepared.', 'sw' => 'Maandalizi ya Nyaraka'],
                    'verification' => ['label' => 'Verification', 'desc' => 'Documents are undergoing Ministry verification.', 'sw' => 'Uhakiki wa Nyaraka'],
                    'completed' => ['label' => 'Completed', 'desc' => 'All processes are finalized. Documents ready.', 'sw' => 'Imekamilika'],
                ];

                // Determine current index
                $statusKeys = array_keys($stages);
                
                // Map existing backend statuses to this new tracker timeline
                $currentStatusKey = 'new';
                if ($enquiry->status === 'new') $currentStatusKey = 'new';
                elseif ($enquiry->status === 'contacted') $currentStatusKey = 'assessment';
                elseif ($enquiry->status === 'qualified') $currentStatusKey = 'assessment';
                elseif ($enquiry->status === 'lost') $currentStatusKey = 'new'; // Simplification
                
                $currentIndex = array_search($currentStatusKey, $statusKeys);
            @endphp

            <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-2xl shadow-slate-200/50 border border-slate-100">
                
                <!-- Client Details Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100 mb-8">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">{{ $enquiry->name }}</h2>
                        <p class="text-sm text-slate-500 mt-1">Service: <span class="font-semibold text-slate-700">{{ $enquiry->service_type ?? 'General Land Service' }}</span></p>
                    </div>
                    <div class="text-left sm:text-right">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-xs border border-emerald-100 font-mono">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            {{ $enquiry->tracking_reference }}
                        </span>
                        <p class="text-xs text-slate-400 mt-1">Date: {{ $enquiry->created_at->format('M d, Y') }}</p>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="relative max-w-2xl mx-auto">
                    <!-- Vertical Line -->
                    <div class="absolute top-2 bottom-2 left-4 sm:left-6 w-0.5 bg-slate-200"></div>

                    <div class="space-y-8 relative">
                        @foreach($stages as $key => $stage)
                            @php
                                $stageIndex = array_search($key, $statusKeys);
                                $isCompleted = $stageIndex < $currentIndex;
                                $isCurrent = $stageIndex === $currentIndex;
                                $isFuture = $stageIndex > $currentIndex;
                            @endphp
                            
                            <div class="flex items-start gap-4 sm:gap-6 relative z-10">
                                <!-- Status Node -->
                                <div class="shrink-0 flex items-center justify-center w-8 h-8 sm:w-12 sm:h-12 rounded-full border-4 {{ $isCompleted ? 'bg-emerald-500 border-emerald-100' : ($isCurrent ? 'bg-[#c89a3b] border-[#c89a3b]/20 ring-4 ring-[#c89a3b]/10' : 'bg-white border-slate-200') }} transition-all duration-300">
                                    @if($isCompleted)
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    @elseif($isCurrent)
                                        <div class="w-2 h-2 sm:w-3 sm:h-3 bg-white rounded-full animate-pulse"></div>
                                    @else
                                        <div class="w-2 h-2 sm:w-3 sm:h-3 bg-slate-200 rounded-full"></div>
                                    @endif
                                </div>

                                <!-- Status Content -->
                                <div class="pt-1 sm:pt-2 flex-1">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1 mb-1">
                                        <h3 class="text-base sm:text-lg font-bold {{ $isCompleted || $isCurrent ? 'text-slate-800' : 'text-slate-400' }}">
                                            {{ $stage['sw'] }} <span class="text-xs sm:text-sm font-normal text-slate-400 ml-1">/ {{ $stage['label'] }}</span>
                                        </h3>
                                        @if($isCurrent)
                                            <span class="inline-block px-2 py-0.5 rounded text-[10px] font-bold bg-[#c89a3b]/10 text-[#b5882e] uppercase tracking-wider">In Progress</span>
                                        @endif
                                    </div>
                                    <p class="text-sm {{ $isCompleted || $isCurrent ? 'text-slate-600' : 'text-slate-400' }}">
                                        {{ $stage['desc'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-12 text-center border-t border-slate-100 pt-8">
                    <p class="text-sm text-slate-500 mb-4">Je, unahitaji msaada zaidi? / Need more assistance?</p>
                    <a href="https://wa.me/{{ $siteWhatsappClean ?? '255742448965' }}?text=Hello%20RELAND%2C%20following%20up%20on%20my%20request%20{{ $enquiry->tracking_reference }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-bold text-sm transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.073-2.115-.515-1.748-.722-2.887-2.493-2.975-2.609-.088-.116-.708-.941-.708-1.792s.445-1.272.603-1.446c.159-.175.346-.219.462-.219.116 0 .232.001.332.006.106.005.249-.04.39.299.144.348.491 1.199.535 1.287.044.088.073.19.014.307-.058.117-.088.19-.174.292-.088.102-.185.228-.264.306-.088.087-.18.182-.078.357.102.175.454.748.974 1.211.67.595 1.235.779 1.41.867.175.088.277.073.38-.044.102-.117.438-.511.554-.686.117-.175.234-.146.394-.088.16.058 1.02.481 1.195.568.175.088.292.131.335.204.044.073.044.423-.1.828z"/></svg>
                        <span>Follow Up via WhatsApp</span>
                    </a>
                </div>

            </div>
        @endif

    </div>
</div>
@endsection
