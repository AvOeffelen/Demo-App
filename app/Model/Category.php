<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name',
        'display_name',
        'created_at',
        'updated_at'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function Article()
    {
        return $this->hasMany(Article::class);
    }
}
