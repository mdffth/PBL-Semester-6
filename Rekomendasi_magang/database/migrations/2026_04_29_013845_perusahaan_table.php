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
        Schema::create('perusahaan', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->text('profile_perusahaan')->nullable();
            $table->string('tipe_industri')->nullable();
            $table->string('posisi_magang');
            $table->decimal('min_ipk', 3, 2)->default(0.00);
            $table->text('job_description')->nullable();
            $table->string('duration_months')->nullable();
            $table->enum('status_magang', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
