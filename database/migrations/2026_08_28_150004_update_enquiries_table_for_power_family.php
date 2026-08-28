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
        Schema::table('enquiries', function (Blueprint $table) {
            if (!Schema::hasColumn('enquiries', 'category')) {
                $table->string('category')->default('kiwanja')->after('email'); // kiwanja, nyumba, gari, ushauri, other
            }
            if (!Schema::hasColumn('enquiries', 'house_id')) {
                $table->foreignId('house_id')->nullable()->after('plot_id')->constrained('houses')->nullOnDelete();
            }
            if (!Schema::hasColumn('enquiries', 'vehicle_id')) {
                $table->foreignId('vehicle_id')->nullable()->after('house_id')->constrained('vehicles')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiries', function (Blueprint $table) {
            if (Schema::hasColumn('enquiries', 'vehicle_id')) {
                $table->dropForeign(['vehicle_id']);
                $table->dropColumn('vehicle_id');
            }
            if (Schema::hasColumn('enquiries', 'house_id')) {
                $table->dropForeign(['house_id']);
                $table->dropColumn('house_id');
            }
            if (Schema::hasColumn('enquiries', 'category')) {
                $table->dropColumn('category');
            }
        });
    }
};
