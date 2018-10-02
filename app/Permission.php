<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'description', 'display_name'];

    public function role()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}