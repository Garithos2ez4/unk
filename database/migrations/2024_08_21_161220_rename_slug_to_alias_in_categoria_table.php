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
        Schema::table('CategoriaProducto', function (Blueprint $table) {
            $table->renameColumn('slug', 'slugCategoria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('CategoriaProducto', function (Blueprint $table) {
            $table->renameColumn('slugCategoria', 'slug');
        });
    }
};
