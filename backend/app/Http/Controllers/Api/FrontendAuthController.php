<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FrontendUser;
use App\Models\FrontendUserVisitor;
use App\Services\Mail\WelcomeEmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class FrontendAuthController extends Controller
{
    public function __construct(private readonly WelcomeEmailService $welcomeEmails)
    {
    }

    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:frontend_users,email'],
            'password' => ['required', 'string', 'min:8'],
            'visitor_id' => ['nullable', 'string', 'max:64'],
            'session_id' => ['nullable', 'string', 'max:64'],
        ]);

        $user = FrontendUser::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'status' => 'active',
            'last_login_at' => now(),
        ]);

        $token = $user->createToken('frontend')->plainTextToken;

        $this->storeVisitorMapping($user, $data['visitor_id'] ?? null, $data['session_id'] ?? null);

        $this->welcomeEmails->sendFrontendUserWelcome($user);

        return response()->json([
            'token' => $token,
            'user' => $this->transformUser($user),
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'visitor_id' => ['nullable', 'string', 'max:64'],
            'session_id' => ['nullable', 'string', 'max:64'],
        ]);

        /** @var FrontendUser|null $user */
        $user = FrontendUser::query()
            ->where('email', $credentials['email'])
            ->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('The provided credentials are incorrect.'),
            ]);
        }

        if ($user->status !== 'active') {
            throw ValidationException::withMessages([
                'email' => __('Your account is not active yet.'),
            ]);
        }

        $user->forceFill(['last_login_at' => now()])->save();

        $user->tokens()->where('name', 'frontend')->delete();
        $token = $user->createToken('frontend')->plainTextToken;

        $this->storeVisitorMapping($user, $credentials['visitor_id'] ?? null, $credentials['session_id'] ?? null);

        return response()->json([
            'token' => $token,
            'user' => $this->transformUser($user->fresh()),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user) {
            $request->user()->currentAccessToken()?->delete();
        }

        return response()->json(['status' => 'logged_out']);
    }

    public function me(Request $request): JsonResponse
    {
        $user = $request->user();

        if (! $user instanceof FrontendUser) {
            return response()->json(['user' => null]);
        }

        return response()->json(['user' => $this->transformUser($user)]);
    }

    protected function transformUser(FrontendUser $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'status' => $user->status,
            'last_login_at' => optional($user->last_login_at)->toIso8601String(),
        ];
    }

    protected function storeVisitorMapping(FrontendUser $user, ?string $visitorId, ?string $sessionId): void
    {
        if (! $visitorId) {
            return;
        }

        FrontendUserVisitor::query()->updateOrCreate(
            [
                'frontend_user_id' => $user->id,
                'visitor_id' => $visitorId,
            ],
            [
                'session_id' => $sessionId,
            ]
        );
    }
}
