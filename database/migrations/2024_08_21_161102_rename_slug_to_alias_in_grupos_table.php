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
        Schema::table('GrupoProducto', function (Blueprint $table) {
            $table->renameColumn('slug', 'slugGrupo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('GrupoProducto', function (Blueprint $table) {
            $table->renameColumn('slugGrupo', 'slug');
        });
    }
};
