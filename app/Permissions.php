<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $fillable = ['name', 'display_name', 'parent_id'];

    public function permissionChildren(){
        return $this->hasMany(Permissions::class, 'parent_id', 'id');
    }
}
