<?php

namespace App\Models;

use App\Models\PostComment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FrontendUser extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'last_login_at',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function contactMessages(): HasMany
    {
        return $this->hasMany(ContactMessage::class);
    }

    public function visitLogs(): HasMany
    {
        return $this->hasMany(VisitLog::class);
    }

    public function clickLogs(): HasMany
    {
        return $this->hasMany(FrontendClickLog::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PostComment::class);
    }

    public function visitors(): HasMany
    {
        return $this->hasMany(FrontendUserVisitor::class);
    }
}
