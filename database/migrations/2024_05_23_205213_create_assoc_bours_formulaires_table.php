<?php

use App\Models\Bourse;
use App\Models\Formulaire;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assoc_bours_formulaires', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Formulaire::class)->constrained("formulaires", "id")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Bourse::class)->constrained("bourses")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assoc_bours_formulaires');
    }
};
