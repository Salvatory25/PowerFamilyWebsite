@extends('layouts.admin')

@section('title', 'Ongeza Gari Jipya')
@section('page_title', 'Ongeza Gari Jipya (Add New Vehicle)')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="bg-[#220325] rounded-2xl border border-[#4A0E4E] p-8 shadow-sm">
        <form action="{{ route('admin.vehicles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Jina la Gari (Title) *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" placeholder="Mfano: Toyota Land Cruiser Prado TX-L" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Kampuni (Make) *</label>
                    <input type="text" name="make" required value="{{ old('make') }}" placeholder="Mfano: Toyota" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Model *</label>
                    <input type="text" name="model" required value="{{ old('model') }}" placeholder="Mfano: Prado TX-L" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Mwaka (Year) *</label>
                    <input type="number" name="year" required value="{{ old('year', 2018) }}" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Bei (TSh) *</label>
                    <input type="number" name="price" required value="{{ old('price') }}" placeholder="Mfano: 85000000" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Transmission *</label>
                    <select name="transmission" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Mafuta (Fuel Type) *</label>
                    <select name="fuel_type" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                        <option value="Diesel">Diesel</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Mileage</label>
                    <input type="text" name="mileage" value="{{ old('mileage') }}" placeholder="Mfano: 64,000 km" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Rangi (Color)</label>
                    <input type="text" name="color" value="{{ old('color') }}" placeholder="Mfano: Pearl White" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Hali (Status) *</label>
                    <select name="listing_status" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                        <option value="available">Inapatikana (Available)</option>
                        <option value="reserved">Imeshikiliwa (Reserved)</option>
                        <option value="sold">Imeuzwa (Sold)</option>
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Maelezo ya Gari (Description) *</label>
                    <textarea name="description" rows="4" required class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27] resize-none">{{ old('description') }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Sifa / Vifaa (Weka moja kwa kila mstari)</label>
                    <textarea name="features" rows="4" placeholder="Leather Seats&#10;Sunroof&#10;Reverse Camera&#10;Push to Start&#10;4WD / AWD" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27] resize-none">{{ old('features') }}</textarea>
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
                <a href="{{ route('admin.vehicles.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-600 text-xs font-bold text-slate-300 hover:bg-white/5">
                    Ghairi
                </a>
                <button type="submit" class="bg-pfi-gradient text-white px-8 py-3 rounded-xl text-xs font-bold shadow border border-[#C59B27]/40 hover:brightness-110">
                    Hifadhi Gari
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
