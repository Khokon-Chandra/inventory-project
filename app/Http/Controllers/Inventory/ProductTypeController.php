<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductTypeRequest;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Psr\Container\NotFoundExceptionInterface;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ProductType::withTrashed()->restore();
        return view('inventory.product_type.index', [
            'productTypes' => ProductType::latest()->filter(request(['search']))->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.product_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {

        try {
            $attribute = $request->validated();
            $attribute['_key'] = Str::random(32);
            ProductType::create($attribute);
            return redirect()->route('inventory.product_types.index')
            ->with('success', 'Successfully Product Type created !!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, Please Try arain !!');
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
        $productType = ProductType::where('_key', $_key)->firstOrfail();
        return view('inventory.product_type.edit', [
            'productType' => $productType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductTypeRequest $request, $_key)
    {

        try {
            ProductType::where('_key', $_key)->update($request->validated());
            return redirect()->route('inventory.product_types.index')
            ->with('success', 'Successfuly product type updated');
        } catch (\Execption $e) {
            return back()->with('error', 'Something went wrong, Please try again!!');
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
        ProductType::where('_key', $_key)->delete();
        return redirect()->route('inventory.product_types.index')
        ->with('success', 'Successfullly product type deleted');
    }

    public function deleteMultiple(Request $request){
        try{
            ProductType::whereIn('_key',$request->data)->delete();
            return response()->json(['data'=>$request->data,'code'=>200]);
        }catch(\Execption $e){
            return response()->json(['data'=>false,'code'=>500]);
        }
    }
}
