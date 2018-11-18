<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id', 'slug', 'name'
    ];

    // black list 
    // protected $guarded = ['*'];
    public function users() {
        return $this->belongsToMany(User::class, 'users_roles');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
