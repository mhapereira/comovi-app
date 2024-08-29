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
        Schema::table('galerias', function (Blueprint $table) {
            // Alterando a coluna 'path' para ser do tipo JSON para armazenar um array
            $table->json('path')->change();
            
            // Adicionando a nova coluna 'descricao'
            $table->string('descricao')->after('path');
            
            // Removendo a coluna 'tipo'
            $table->dropColumn('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galerias', function (Blueprint $table) {
            // Reverter a coluna 'path' para string
            $table->string('path')->change();
            
            // Remover a coluna 'descricao'
            $table->dropColumn('descricao');
            
            // Adicionar novamente a coluna 'tipo'
            $table->enum('tipo', ['foto', 'video'])->after('path');
        });
    }
};
