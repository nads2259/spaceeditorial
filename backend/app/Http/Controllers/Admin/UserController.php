<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->orderBy('name')->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.create', ['user' => new User()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        $user = User::query()->create($data);

        $token = $this->ensureApiToken($user, force: true);

        return redirect()
            ->route('admin.users.index')
            ->with(['status' => 'User created', 'api_token' => $token]);
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $this->validatedData($request, $user);

        $user->update($data);

        $token = null;
        if ($request->boolean('regenerate_api_token')) {
            $token = $this->ensureApiToken($user, force: true);
        } else {
            $token = $this->ensureApiToken($user, force: false);
        }

        $flash = ['status' => 'User updated'];
        if ($token) {
            $flash['api_token'] = $token;
        }

        return redirect()->route('admin.users.edit', $user)->with($flash);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->tokens()->delete();
        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'User deleted');
    }

    protected function validatedData(Request $request, ?User $user = null): array
    {
        $userId = $user?->id;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.($userId ?? 'NULL').',id'],
            'password' => [$user ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
        ]);

        if (blank($validated['password'] ?? null)) {
            unset($validated['password']);
        }

        return $validated;
    }

    protected function ensureApiToken(User $user, bool $force = false): ?string
    {
        $existing = $user->tokens()->where('name', 'frontend')->first();

        if ($existing && ! $force) {
            return null;
        }

        if ($existing) {
            $existing->delete();
        }

        $tokenName = 'frontend';

        return $user->createToken($tokenName)->plainTextToken;
    }
}
