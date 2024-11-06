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
        Schema::create('offres', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('recruteur_id')->nullable(); // Référence au recruteur (clé étrangère)
        $table->string('title'); // Titre de l'offre
        $table->text('experience'); // expérience pour le poste
        $table->string('domaine'); // Domaine de travail
        $table->integer('NbreRecruit'); // Nombre de postes à pourvoir
        $table->string('contrat'); // Type de contrat
        $table->decimal('salaire', 10, 2); // Salaire proposé
        $table->string('criteres')->nullable(); // Critères de sélection
        $table->string('ville'); // Lieu du travail
        $table->string('dateLimite'); //date d'expiration de l'offre
        $table->timestamps();

          //la clé étranger pour le recruteur
        $table->foreign('recruteur_id')->references('id')->on('recruteurs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};