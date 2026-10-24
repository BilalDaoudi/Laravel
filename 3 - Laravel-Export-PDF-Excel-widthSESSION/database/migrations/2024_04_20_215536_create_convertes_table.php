<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('convertes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string("client_username");
            $table->string("convertedSymbol");
            $table->foreign('client_username')->references('username')->on('clients');
            $table->foreign('convertedSymbol')->references("symbol")->on('devises');
            $table->float('amount');
            $table->text('devise')->references('symbol')->on('devises');
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convertes');
    }
};
