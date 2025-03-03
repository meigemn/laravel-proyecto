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
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_followed')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_following')->constrained('users')->onDelete('cascade');
            
            $table->timestamps();
            // Índice único para evitar duplicados
            $table->unique(['user_following', 'user_followed']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
