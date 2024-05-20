<?php

use App\Models\Bourse;
use App\Models\Demande;
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
        Schema::create('assoc_demande_piece_jointes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Demande::class, 'demande_id')->constrained("demandes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(PieceJointe::class, 'piece_jointe_id')->constrained("piece_jointes")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('url');
            $table->timestamps();
            $table->unique(['demande_id', 'piece_jointe_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assoc_demande_piece_jointes');
    }
};
