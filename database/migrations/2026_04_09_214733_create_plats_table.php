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
        // Traduction de l'entité Merise PLAT
        Schema::create('plats', function (Blueprint $table) {
            $table->id(); // Clé primaire (PK)
            $table->string('nom');
            $table->text('description')->nullable();
            $table->decimal('prix', 8, 2); // 8 chiffres au total, 2 après la virgule (ex: 999999.99)
            $table->boolean('est_disponible')->default(true); // Vrai par défaut

            // La relation (1,n) - (1,1) : Clé étrangère (FK)
            // constrained() indique que l'ID doit exister dans la table 'categories'
            // onDelete('cascade') supprime les plats si la catégorie est supprimée
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plats');
    }
};
