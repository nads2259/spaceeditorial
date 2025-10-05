<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\ExternalSource;
use App\Models\FrontendClickLog;
use App\Models\FrontendUser;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Subcategory;
use App\Models\Subscriber;
use App\Models\VisitLog;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $totalPosts = Post::query()->count();
        $totalCategories = Category::query()->count();
        $totalSubcategories = Subcategory::query()->count();
        $totalSources = ExternalSource::query()->count();
        $totalVisits = VisitLog::query()->count();
        $totalSubscribers = Subscriber::query()->count();
        $totalFrontendUsers = FrontendUser::query()->count();
        $totalContactMessages = ContactMessage::query()->count();
        $totalClickLogs = FrontendClickLog::query()->count();
        $totalComments = PostComment::query()->count();

        $pendingComments = PostComment::where('status', PostComment::STATUS_PENDING)->count();
        $publishedComments = PostComment::where('status', PostComment::STATUS_PUBLISHED)->count();
        $rejectedComments = PostComment::where('status', PostComment::STATUS_REJECTED)->count();

        $visitsByDay = $this->chartSeries(VisitLog::class);
        $commentsByDay = $this->chartSeries(PostComment::class);
        $frontendUsersByDay = $this->chartSeries(FrontendUser::class);
        $subscribersByDay = $this->chartSeries(Subscriber::class, 'subscribed_at');

        $topPages = VisitLog::query()
            ->selectRaw('url, COUNT(*) as total')
            ->groupBy('url')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $summary = [
            'posts' => $totalPosts,
            'categories' => $totalCategories,
            'subcategories' => $totalSubcategories,
            'sources' => $totalSources,
            'visits' => $totalVisits,
            'subscribers' => $totalSubscribers,
            'frontend_users' => $totalFrontendUsers,
            'contacts' => $totalContactMessages,
            'clicks' => $totalClickLogs,
            'comments' => $totalComments,
        ];

        $commentStatusSummary = [
            'pending' => $pendingComments,
            'published' => $publishedComments,
            'rejected' => $rejectedComments,
        ];

        return view('admin.dashboard', [
            'summary' => $summary,
            'visitsByDay' => $visitsByDay,
            'topPages' => $topPages,
            'commentsByDay' => $commentsByDay,
            'commentStatusSummary' => $commentStatusSummary,
            'frontendUsersByDay' => $frontendUsersByDay,
            'subscribersByDay' => $subscribersByDay,
        ]);
    }

    protected function chartSeries(string $modelClass, string $dateColumn = 'created_at'): array
    {
        $startDate = Carbon::now()->subDays(13)->startOfDay();

        return $modelClass::query()
            ->selectRaw('DATE(' . $dateColumn . ') as day, COUNT(*) as total')
            ->whereNotNull($dateColumn)
            ->where($dateColumn, '>=', $startDate)
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->map(fn ($row) => [
                'date' => $row->day,
                'total' => (int) $row->total,
            ])
            ->toArray();
    }
}
