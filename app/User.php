<?php

namespace App;

use App\Model\Workshop;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'email', 'password','lastname','infix','type'
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

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Workshop()
    {
        return $this->belongsToMany(Workshop::class,'user_like_workshop','user_id','workshop_id');
    }

    /**
     * @return String
     */
    public function getFullName(): String
    {
        return $this->firstname . " ". $this->infix . " " . $this->lastname;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->type === self::ADMIN_TYPE;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->type === self::DEFAULT_TYPE;
    }
}
