<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\FrontendClickLog;
use App\Models\FrontendUser;
use App\Models\FrontendUserVisitor;
use App\Models\VisitLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendUserController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));

        $users = FrontendUser::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->withCount([
                'contactMessages',
                'visitLogs',
                'clickLogs',
            ])
            ->addSelect([
                'last_visit_at' => VisitLog::query()
                    ->selectRaw('MAX(created_at)')
                    ->whereColumn('frontend_user_id', 'frontend_users.id'),
            ])
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.frontend-users.index', [
            'users' => $users,
            'search' => $search,
        ]);
    }

    public function show(FrontendUser $frontendUser): View
    {
        $frontendUser->loadCount(['contactMessages', 'visitLogs', 'clickLogs']);

        $recentVisits = VisitLog::query()
            ->where('frontend_user_id', $frontendUser->id)
            ->latest()
            ->limit(10)
            ->get();

        $recentContacts = ContactMessage::query()
            ->where('frontend_user_id', $frontendUser->id)
            ->latest()
            ->limit(5)
            ->get();

        $recentClicks = FrontendClickLog::query()
            ->where('frontend_user_id', $frontendUser->id)
            ->latest()
            ->limit(10)
            ->get();

        $visitorIds = FrontendUserVisitor::query()
            ->where('frontend_user_id', $frontendUser->id)
            ->pluck('visitor_id');

        return view('admin.frontend-users.show', [
            'user' => $frontendUser,
            'recentVisits' => $recentVisits,
            'recentContacts' => $recentContacts,
            'recentClicks' => $recentClicks,
            'visitorIds' => $visitorIds,
        ]);
    }

    public function update(Request $request, FrontendUser $frontendUser): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'string', 'in:active,inactive,suspended'],
        ]);

        $frontendUser->update($data);

        return redirect()
            ->route('admin.frontend-users.show', $frontendUser)
            ->with('status', __('Frontend user updated.'));
    }

    public function destroy(FrontendUser $frontendUser): RedirectResponse
    {
        $frontendUser->tokens()->delete();
        $frontendUser->delete();

        return redirect()
            ->route('admin.frontend-users.index')
            ->with('status', __('Frontend user removed.'));
    }
}
