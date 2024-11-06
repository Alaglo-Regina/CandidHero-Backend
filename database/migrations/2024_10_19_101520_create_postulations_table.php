<?php

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
        Schema::create('postulations', function (Blueprint $table) {
            $table->id(); // Identifiant unique de la postulation
            $table->unsignedBigInteger('candidat_id'); // Référence au candidat (clé étrangère)
            $table->unsignedBigInteger('offre_id'); // Référence à l'offre (clé étrangère)
            $table->date('date_postulation'); // Date de la postulation
            $table->string('statut')->default('en attente'); // Statut de la postulation (en attente, accepté, refusé, etc.)
            $table->string('message'); // Référence au message de motivation
            $table->string('cv'); // Référence au cv du candidat
            $table->string('LM'); // Référence à la LM du candidat
            $table->timestamps(); // Champs created_at et updated_at

            // Clé étrangère pour le candidat et l'offre
            $table->foreign('candidat_id')->references('id')->on('candidats')->onDelete('cascade');
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulations');
    }
};