<?php

namespace App\Models\Media;

use App\Models\Media\File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileCounter extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'file_id',
        'downloader',
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

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }
}
