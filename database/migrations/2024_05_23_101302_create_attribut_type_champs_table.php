<?php

use App\Models\TypeChamp;
use App\Models\TypeSorty;
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
        Schema::create('attribut_type_champs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TypeChamp::class, 'CodeTypeChamp')->constrained("type_champs", "CodeTypeChamp")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("SpatieFunction", 255);
            $table->string("LaravelValidationKey", 255)->nullable();
            $table->string("Description", 255);
            $table->foreignIdFor(TypeSorty::class, 'TypeValeur')->constrained("type_sorties", "CodeTypeSortie")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribut_type_champs');
    }
};
