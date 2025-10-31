<?php

namespace App\Models\Media;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Setting\NavigationMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_show',
        'user_id',
        'slug',
        'title',
        'url',
        'embed',
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

    public function navigationMenu(): MorphOne
    {
        return $this->morphOne(NavigationMenu::class, 'modelable');
    }
}
