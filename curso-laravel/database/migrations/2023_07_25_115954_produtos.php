<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->double('preco', 10, 2);
            $table->string('slug');
            $table->string('imagem')->nullable();

            // Chave estrangeira
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_categoria');

            // Criando Relaciomento de tabelas
            $table->foreign('id_user')
                ->references('id')
                ->on('users') 
                ->onDelete('cascade') 
                ->onUpdate('cascade'); 

            $table->foreign('id_categoria')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
