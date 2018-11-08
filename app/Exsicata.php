<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Exsicata extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $fillable = ['numero', 'name', 'autor', 'escaninho', 'coletor', 'data', 'determinador', 'quantidade', 'bdd', 'image', 'genero_id', 'familia_id', 'epiteto_id',
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
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
