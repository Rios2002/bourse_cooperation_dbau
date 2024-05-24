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
        // integer , string , double , date
        Schema::create('type_sorties', function (Blueprint $table) {
            $table->string("CodeTypeSortie", 50)->primary();
            $table->string("LibelleTypeSortie", 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_sorties');
    }
};
