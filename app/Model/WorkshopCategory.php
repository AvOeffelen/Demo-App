<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkshopCategory extends Model
{
    protected $table = 'workshop_category';

    protected $fillable = [
        'name',
        'tag',
        'display_name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function Workshop()
    {
        return $this->hasMany(Workshop::class);
    }
}
