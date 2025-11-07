<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasAvatar

{
    use Notifiable, SoftDeletes;

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
        // return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return ($this->profile && $this->profile->file && Storage::disk('public')->exists($this->profile->file)) ? Storage::url($this->profile->file) : null;
    }

    protected $fillable = [
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
    ];

    protected $hidden = [
        'uuid',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }
}
