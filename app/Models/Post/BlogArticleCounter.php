<?php

namespace App\Models\Post;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogArticleCounter extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'blog_article_id',
        'visitor',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(BlogArticle::class, 'blog_article_id', 'id');
    }
}
