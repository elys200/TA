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
       Schema::create('pemberian_kunci', function (Blueprint $table) {
    $table->id();

    $table->foreignId('peminjaman_ruangan_id')
           ->nullable()
           ->constrained('peminjaman_ruangan')
           ->nullOnDelete();

    $table->foreignId('diserahkan_oleh')
          ->nullable()
          ->constrained('users')
          ->nullOnDelete();

    $table->foreignId('dikembalikan_oleh')
          ->nullable()
          ->constrained('users')
          ->nullOnDelete();

    $table->timestamp('waktu_diambil')->nullable();
    $table->timestamp('waktu_dikembalikan')->nullable();

    $table->timestamps();

    // 🔥 WAJIB supaya tidak bisa double serah
    $table->unique('peminjaman_ruangan_id');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemberian_kunci');
    }
};
