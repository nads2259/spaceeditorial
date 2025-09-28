<?php

namespace App\Services\ExternalContent\Providers;

use App\DataTransferObjects\ExternalArticleData;
use Illuminate\Support\Collection;

interface Provider
{
    /**
     * @return Collection<int, ExternalArticleData>
     */
    public function fetch(): Collection;
}
