<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Services\Mail\WelcomeEmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function __construct(private readonly WelcomeEmailService $welcomeEmails)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $emailRules = ['required', 'string', 'max:255', app()->runningUnitTests() ? 'email:rfc' : 'email:rfc,dns'];

        $data = $request->validate([
            'email' => $emailRules,
        ]);

        $subscriber = Subscriber::query()->firstWhere('email', $data['email']);

        if (! $subscriber) {
            $subscriber = Subscriber::query()->create([
                'email' => $data['email'],
                'status' => 'subscribed',
                'subscribed_at' => now(),
                'meta' => [
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ],
            ]);

            $this->welcomeEmails->sendSubscriberWelcome($subscriber);

            return response()->json([
                'status' => 'subscribed',
                'message' => __('Thanks! You are now subscribed to Space Editorial updates.'),
            ], 201);
        }

        if ($subscriber->status === 'subscribed') {
            return response()->json([
                'status' => 'already',
                'message' => __('You are already subscribed with this email address.'),
            ]);
        }

        $subscriber->forceFill([
            'status' => 'subscribed',
            'subscribed_at' => now(),
            'unsubscribed_at' => null,
        ])->save();

        $this->welcomeEmails->sendSubscriberWelcome($subscriber);

        return response()->json([
            'status' => 'reactivated',
            'message' => __('Welcome back! Your subscription has been re-enabled.'),
        ]);
    }
}
