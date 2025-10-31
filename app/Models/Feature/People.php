<?php

namespace App\Models\Feature;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Feature\PeoplePosition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class People extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_show',
        'user_id',
        'people_position_id',
        'order',
        'name',
        'description',
        'file',
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

    public function peoplePosition(): BelongsTo
    {
        return $this->belongsTo(PeoplePosition::class, 'people_position_id', 'id');
    }
}
