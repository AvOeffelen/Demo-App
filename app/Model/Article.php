<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    /**
     * @var string
     */
    protected $table = 'article';

    protected $fillable = [
        'title',
        'has_video',
        'category_id',
        'sub_category_id',
        'text',
        'video_link',
        'image_link',
        'button_text',
        'button_link',
        'updated_at',
        'created_at'

    ];

    protected $casts = [
        'has_video' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
