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
        Schema::table('peminjaman_ruangan', function (Blueprint $table) {
            $table->foreignId('given_by')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->timestamp('time_given')->nullable();
            $table->string('foto_pemberian')->nullable();
            $table->foreignId('returned_by')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->timestamp('time_returned')->nullable();
             $table->string('foto_pengembalian')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('peminjaman_ruangan', function (Blueprint $table) {

            $table->dropForeign(['given_by']);
            $table->dropForeign(['returned_by']);

            $table->dropColumn([
                'given_by',
                'time_given',
                'foto_pemberian',
                'returned_by',
                'time_returned',
                'foto_pengembalian'
            ]);
        });
            
    }
};
