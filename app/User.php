<?php

namespace App;

// use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable implements JWTSubject
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
        'first_name', 'last_name', 'work_place', 'path_avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token', 'activation_token'
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

    // JSON Web Token (JWT of tymon taylor)
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
