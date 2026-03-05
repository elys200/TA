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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ormawa');
            $table->foreignId('ormawa_id')
                  ->nullable()
                  ->constrained('ormawa')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['ormawa_id']);
        $table->dropColumn('ormawa_id');
        $table->string('ormawa');
    });
}
};
