<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Activity extends Model
{
    protected $fillable = [

        'record_class', 'record_id', 'route_name',
        'user_id', 'user_agent', 'session_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Record(): HasOne {

        return $this->hasOne($this->record_class ?? Activity::class, 'id', 'record_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function User() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
