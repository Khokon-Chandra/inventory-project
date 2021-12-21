<?php

namespace Database\Factories;

use App\Models\inventory\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
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
            'product_type_id'=>rand(1,20),
            'name'=>$this->faker->word,
            'description'=>$this->faker->paragraph,
        ];
    }
}
