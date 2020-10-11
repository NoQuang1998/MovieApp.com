<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Roles::class, 'user_roles', 'user_id', 'role_id');
    }

    public function checkPermissionAccess($permissionCheck){
        //check tat ca vai tro cua 1 user
        //check tat ca quyen cua vai tro Neu nhu ton tai permission thi return true
        $roles = User::find(Auth::user()->id)->roles()->get();;
        foreach($roles as $role){
            $permissionUser = $role->permission()->get();
            if($permissionUser->contains('key_code', $permissionCheck)){
                return true;
            }
        }
        return false;
    }
}
