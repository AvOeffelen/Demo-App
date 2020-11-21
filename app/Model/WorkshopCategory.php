<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkshopCategory extends Model
{
    protected $table = 'workshop_category';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Workshop()
    {
        return $this->hasMany(Workshop::class);
    }
}
