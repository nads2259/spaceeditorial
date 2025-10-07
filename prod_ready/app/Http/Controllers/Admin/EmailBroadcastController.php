<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailBroadcast;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailBroadcastController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('q')->trim();
        $status = $request->string('status')->trim();

        $query = EmailBroadcast::query()
            ->with('template')
            ->withCount([
                'recipients',
                'recipients as sent_recipients_count' => fn ($recipientQuery) => $recipientQuery->where('status', 'sent'),
                'recipients as failed_recipients_count' => fn ($recipientQuery) => $recipientQuery->where('status', 'failed'),
                'clicks',
            ]);

        $searchValue = $search->value();
        if ($searchValue !== '') {
            $query->where(function ($broadcastQuery) use ($searchValue) {
                $broadcastQuery
                    ->where('subject', 'like', "%{$searchValue}%")
                    ->orWhereHas('template', fn ($templateQuery) => $templateQuery->where('name', 'like', "%{$searchValue}%"));
            });
        }

        $statusValue = $status->value();
        if ($statusValue !== '') {
            $query->where('status', $statusValue);
        }

        $broadcasts = $query
            ->orderByDesc('sent_at')
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        $metrics = [
            'total_broadcasts' => EmailBroadcast::query()->count(),
            'total_recipients' => EmailBroadcast::query()->sum('total_recipients'),
            'delivered_recipients' => EmailBroadcast::query()->sum('sent_count'),
        ];

        return view('admin.email-broadcasts.index', [
            'broadcasts' => $broadcasts,
            'search' => $searchValue,
            'status' => $statusValue,
            'metrics' => $metrics,
        ]);
    }
}
