<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('q'));
        $status = $request->get('status');

        $subscribers = Subscriber::query()
            ->when($search, function ($query) use ($search) {
                $query->where('email', 'like', "%{$search}%");
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest('subscribed_at')
            ->paginate(25)
            ->withQueryString();

        return view('admin.subscribers.index', [
            'subscribers' => $subscribers,
            'search' => $search,
            'status' => $status,
        ]);
    }
}
