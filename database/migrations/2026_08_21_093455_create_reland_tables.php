<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Plot Types
        Schema::create('plot_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_sw');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 2. Locations (Arusha Focus)
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('region')->default('Arusha');
            $table->string('district')->default('Arusha City');
            $table->string('ward')->nullable();
            $table->string('area_name'); // e.g. Njiro, Kisongo, Sakina, USA River, Moshono, Karatu
            $table->string('slug')->unique();
            $table->string('featured_image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 3. Plots
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('plot_reference')->unique(); // e.g. REL-ARU-0101
            $table->foreignId('plot_type_id')->constrained('plot_types')->onDelete('restrict');
            $table->foreignId('location_id')->constrained('locations')->onDelete('restrict');
            $table->string('street_address')->nullable();
            $table->enum('listing_status', ['available', 'reserved', 'sold'])->default('available');
            $table->decimal('price', 15, 2);
            $table->string('currency', 50)->default('TZS');
            $table->boolean('price_negotiable')->default(true);
            $table->decimal('plot_size', 10, 2);
            $table->enum('size_unit', ['SQM', 'Acres', 'Hectares', 'SQFT'])->default('SQM');
            $table->string('dimension_details')->nullable(); // e.g. 25m x 40m
            $table->string('ownership_title_type'); // Clean Title Deed (Hati Miliki), Customary Right of Occupancy, Surveyed Beacons, etc.
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->text('nearby_landmarks')->nullable();
            $table->string('road_accessibility')->nullable(); // Tarmac frontage, Paved, Murram
            $table->boolean('has_electricity')->default(false);
            $table->boolean('has_water')->default(false);
            $table->boolean('has_internet')->default(false);
            $table->boolean('has_fence')->default(false);
            $table->string('topography')->nullable(); // Flat, Gentle Slope, Hillside
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->text('google_maps_embed_url')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        // 4. Plot Images Gallery
        Schema::create('plot_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_id')->constrained('plots')->onDelete('cascade');
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });

        // 5. Enquiries / Leads
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_id')->nullable()->constrained('plots')->nullOnDelete();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('preferred_contact_method')->default('whatsapp'); // whatsapp, phone, email
            $table->text('message');
            $table->enum('status', ['new', 'contacted', 'site_visit_scheduled', 'closed'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        // 6. Settings
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('enquiries');
        Schema::dropIfExists('plot_images');
        Schema::dropIfExists('plots');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('plot_types');
    }
};
