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
        Schema::table('footer_settings', function (Blueprint $table) {
            $table->string('section1_title')->nullable();
            $table->text('section1_description')->nullable();
            $table->string('section2_title')->nullable();
            $table->text('section2_description')->nullable();
            $table->string('section3_title')->nullable();
            $table->text('section3_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('footer_settings', function (Blueprint $table) {
            $table->dropColumn('section1_title');
            $table->dropColumn('section1_description');
            $table->dropColumn('section2_title');
            $table->dropColumn('section2_description');
            $table->dropColumn('section3_title');
            $table->dropColumn('section3_description');
        });
    }
};
