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
        Schema::create('commande_produits', function (Blueprint $table) {
            $table->integer("id");
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('produit_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->primary(["id","utilisateur_id","produit_id"])      ;      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_produit');
    }
};
