<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_full_admin_can_access_visit_logs(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get(route('admin.visit-logs.index'));

        $response->assertOk();
    }

    public function test_editor_is_blocked_from_visit_logs(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);

        $response = $this->actingAs($editor)->get(route('admin.visit-logs.index'));

        $response->assertForbidden();
    }

    public function test_editor_can_still_access_posts_index(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);

        $response = $this->actingAs($editor)->get(route('admin.posts.index'));

        $response->assertOk();
    }
}
