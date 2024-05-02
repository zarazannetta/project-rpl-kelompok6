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
        Schema::create('leaderboard', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->integer('userRank')->nullable();

            $table->unsignedBigInteger('user_id');
        
            $table->foreign('user_id')->references('id')->on('userdata')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userRank')->references('userRank')->on('userdata')->onUpdate('cascade')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaderboard');
    }
};
