<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogArticle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'user_id',
        'blog_category_id',
        'slug',
        'title',
        'content',
        'file',
        'attachment',
        'visitor',
        'is_show',
        'published_at',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $casts = [
        'is_show' => 'boolean',
        'attachment' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function scopeShow($query)
    {
        return $query->where('is_show', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }

    public function blogTags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_posts', 'blog_article_id', 'blog_tag_id')->withTimestamps();
    }

    public function modelable(): MorphOne
    {
        return $this->morphOne(NavMenu::class, 'modelable');
    }

    public function modelables(): MorphMany
    {
        return $this->morphMany(NavMenu::class, 'modelable');
    }
}
