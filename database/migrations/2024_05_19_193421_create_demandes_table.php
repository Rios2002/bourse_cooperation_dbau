<?php

use App\Models\User;
use App\Models\Bourse;
use App\Models\Cycle;
use App\Models\DiplomeDeBase;
use App\Models\Filiere;
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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bourse::class, 'bourse_id')->constrained("bourses")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(User::class, 'user_id')->constrained("users")->cascadeOnUpdate()->restrictOnDelete();
            $table->string('Code')->unique()->nullable();

            //STEP 1
            $table->string('NPI', 50)->nullable();
            $table->string('Nom', 255)->nullable();
            $table->string('Prenom', 255)->nullable();
            $table->date('DateNaissance')->nullable();
            $table->string('LieuNaissance', 255)->nullable();
            $table->string('Sexe', 10)->nullable();
            $table->foreignIdFor(DiplomeDeBase::class, 'CodeDiplome')->nullable()->constrained("diplome_de_bases", "CodeDiplome")->cascadeOnUpdate()->restrictOnDelete();

            //STEP 2
            $table->string('SerieOuFiliereBase', 255)->nullable();
            $table->integer('AnneeObtention')->nullable();
            $table->decimal('Moyenne')->nullable();
            $table->string('Mention', 255)->nullable();
            $table->foreignIdFor(Cycle::class, 'CycleSollicite')->nullable()->constrained("cycles", "CodeCycle")->cascadeOnUpdate()->restrictOnDelete();

            //STEP 3
            $table->boolean('FiliereManuel')->default(false);
            $table->foreignIdFor(Filiere::class, 'filiere_id')->nullable()->constrained("filieres")->cascadeOnUpdate()->restrictOnDelete();
            $table->string('LibelleFiliere', 255)->nullable();
            $table->string('StatutAllocataire', 50)->nullable();
            $table->string('Contact', 50)->nullable();
            $table->string('ContactParent', 50)->nullable();


            $table->boolean('DepotPhysique')->default(false);
            $table->boolean('Imprime')->default(false);
            $table->string('StatutTraitement', 255)->default("EN ATTENTE DE TRAITEMENT");
            $table->string('Observation', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
