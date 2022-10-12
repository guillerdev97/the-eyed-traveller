<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Image;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ImageTest extends TestCase
{

    use RefreshDatabase;

    // list images
    public function test_if_no_auth_user__can__see_trending_images()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

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

        $response = $this->get(route('listAll'));
        $response->assertStatus(200);

        $this->assertCount(1, Image::all());
    }

    // list my images
    public function test_if_auth_user__can__see_his_images()
    {
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

        $response = $this->get(route('listMy'));
        $response->assertStatus(200);
        $this->assertCount(1, Image::all());
    }

    // list fav
    public function test_if_auth_user__can__see_fav_images()
    {
        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            $user = User::factory()->create([])
        );

        Sanctum::actingAs(
            $user2 = User::factory()->create([])
        );

        Category::factory()->create();

        $image = Image::factory()->create([
            'image' => 'url',
            'title' => 'image title',
            'favs_quantity' => 0,
            'location' => 'url',
            'category_id' => 1,
            'user_id' => $user2->id,
            'city' => 'Mieres'
        ]);

        $this->actingAs($user);

        $response = $this->get(route('listMy'));
        $response->assertStatus(200);
        $this->assertCount(1, Image::all());
    }

    // create image
    public function test_if_auth_user_can_create_an_image()
    {
        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            $user = User::factory()->create([])
        );

        Category::factory()->create();

        $this->actingAs($user);
        $response = $this->attemptToRegister();

        $response->assertStatus(200);
        $this->assertCount(1, User::all());
        $this->assertCount(1, Image::all());
    }

    protected function attemptToRegister(array $params = [])
    {
        $user = auth()->user();

        return $this->post(route('createImage'), array_merge([
            'image' => 'url',
            'title' => 'image title',
            'favs_quantity' => 0,
            'location' => 'url',
            'category_id' => 1,
            'user_id' => $user->id,
            'city' => 'Mieres'
        ], $params));
    }

    // delete
    public function test_an_image_can_be_deleted()
    {
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

        $response = $this->delete(route('delete', $image->id));
        $this->assertCount(0, Image::all());
    }

    // update
    public function test_an_image_can_be_updated()
    {
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
        $this->assertCount(1, Image::all());

        $response = $this->patch(route('updateImage', $image->id), [
            'image' => 'url',
            'title' => 'update title',
            'favs_quantity' => 0,
            'location' => 'url',
            'category_id' => 1,
            'user_id' => $user->id,
            'city' => 'Mieres'
        ]);

        $this->assertEquals(Image::first()->title, 'update title');
    }
}
