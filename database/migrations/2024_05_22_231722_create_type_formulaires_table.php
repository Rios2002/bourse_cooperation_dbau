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
        //standart , non standart
        Schema::create('type_formulaires', function (Blueprint $table) {
            $table->string("CodeTypeFormulaire", 50)->primary();
            $table->string("LibelleTypeFormulaire", 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_formulaires');
    }
};
