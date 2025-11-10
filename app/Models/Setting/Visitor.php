<?php

namespace App\Models\Setting;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{


    protected $fillable =
    [
        'ip_address',
        'user_agent',
        'os',
        'device',
        'platform',
        'version',
        'location',
        'hits',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
