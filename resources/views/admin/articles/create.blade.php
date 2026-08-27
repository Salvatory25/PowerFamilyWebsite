@extends('layouts.admin')

@section('title', 'Andika Makala Mpya')
@section('header_title', 'Andika Makala Mpya (Create Article)')

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    /* Clean, high-contrast visual editor styles */
    .ql-toolbar.ql-snow {
        background-color: #0f1f38;
        border-color: #1e3a63 !important;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }
    .ql-snow .ql-stroke {
        stroke: #94a3b8 !important;
    }
    .ql-snow .ql-fill {
        fill: #94a3b8 !important;
    }
    .ql-snow .ql-picker {
        color: #94a3b8 !important;
    }
    .ql-container.ql-snow {
        background-color: #ffffff;
        color: #0f172a;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 15px;
        line-height: 1.7;
        border-color: #1e3a63 !important;
        border-bottom-left-radius: 1rem;
        border-bottom-right-radius: 1rem;
        min-height: 320px;
    }
    .ql-editor {
        min-height: 320px;
    }
    .ql-editor p {
        margin-bottom: 1em;
    }
    .ql-editor h2 {
        font-size: 1.5em;
        font-weight: 800;
        color: #16325c;
        margin-top: 1.2em;
        margin-bottom: 0.5em;
    }
    .ql-editor h3 {
        font-size: 1.25em;
        font-weight: 700;
        color: #16325c;
        margin-top: 1em;
        margin-bottom: 0.5em;
    }
</style>
@endpush

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-white">Andika Makala Mpya</h2>
            <p class="text-xs text-slate-400">Jaza fomu hapa chini kuchapisha makala mpya kwa wateja wako.</p>
        </div>

        <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 bg-slate-800 text-slate-300 hover:text-white rounded-xl text-xs font-bold transition">
            &larr; Rudi Nyuma
        </a>
    </div>

    @if ($errors->any())
        <div class="p-4 rounded-2xl bg-rose-950/80 border border-rose-800 text-rose-300 text-xs">
            <p class="font-bold mb-2">Tafadhali rekebisha yafuatayo:</p>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="article-form" action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-[#0c1c34] p-6 sm:p-8 rounded-3xl border border-[#16325c] space-y-6 shadow-xl">
            
            <!-- 1. Title -->
            <div>
                <label for="title" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Kichwa cha Habari (Title) <span class="text-rose-400">*</span>
                </label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="k.m. Mwongozo Kamili wa Kupima Ardhi na Kupata Hati Miliki" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:ring-2 focus:ring-[#c89a3b] focus:border-transparent">
            </div>

            <!-- 2. Short Summary / Excerpt -->
            <div>
                <label for="excerpt" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Muhtasari Mfupi wa Makala (Short Summary) <span class="text-rose-400">*</span>
                </label>
                <textarea id="excerpt" name="excerpt" rows="3" required placeholder="Andika maelezo mafupi ya sentensi 2 au 3 kuelezea makala hii inahusu nini..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-[#c89a3b]">{{ old('excerpt') }}</textarea>
                <p class="text-[11px] text-slate-400 mt-1">Haya maelezo yataonekana kwenye ukurasa wa makala zote kabla mtu hajafungua kusoma yote.</p>
            </div>

            <!-- 3. Featured Image Upload -->
            <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-[#dfb256] uppercase tracking-wider mb-1">
                        Picha ya Makala (Featured Image)
                    </label>
                    <p class="text-[11px] text-slate-400 mb-3">Chagua picha kutoka kwenye simu au kompyuta yako:</p>
                    
                    <input type="file" id="image" name="image" accept="image/*" class="w-full text-xs text-slate-300 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#16325c] file:text-[#dfb256] hover:file:bg-[#1f437a] cursor-pointer">
                </div>

                <div class="pt-2 border-t border-slate-800">
                    <label for="image_url" class="block text-[11px] font-medium text-slate-400 mb-1">
                        Au weka kiungo cha picha (kama unayo link):
                    </label>
                    <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}" placeholder="https://..." class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3.5 py-2 text-xs text-slate-300 placeholder-slate-600 focus:ring-2 focus:ring-[#c89a3b]">
                </div>
            </div>

            <!-- 4. Visual WYSIWYG Content Editor -->
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Maudhui Kamili ya Makala (Story Content) <span class="text-rose-400">*</span>
                </label>
                <p class="text-[11px] text-slate-400 mb-2">Andika hadithi au maelezo yako kama unavyoandika kwenye Microsoft Word au WhatsApp. Tumia vitufe vya juu kuweka <strong>Bold</strong>, <em>Italic</em>, au <strong>Vichwa vya Habari (Headings)</strong>:</p>

                <!-- Hidden Input for Form Submission -->
                <input type="hidden" name="content" id="content-input" value="{{ old('content') }}">

                <!-- Visual Editor Container -->
                <div id="quill-editor" class="shadow-md">{!! old('content') !!}</div>
            </div>

            <!-- 5. Published Date -->
            <div class="max-w-xs">
                <label for="published_at" class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    Tarehe ya Kuchapisha (Date)
                </label>
                <input type="date" id="published_at" name="published_at" value="{{ old('published_at', date('Y-m-d')) }}" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-[#c89a3b]">
            </div>

        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('admin.articles.index') }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold transition">
                Ghairi
            </a>
            <button type="submit" class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-[#c89a3b] to-[#dfb256] text-[#0c1c34] font-black text-sm shadow-xl hover:opacity-90 transition">
                Chapisha Makala (Publish Article) &rarr;
            </button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Anza kuandika makala yako hapa kwa urahisi...',
            modules: {
                toolbar: [
                    [{ 'header': [2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'link'],
                    ['clean']
                ]
            }
        });

        // Synchronize on form submit
        const form = document.getElementById('article-form');
        const contentInput = document.getElementById('content-input');

        form.addEventListener('submit', function (e) {
            // Put HTML content into hidden input
            contentInput.value = quill.root.innerHTML;
            if (quill.getText().trim().length === 0) {
                e.preventDefault();
                alert('Tafadhali andika maudhui ya makala kabla ya kuchapisha.');
            }
        });
    });
</script>
@endpush
