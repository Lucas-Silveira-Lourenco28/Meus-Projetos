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
        Schema::create('sistema', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descrição');
            $table->string('imagem')->nullable();
            
            //Relação com a tabela usersistema
            $table->unsignedbigInteger('id_usersistema');
            $table->foreign('id_usersistema')->references('id')->on('usersistema')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistema');
    }
};
