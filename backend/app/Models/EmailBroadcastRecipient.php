<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailBroadcastRecipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_broadcast_id',
        'recipient_type',
        'recipient_id',
        'email',
        'token',
        'status',
        'click_count',
        'sent_at',
        'clicked_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'clicked_at' => 'datetime',
    ];

    public function broadcast(): BelongsTo
    {
        return $this->belongsTo(EmailBroadcast::class);
    }

    public function clicks(): HasMany
    {
        return $this->hasMany(EmailClickLog::class);
    }
}
