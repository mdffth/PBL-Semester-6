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
        // perusahaan - Skills
        Schema::create('perusahaan_skills', function (Blueprint $table){
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained()->cascadeOnDelete();
            $table->primary(['perusahaan_id', 'skill_id']);
        });


                // perusahaan - Teknologi
        Schema::create('perusahaan_technologies', function (Blueprint $table){
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->cascadeOnDelete();
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            $table->primary(['perusahaan_id', 'technology_id']);
        });


                // perusahaan - Minat Bidang
        Schema::create('perusahaan_minat', function (Blueprint $table){
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->cascadeOnDelete();
            $table->foreignId('minat_bidang_id')->constrained('minat_bidang')->cascadeOnDelete();
            $table->primary(['perusahaan_id', 'minat_bidang_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_minat');
        Schema::dropIfExists('perusahaan_technologies');
        Schema::dropIfExists('perusahaan_skills');
    }
};
