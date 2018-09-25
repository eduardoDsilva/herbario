<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Exsicata extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'autor', 'escavaninho', 'coletor', 'data', 'determinador', 'quantidade', 'bdd', 'image', 'genero_id', 'familia_id'
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function epiteto()
    {
        return $this->belongsTo(Epiteto::class);
    }
}
