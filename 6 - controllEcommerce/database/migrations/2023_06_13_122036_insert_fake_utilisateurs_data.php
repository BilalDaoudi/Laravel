<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('utilisateurs')->insert([
            [
                'name' => 'youssef youyou',
                'email' => 'youssef@gmail.com',
                'password' => 'password123',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ahmed',
                'email' => 'ahmed@gmail.com',
                'password' => 'password456',
                'role' => 'client',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('utilisateurs')->truncate();
    }
};
