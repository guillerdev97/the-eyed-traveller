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

        // categories factory
        Category::factory()->create([
            'name' => 'Food',
        ]);
        Category::factory()->create([
            'name' => 'Attractions',
        ]);

        // images factory
        Image::factory(20)->create();
    }
}
