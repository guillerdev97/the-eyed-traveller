<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Image;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    // trending
    public function test_if_no_auth_user_can_see_trending_images() {
        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            $user = User::factory()->create([])
        );

        Category::factory()->create();

        $image = Image::factory()->create([
            'image' => 'url',
            'title' => 'image title',
            'favs_quantity' => 0,
            'location' => 'url',
            'category_id' => 1,
            'user_id' => $user->id,
            'city' => 'Mieres'
        ]);

        $this->actingAs($user);

        $response = $this->get(route('trending'));
        $response->assertStatus(200);

        $this->assertCount(1, Image::all());
    }
}
