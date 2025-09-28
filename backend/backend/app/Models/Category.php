<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_path',
        'is_active',
        'sort_order',
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * {@inheritdoc}
     */
    protected $appends = ['image'];

    /**
     * @return HasMany<Subcategory>
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class)->orderBy('sort_order');
    }

    /**
     * @return HasMany<Post>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)
            ->latest('published_at');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getImageAttribute(): ?string
    {
        return $this->image_path;
    }
}
