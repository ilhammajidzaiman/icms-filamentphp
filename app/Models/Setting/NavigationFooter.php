<?php

namespace App\Models\Setting;

use App\Models\User;
use App\Models\Site\Page;
use Illuminate\Support\Str;
use App\Models\Post\BlogArticle;
use App\Models\Post\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SolutionForest\FilamentTree\Concern\ModelTree;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NavigationFooter extends Model
{
    use SoftDeletes, ModelTree;

    protected $fillable = [
        'is_show',
        'user_id',
        'parent_id',
        'modelable_type',
        'modelable_id',
        'order',
        'slug',
        'title',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $casts = [
        'is_show' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function determineOrderColumnName(): string
    {
        return 'order';
    }

    public function scopeShow($query)
    {
        return $query->where('is_show', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function modelable(): MorphTo
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(NavigationFooter::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NavigationFooter::class, 'parent_id');
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(BlogArticle::class, 'modelable_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'modelable_id', 'id');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'modelable_id', 'id');
    }
}
