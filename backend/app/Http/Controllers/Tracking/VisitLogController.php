<?php

namespace App\Http\Controllers\Tracking;

use App\Http\Controllers\Controller;
use App\Models\FrontendUserVisitor;
use App\Models\VisitLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VisitLogController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'visitor_id' => ['required', 'string', 'max:64'],
            'session_id' => ['nullable', 'string', 'max:64'],
            'url' => ['required', 'string', 'max:512'],
            'referrer' => ['nullable', 'string', 'max:512'],
            'locale' => ['nullable', 'string', 'max:20'],
            'context' => ['nullable', 'array'],
            'frontend_user_id' => ['nullable', 'integer', 'exists:frontend_users,id'],
        ]);

        $frontendUserId = $data['frontend_user_id'] ?? $this->resolveFrontendUserFromVisitor($data['visitor_id']);

        $log = VisitLog::firstOrNew([
            'visitor_id' => $data['visitor_id'],
            'session_id' => $data['session_id'] ?? null,
            'url' => $data['url'],
        ]);

        $log->fill([
            'frontend_user_id' => $frontendUserId ?? $log->frontend_user_id,
            'referrer' => $data['referrer'] ?? $log->referrer,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'locale' => $data['locale'] ?? $request->getLocale(),
            'context' => $data['context'] ?? $log->context,
        ]);

        $log->save();

        if ($frontendUserId) {
            FrontendUserVisitor::query()->updateOrCreate(
                [
                    'frontend_user_id' => $frontendUserId,
                    'visitor_id' => $data['visitor_id'],
                ],
                [
                    'session_id' => $data['session_id'] ?? null,
                ]
            );
        }

        return response()->json(['status' => 'ok']);
    }

    protected function resolveFrontendUserFromVisitor(string $visitorId): ?int
    {
        return FrontendUserVisitor::query()
            ->where('visitor_id', $visitorId)
            ->value('frontend_user_id');
    }
}
