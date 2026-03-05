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
            $table->foreignId('rejected_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();
            $table->timestamp('rejected_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('peminjaman_ruangan', function (Blueprint $table) {

        if (Schema::hasColumn('peminjaman_ruangan', 'rejected_by')) {
            
            // Coba drop foreign key (kalau ada)
            try {
                $table->dropForeign(['$rejected_by']);
            } catch (\Exception $e) {
                // Abaikan kalau FK memang tidak ada
            }

            $table->dropColumn('$rejected_by');
        }

        if (Schema::hasColumn('peminjaman_ruangan', 'rejected_at')) {
            $table->dropColumn('rejected_at');
        }

    });
}
};
