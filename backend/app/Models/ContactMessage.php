<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'frontend_user_id',
        'name',
        'email',
        'subject',
        'message',
        'status',
        'is_guest',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'is_guest' => 'boolean',
    ];

    public function frontendUser(): BelongsTo
    {
        return $this->belongsTo(FrontendUser::class);
    }
}
