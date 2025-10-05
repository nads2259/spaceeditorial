<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RememberLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_sets_remember_cookie_when_requested(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@example.test',
            'role' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'remember' => 'on',
        ]);

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertAuthenticatedAs($user);

        $recaller = Auth::guard('web')->getRecallerName();
        $response->assertCookie($recaller);

        $user->refresh();
        $this->assertNotNull($user->remember_token);
    }
}
