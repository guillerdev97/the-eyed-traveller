<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
  
    public function definition()
    {
        return [
           'image' => 'https://i.ytimg.com/vi/2oAuXZuwqaw/maxresdefault.jpg',
           'title' => 'image title',
           'favs_quantity' => $this->faker->biasedNumberBetween($min = 10, $max = 30, $function = 'sqrt'),
           'location' => 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9',
           'city' => 'Madrid',
           'user_id' => $this->faker->biasedNumberBetween($min = 1, $max = 4, $function = 'sqrt'),
           'category_id' => $this->faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
        ];
    }
}
