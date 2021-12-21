<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductTypeFactory extends Factory
{

    protected $model = ProductType::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            '_key'=>Str::random(32),
            'name'=>$this->faker->word,
            'description'=>$this->faker->paragraph,
        ];
    }
}
