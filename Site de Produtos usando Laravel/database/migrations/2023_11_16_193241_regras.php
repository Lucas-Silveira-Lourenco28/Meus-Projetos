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
        Schema::create('regras', function (Blueprint $table) {
            $table->id(); 
            $table->string('Nome');
            $table->timestamps();

        });

        // essa tabela está sendo criada com a função de consolida o relacionamento de muitos pra muitos, onde teremos a tabela regras e a users sendo relacionadas
        Schema::create('regra_user', function (Blueprint $table) {
            $table->id(); 
            $table->string('Nome');
            $table->timestamps();
            $table->unsignedBigInteger('id_regra');
            $table->foreign('id_regra')->references('id')->on('regras');
            
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regras');
        Schema::dropIfExists('regra_user');
    }
};
