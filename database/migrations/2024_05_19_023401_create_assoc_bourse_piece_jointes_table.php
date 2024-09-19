<?php

use App\Models\Bourse;
use App\Models\DiplomeDeBase;
use App\Models\PieceJointe;
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
        Schema::create('assoc_bourse_piece_jointes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bourse::class, 'bourse_id')->constrained("bourses")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(PieceJointe::class, 'piece_jointe_id')->constrained("piece_jointes")->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(DiplomeDeBase::class, 'CodeDiplome')->constrained("diplome_de_bases", "CodeDiplome")->cascadeOnUpdate()->restrictOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assoc_bourse_piece_jointes');
    }
};
