<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string("CIN",20)->primary();
            $table->string("Nom",30);
            $table->string("Prenom",30);
            $table->date("DateNaissance");
            $table->string("Nationalite",60);
            $table->string("Telephone",20);
            $table->string("Permis",30);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
