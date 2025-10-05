<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactMessageController;
use App\Http\Controllers\Api\FrontendAuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PostCommentController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\SettingsController;
use Illuminate\Support\Facades\Route;

Route::post('frontend/register', [FrontendAuthController::class, 'register']);
Route::post('frontend/login', [FrontendAuthController::class, 'login']);
Route::post('contact', [ContactMessageController::class, 'store']);
Route::get('posts/{slug}/comments', [PostCommentController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('frontend/logout', [FrontendAuthController::class, 'logout']);
    Route::get('frontend/me', [FrontendAuthController::class, 'me']);

    Route::get('settings', SettingsController::class);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{slug}', [CategoryController::class, 'show']);
    Route::get('categories/{categorySlug}/subcategories/{subcategorySlug}', [CategoryController::class, 'subcategory']);

    Route::get('posts/{slug}', [PostController::class, 'show']);
    Route::post('posts/{slug}/comments', [PostCommentController::class, 'store']);

    Route::get('search', SearchController::class);
});
