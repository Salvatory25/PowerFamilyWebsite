@extends('layouts.admin')

@section('title', 'Orodha ya Nyumba')
@section('page_title', 'Usimamizi wa Nyumba (Houses Management)')

@section('content')

<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#1C0305] p-6 rounded-2xl border border-[#750D15]">
        <div>
            <h2 class="text-lg font-bold text-white">Nyumba Zilizopo</h2>
            <p class="text-xs text-slate-400">Tazama, ongeza au hariri taarifa za nyumba zinazouzwa.</p>
        </div>
        <a href="{{ route('admin.houses.create') }}" class="bg-[#750D15] hover:bg-[#961620] text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow border border-[#D48B16]/40 flex items-center space-x-2 transition">
            <span>+ Ongeza Nyumba Mpya</span>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-[#1C0305] rounded-2xl border border-[#750D15] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-[#18031A] text-xs uppercase text-slate-400">
                    <tr>
                        <th class="px-6 py-3.5">Nyumba</th>
                        <th class="px-6 py-3.5">Eneo</th>
                        <th class="px-6 py-3.5">Bei</th>
                        <th class="px-6 py-3.5">Vyumba</th>
                        <th class="px-6 py-3.5">Hali</th>
                        <th class="px-6 py-3.5 text-right">Vitendo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#750D15]">
                    @forelse($houses as $house)
                        <tr class="hover:bg-[#280508]/60 transition">
                            <td class="px-6 py-4 flex items-center space-x-3">
                                <img src="{{ $house->display_image }}" class="w-12 h-10 object-cover rounded-lg">
                                <div>
                                    <span class="font-bold text-white block">{{ $house->title }}</span>
                                    <span class="text-[11px] text-[#FAC955]">{{ $house->house_reference }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $house->location?->area_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-bold text-white">{{ $house->formatted_price }}</td>
                            <td class="px-6 py-4 text-xs">{{ $house->bedrooms }} Beds / {{ $house->bathrooms }} Baths</td>
                            <td class="px-6 py-4">{!! $house->status_badge !!}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.houses.edit', $house->id) }}" class="px-3 py-1.5 rounded-lg bg-[#750D15] text-white hover:bg-[#961620] text-xs font-semibold">
                                    Hariri
                                </a>
                                <form method="POST" action="{{ route('admin.houses.destroy', $house->id) }}" class="inline-block" onsubmit="return confirm('Una uhakika unataka kufuta nyumba hii?')">
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
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">Hakuna nyumba zilizoongezwa bado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div>{{ $houses->links() }}</div>
</div>

@endsection
