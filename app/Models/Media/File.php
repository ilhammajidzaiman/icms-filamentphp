<?php

namespace App\Models\Media;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Media\FileCategory;
use App\Models\Setting\NavigationMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;;

class File extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_show',
        'user_id',
        'file_category_id',
        'slug',
        'title',
        'downloader',
        'file',
        'attachment',
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

    public function scopeShow($query)
    {
        return $query->where('is_show', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function fileCategory(): BelongsTo
    {
        return $this->belongsTo(FileCategory::class, 'file_category_id', 'id');
    }

    public function navigationMenu(): MorphOne
    {
        return $this->morphOne(NavigationMenu::class, 'modelable');
    }
}
