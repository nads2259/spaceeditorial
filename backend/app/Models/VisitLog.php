<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    protected $casts = [
        'context' => 'array',
    ];
}
