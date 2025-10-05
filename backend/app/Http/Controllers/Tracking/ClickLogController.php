<?php

namespace App\Http\Controllers\Tracking;

use App\Http\Controllers\Controller;
use App\Models\FrontendClickLog;
use App\Models\FrontendUserVisitor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClickLogController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'visitor_id' => ['required', 'string', 'max:64'],
            'session_id' => ['nullable', 'string', 'max:64'],
            'label' => ['nullable', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:512'],
            'context' => ['nullable', 'array'],
            'frontend_user_id' => ['nullable', 'integer', 'exists:frontend_users,id'],
        ]);

        $frontendUserId = $data['frontend_user_id'] ?? $this->resolveFrontendUserFromVisitor($data['visitor_id']);

        FrontendClickLog::query()->create([
            'frontend_user_id' => $frontendUserId,
            'visitor_id' => $data['visitor_id'],
            'session_id' => $data['session_id'] ?? null,
            'label' => $data['label'] ?? null,
            'url' => $data['url'],
            'context' => $data['context'] ?? null,
        ]);

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
