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
        Schema::table('salats', function (Blueprint $table) {
            $table->unique('name');
            $table->integer('position')->default(1)->after('faraj_rakat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salats', function (Blueprint $table) {
            $table->dropUnique(['name']);
            $table->dropColumn(['position']);
        });
    }
};
