<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recommendation_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_input_id')->constrained('user_input')->cascadeOnDelete();
            $table->foreignId('perusahaan_id')->constrained()->cascadeOnDelete();

            // Skor per dimensi (untuk transparansi hasil rekomendasi)
            $table->decimal('score_skill', 5, 4)->default(0)->comment('Cosine similarity skill (bobot 40%)');
            $table->decimal('score_technology', 5, 4)->default(0)->comment('Cosine similarity teknologi (bobot 30%)');
            $table->decimal('score_minat', 5, 4)->default(0)->comment('Cosine similarity minat bidang (bobot 20%)');
            $table->decimal('score_ipk', 5, 4)->default(0)->comment('IPK score normalized (bobot 10%)');
            $table->decimal('final_score', 5, 4)->default(0)->comment('Weighted final score: 0.4*skill + 0.3*tech + 0.2*interest + 0.1*ipk');

            $table->unsignedSmallInteger('rank')->comment('Urutan rekomendasi dari yang paling cocok');
            $table->timestamps();

            $table->index(['user_input_id', 'rank']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recommendation_results');
    }
};