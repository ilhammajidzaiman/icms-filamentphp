<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'name',
        'email',
        'address',
        'phone',
        'map',
        'social_media',
        'favicon',
        'logo',
    ];

    protected $hidden = [
        'uuid',
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
