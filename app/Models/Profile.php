<?php

namespace App\Models;

use App\Models\User;
use App\Enums\GenderEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'birth_date',
        'gender',
        'phone',
        'file',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $casts = [
        'gender' => GenderEnum::class,
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
