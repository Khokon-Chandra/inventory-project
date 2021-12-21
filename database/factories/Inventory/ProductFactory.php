<?php

namespace Database\Factories\Inventory;

use App\Models\inventory\Category;
use App\Models\Inventory\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            '_key'=>Str::random(32),
            'category_id'=>rand(1,50),
            'name'=>$this->faker->word,
            'description'=>$this->faker->paragraph(5),
        ];
    }
}
