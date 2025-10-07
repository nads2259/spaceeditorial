<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailClickLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_broadcast_id',
        'email_broadcast_recipient_id',
        'recipient_type',
        'recipient_id',
        'email',
        'url',
        'clicked_at',
    ];

    protected $casts = [
        'clicked_at' => 'datetime',
    ];

    public function broadcast(): BelongsTo
    {
        return $this->belongsTo(EmailBroadcast::class);
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(EmailBroadcastRecipient::class, 'email_broadcast_recipient_id');
    }
}
