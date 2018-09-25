<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;

class Endereco extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'municipio', 'uf', 'pais', 'local', 'latitude', 'longitude', 'habitat', 'observacao',
    ];

    public function exsicata()
    {
        return $this->hasMany(Exsicata::class);
    }
}
