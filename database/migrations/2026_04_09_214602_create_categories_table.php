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
        // Traduction de l'entité Merise CATEGORIE
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Clé primaire (PK)
            $table->string('nom'); // Nom de la catégorie
            $table->text('description')->nullable(); // Description de la catégorie (optionnelle)
            $table->timestamps(); // Crée les champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
