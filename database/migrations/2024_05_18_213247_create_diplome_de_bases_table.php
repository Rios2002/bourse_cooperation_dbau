<?php

use App\Models\Cycle;
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
        Schema::create('diplome_de_bases', function (Blueprint $table) {
            $table->string('CodeDiplome', 50)->primary();
            $table->string('LibelleDiplome', 255);
            $table->string('CycleCible', 50)->nullable()->constrained('cycles', 'CodeCycle')->nullOnDelete()->cascadeOnUpdate();
            $table->boolean('isWritable')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplome_de_bases');
    }
};
