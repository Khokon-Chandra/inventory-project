<?php

namespace Database\Factories;

use App\Models\inventory\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            '_key'=>rand(999999,99999999),
            'category_id'=>rand(1,50),
            'name'=>$this->faker->word,
            'description'=>$this->faker->paragraph(5),
        ];
    }
}
