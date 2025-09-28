<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExternalCategoryMapping extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'external_source_id',
        'provider_category',
        'category_id',
        'subcategory_id',
    ];

    public function externalSource(): BelongsTo
    {
        return $this->belongsTo(ExternalSource::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }
}
