<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;

class Genero extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name'];

    public function exsicata()
    {
        return $this->hasMany(Exsicata::class);
    }
}
