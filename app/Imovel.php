<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = 'imoveis';
    protected $fillable = ['bairro', 'endereco', 'bairro', 'municipio', 'estado', 'cep', 'tipo_imovel', 'nome_proprietario'];
    public $timestamps = false;
}
