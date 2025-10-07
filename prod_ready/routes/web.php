<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\EmailTemplateController as AdminEmailTemplateController;
use App\Http\Controllers\Admin\EmailBroadcastController as AdminEmailBroadcastController;
use App\Http\Controllers\Admin\ExternalCategoryMappingController;
use App\Http\Controllers\EmailBroadcastController;
use App\Http\Controllers\Admin\ExternalSourceController;
use App\Http\Controllers\Admin\FrontendUserController as AdminFrontendUserController;
use App\Http\Controllers\Admin\PostCommentController as AdminPostCommentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\VisitLogController as AdminVisitLogController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SubscriberController as PublicSubscriberController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Tracking\VisitLogController as TrackingVisitLogController;
use App\Http\Controllers\Tracking\ClickLogController as TrackingClickLogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('newsletter/subscribe', PublicSubscriberController::class)->name('newsletter.subscribe');
Route::post('tracking/visit', TrackingVisitLogController::class)->name('tracking.visit');
Route::post('tracking/click', TrackingClickLogController::class)->name('tracking.click');

Route::get('email/click/{broadcast}/{token}', [EmailBroadcastController::class, 'track'])->name('email.click');

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

        Route::post('external-sources/sync-all', [ExternalSourceController::class, 'syncAll'])->name('external-sources.sync-all');
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

        Route::resource('frontend-users', AdminFrontendUserController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::resource('contact-messages', AdminContactMessageController::class)->only(['index', 'show', 'update']);
        Route::resource('email-templates', AdminEmailTemplateController::class)->only(['index', 'create', 'store', 'edit', 'update']);
        Route::get('email-templates/{emailTemplate}/preview', [AdminEmailTemplateController::class, 'preview'])->name('email-templates.preview');
        Route::post('email-templates/{emailTemplate}/send', [AdminEmailTemplateController::class, 'send'])->name('email-templates.send');
        Route::get('email-broadcasts', [AdminEmailBroadcastController::class, 'index'])->name('email-broadcasts.index');
        Route::resource('post-comments', AdminPostCommentController::class)->only(['index', 'update', 'destroy']);
    });
});

require __DIR__.'/auth.php';
