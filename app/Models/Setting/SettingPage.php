<?php

namespace App\Models\Setting;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingPage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'title',
        'type',
        'is_show',
    ];

    protected $hidden = [
        'is_show' => 'boolean',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
