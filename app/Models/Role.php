<?php

namespace App\Models;
/**
 * @property $permissions []
 */
class Role extends \Spatie\Permission\Models\Role
{
    protected $table = 'roles';
}
