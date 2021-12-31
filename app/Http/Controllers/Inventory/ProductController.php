<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Product::whereHas('productType')->with('productType')->get()->toArray();
        // Product::withTrashed()->restore();
        return view('inventory.product.index', [
            'productTypes' => ProductType::select('id', '_key', 'name')->whereHas('products')->get(),
            'categories' => Category::categoryFilter()->get(),
            'products' => Product::with(['category'=>function($query){
                $query->select('id','name');
            }])->latest()->filter(request(['product_type', 'category', 'search']))->paginate(10),
        ]);
    }

    /**
     * product printer
     */

     public function printProduct()
     {
        return view('inventory.product.print', [
            'productTypes' => ProductType::select('id', '_key', 'name')->whereHas('products')->get(),
            'categories' => Category::categoryFilter()->get(),
            'products' => Product::with(['category'=>function($query){
                $query->select('id','name');
            }])->latest()->filter(request(['product_type', 'category', 'search']))->paginate(10),
        ]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.product.create', [
            'productTypes' => ProductType::select('id', '_key', 'name')->get(),
            'categories' => Category::categoryFilter()->get(),
            'products' => Product::latest()->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $attribute = $request->validated();
            $attribute['_key'] = Str::random(32);
            Product::create($attribute);
            return redirect()->route('inventory.products.index')->with('success', 'successfully product created');
        } catch (\Exeception $e) {
            return back()->with('error', $e->getMessage());
        }
    }



     /**
     * Create multiple Data
     */

    public function createMultiple()
    {
        return view('inventory.product.create-multiple',[
            'productTypes'=>ProductType::select('id','_key','name')->get(),
            'categories' => Category::categoryFilter()->get(),
        ]);
    }

    /**
     * Store multiple category
     */

    public function storeMultiple(Request $request)
    {
        try {
            $data = [];
            for ($i = 0; $i < count($request->name); $i++) {
                $data[] = [
                    '_key'=> Str::random(32),
                    'category_id'=>$request->category_id[$i],
                    'name' => $request->name[$i],
                    'description' => $request->description[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            Product::insert($data);
            return response()->json('Successfully Data inserted', 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($_key)
    {
        return view('inventory.product.edit', [
            'productTypes'=>ProductType::select('id','_key','name')->get(),
            'categories' => Category::select('id', '_key', 'name')->get(),
            'product' => Product::where('_key', $_key)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $_key)
    {
        try {
            Product::where('_key', $_key)->update($request->validated());
            return redirect()->route('inventory.products.index')
            ->with('success', 'successfully product Updated');
        } catch (\Exeception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($_key)
    {
        try {
            Product::where('_key', $_key)->delete();
            return redirect()->route('inventory.products.index')->with('success', 'successfully product Deleted');
        } catch (\Exeception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function deleteMultiple(Request $request)
    {
        try {
            Product::whereIn('_key', $request->data)->delete();
            return response()->json(['data' => $request->data, 'code' => 200]);
        } catch (\Execption $e) {
            return response()->json(['data' => $e->getMessage(), 'code' => 500]);
        }
    }
}
