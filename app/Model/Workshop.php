<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = 'workshop';

    protected $fillable = [
        'name',
        'workshop_category_id',
        'description',
        'agenda_link',
        'start',
        'end',
        'image_location',
        'image_name',
    ];

    protected $casts = [

    ];

    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',
    ];
}
