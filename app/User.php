<?php

namespace App;

// use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    //use Notifiable, HasPermissionsTrait, HasApiTokens, SoftDeletes;
    use Notifiable, HasPermissionsTrait, SoftDeletes;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'active', 'code',
        'first_name', 'last_name', 'work_place', 'path_avatar', 'activation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];
    
    public function isAdmin() {
        return $this->hasRole('admin');
    }
    public function isLecturer() {
        return $this->hasRole('lecturer');
    }
    public function isStudent() {
        return $this->hasRole('student');
    }
}
