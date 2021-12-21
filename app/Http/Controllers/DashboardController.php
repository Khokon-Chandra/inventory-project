<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductType;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard',[
            'product_counts'=>Product::count(),
            'category_counts'=>Category::count(),
            'product_type_counts'=>ProductType::count(),
            'user_counts'=>User::count(),
        ]);
    }
}
