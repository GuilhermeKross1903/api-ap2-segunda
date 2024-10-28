<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'ano_de_nascimento'
        ];
        
}

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'preço'
    ];
        
}

 
