<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Community;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // users factory
        User::factory()->create([
            'name' => 'Guiller',
            'email' => 'guiller@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Kerim',
            'email' => 'kerim@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Inma',
            'email' => 'inma@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Buda',
            'email' => 'buda@gmail.com',
        ]);

        // communities factory
        Community::factory()->create([
            'community' => 'Andalucía',
        ]);
        Community::factory()->create([
            'community' => 'Asturias',
        ]);
        Community::factory()->create([
            'community' => 'Madrid',
        ]);
        Community::factory()->create([
            'community' => 'Galicia',
        ]);

        // cities factory
        City::factory()->create([
            'city' => 'Sevilla',
            'community_id' => 1,
        ]);
        City::factory()->create([
            'city' => 'Málaga',
            'community_id' => 1,
        ]);
        City::factory()->create([
            'city' => 'Córdoba',
            'community_id' => 1,
        ]);
        City::factory()->create([
            'city' => 'Avilés',
            'community_id' => 2,
        ]);
        City::factory()->create([
            'city' => 'Gijón',
            'community_id' => 2,
        ]);
        City::factory()->create([
            'city' => 'Oviedo',
            'community_id' => 2,
        ]);
        City::factory()->create([
            'city' => 'Mieres',
            'community_id' => 2,
        ]);
        City::factory()->create([
            'city' => 'Leganés',
            'community_id' => 3,
        ]);
        City::factory()->create([
            'city' => 'Fuenlabrada',
            'community_id' => 3,
        ]);
        City::factory()->create([
            'city' => 'Alcorcón',
            'community_id' => 3,
        ]);
        City::factory()->create([
            'city' => 'Getafe',
            'community_id' => 3,
        ]);
        City::factory()->create([
            'city' => 'Pontevedra',
            'community_id' => 4,
        ]);
        City::factory()->create([
            'city' => 'Lugo',
            'community_id' => 4,
        ]);

        // categories factory
        Category::factory()->create([
            'name' => 'Food',
        ]);
        Category::factory()->create([
            'name' => 'Attractions',
        ]);

        // images factory
        Image::factory(50)->create();
    }
}
