<?php

namespace App\Http\Controllers;

use App\Models\EmailBroadcast;
use App\Models\EmailBroadcastRecipient;
use App\Models\EmailClickLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmailBroadcastController extends Controller
{
    public function track(Request $request, EmailBroadcast $broadcast, string $token): RedirectResponse
    {
        $recipient = EmailBroadcastRecipient::query()
            ->where('email_broadcast_id', $broadcast->id)
            ->where('token', $token)
            ->firstOrFail();

        $target = $request->query('url');
        if (! $target || ! filter_var($target, FILTER_VALIDATE_URL)) {
            abort(400, 'Invalid target URL.');
        }

        EmailClickLog::query()->create([
            'email_broadcast_id' => $broadcast->id,
            'email_broadcast_recipient_id' => $recipient->id,
            'recipient_type' => $recipient->recipient_type,
            'recipient_id' => $recipient->recipient_id,
            'email' => $recipient->email,
            'url' => $target,
            'clicked_at' => now(),
        ]);

        $recipient->forceFill([
            'clicked_at' => $recipient->clicked_at ?? now(),
            'click_count' => $recipient->click_count + 1,
        ])->save();

        return Redirect::to($target);
    }
}
