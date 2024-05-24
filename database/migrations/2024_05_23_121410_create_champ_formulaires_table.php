<?php

use App\Models\TypeChamp;
use App\Models\TypeSorty;
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
        Schema::create('champ_formulaires', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Formulaire::class, 'formulaire_id')->constrained("formulaires", "id")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(TypeChamp::class, 'CodeTypeChamp')->constrained("type_champs", "CodeTypeChamp")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("LibelleChamp", 255);
            $table->string("DescriptionChamp", 255)->nullable();
            $table->string('classCSS')->nullable();
            // $table->foreignIdFor(TypeSorty::class, 'TypeValeur')->constrained("type_sorties", "CodeTypeSortie")->cascadeOnUpdate()->cascadeOnDelete();

            $table->boolean('isRequired')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('champ_formulaires');
    }
};
