<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            '_key'=>rand(999999,9999999999),
            'name'=>$this->faker->word,
            'description'=>$this->faker->paragraph,
        ];
    }
}
