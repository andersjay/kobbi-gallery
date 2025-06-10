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
        if (!Schema::hasColumn('noticies', 'date')) {
            Schema::table('noticies', function (Blueprint $table) {
                $table->date('date')->nullable()->after('url');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('noticies', 'date')) {
            Schema::table('noticies', function (Blueprint $table) {
                $table->dropColumn('date');
            });
        }
    }
};
