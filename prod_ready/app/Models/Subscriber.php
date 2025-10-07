<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'status',
        'subscribed_at',
        'unsubscribed_at',
        'meta',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'meta' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'subscribed');
    }
}
