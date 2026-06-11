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

    // user - skill
        Schema::create('user_skills', function (Blueprint $table) {
            $table->foreignId('user_input_id')->constrained('user_input')->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained()->cascadeOnDelete();
            $table->primary(['user_input_id', 'skill_id']);
        });

    // user - teknologi
        Schema::create('user_technologies', function (Blueprint $table) {
            $table->foreignId('user_input_id')->constrained('user_input')->cascadeOnDelete();
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            $table->primary(['user_input_id', 'technology_id']);
        });

    // user - minatbidang
        Schema::create('user_minat', function (Blueprint $table) {
            $table->foreignId('user_input_id')->constrained('user_input')->cascadeOnDelete();
            $table->foreignId('minat_bidang_id')->constrained('minat_bidang')->cascadeOnDelete();
            $table->primary(['user_input_id', 'minat_bidang_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_minat');
        Schema::dropIfExists('user_technologies');
        Schema::dropIfExists('user_skills');
    }
};
