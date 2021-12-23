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

        // Product::withTrashed()->restore();
        return view('inventory.product.index', [
            'productTypes' => ProductType::select('id', '_key', 'name')->get(),
            'categories' => Category::categoryFilter()->get(),
            'products' => Product::latest()->filter(request(['product_type', 'category', 'search']))->paginate(10),
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
            // dd($attribute);
            Product::create($attribute);
            return redirect()->route('inventory.products.index')->with('success', 'successfully product created');
        } catch (\Exeception$e) {
            return back('error', 'Something went wrong Please try again');
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
        try {
            return view('inventory.product.edit', [
                'categories' => Category::select('id', '_key', 'name')->get(),
                'product' => Product::where('_key', $_key)->firstOrFail(),
            ]);
        } catch (\Execption$e) {
            return back()->with('error', 'Something went wrong Please try again');
        }
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
            return redirect()->route('inventory.products.index')->with('success', 'successfully product Updated');
        } catch (\Exeception$e) {
            return back('error', 'Something went wrong Please try again');
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
        } catch (\Exeception$e) {
            return back('error', 'Something went wrong Please try again');
        }
    }

    public function deleteMultiple(Request $request)
    {
        try {
            Product::whereIn('_key', $request->data)->delete();
            return response()->json(['data' => $request->data, 'code' => 200]);
        } catch (\Execption$e) {
            return response()->json(['data' => false, 'code' => 500]);
        }
    }

}
