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
        Schema::table('superheroes', function (Blueprint $table) {
            // Eliminar claves foráneas actuales
            $table->dropForeign(['universe_id']);
            $table->dropForeign(['gender_id']);

            // Agregar claves foráneas con onDelete('cascade')
            $table->foreign('universe_id')->references('id')->on('universes')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('superheroes', function (Blueprint $table) {
            // Restaurar claves foráneas sin cascade
            $table->dropForeign(['universe_id']);
            $table->dropForeign(['gender_id']);

            $table->foreign('universe_id')->references('id')->on('universes');
            $table->foreign('gender_id')->references('id')->on('genders');
        });
    }
};

