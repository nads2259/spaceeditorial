<?php

namespace App\Models;

use App\Models\PostComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'external_source_id',
        'external_id',
        'content_hash',
        'title',
        'slug',
        'excerpt',
        'body',
        'image_path',
        'original_url',
        'is_published',
        'published_at',
        'imported_at',
        'meta',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'imported_at' => 'datetime',
        'meta' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function externalSource(): BelongsTo
    {
        return $this->belongsTo(ExternalSource::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PostComment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('body');
    }

    public function readingTime(): int
    {
        if (! $this->body) {
            return 0;
        }

        $wordCount = str_word_count(strip_tags((string) $this->body));

        return max(1, (int) ceil($wordCount / 200));
    }

    public function hasFullContent(): bool
    {
        $metaHasFlag = (bool) data_get($this->meta, 'has_full_content', false);

        return $metaHasFlag && filled($this->body);
    }
}
