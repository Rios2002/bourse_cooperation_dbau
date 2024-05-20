<?php

use App\Models\Pay;
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
        Schema::create('bourses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pay::class, 'CodePays')->constrained("pays", 'CodePays')->cascadeOnUpdate()->restrictOnDelete();
            $table->string("CodeAnneeAcademique", 50)->constrained("annee_academiques", "CodeAnneeAcademique")->restrictOnDelete()->cascadeOnUpdate();
            $table->string('LibelleBourse', 255);
            $table->string('Description', 255);
            $table->string('Communique', 255)->nullable();
            $table->boolean('isDisponible')->default(true);
            $table->dateTime('DateOuverture');
            $table->dateTime('DateFermeture');
            $table->integer('Quota');
            $table->boolean('isPublished')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bourses');
    }
};
