<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('noticies', function (Blueprint $table) {
            if (! Schema::hasColumn('noticies', 'is_pinned')) {
                $table->boolean('is_pinned')->default(false)->after('is_active');
            }

            if (! Schema::hasColumn('noticies', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0)->after('is_pinned');
            }
        });
    }

    public function down(): void
    {
        Schema::table('noticies', function (Blueprint $table) {
            if (Schema::hasColumn('noticies', 'sort_order')) {
                $table->dropColumn('sort_order');
            }

            if (Schema::hasColumn('noticies', 'is_pinned')) {
                $table->dropColumn('is_pinned');
            }
        });
    }
};
