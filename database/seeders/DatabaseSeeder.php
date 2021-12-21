<?php

namespace Database\Seeders;

use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use App\Models\User;
// use App\Models\Inventory\ProductType;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        // \App\Models\Inventory\ProductType::factory(20)->create();
        // Category::factory(50)->create();
        // ProductFactory::factory(200)->create();
    }
}
