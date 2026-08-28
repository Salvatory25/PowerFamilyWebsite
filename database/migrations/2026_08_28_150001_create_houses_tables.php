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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('slug')->unique();
            $table->string('house_reference')->nullable()->unique();
            $table->foreignId('location_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->decimal('price', 15, 2);
            $table->string('currency', 50)->default('TZS');
            $table->integer('bedrooms')->default(3);
            $table->integer('bathrooms')->default(2);
            $table->string('plot_size')->nullable(); // e.g. 30m x 30m
            $table->string('house_size')->nullable(); // e.g. 240 SQM
            $table->enum('listing_status', ['available', 'reserved', 'sold'])->default('available');
            $table->string('ownership_title_type')->nullable(); // Clean Title Deed, etc.
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->json('features')->nullable(); // array of features
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('house_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('house_id')->constrained('houses')->onDelete('cascade');
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_images');
        Schema::dropIfExists('houses');
    }
};
