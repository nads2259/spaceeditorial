<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->string('image_path')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (! Schema::hasTable('subcategories')) {
            Schema::create('subcategories', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->string('slug');
                $table->text('description')->nullable();
                $table->string('image_path')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
                $table->softDeletes();

                $table->unique(['category_id', 'slug']);
            });
        }

        if (! Schema::hasTable('external_sources')) {
            Schema::create('external_sources', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->string('driver');
                $table->string('base_url', 2048)->nullable();
                $table->text('api_key')->nullable();
                $table->json('config')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamp('last_synced_at')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (! Schema::hasTable('site_settings')) {
            Schema::create('site_settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->json('value')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (! Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->constrained()->cascadeOnDelete();
                $table->foreignId('subcategory_id')->nullable()->constrained()->nullOnDelete();
                $table->foreignId('external_source_id')->nullable()->constrained()->nullOnDelete();
                $table->string('external_id', 64)->nullable();
                $table->string('content_hash', 64)->unique();
                $table->string('title');
                $table->string('slug')->unique();
                $table->text('excerpt')->nullable();
                $table->longText('body')->nullable();
                $table->string('image_path')->nullable();
                $table->string('original_url', 2048)->nullable();
                $table->boolean('is_published')->default(false);
                $table->timestamp('published_at')->nullable();
                $table->timestamp('imported_at')->nullable();
                $table->json('meta')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->unique(['external_source_id', 'external_id']);
                $table->index(['published_at', 'is_published']);
            });
        }

        if (! Schema::hasTable('external_category_mappings')) {
            Schema::create('external_category_mappings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('external_source_id')->constrained()->cascadeOnDelete();
                $table->string('provider_category');
                $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
                $table->foreignId('subcategory_id')->nullable()->constrained()->nullOnDelete();
                $table->timestamps();
                $table->softDeletes();

                $table->unique(['external_source_id', 'provider_category']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('external_category_mappings');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('external_sources');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('categories');
    }
};
