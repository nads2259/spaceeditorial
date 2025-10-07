<?php

namespace App\Console\Commands;

use App\Models\ExternalSource;
use App\Services\ExternalContent\ExternalContentService;
use Illuminate\Console\Command;

class SyncExternalContent extends Command
{
    protected $signature = 'external:sync {slug? : Limit sync to a single external source slug} {--force : Re-import even if a post already exists}';

    protected $description = 'Synchronise articles from configured external providers.';

    public function __construct(protected ExternalContentService $service)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $slug = $this->argument('slug');
        $force = (bool) $this->option('force');

        $query = ExternalSource::query()->where('is_active', true);

        if ($slug) {
            $query->where('slug', $slug);
        }

        $sources = $query->get();

        if ($sources->isEmpty()) {
            $this->warn('No external sources found for synchronisation.');

            return self::SUCCESS;
        }

        foreach ($sources as $source) {
            $this->info("Syncing {$source->name} ({$source->slug}) ...");

            try {
                $imported = $this->service->sync($source, $force);
            } catch (\Throwable $exception) {
                $this->error("Failed to sync {$source->slug}: {$exception->getMessage()}");
                report($exception);

                continue;
            }

            $this->info("Imported {$imported} articles from {$source->slug}.");
        }

        return self::SUCCESS;
    }
}
