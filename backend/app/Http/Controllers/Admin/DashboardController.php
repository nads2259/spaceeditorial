<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExternalSource;
use App\Models\Post;
use App\Models\Subcategory;
use App\Models\Subscriber;
use App\Models\VisitLog;
use Carbon\Carbon;
use Illuminate\Support\Arr;
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

        $visitsByDay = VisitLog::query()
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::now()->subDays(13)->startOfDay())
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->map(function ($row) {
                return [
                    'date' => $row->day,
                    'total' => (int) $row->total,
                ];
            });

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
        ];

        return view('admin.dashboard', [
            'summary' => $summary,
            'visitsByDay' => $visitsByDay,
            'topPages' => $topPages,
        ]);
    }
}
