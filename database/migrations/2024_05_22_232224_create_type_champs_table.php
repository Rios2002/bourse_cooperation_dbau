<?php

use App\Models\TypeSortie;
use App\Models\TypeSorty;
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

        Schema::create('type_champs', function (Blueprint $table) {
            $table->string("CodeTypeChamp", 50)->primary();
            $table->string("LibelleTypeChamp", 255);
            $table->string("SpatieFunction", 255);
            $table->string("ClassCSS", 255);
            $table->string("SpatieAttributes", 500)->nullable();
            // $table->boolean("isEven")->default(true);
            // $table->boolean("isRequired")->default(true);
            // $table->string("RawHTML", 255)->nullable();

            $table->foreignIdFor(TypeSorty::class, 'CodeTypeSortie')->constrained("type_sorties", "CodeTypeSortie")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_champs');
    }
};
