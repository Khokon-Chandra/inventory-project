<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Inventory\Category;
use App\Models\Inventory\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Category::withTrashed()->restore();
       return view('inventory.category.index',[
           'productTypes'=>ProductType::select('id','_key','name')->get(),
           'categories'=>Category::with(['productType'=>function($query){
               $query->select('id','name');
           }])->latest()->filter(request(['search','product_type']))->paginate(10),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.category.create',[
            'productTypes'=>ProductType::select('id','name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try{
            $attribute = $request->validated();
            $attribute['_key'] = Str::random(32);
            Category::create($attribute);
            return redirect()->route('inventory.categories.index')
            ->with('success','Successfully category created!!');
        }catch(\Exeception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    /**
     * Create multiple Data
     */

    public function createMultiple()
    {
        return view('inventory.category.create-multiple',[
            'productTypes'=>ProductType::select('id','_key','name')->get(),
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
                    'product_type_id'=>$request->product_type_id[$i],
                    'name' => $request->name[$i],
                    'description' => $request->description[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            Category::insert($data);
            return response()->json('Successfully Data inserted', 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }


    /**
     * category by product type
     */

     public function loadCategoryByProductType(Request $request)
     {
        return Category::select('id','product_type_id','name')->whereHas('productType',function($query) use($request){
            $query->select('id')->where('_key',$request->_key);
        })->get();
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
        return view('inventory.category.edit',[
            'productTypes'=>ProductType::select('id','name')->get(),
            'category'=>Category::where('_key',$_key)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $_key)
    {
        try{
            Category::where('_key',$_key)->update($request->validated());
            return redirect()->route('inventory.categories.index')
            ->with('success','Successfully Category Updated s!!');
        }
        catch(\Exception $e){
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
        try{
            Category::where('_key',$_key)->delete();
            return redirect()->route('inventory.categories.index')
            ->with('success', 'Successfullly category deleted');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }


    public function deleteMultiple(Request $request){
        try{
            Category::whereIn('_key',$request->data)->delete();
            return response()->json(['data'=>$request->data,'code'=>200]);
        }catch(\Execption $e){
            return response()->json(['data'=>$e->getMessage(),'code'=>500]);
        }
    }

}
