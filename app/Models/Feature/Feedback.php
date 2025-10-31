<?php

namespace App\Models\Feature;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feature\FeedbackCategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'is_show',
        'feedback_category_id',
        'name',
        'email',
        'message',
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

    public function feedbackCategory(): BelongsTo
    {
        return $this->belongsTo(FeedbackCategory::class, 'feedback_category_id', 'id');
    }
}
