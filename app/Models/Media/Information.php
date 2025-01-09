<?php

namespace App\Models\Media;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Post\NavMenu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'user_id',
        'slug',
        'title',
        'content',
        'file',
        'is_show',
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

    public function navMenu(): MorphOne
    {
        return $this->morphOne(NavMenu::class, 'modelable');
    }

    public function navMenus(): MorphMany
    {
        return $this->morphMany(NavMenu::class, 'modelable');
    }
}
