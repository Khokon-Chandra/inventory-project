<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        '_key',
        'product_type_id',
        'name',
        'description',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id','id');
    }

    public function products()
    {
        // return $this->hasManyThrough(Product::class);
    }

    public function scopeFilter ( $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query
                ->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('description', 'LIKE', '%'.$search.'%');
        });

        $query->when($filters['product_type'] ?? false, function ($query, $productType) {
            $query
                ->whereHas('productType',function($query) use($productType){
                    $query->whereColumn('_key',$productType);
                });
        });
    }




    public function scopeCategoryFilter($query)
    {
     $query
        ->whereHas('productType',function($query){
            $query->where('id',request('product_type'));
        });
    }





}
