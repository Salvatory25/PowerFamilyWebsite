@extends('layouts.admin')

@section('title', 'Ongeza Nyumba Mpya')
@section('page_title', 'Ongeza Nyumba Mpya (Add New House)')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="bg-[#220325] rounded-2xl border border-[#4A0E4E] p-8 shadow-sm">
        <form action="{{ route('admin.houses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Jina la Nyumba (Title) *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" placeholder="Mfano: Nyumba ya Kisasa ya Familia (Vyumba 4)" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Eneo (Location) *</label>
                    <select name="location_id" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                        <option value="">Chagua Eneo</option>
                        @foreach($locations as $loc)
                            <option value="{{ $loc->id }}" {{ old('location_id') == $loc->id ? 'selected' : '' }}>{{ $loc->area_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Bei (TSh) *</label>
                    <input type="number" name="price" required value="{{ old('price') }}" placeholder="Mfano: 120000000" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Vyumba vya Kulala (Bedrooms) *</label>
                    <input type="number" name="bedrooms" required value="{{ old('bedrooms', 3) }}" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Vyoo na Bafu (Bathrooms) *</label>
                    <input type="number" name="bathrooms" required value="{{ old('bathrooms', 2) }}" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Ukubwa wa Kiwanja (Plot Size)</label>
                    <input type="text" name="plot_size" value="{{ old('plot_size') }}" placeholder="Mfano: 30m x 30m" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Ukubwa wa Nyumba (House Size)</label>
                    <input type="text" name="house_size" value="{{ old('house_size') }}" placeholder="Mfano: 220 SQM" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Hali (Status) *</label>
                    <select name="listing_status" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                        <option value="available">Inapatikana (Available)</option>
                        <option value="reserved">Imeshikiliwa (Reserved)</option>
                        <option value="sold">Imeuzwa (Sold)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Hati / Nyaraka</label>
                    <input type="text" name="ownership_title_type" value="{{ old('ownership_title_type', 'Hati Miliki Safi') }}" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Maelezo ya Nyumba (Description) *</label>
                    <textarea name="description" rows="4" required class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27] resize-none">{{ old('description') }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Sifa Kuu (Weka moja kwa kila mstari)</label>
                    <textarea name="features" rows="4" placeholder="Vyumba 4 (2 Master)&#10;Jiko la kisasa&#10;Uzio na Geti la Umeme&#10;Paving blocks na Bustani" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27] resize-none">{{ old('features') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Picha Kuu (Featured Image)</label>
                    <input type="file" name="featured_image" accept="image/*" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-2 text-xs text-slate-300">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Picha Nyingine (Gallery Images)</label>
                    <input type="file" name="images[]" multiple accept="image/*" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-2 text-xs text-slate-300">
                </div>

                <div class="flex items-center space-x-6">
                    <label class="flex items-center space-x-2 text-xs text-slate-300">
                        <input type="checkbox" name="is_featured" value="1" class="rounded bg-[#18031A] border-[#4A0E4E] text-[#4A0E4E]">
                        <span>Iweke kwenye Featured</span>
                    </label>
                    <label class="flex items-center space-x-2 text-xs text-slate-300">
                        <input type="checkbox" name="is_published" value="1" checked class="rounded bg-[#18031A] border-[#4A0E4E] text-[#4A0E4E]">
                        <span>Ionekane Kwenye Tovuti (Publish)</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-[#4A0E4E] flex items-center justify-end space-x-4">
                <a href="{{ route('admin.houses.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-600 text-xs font-bold text-slate-300 hover:bg-white/5">
                    Ghairi
                </a>
                <button type="submit" class="bg-pfi-gradient text-white px-8 py-3 rounded-xl text-xs font-bold shadow border border-[#C59B27]/40 hover:brightness-110">
                    Hifadhi Nyumba
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
