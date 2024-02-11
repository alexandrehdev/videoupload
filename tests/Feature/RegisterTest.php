<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_can_access_register_page()
    {
        $response = $this->get('/cadastro');

        $response->assertStatus(200);
    }    

    public function test_can_create_user(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseCount("users", 1);
    }
}
