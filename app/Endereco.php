<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Endereco extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = [
        'municipio', 'uf', 'pais', 'local', 'latitude', 'longitude', 'habitat', 'observacao',
    ];

    public function exsicata()
    {
        return $this->hasOne(Exsicata::class);
    }
}
