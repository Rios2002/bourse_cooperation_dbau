<?php

use App\Models\Cycle;
use App\Models\Bourse;
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
        Schema::create('assoc_bourse_filieres', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bourse::class, 'bourse_id')->constrained("bourses")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Filiere::class, 'filiere_id')->constrained("filieres",)->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(Cycle::class, 'CodeCycle')->constrained("cycles", "CodeCycle")->cascadeOnUpdate()->restrictOnDelete();
            $table->integer('quota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assoc_bourse_filieres');
    }
};
