<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exsicatas extends Model
{
    protected $fillable = ['name', 'autor', 'escavaninho', 'coletor', 'data', 'determinador', 'quantidade', 'bdd', 'image', 'endereco_id', 'genero_id', 'familia_id'
    ];
}
