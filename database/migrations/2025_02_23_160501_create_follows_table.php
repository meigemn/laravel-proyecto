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
            
            // Definir clave primaria compuesta
            $table->primary(['user_following', 'user_followed']);
            
            
            $table->unsignedBigInteger('user_following');
            // Clave foránea
            $table->foreign('user_following')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            // Clave foránea
            $table->unsignedBigInteger('user_followed');
            
            $table->foreign('user_followed')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps(); // Opcional (puedes dejar solo created_at si prefieres)
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
