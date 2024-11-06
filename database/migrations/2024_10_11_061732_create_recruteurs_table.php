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
        Schema::create('recruteurs', function (Blueprint $table) {

        $table->id(); 
        // $table->unsignedBigInteger('user_id'); 
        $table->string('name'); // Nom de l'entreprise
        $table->string('email')->unique(); // Email unique
        $table->tinyInteger('status')->default('1'); // status 
        $table->string('password'); // Mot de passe
        $table->string('phone')->nullable(); // Numéro de téléphone
        $table->string('picture')->default('user.png')->nullable(); // photo de profil
        $table->string('domaineSocial')->nullable();
        $table->timestamps();

        // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruteurs');
    }
};