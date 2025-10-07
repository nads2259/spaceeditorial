<?php

namespace App\Console\Commands;

use App\Models\ExternalCategoryMapping;
use App\Models\Post;
use App\Models\VisitLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ClearContent extends Command
{
    protected $signature = 'content:purge {--all : Also remove categories, subcategories, and mappings}';

    protected $description = 'Remove imported posts (and optionally taxonomy/mappings) to reset the content catalogue.';

    public function handle(): int
    {
        $wipeTaxonomy = (bool) $this->option('all');

        Schema::disableForeignKeyConstraints();

        try {
            Post::query()->truncate();
            VisitLog::query()->truncate();

            if ($wipeTaxonomy) {
                DB::table('external_category_mappings')->truncate();
                DB::table('subcategories')->truncate();
                DB::table('categories')->truncate();
            }
        } finally {
            Schema::enableForeignKeyConstraints();
        }

        $this->info('Content tables truncated successfully.');

        if ($wipeTaxonomy) {
            $this->warn('Categories, subcategories, and mappings have been cleared. Recreate them before the next sync.');
        }

        return self::SUCCESS;
    }
}
