<?php

namespace App\Models\Setting;

use App\Models\User;
use Illuminate\Support\Str;
use App\Enums\SettingPageOptionEnum;
use App\Enums\SettingPageSectionEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SettingPage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'is_show',
        'user_id',
        'section',
        'option',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $casts = [
        'is_show' => 'boolean',
        'section' => SettingPageSectionEnum::class,
        'option' => SettingPageOptionEnum::class,
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
}
