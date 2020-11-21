<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = 'workshop';

    protected $fillable = [
        'title',
        'workshop_category_id',
        'text',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function UserFavorites()
    {
        return $this->belongsToMany(User::class, 'user_like_workshop','workshop_id','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Category()
    {
        return $this->belongsTo(WorkshopCategory::class,'workshop_category_id');
    }
}
