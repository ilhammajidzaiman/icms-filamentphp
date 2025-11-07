<?php

namespace App\Models\Post;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Post\BlogTag;
use App\Models\Post\BlogCategory;
use App\Models\Setting\NavigationMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogArticle extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_show',
        'user_id',
        'blog_category_id',
        'slug',
        'title',
        'content',
        'file',
        'description',
        'attachment',
        'visitor',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_posts', 'blog_article_id', 'blog_tag_id')->withTimestamps();
    }

    public function navigationMenu(): MorphOne
    {
        return $this->morphOne(NavigationMenu::class, 'modelable');
    }
}
