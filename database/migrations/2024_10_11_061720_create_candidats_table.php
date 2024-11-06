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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom complet du candidat
            $table->string('email')->unique(); // Email unique du candidat
            $table->tinyInteger('status')->default(0)->nullable(); // status 
            $table->string('password'); // Mot de passe
            $table->string('phone')->nullable(); // Numéro de téléphone
            $table->integer('age')->nullable(); // Âge du candidat
            $table->string('picture')->default('user.png')->nullable(); // photo de profil
            $table->string('formationImportante')->nullable(); // Formation principale
            $table->string('experienceImportante')->nullable(); // Expérience la plus importante
            $table->string('dernierPosteOccupé')->nullable(); // Dernier poste occupé
            $table->text('competences')->nullable(); // Liste de compétences
            $table->string('adresse')->nullable(); // Adresse
            $table->string('cv')->nullable(); // Lien vers le CV
            $table->string('LM')->nullable(); //lien vers la LM
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};