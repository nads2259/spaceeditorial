<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->orderBy('name')->paginate(20);

        return view('admin.users.index', [
            'users' => $users,
            'roles' => $this->roles(),
        ]);
    }

    public function create(): View
    {
        return view('admin.users.create', [
            'user' => new User(),
            'roles' => $this->roles(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        $user = User::query()->create($data);

        $token = $this->ensureApiToken($user, force: true);

        $flash = ['status' => 'User created'];
        if ($token) {
            $flash['api_token'] = $token;
        }

        return redirect()
            ->route('admin.users.index')
            ->with($flash);
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $this->roles(),
        ]);
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
        if ($user->role === 'admin') {
            return redirect()
                ->route('admin.users.index')
                ->withErrors(['user' => __('Administrators cannot be deleted.')]);
        }

        $user->tokens()->delete();
        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'User deleted');
    }

    protected function validatedData(Request $request, ?User $user = null): array
    {
        $userId = $user?->id;
        $roles = array_keys($this->roles());

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.($userId ?? 'NULL').',id'],
            'password' => [$user ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in($roles)],
        ]);

        if (blank($validated['password'] ?? null)) {
            unset($validated['password']);
        }

        if ($user && $user->role === 'admin' && ($validated['role'] ?? $user->role) !== 'admin') {
            $otherAdmins = User::query()
                ->where('role', 'admin')
                ->where('id', '!=', $user->id)
                ->count();

            if ($otherAdmins === 0) {
                throw ValidationException::withMessages([
                    'role' => __('At least one administrator must remain.'),
                ]);
            }
        }

        return $validated;
    }

    protected function ensureApiToken(User $user, bool $force = false): ?string
    {
        if ($user->role !== 'admin') {
            $user->tokens()->where('name', 'frontend')->delete();

            return null;
        }

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

    protected function roles(): array
    {
        return [
            'admin' => __('Administrator'),
            'editor' => __('Editor'),
        ];
    }
}
