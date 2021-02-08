<?php

namespace App;

use App\Model\Activity;
use App\Model\Article;
use App\Model\Workshop;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @property string $firstname
 * @property string $email
 * @property ?string $infix
 * @property string $type
 * @property string $lastname
 * @property ?string $gender
 * @package App
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'firstname', 'email',
        'password', 'lastname',
        'infix', 'type',
        'gender', 'password'
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
    const MANAGER_TYPE = 'manager';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Workshop()
    {
        return $this->belongsToMany(Workshop::class,'user_like_workshop','user_id','workshop_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Activities() : HasMany
    {
        return $this->hasMany(Activity::class, 'user_id', 'id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function Article()
    {
        return $this->belongsToMany(Article::class,'user_like_article','user_id','article_id');
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
    public function isManager(): bool
    {
        return $this->type === self::MANAGER_TYPE;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->type === self::DEFAULT_TYPE;
    }
}
