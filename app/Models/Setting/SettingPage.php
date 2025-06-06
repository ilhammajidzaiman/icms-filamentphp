<?php

namespace App\Models\Setting;

use App\Enums\PageTypeEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingPage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'is_show',
        'type',
        'title',
    ];

    protected $hidden = [
        'is_show' => 'boolean',
    ];

    protected $casts = [
        'type' => PageTypeEnum::class,
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
}
