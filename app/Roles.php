<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['name', 'display_name'];

    public function permission(){
        return $this->belongsToMany(Permissions::class, 'permission_roles', 'role_id', 'permission_id');
    }
}
