@extends('layouts.admin')

@section('title', 'Orodha ya Magari')
@section('page_title', 'Usimamizi wa Magari (Vehicles Management)')

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#220325] p-6 rounded-2xl border border-[#4A0E4E]">
        <div>
            <h2 class="text-lg font-bold text-white">Magari Yaliyopo</h2>
            <p class="text-xs text-slate-400">Tazama, ongeza au hariri magari yanayouzwa.</p>
        </div>
        <a href="{{ route('admin.vehicles.create') }}" class="bg-[#4A0E4E] hover:bg-[#68176E] text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow border border-[#C59B27]/40 flex items-center space-x-2 transition">
            <span>+ Ongeza Gari Jipya</span>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-[#220325] rounded-2xl border border-[#4A0E4E] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-[#18031A] text-xs uppercase text-slate-400">
                    <tr>
                        <th class="px-6 py-3.5">Gari</th>
                        <th class="px-6 py-3.5">Make / Model</th>
                        <th class="px-6 py-3.5">Bei</th>
                        <th class="px-6 py-3.5">Mwaka & Transmission</th>
                        <th class="px-6 py-3.5">Hali</th>
                        <th class="px-6 py-3.5 text-right">Vitendo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#4A0E4E]">
                    @forelse($vehicles as $vehicle)
                        <tr class="hover:bg-[#320635]/60 transition">
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <img src="{{ $vehicle->display_image }}" class="w-12 h-10 object-cover rounded-lg">
                                <div>
                                    <span class="font-bold text-white block">{{ $vehicle->title }}</span>
                                    <span class="text-[11px] text-[#DFB743]">{{ $vehicle->vehicle_reference }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-200">{{ $vehicle->make }} {{ $vehicle->model }}</td>
                            <td class="px-6 py-4 font-bold text-white">{{ $vehicle->formatted_price }}</td>
                            <td class="px-6 py-4 text-xs">{{ $vehicle->year }} &bull; {{ $vehicle->transmission }}</td>
                            <td class="px-6 py-4">{!! $vehicle->status_badge !!}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" class="inline-block" onsubmit="return confirm('Una uhakika unataka kufuta gari hili?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-900/60 text-rose-300 hover:bg-rose-900 text-xs font-semibold">
                                        Futa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">Hakuna magari yaliyoongezwa bado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div>{{ $vehicles->links() }}</div>
</div>

@endsection
