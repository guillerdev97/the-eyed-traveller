<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    // login //
    public function test_if_user_can_authenticate()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ])
            ->assertOk();

        $this->assertArrayHasKey('access_token', $response->json());
    }

    public function test_if_user_can_not_authenticate_with_invalid_password()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'password' => '12345'
        ]);

        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => 'wrong-password'
        ]);

        $response->assertStatus(404);
    }

    public function test_if_user_can_not_authenticate_with_invalid_email()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'email' => 'guillermo@gmail.com'
        ]);

        $response = $this->postJson(route('login'), [
            'email' => 'guiller@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(404);
    }
    // done //

    // logout 
    public function test_if_auth_user_can_logout()
    {
        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            $user = User::factory()->create([])
        );

        $response = $this->get(route('logout'));
        $response->assertStatus(200);
        $this->assertFalse($user === auth()->check());
    }
    // done //

    // register //
    public function test_if_no_auth_user_can_register()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->attemptToRegister();

        $response->assertStatus(200);
        $this->assertCount(2, User::all());
    }
  
    protected function attemptToRegister(array $params = [])
    {
        return $this->post(route('register'), array_merge([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ], $params));
    }
    // done //

    // user profile //
    public function test_if_auth_user_can__see_user_profile()
    {
        $this->withoutExceptionHandling();
        
        Sanctum::actingAs(
            $user = User::factory()->create([])
        );

        $this->actingAs($user);
        $response = $this->get(route('profile', $user->id));
        $response->assertStatus(200);
    }
    // done //

    // delete //
    public function test_delete_user_no_auth_user()
    {
        $this->withoutExceptionHandling();
        
        Sanctum::actingAs(
            $user = User::factory()->create([])
        );
        
        $this->assertCount(1, User::all());

        $this->actingAs($user);
        
        $response = $this->delete(route('delete'));
        $response->assertStatus(200);
        $this->assertCount(0, User::all());
    }
    // done //

    // update
    public function test_user_can_edit_profile()
    {
        $this->withExceptionHandling();

        Sanctum::actingAs(
            $user = User::factory()->create([])
        );

        $this->actingAs($user);
        $response = $this->patch(route('update', $user->id), [
            'name' => 'Bad Name',
            'email' => 'kerim@gmail.com',
            'password' => 'password',
            'showPassword' => 'password'
        ]);
        $response->assertStatus(200);

        $user = $user->fresh();

        $this->assertEquals('kerim@gmail.com', $user->email);
    }
}
