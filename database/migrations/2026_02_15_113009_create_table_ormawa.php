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
        Schema::create('ormawa', function (Blueprint $table) {
            $table->id();

            $table->string('nama_ormawa')->unique();
            $table->string('singkatan')->unique();
            $table->string('jenis_ormawa');
            $table->string('status_ormawa');
            $table->year('tahun_berdiri');
            $table->string('foto_organisasi')->nullable();
            $table->string('logo')->nullable();
            $table->string('ketua')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('kontak')->nullable();
            $table->string('pic')->nullable();
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ormawa');
    }
};
