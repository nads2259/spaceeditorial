<?php

namespace App\Http\Controllers\Tracking;

use App\Http\Controllers\Controller;
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
        ]);

        $log = VisitLog::firstOrNew([
            'visitor_id' => $data['visitor_id'],
            'session_id' => $data['session_id'] ?? null,
            'url' => $data['url'],
        ]);

        $log->fill([
            'referrer' => $data['referrer'] ?? $log->referrer,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'locale' => $data['locale'] ?? $request->getLocale(),
            'context' => $data['context'] ?? $log->context,
        ]);

        $log->save();

        return response()->json(['status' => 'ok']);
    }
}
