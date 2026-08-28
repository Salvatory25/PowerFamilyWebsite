@extends('layouts.admin')

@section('title', 'Ongeza Picha Kwenye Matunzio')
@section('page_title', 'Ongeza Picha Mpya (Add to Gallery)')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="bg-[#220325] rounded-2xl border border-[#4A0E4E] p-8 shadow-sm">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Kichwa cha Picha (Title) *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" placeholder="Mfano: Ukaguzi wa Viwanja Eneo la Kwanza" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Kundi (Category) *</label>
                    <select name="category" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27]">
                        <option value="viwanja">Viwanja</option>
                        <option value="nyumba">Nyumba</option>
                        <option value="magari">Magari</option>
                        <option value="matukio">Matukio & Ziara</option>
                        <option value="wateja">Wateja Wetu</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Faili la Picha (Image) *</label>
                    <input type="file" name="image" required accept="image/*" class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-2.5 text-xs text-slate-300">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase mb-2">Maelezo Mafupi (Description)</label>
                    <textarea name="description" rows="3" placeholder="Maelezo ya ziada kuhusu picha hii..." class="w-full bg-[#18031A] border border-[#4A0E4E] rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-[#C59B27] resize-none">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="flex items-center space-x-2 text-xs text-slate-300">
                        <input type="checkbox" name="is_active" value="1" checked class="rounded bg-[#18031A] border-[#4A0E4E] text-[#4A0E4E]">
                        <span>Iweke hai kwenye tovuti (Active)</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-[#4A0E4E] flex items-center justify-end space-x-4">
                <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-600 text-xs font-bold text-slate-300 hover:bg-white/5">
                    Ghairi
                </a>
                <button type="submit" class="bg-pfi-gradient text-white px-8 py-3 rounded-xl text-xs font-bold shadow border border-[#C59B27]/40 hover:brightness-110">
                    Pakia Picha
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
