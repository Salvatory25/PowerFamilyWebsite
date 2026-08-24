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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('location_name'); // e.g. Kisongo, Sakina, Njiro, USA River, Monduli
            $table->string('project_type'); // e.g. Cadastral Survey, Formalization Scheme, Master Subdivision, Topographical Survey
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->json('services_performed')->nullable(); // Array of tags e.g. ['Land Surveying', 'Plot Subdivision', 'Beacons Pegging']
            $table->enum('project_status', ['completed', 'in_progress', 'planning'])->default('completed');
            $table->string('client_type')->nullable(); // Private Landowner, Corporate Developer, Community / Municipal, Estate Association
            $table->string('size_covered')->nullable(); // e.g. "120 Hectares", "45 Plots", "500 Acres"
            $table->date('completion_date')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
