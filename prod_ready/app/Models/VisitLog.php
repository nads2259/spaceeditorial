<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'session_id',
        'url',
        'referrer',
        'ip_address',
        'user_agent',
        'locale',
        'context',
        'frontend_user_id',
    ];

    protected $casts = [
        'context' => 'array',
    ];

    public function frontendUser(): BelongsTo
    {
        return $this->belongsTo(FrontendUser::class);
    }
}
