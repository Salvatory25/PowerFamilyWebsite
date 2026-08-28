<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'category')) {
                $table->string('category')->nullable()->after('title');
            }
            if (!Schema::hasColumn('articles', 'is_published')) {
                $table->boolean('is_published')->default(true)->after('image_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            if (Schema::hasColumn('articles', 'category')) {
                $table->dropColumn('category');
            }
            if (Schema::hasColumn('articles', 'is_published')) {
                $table->dropColumn('is_published');
            }
        });
    }
};
