<?php

declare(strict_types=1);

use Database\Seeders\DatabaseSnapshotSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Artisan::call('db:seed', [
            '--class' => DatabaseSnapshotSeeder::class,
            '--force' => true,
        ]);
    }

    public function down(): void
    {
        $connection = DB::connection();
        $driver = $connection->getDriverName();
        $tables = [
            'posts',
            'subcategories',
            'categories',
            'site_settings',
            'users',
            'external_sources',
        ];

        Schema::disableForeignKeyConstraints();

        foreach ($tables as $table) {
            if ($driver === 'sqlite') {
                $connection->statement("DELETE FROM \"{$table}\"");
                $connection->statement(
                    "DELETE FROM sqlite_sequence WHERE name = ?",
                    [$table]
                );

                continue;
            }

            $connection->table($table)->truncate();
        }

        Schema::enableForeignKeyConstraints();
    }
};
