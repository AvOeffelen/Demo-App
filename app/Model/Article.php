<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @property string $title
 * @property bool $has_video
 * @property Category $category_id
 * @property SubCategory $sub_category_id
 * @property string $text
 * @property ?string $video_link
 * @property string $image_link
 * @property ?string $button_text
 * @property ?string $button_link
 * @property bool $show_contact
 * @property string $type
 * @package App\Model
 */
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
        'created_at',
        'show_contact',
        'type'
    ];

    protected $casts = [
        'has_video' => 'boolean',
        'show_contact' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userFavorites()
    {
        return $this->belongsToMany(User::class, 'user_like_article','article_id','user_id');
    }
}
