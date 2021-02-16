<?php

namespace App;

use App\Model\Workshop;
use Carbon\Carbon;
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
        'firstname',
        'email',
        'lastname',
        'infix',
        'type',
        'gender',
        'birthday',
        'password'
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
        'birthday' => 'datetime:d-m-Y',
    ];

    protected $dates = [
      'birthday'
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

    public function getBirthDay(): string
    {
        return Carbon::createFromTimestamp($this->birthday)->format('d-m-Y');
    }

}
