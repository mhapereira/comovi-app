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
        Schema::table('institutos', function (Blueprint $table) {
            $table->text('sobre')->nullable()->change();
            $table->json('ata')->nullable()->change();
            $table->json('balanco')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institutos', function (Blueprint $table) {
            $table->text('sobre')->nullable(false)->change();
            $table->json('ata')->nullable(false)->change();
            $table->json('balanco')->nullable(false)->change();
        });
    }
};
