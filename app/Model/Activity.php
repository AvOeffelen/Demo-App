<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Activity extends Model
{
    protected $fillable = [

        'record_class', 'record_id',
        'user_id', 'user_agent', 'session_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function Record() : HasOne
    {
        return $this->hasOne($this->record_class, 'id', 'record_id');
    }
}
