<?php

namespace App;

use OwenIt\Auditing\Contracts\Auditable;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['name', 'display_name', 'description'];

    public function user()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

}