<?php

use App\Models\TypeFormulaire;
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
        Schema::create('formulaires', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TypeFormulaire::class, 'CodeTypeFormulaire')->constrained("type_formulaires", "CodeTypeFormulaire")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("Titre", 255);
            $table->string("Description", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaires');
    }
};
