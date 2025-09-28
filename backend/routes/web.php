<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ExternalCategoryMappingController;
use App\Http\Controllers\Admin\ExternalSourceController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\VisitLogController as AdminVisitLogController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SubscriberController as PublicSubscriberController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Tracking\VisitLogController as TrackingVisitLogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('newsletter/subscribe', PublicSubscriberController::class)->name('newsletter.subscribe');
Route::post('tracking/visit', TrackingVisitLogController::class)->name('tracking.visit');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::delete('posts/bulk-destroy', [AdminPostController::class, 'bulkDestroy'])->name('posts.bulk-destroy');

        Route::post('external-sources/{externalSource}/sync', [ExternalSourceController::class, 'sync'])->name('external-sources.sync');

        Route::get('subscribers', [AdminSubscriberController::class, 'index'])->name('subscribers.index');

        Route::get('visit-logs', [AdminVisitLogController::class, 'index'])->name('visit-logs.index');

        Route::resources([
            'categories' => AdminCategoryController::class,
            'subcategories' => SubcategoryController::class,
            'posts' => AdminPostController::class,
            'external-sources' => ExternalSourceController::class,
            'category-mappings' => ExternalCategoryMappingController::class,
            'site-settings' => SiteSettingController::class,
            'users' => UserController::class,
        ]);
    });
});

require __DIR__.'/auth.php';
