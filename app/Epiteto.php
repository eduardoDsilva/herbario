<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;

class Epiteto extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name'];

    public function exsicata()
    {
        return $this->hasMany(Exsicata::class);
    }
}
