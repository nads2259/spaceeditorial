<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailBroadcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_template_id',
        'audience',
        'subject',
        'html_body',
        'text_body',
        'status',
        'total_recipients',
        'sent_count',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(EmailTemplate::class, 'email_template_id');
    }

    public function recipients(): HasMany
    {
        return $this->hasMany(EmailBroadcastRecipient::class);
    }

    public function clicks(): HasMany
    {
        return $this->hasMany(EmailClickLog::class);
    }
}
