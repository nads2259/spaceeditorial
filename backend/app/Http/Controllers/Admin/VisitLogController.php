<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VisitLogController extends Controller
{
    public function index(Request $request): View
    {
        abort_unless(Auth::user()?->role === 'admin', 403);

        $search = trim((string) $request->query('q'));

        $logs = VisitLog::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner
                        ->where('visitor_id', 'like', "%{$search}%")
                        ->orWhere('url', 'like', "%{$search}%")
                        ->orWhere('referrer', 'like', "%{$search}%")
                        ->orWhere('ip_address', 'like', "%{$search}%")
                        ->orWhere('user_agent', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.visit-logs.index', [
            'logs' => $logs,
            'search' => $search,
        ]);
    }
}
