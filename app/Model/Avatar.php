<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Avatar
 * @property User $user
 * @package App\Model
 */
class Avatar extends Model
{
    protected $table = 'avatar';

    protected $fillable = [
        'user_id',
        'image_link',
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
