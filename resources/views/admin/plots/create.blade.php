@extends('layouts.admin')

@section('title', 'Add New Plot Listing')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-1">
                <a href="{{ route('admin.plots.index') }}" class="hover:text-white">Plots</a>
                <span>/</span>
                <span class="text-white">Create Listing</span>
            </nav>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Register New Plot</h1>
        </div>

        <a href="{{ route('admin.plots.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition">
            Cancel
        </a>
    </div>

    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-950/80 border border-rose-800 text-rose-300 text-xs space-y-1">
            <p class="font-bold">Please correct the following errors:</p>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.plots.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- 1. Basic Information -->
        <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-5">
            <h2 class="text-base font-bold text-white pb-3 border-b border-slate-700">1. Basic Plot Identification</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Plot Title *
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Prime 1,200 SQM Executive Residential Plot in Njiro Hill" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Plot Reference Number (Optional - Auto generated if blank)
                    </label>
                    <input type="text" name="plot_reference" value="{{ old('plot_reference') }}" placeholder="e.g. REL-ARU-0109" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-emerald-500 font-mono">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Listing Status *
                    </label>
                    <select name="listing_status" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
                        <option value="available" {{ old('listing_status') === 'available' ? 'selected' : '' }}>Available for Sale</option>
                        <option value="reserved" {{ old('listing_status') === 'reserved' ? 'selected' : '' }}>Reserved (Under Offer)</option>
                        <option value="sold" {{ old('listing_status') === 'sold' ? 'selected' : '' }}>Sold</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Plot Type / Zoning *
                    </label>
                    <select name="plot_type_id" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
                        @foreach($plotTypes as $pt)
                            <option value="{{ $pt->id }}" {{ old('plot_type_id') == $pt->id ? 'selected' : '' }}>{{ $pt->name_en }} ({{ $pt->name_sw }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Arusha Location / Neighborhood *
                    </label>
                    <select name="location_id" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
                        @foreach($locations as $loc)
                            <option value="{{ $loc->id }}" {{ old('location_id') == $loc->id ? 'selected' : '' }}>{{ $loc->area_name }} ({{ $loc->district }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Street Address / Landmark Sub-Location
                    </label>
                    <input type="text" name="street_address" value="{{ old('street_address') }}" placeholder="e.g. Near Njiro Shopping Complex, Block C" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        <!-- 2. Pricing & Sizing -->
        <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-5">
            <h2 class="text-base font-bold text-white pb-3 border-b border-slate-700">2. Valuation & Dimensions</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Price (Amount) *
                    </label>
                    <input type="number" step="any" name="price" value="{{ old('price') }}" required placeholder="e.g. 75000000" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-emerald-500 font-bold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Currency *
                    </label>
                    <select name="currency" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500 font-bold">
                        <option value="TZS" {{ old('currency', 'TZS') === 'TZS' ? 'selected' : '' }}>TZS (Tanzanian Shilling)</option>
                        <option value="USD" {{ old('currency') === 'USD' ? 'selected' : '' }}>USD (US Dollar)</option>
                        <option value="EUR" {{ old('currency') === 'EUR' ? 'selected' : '' }}>EUR (Euro)</option>
                        <option value="GBP" {{ old('currency') === 'GBP' ? 'selected' : '' }}>GBP (British Pound)</option>
                        <option value="KES" {{ old('currency') === 'KES' ? 'selected' : '' }}>KES (Kenyan Shilling)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Price Negotiable?
                    </label>
                    <select name="price_negotiable" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
                        <option value="1" {{ old('price_negotiable', '1') == '1' ? 'selected' : '' }}>Yes (Negotiable)</option>
                        <option value="0" {{ old('price_negotiable') === '0' ? 'selected' : '' }}>No (Fixed Price)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Plot Size (Number) *
                    </label>
                    <input type="number" step="any" name="plot_size" value="{{ old('plot_size') }}" required placeholder="e.g. 1200 or 2.5" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-emerald-500 font-bold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Size Unit *
                    </label>
                    <select name="size_unit" required class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
                        <option value="SQM" {{ old('size_unit') === 'SQM' ? 'selected' : '' }}>Square Meters (SQM)</option>
                        <option value="Acres" {{ old('size_unit') === 'Acres' ? 'selected' : '' }}>Acres</option>
                        <option value="Hectares" {{ old('size_unit') === 'Hectares' ? 'selected' : '' }}>Hectares</option>
                        <option value="SQFT" {{ old('size_unit') === 'SQFT' ? 'selected' : '' }}>Square Feet (SQFT)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Dimension Details
                    </label>
                    <input type="text" name="dimension_details" value="{{ old('dimension_details') }}" placeholder="e.g. 30m x 40m" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        <!-- 3. Title & Due Diligence -->
        <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-5">
            <h2 class="text-base font-bold text-white pb-3 border-b border-slate-700">3. Title Deed & Documentation</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Ownership / Title Documentation Type *
                    </label>
                    <input type="text" name="ownership_title_type" value="{{ old('ownership_title_type', 'Clean Title Deed (Hati Miliki - 99 Years)') }}" required placeholder="e.g. Clean Title Deed (Hati Miliki), Customary Right of Occupancy, Surveyed with Beacons" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500 font-semibold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Road Accessibility
                    </label>
                    <input type="text" name="road_accessibility" value="{{ old('road_accessibility', 'Tarmac Road Frontage') }}" placeholder="e.g. Tarmac Main Road Frontage, Murram Access" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Topography & Terrain
                    </label>
                    <input type="text" name="topography" value="{{ old('topography', 'Flat / Level Ground') }}" placeholder="e.g. Flat, Gently Sloping, Elevated Mt Meru View" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Nearby Landmarks & Key Distances
                    </label>
                    <input type="text" name="nearby_landmarks" value="{{ old('nearby_landmarks') }}" placeholder="e.g. 500m from Njiro Complex, 3 mins from Braeburn School" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>

            <!-- Utilities Toggles -->
            <div class="pt-4 border-t border-slate-700">
                <span class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-3">Available Utilities & Infrastructure</span>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <label class="flex items-center gap-2 p-3 rounded-xl bg-slate-900 border border-slate-700 cursor-pointer hover:border-emerald-500 transition">
                        <input type="checkbox" name="has_electricity" value="1" {{ old('has_electricity') ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded bg-slate-800 border-slate-700">
                        <span class="text-xs font-semibold text-slate-200">Electricity</span>
                    </label>

                    <label class="flex items-center gap-2 p-3 rounded-xl bg-slate-900 border border-slate-700 cursor-pointer hover:border-emerald-500 transition">
                        <input type="checkbox" name="has_water" value="1" {{ old('has_water') ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded bg-slate-800 border-slate-700">
                        <span class="text-xs font-semibold text-slate-200">Piped Water</span>
                    </label>

                    <label class="flex items-center gap-2 p-3 rounded-xl bg-slate-900 border border-slate-700 cursor-pointer hover:border-emerald-500 transition">
                        <input type="checkbox" name="has_internet" value="1" {{ old('has_internet') ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded bg-slate-800 border-slate-700">
                        <span class="text-xs font-semibold text-slate-200">Fiber Internet</span>
                    </label>

                    <label class="flex items-center gap-2 p-3 rounded-xl bg-slate-900 border border-slate-700 cursor-pointer hover:border-emerald-500 transition">
                        <input type="checkbox" name="has_fence" value="1" {{ old('has_fence') ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 rounded bg-slate-800 border-slate-700">
                        <span class="text-xs font-semibold text-slate-200">Fenced / Walled</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- 4. Descriptions -->
        <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-5">
            <h2 class="text-base font-bold text-white pb-3 border-b border-slate-700">4. Marketing Copy & Descriptions</h2>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Short Summary Description (Card view)
                </label>
                <textarea name="short_description" rows="2" placeholder="Brief 1-2 sentence teaser about the plot..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-emerald-500">{{ old('short_description') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Full Detailed Description & Zoning Potential *
                </label>
                <textarea name="description" rows="6" required placeholder="Comprehensive plot overview, neighborhood features, legal terms, potential development options..." class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:ring-2 focus:ring-emerald-500">{{ old('description') }}</textarea>
            </div>
        </div>

        <!-- 5. Coordinates & Maps -->
        <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-5">
            <h2 class="text-base font-bold text-white pb-3 border-b border-slate-700">5. GPS & Google Maps Location</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Latitude
                    </label>
                    <input type="text" name="latitude" value="{{ old('latitude') }}" placeholder="e.g. -3.402150" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white font-mono focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Longitude
                    </label>
                    <input type="text" name="longitude" value="{{ old('longitude') }}" placeholder="e.g. 36.705820" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white font-mono focus:ring-2 focus:ring-emerald-500">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Google Maps Embed URL (Optional)
                    </label>
                    <input type="text" name="google_maps_embed_url" value="{{ old('google_maps_embed_url') }}" placeholder="e.g. https://maps.google.com/maps?q=-3.402150,36.705820&z=15&output=embed" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2.5 text-xs text-white font-mono focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>

        <!-- 6. Images Upload -->
        <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-5">
            <h2 class="text-base font-bold text-white pb-3 border-b border-slate-700">6. Plot Photography & Gallery</h2>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Main / Featured Image
                </label>
                <input type="file" name="featured_image" accept="image/*" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2 text-xs text-slate-300 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-600 file:text-white hover:file:bg-emerald-500 cursor-pointer">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                    Additional Gallery Images (Upload multiple)
                </label>
                <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full bg-slate-900 border border-slate-700 rounded-xl px-4 py-2 text-xs text-slate-300 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-700 file:text-white hover:file:bg-slate-600 cursor-pointer">
            </div>
        </div>

        <!-- 7. Visibility Settings -->
        <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 space-y-4">
            <h2 class="text-base font-bold text-white pb-3 border-b border-slate-700">7. Publishing Controls</h2>

            <div class="flex flex-col sm:flex-row gap-6">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', '1') == '1' ? 'checked' : '' }} class="w-5 h-5 text-emerald-600 rounded bg-slate-900 border-slate-700">
                    <div>
                        <span class="text-xs font-bold text-white block">Publish on Website</span>
                        <span class="text-[11px] text-slate-400">Make listing immediately visible to visitors</span>
                    </div>
                </label>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-5 h-5 text-emerald-600 rounded bg-slate-900 border-slate-700">
                    <div>
                        <span class="text-xs font-bold text-white block">Mark as Featured</span>
                        <span class="text-[11px] text-slate-400">Highlight on Homepage top carousel</span>
                    </div>
                </label>
            </div>
        </div>

        <!-- Submit Bar -->
        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="{{ route('admin.plots.index') }}" class="px-5 py-3 rounded-xl bg-[#0c1c34] hover:bg-[#16325c] text-slate-300 text-xs font-bold transition border border-[#16325c]">
                Cancel
            </a>
            <button type="submit" class="px-8 py-3.5 rounded-xl bg-[#c89a3b] hover:bg-[#dfb256] text-[#0c1c34] font-black text-xs uppercase tracking-wider shadow-lg shadow-[#c89a3b]/20 transition">
                Save & Publish Plot
            </button>
        </div>
    </form>
</div>
@endsection
