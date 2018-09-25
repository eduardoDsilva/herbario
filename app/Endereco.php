<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'municipio', 'uf', 'pais', 'local', 'latitude', 'longitude', 'habitat', 'observacao',
    ];
}
