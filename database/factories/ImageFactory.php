<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
  
    public function definition()
    {
        return [
           'image' => $this->faker->imageUrl(),
           'title' => 'image title',
           'favs_quantity' => $this->faker->biasedNumberBetween($min = 10, $max = 30, $function = 'sqrt'),
           'location' => 'image location',
           'category_id' => $this->faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
           'city_id' => $this->faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
        ];
    }
}
