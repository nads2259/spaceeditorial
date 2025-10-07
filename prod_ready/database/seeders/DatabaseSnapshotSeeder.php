<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSnapshotSeeder extends Seeder
{
    public function run(): void
    {
        $snapshot = require database_path('seeders/data/database_snapshot.php');

        Schema::disableForeignKeyConstraints();

        $connection = DB::connection();
        $driver = $connection->getDriverName();
        $tablesToClear = [
            'posts',
            'subcategories',
            'categories',
            'site_settings',
            'users',
        ];

        foreach ($tablesToClear as $table) {
            $this->clearTable($connection, $driver, $table);
        }

        Schema::enableForeignKeyConstraints();

        $this->seedTable('categories', $snapshot['categories'] ?? []);
        $this->seedTable('subcategories', $snapshot['subcategories'] ?? []);
        $this->seedTable('posts', $snapshot['posts'] ?? []);
        $this->seedTable('site_settings', $snapshot['site_settings'] ?? []);
        $this->seedTable('users', $snapshot['users'] ?? []);
    }

    private function clearTable($connection, string $driver, string $table): void
    {
        if ($driver === 'sqlite') {
            $connection->statement("DELETE FROM \"{$table}\"");
            $connection->statement("DELETE FROM sqlite_sequence WHERE name = ?", [$table]);

            return;
        }

        $connection->table($table)->truncate();
    }

    private function seedTable(string $table, array $rows): void
    {
        if ($rows === []) {
            return;
        }

        $columns = Schema::getColumnListing($table);
        $columnMap = array_fill_keys($columns, true);

        $payload = array_map(
            static fn (array $row) => array_intersect_key($row, $columnMap),
            $rows
        );

        DB::table($table)->insert($payload);
    }
}
