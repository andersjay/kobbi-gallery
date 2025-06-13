<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('artworks', function (Blueprint $table) {
            // Se você quiser nomear de 'sort':
            $table->integer('order')->default(0)->after('featured');

            // Se preferir usar 'order' (já alinhado ao Repeater):
            // $table->integer('order')->default(0)->after('featured');
        });
    }

    public function down(): void
    {
        Schema::table('artworks', function (Blueprint $table) {
            $table->dropColumn('order');
            // ou: $table->dropColumn('order');
        });
    }
};
