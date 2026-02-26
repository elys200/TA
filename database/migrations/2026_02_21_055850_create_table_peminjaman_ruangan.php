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
        Schema::create('peminjaman_ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penanggung_jawab');
            $table->string('nim');
            $table->string('nama_ormawa');
            $table->date('tanggal_peminjaman');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->text('alasan_peminjaman');
            $table->string('status_peminjaman')->default('pending');
            $table->foreignId('ruangan_id')
              ->constrained('ruangan')
              ->onDelete('cascade');
            $table->foreignId('user_id')
              ->constrained('users')
              ->onDelete('cascade');
            $table->foreignId('ormawa_id')
              ->constrained('ormawa')
              ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_ruangan');
    }
};
