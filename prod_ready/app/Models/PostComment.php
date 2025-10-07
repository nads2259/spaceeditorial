<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class PostComment extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'post_id',
        'frontend_user_id',
        'body',
        'status',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function frontendUser(): BelongsTo
    {
        return $this->belongsTo(FrontendUser::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    public static function shouldAutoApprove(string $body): bool
    {
        $hasLink = (bool) preg_match('/https?:\/\/|www\./i', $body);
        if ($hasLink) {
            return false;
        }

        $normalized = Str::lower($body);
        foreach (self::profanityList() as $term) {
            if (str_contains($normalized, $term)) {
                return false;
            }
        }

        return true;
    }

    protected static function profanityList(): array
    {
        return [
            'abuse',
            'asshole',
            'bastard',
            'damn',
            'fuck',
            'shit',
            'idiot',
            'moron',
        ];
    }

}
