<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreProductTypeRequest;
use App\Models\Inventory\Product;
use App\Models\Inventory\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Psr\Container\NotFoundExceptionInterface;
use Yajra\DataTables\DataTables;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //   ProductType::withTrashed()->restore();
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
            return back()->with('error', $e->getMessage());
        }
    }


    /**
     * @param Nothing Null
     */

    public function createMultiple()
    {
        return view('inventory.product_type.create-multiple');
    }


    /**
     * @param Array response
     * @return xmlHTTPResponse
     */

    public function storeMultiple(Request $request)
    {

        try {
            $data = [];
            for ($i = 0; $i < count($request->name); $i++) {
                $data[] = [
                    '_key'=> Str::random(32),
                    'name' => $request->name[$i],
                    'description' => $request->description[$i],
                ];
            }

            ProductType::insert($data);
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
        return redirect()->back();
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
            ProductType::where('_key', $_key)->delete();
            return redirect()->route('inventory.product_types.index')
                ->with('success', 'Successfullly product type deleted');
        } catch (\Execption $e) {
            return response()->json(['data' => $e->getMessage(), 'code' => 500]);
        }
    }

    public function deleteMultiple(Request $request)
    {
        try {
            ProductType::whereIn('_key', $request->data)->delete();
            return response()->json(['data' => $request->data, 'code' => 200]);
        } catch (\Execption $e) {
            return response()->json(['data' => $e->getMessage(), 'code' => 500]);
        }
    }
}
