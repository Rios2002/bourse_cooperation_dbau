<?php

use App\Models\ChampFormulaire;
use App\Models\Demande;
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
        Schema::create('assoc_champ_demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Demande::class)->constrained("demandes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(ChampFormulaire::class)->constrained("champ_formulaires", "id")->cascadeOnUpdate()->cascadeOnDelete();
            $table->text("Saisi")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assoc_champ_demandes');
    }
};
