<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model {
    use HasFactory;

    protected $fillable = [
        'header',
        'paragraph',
        'user_id',
        'badge_id',
        'pinned'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function badge(): BelongsTo {
        return $this->belongsTo(Badge::class);
    }


}
