<?php

namespace Database\Seeders;

use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductType;
use App\Models\User;
// use App\Models\Inventory\ProductType;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Khokon Chandra',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('00000000'),
        ]);
        User::factory(5)->create();
        ProductType::factory(20)->create();
        Category::factory(50)->create();
        Product::factory(200)->create();
    }
}
