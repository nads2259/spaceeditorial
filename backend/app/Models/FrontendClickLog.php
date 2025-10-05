<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FrontendClickLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'frontend_user_id',
        'visitor_id',
        'session_id',
        'label',
        'url',
        'context',
    ];

    protected $casts = [
        'context' => 'array',
    ];

    public function frontendUser(): BelongsTo
    {
        return $this->belongsTo(FrontendUser::class);
    }
}
