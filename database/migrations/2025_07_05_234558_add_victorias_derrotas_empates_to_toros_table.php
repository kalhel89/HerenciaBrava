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
        Schema::table('toros', function (Blueprint $table) {
            $table->integer('victorias')->default(0);
            $table->integer('derrotas')->default(0);
            $table->integer('empates')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('toros', function (Blueprint $table) {
            $table->dropColumn(['victorias', 'derrotas', 'empates']);
        });
    }
};
