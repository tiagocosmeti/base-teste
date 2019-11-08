<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imoveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('municipio');
            $table->char('estado', 2);
            $table->char('cep', 9);
            $table->string('tipo_imovel');
            $table->string('nome_proprietario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
}
