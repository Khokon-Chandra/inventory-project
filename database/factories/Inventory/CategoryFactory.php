<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\Category;
use App\Models\inventory\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{

    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            '_key'=>Str::random(32),
            'product_type_id'=>rand(1,20),
            'name'=>$this->faker->word,
            'description'=>$this->faker->paragraph,
        ];
    }
}
