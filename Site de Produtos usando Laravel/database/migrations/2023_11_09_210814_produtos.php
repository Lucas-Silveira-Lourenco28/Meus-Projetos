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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('Nome');
            $table->text('Descrição');
            $table->double('Preço', 10, 2);
            $table->string('slug');
            $table->string('imagem')->nullable();
            //unsignedbiginteger: Chave Estrangeira, responsavel pela Relação com a tabela usúario 
            $table->unsignedBigInteger('id_user');
            // a chave estrangeira id-user faz referencia ao campo id da tabela user
            // ONDELETE e ONUPDATE COM O VALOR CASCADE: quando apagarmos um usuario, também vai apagar os produto que ele cadastrou. para que não tenha nenhum registro orfan no banco
            //                  referencia ao campo id   da  tabela user       
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedbigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
