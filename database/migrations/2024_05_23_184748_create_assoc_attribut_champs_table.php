<?php

use App\Models\AttributTypeChamp;
use App\Models\ChampFormulaire;
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
        Schema::create('assoc_attribut_champs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ChampFormulaire::class)->constrained("champ_formulaires", "id")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(AttributTypeChamp::class)->constrained("attribut_type_champs", "id")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("Valeur", 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assoc_attribut_champs');
    }
};
