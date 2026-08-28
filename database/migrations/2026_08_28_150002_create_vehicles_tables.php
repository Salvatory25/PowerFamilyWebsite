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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('slug')->unique();
            $table->string('vehicle_reference')->nullable()->unique();
            $table->string('make'); // Toyota, Nissan, etc.
            $table->string('model'); // Prado, Harrier, etc.
            $table->integer('year');
            $table->decimal('price', 15, 2);
            $table->string('currency', 50)->default('TZS');
            $table->string('transmission')->default('Automatic'); // Automatic, Manual
            $table->string('fuel_type')->default('Petrol'); // Petrol, Diesel, Hybrid
            $table->string('mileage')->nullable(); // e.g. 64,000 km
            $table->string('color')->nullable();
            $table->string('body_type')->nullable(); // SUV, Sedan, Pickup
            $table->enum('listing_status', ['available', 'reserved', 'sold'])->default('available');
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->json('features')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('vehicle_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
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
        Schema::dropIfExists('vehicle_images');
        Schema::dropIfExists('vehicles');
    }
};
