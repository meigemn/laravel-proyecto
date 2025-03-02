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
            $table->unsignedBigInteger('user_following');
            $table->unsignedBigInteger('user_followed');
            $table->foreign('user_following')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_followed')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['user_following', 'user_followed']);
            $table->timestamps();
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
