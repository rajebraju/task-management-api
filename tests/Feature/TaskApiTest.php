<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use App\Models\User;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a task.
     */
    public function test_can_create_task()
    {
        // Create a test user
        $user = User::factory()->create();

        // Simulate authentication
        Sanctum::actingAs($user);

        // Make the request
        $response = $this->postJson('/api/tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test task.',
        ]);

        // Assert the response
        $response->assertStatus(201)
            ->assertJson(['title' => 'Test Task']);
    }
}
