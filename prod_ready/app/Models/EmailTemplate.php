<?php

namespace App\Models;

use App\Models\EmailBroadcast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'audience',
        'subject',
        'description',
        'html_body',
        'text_body',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function broadcasts(): HasMany
    {
        return $this->hasMany(EmailBroadcast::class);
    }
}
