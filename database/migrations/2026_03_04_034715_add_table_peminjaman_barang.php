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
        Schema::create('peminjaman_barang', function(Blueprint $table){
            $table->id();
            $table->string('nama_penanggung_jawab');
            $table->string('nim');
            $table->string('code_peminjaman')->unique();
            $table->date('tanggal_mulai_peminjaman');
            $table->date('tanggal_selesai_peminjaman');
            $table->text('alasan_peminjaman');
            $table->tinyInteger('status_peminjaman')->default(0);

            $table->foreignId('ormawa_id')
                  ->constrained('ormawa')
                  ->onDelete('cascade');
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->foreignId('barang_id')
                  ->constrained('barang')
                  ->onDelete('cascade');

            $table->foreignId('approved_by')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamp('approve_at')->nullable();
            
            $table->foreignId('rejected_by')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamp('rejected_at')->nullable();
            $table->string('reason_rejected')->nullable();

            $table->foreignId('given_by')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
           $table->timestamp('waktu_pemberian')->nullable();
           $table->string('foto_pemberian')->nullable();

           $table->foreignId('returned_by')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
           $table->timestamp('waktu_pengembalian')->nullable();
           $table->string('foto_pengembalian')->nullable();

           $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_barang');
    }
};
