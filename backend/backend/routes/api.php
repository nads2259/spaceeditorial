<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('settings', SettingsController::class);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{slug}', [CategoryController::class, 'show']);
Route::get('categories/{categorySlug}/subcategories/{subcategorySlug}', [CategoryController::class, 'subcategory']);

Route::get('posts/{slug}', [PostController::class, 'show']);

Route::get('search', SearchController::class);
